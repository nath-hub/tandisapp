<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestStoreRequest;
use App\Http\Requests\StorePhaseRequest;
use App\Mail\OrderShipped;
use App\Models\Invest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Enterprise;
use App\Models\Phase;
use Stevebauman\Location\Facades\Location;

// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Cache;
use stdClass;
use Illuminate\Support\Facades\Mail;
use Spipu\Html2Pdf\Html2Pdf;
use Illuminate\Support\Str;


use Illuminate\Support\Facades\Storage;
use Nette\Utils\Random;

class InvestController extends Controller
{


    public function index()
    {
        // $id = auth()->user()->id;
        // $user = User::find($id);

        // $entreprises = $user->investissements;
        $enterprises = Enterprise::all();
        // $invest = Invest::all();
        return view('welcome', compact('enterprises'));
    }

    public function create($enterprise)
    {

        $enterprise = Enterprise::where('id', $enterprise)->first();

        $phase = Phase::where('enterprise_id', $enterprise->id)->where('statut_phase', "En-cour")->first();

        $user = auth()->user();

        return view('invest.create', compact('user', 'enterprise', 'phase'));
    }

    public function store(Request $request, $enterprise)
    {
        $enterprise = Enterprise::where('id', $enterprise)->first();

        $phase = Phase::where('enterprise_id', $enterprise->id)->where('statut_phase', "En-cour")->first();

        if (empty($phase)) {
            return redirect()->route('enterprise.index', compact('phase'))
                ->with('error', "vous ne pouvez pas investir car aucune phase avec le statut en cour n'a été créé !!!");
        } else {
            $phases = $phase->id;
        }

        $user = auth()->user();

        // $ip = $request->ip();
        $ip = '129.0.205.108';
        $currentUserInfo = Location::get($ip);

        $data = new stdClass();

        $data->prix_action = $phase->prix_action;
        $data->enterprise_id = $enterprise->id;
        $data->nombre_action = $request->nombre_action;
        $data->total_payer = $request->total_payer;
        $data->phases_id = $phases;
        $data->created_at = Carbon::now();

        $random = Str::upper(Str::random(15));

        $enterprise->investisseurs()->attach($user, [
            'prix_action' => $data->prix_action,
            'nombre_action' => $data->nombre_action,
            "total_payer" => $data->total_payer,
            "phase_id" => $data->phases_id,
            'created_at' => $data->created_at,
        ]);

        // $data = array(
        //     'amount' => $request->total_payer,
        //     'currency_code' => $currentUserInfo->currencyCode,
        //     'ccode' => $currentUserInfo->countryCode,
        //     'lang' => 'fr',
        //     'item_ref' => $random,
        //     'item_name' => "Achat d'action",
        //     'email' => $user->email,
        //     'phone' => $user->phone,
        //     'first_name' => $user->name,
        //     'public_key' => 'PK_K7TagYkeP3pACYC8vaJ8',
        //     'logo' => 'https://raw.githubusercontent.com/nath-hub/tandisapp/devellop/public/assets/images/im9.png'
        // );

        // $curl = curl_init();

        // curl_setopt_array(
        //     $curl,
        //     array(
        //         CURLOPT_URL => 'https://www.paymooney.com/api/v1.0/payment_url',
        //         CURLOPT_RETURNTRANSFER => true,
        //         CURLOPT_ENCODING => "",
        //         CURLOPT_MAXREDIRS => 10,
        //         CURLOPT_TIMEOUT => 0,
        //         CURLOPT_FOLLOWLOCATION => true,
        //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //         CURLOPT_CUSTOMREQUEST => "POST",
        //         CURLOPT_HTTPHEADER => array("Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8"),
        //         CURLOPT_POSTFIELDS => $data,
        //     )
        // );

        // $response = curl_exec($curl);

        // dd($response);

        // curl_close($curl);

        // $rep = json_decode($response);

        // if ($rep->response == "success") {

        $invests = Invest::where('user_id', $user->id)->get();

        $action = new stdClass();
        $action->nombre_action = 0;
        $action->prix_action = 0;
        $action->total_payer = 0;

        foreach ($invests as $invest) {
            $action->nombre_action += $invest->nombre_action;
            $action->prix_action = $invest->prix_action;
            $action->total_payer += $invest->total_payer;
        }

        $data->sous_total = $data->total_payer;

        $remise = $data->total_payer * 0.03;

        $data->remise = $remise;

        $data->total_payer = $data->total_payer + $remise;

        $pdf = PDF::loadView('facture', compact('data', 'enterprise', 'user'))->setOptions(['isHtml5ParserEnabled' => true]);

        $contrat = PDF::loadView('contrat', compact('data', 'action', 'enterprise', 'user'));


        $num = mt_rand(100000, 999999);

        $name = "facture-" . $num;

        $pdf->save(storage_path('app/public/recu/' . $name . '.pdf'));

        $storagePath = ('recu/' . $name . '.pdf');

        $names = 'contrat' . $user->id;

        $contrat->save(storage_path('app/public/contrat/' . $names . '.pdf'));

        $contratPath = ('contrat/' . $names . '.pdf');

        $record = Enterprise::find($enterprise->id);
        $record->montant_actuel =  $enterprise->montant_actuel + $data->sous_total;
        $record->save();

        $enterprise->investisseurs()->syncWithPivotValues($user, [
            'state' => 1,
        ]);


        return view('invest.succes', [
            'success' => "Felicitations, vous vennez d'acheter des actions !!!!!!!!!",
            'data' => $data,
            'recu' => $storagePath,
            'contrat' => $contratPath,
            'enterprise' => $enterprise,
            'user' => $user
        ]);
        
        // } else {
        //     return redirect()->route('home.projet')->with([
        //         'error' => "Echec de l'enregistrement! veuillez renseigner le prix et le nombre d'action ou verifier votre connexion internet"
        //     ]);
        // }
    }

    public function succes()
    { 

        return view('invest.succes' );
    }

    public function cancel()
    {
        return view('invest.cancel', [
            'success' => "Votre paiement a echouee !!!!!!!!!"
        ]);
    }

    public function pdf()
    {
        $pdf = PDF::loadView('contrat');
        $pdf->save(storage_path('app/public/facture.pdf'));
    }
}
