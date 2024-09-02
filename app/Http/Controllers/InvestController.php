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

<<<<<<< HEAD
        // $ip = $request->ip();
        $ip = '129.0.205.108';
=======
        $ip = $request->ip();
        // $ip = '80.12.39.138';
>>>>>>> cbe4112 (update)
        $currentUserInfo = Location::get($ip);
 
        if($currentUserInfo->countryCode == "FR"){
            $request->total_payer = $request->total_payer / 700;
        }
  
        $data = new stdClass();

        $data->prix_action = $phase->prix_action;
        $data->enterprise_id = $enterprise->id;
        $data->nombre_action = $request->nombre_action;
        $data->total_payer = $request->total_payer;
        $data->phases_id = $phases;
        $data->user_id = $user->id;
        $data->created_at = Carbon::now();

        $random = Str::upper(Str::random(15));
<<<<<<< HEAD

        $enterprise->investisseurs()->attach($user, [
            'prix_action' => $data->prix_action,
            'nombre_action' => $data->nombre_action,
            "total_payer" => $data->total_payer,
            "phase_id" => $data->phases_id,
            'created_at' => $data->created_at,
        ]);
=======
 
        Cache::forget('data');
        Cache::add('data', $data);

        $datas = array(
            'amount' => $request->total_payer,
            'currency_code' => $currentUserInfo->currencyCode,
            'ccode' => $currentUserInfo->countryCode,
            'lang' => 'fr',
            'item_ref' => $random,
            'item_name' => "Achat d'action",
            'email' => $user->email,
            'phone' => $user->phone,
            'first_name' => $user->name,
            'public_key' => 'PK_K7TagYkeP3pACYC8vaJ8',
            'logo' => 'https://raw.githubusercontent.com/nath-hub/tandisapp/devellop/public/assets/images/im9.png'
        );
>>>>>>> cbe4112 (update)

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

<<<<<<< HEAD
        // $curl = curl_init();
=======
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
                CURLOPT_POSTFIELDS => $datas,
            )
        );
>>>>>>> cbe4112 (update)

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

<<<<<<< HEAD
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
=======
            return redirect($rep->payment_url);
        } else {
            return redirect()->route('home.projet')->with([
                'error' => "Echec de l'enregistrement! veuillez renseigner le prix et le nombre d'action ou verifier votre connexion internet"
            ]);
        }
    }



    public function succes()
    {
        $data = Cache::get('data');

        $user = User::where('id', $data->user_id)->first();

        $record = Enterprise::find($data->enterprise_id);

        $new = $record->investisseurs()->attach($user, [
            'prix_action' => $data->prix_action,
            'nombre_action' => $data->nombre_action,
            "total_payer" => $data->total_payer,
            "phase_id" => $data->phases_id,
            'created_at' => $data->created_at,
            'state' => '1'
        ]);


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
>>>>>>> cbe4112 (update)

        $data->sous_total = $data->total_payer;

        $remise = $data->total_payer * 0.03;

        $data->remise = $remise;

        $data->total_payer = $data->total_payer + $remise;

<<<<<<< HEAD
=======
        $enterprise = Enterprise::where('id', $data->enterprise_id)->first();

>>>>>>> cbe4112 (update)
        $pdf = PDF::loadView('facture', compact('data', 'enterprise', 'user'))->setOptions(['isHtml5ParserEnabled' => true]);

        $contrat = PDF::loadView('contrat', compact('data', 'action', 'enterprise', 'user'));


<<<<<<< HEAD
        $num = mt_rand(100000, 999999);
=======
        $num = Str::random(6);
>>>>>>> cbe4112 (update)

        $name = "facture-" . $num;

        $pdf->save(storage_path('app/public/recu/' . $name . '.pdf'));

        $storagePath = ('recu/' . $name . '.pdf');

        $names = 'contrat' . $user->id;

        $contrat->save(storage_path('app/public/contrat/' . $names . '.pdf'));

        $contratPath = ('contrat/' . $names . '.pdf');

<<<<<<< HEAD
        $record = Enterprise::find($enterprise->id);
        $record->montant_actuel =  $enterprise->montant_actuel + $data->sous_total;
        $record->save();

        $enterprise->investisseurs()->syncWithPivotValues($user, [
            'state' => 1,
        ]);

=======

        $record->montant_actuel =  $record->montant_actuel + $data->sous_total;
        $record->save();

        $inv = Invest::where('created_at', $data->created_at)->first();
        $inv->recu =  $storagePath;
        $inv->contrat = $contratPath;
        $inv->save();
>>>>>>> cbe4112 (update)

        Cache::forget('data');
        return view('invest.succes', [
            'success' => "Felicitations, vous vennez d'acheter des actions !!!!!!!!!",
            'data' => $data,
            'recu' => $storagePath,
            'contrat' => $contratPath,
<<<<<<< HEAD
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
=======
            'enterprise' => $record,
            'user' => $user
        ]);
>>>>>>> cbe4112 (update)
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
<<<<<<< HEAD
=======

    public function generate($id)
    {
        $invests = Invest::where('user_id', $id)->get();

        $user = User::where('id', $id)->first();

        $data = new stdClass();
        $data->nombre_action = 0;
        $data->prix_action = 0;
        $data->total_payer = 0;
        $data->enterprise_id = 0;

        foreach ($invests as $invest) {
            $data->nombre_action += $invest->nombre_action;
            $data->prix_action = $invest->prix_action;
            $data->total_payer += $invest->total_payer;
            $data->enterprise_id = $invest->enterprise_id;
            $data->created_at = $invest->created_at;
        }

        $data->sous_total = $data->total_payer;

        // $remise = $data->total_payer * 0.03;

        $data->remise = 0;

        $data->total_payer = $data->total_payer;

        $action = $data;

        $enterprise = Enterprise::where('id', $data->enterprise_id)->first();

        $pdf = PDF::loadView('facture', compact('data', 'enterprise', 'user'))->setOptions(['isHtml5ParserEnabled' => true]);

        $contrat = PDF::loadView('contrat', compact('data', 'action', 'enterprise', 'user'))->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);


        $num = Str::random(6);

        $name = "facture-" . $num;

        $pdf->save(storage_path('app/public/recu/' . $name . '.pdf'));

        $storagePath = ('recu/' . $name . '.pdf');

        $names = 'contrat' . $user->id;

        $contrat->save(storage_path('app/public/contrat/' . $names . '.pdf'));

        $contratPath = ('contrat/' . $names . '.pdf');

        $inv = Invest::where('user_id', $id)->get();
        foreach ($inv as $invest) {
            $invest->recu =  $storagePath;
            $invest->contrat = $contratPath;
            $invest->save();
        }
    }
>>>>>>> cbe4112 (update)
}
