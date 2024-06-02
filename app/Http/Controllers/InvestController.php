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

        if(auth()->user()->cnirecto !== null && auth()->user()->cniverso!== null){

        $enterprise = Enterprise::where('id', $enterprise)->first();

        $phase = Phase::where('enterprise_id', $enterprise->id)->where('statut_phase', "En-cour")->first();

        $user = auth()->user();

        return view('invest.create', compact('user', 'enterprise', 'phase'));

        }else{
            $enterprises = Enterprise::all();
            return redirect()->route('home.projet', compact('enterprises'))
                ->with("error", "Veuillez remplir toutes vos informations personnel avant d'investir, surtout une copie de votre cni");
              }

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

        $ip = $request->ip();
        // $ip = '129.0.205.108';
        $currentUserInfo = Location::get($ip);

        $data = new stdClass();

        $data->prix_action = $phase->prix_action;
        $data->enterprise_id = $enterprise->id;
        $data->nombre_action = $request->nombre_action;
        $data->total_payer = $request->total_payer;
        $data->phases_id = $phases;
        $data->created_at = Carbon::now();

        Cache::add('data', $data);

        $data = array(
            'amount' => $request->total_payer,
            'currency_code' => $currentUserInfo->currencyCode,
            'ccode' => $currentUserInfo->countryCode,
            'lang' => 'fr',
            'item_ref' => 'JEIMMDKSLSNKJD1',
            'item_name' => "Achat d'action",
            'email' => $user->email,
            'phone' => $user->phone,
            'first_name' => $user->name,
            'public_key' => 'PK_K7TagYkeP3pACYC8vaJ8',
            'logo' => 'https://raw.githubusercontent.com/nath-hub/tandisapp/devellop/public/assets/images/im9.png'
        );

        $curl = curl_init();

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'https://www.paymooney.com/api/v1.0/payment_url',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_HTTPHEADER => array("Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8"),
                CURLOPT_POSTFIELDS => $data,
            )
        );

        $response = curl_exec($curl);

        curl_close($curl);

        $rep = json_decode($response);

        if ($rep->response == "success") {

            return redirect($rep->payment_url);

        } else {
            return redirect()->route('home.projet')->with([
                'error' => "Echec de l'enregistrement! veuillez renseigner le prix et le nombre d'action ou verifier votre connexion internet"
            ]);
        }

    }

    public function succes()
    {

        $user = auth()->user();

        $data = Cache::get('data');

        $data->sous_total = $data->total_payer;

        $remise = $data->total_payer * 0.03;

        $data->remise = $remise;

        $data->total_payer = $data->total_payer + $remise;

        $data->image = "https://raw.githubusercontent.com/nath-hub/tandisapp/devellop/public/assets/images/im2.png";

        $enterprise = Enterprise::where('id', $data->enterprise_id)->first();

        $pdf = PDF::loadView('facture', compact('data', 'enterprise', 'user'))->setOptions(['isHtml5ParserEnabled' => true]);

        $contrat = PDF::loadView('contrat', compact('data', 'enterprise', 'user'))->setOptions(['isHtml5ParserEnabled' => true]);
        
        $num = mt_rand(100000, 999999);

        $name = "facture-" . $num;

        $names = 'contrat' . $user->id;

        $content = $pdf->download($name)->getOriginalContent();

        $contentContrat = $contrat->download($names)->getOriginalContent();

        Storage::put('public/recu/' . $name . '.pdf', $content);

        Storage::put('public/recu/' . $names . '.pdf', $contentContrat);

        $storagePath = storage_path('app/public/recu/' . $name . '.pdf');

        $contratPath = storage_path('app/public/recu/' . $names . '.pdf');

        $enterprise->investisseurs()->attach($user, [
            'prix_action' => $data->prix_action,
            'nombre_action' => $data->nombre_action,
            "total_payer" => $data->total_payer,
            'recu' => $storagePath,
            'contrat' => $contratPath,
            "phase_id" => $data->phases_id,
            'created_at' => $data->created_at,
        ]);

        Mail::to($user)->send(new OrderShipped($storagePath, $contratPath, $user));

        return view('invest.succes', [
            'success' => "Felicitations, vous vennez d'acheter des actions !!!!!!!!!",
            'data' => $data,
            'enterprise' => $enterprise,
            'user' => $user
        ]);

    }

    public function cancel()
    {
        return view('invest.cancel', [
            'success' => "Votre paiement a echouee !!!!!!!!!"
        ]);
    }

   
}
