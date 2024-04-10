<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhaseRequest;
use App\Http\Requests\UpdatePhaseRequest;
use App\Models\Phase;
use App\Models\Enterprise;
use Illuminate\Http\Request;


class PhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    { 
        $enterprise = Enterprise::where('user_id', auth()->user()->id)->firstOrFail();
        $phases = Phase::where('enterprise_id', $enterprise->id)->get();
        return view('phase.create', compact('phases'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $enterprise = Enterprise::where('user_id', auth()->user()->id)->first();

        Phase::create([
            "phase" => $request->phase,
            "date_debut" => $request->date_debut,
            "date_fin" => $request->date_fin, 
            "prix_phase" => $request->prix_phase,
            "prix_action" => $request->prix_action,
            "nombre_action" => $request->nombre_action,
            "statut_phase" => $request->statut_phase,
            "enterprise_id" => $enterprise->id
        ]);     

        $phases = Phase::where('enterprise_id', $enterprise->id)->get();

        return redirect()->route('phases.create', compact('phases'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Phase $phase)
    {
        // $phases = Phase::where('enterprise_id', $enterprise)->get();
        return  view('phase.create', compact('phases'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Phase $phase)
    {
        return view('phase.edit', compact('phase')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Phase $phase)
    {

        // $phases = Phase::find($phase->id);
        // $phases->phase = $request->phase;
        // $phases->date_debut = $request->date_debut;
        // $phases->date_fin = $request->date_fin;
        // $phases->prix_phase = $request->prix_phase;
        // $phases->prix_action = $request->prix_action;
        // $phases->nombre_action = $request->nombre_action;
        // $phases->statut_phase = $request->statut_phase; 

        // $phases->save();

        $phase->update($request->all());
        return redirect()->route('phases.create');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phase $phase)
    {
        //
    }
}
