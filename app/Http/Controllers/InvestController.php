<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestStoreRequest;
use App\Http\Requests\StorePhaseRequest;
use App\Models\Invest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Enterprise;
use App\Models\Phase;

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

        // $this->authorize('create', $enterprise); 

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

        $enterprise->investisseurs()->attach($user, [
            'prix_action' => $phase->prix_action,
            'nombre_action' => $request->nombre_action,
            "total_payer" => $request->total_payer,
            "phase_id" => $phases,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('home', compact('user'))
            ->with([
                'success' => "félicitation! Vous venez d'acheter les actions !!!",
                'error' => "Echec de l'enregistrement"
            ]);
    }
}
