<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enterprise;
use App\Models\User;
use App\Models\Invest;
use App\Models\Phase;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        $user = auth()->user();

        $entreprises = $user->invests;
        $monEntreprise = Enterprise::where('user_id', $user->id)->first();
        
        if (count($entreprises) > 0) {
            foreach ($entreprises as $item) {
                $invest = Invest::with('entreprise')->where('user_id', $user->id)->where('enterprise_id', $item->id)->get();
 
                $phase[] = Phase::with('entreprise')->where('enterprise_id', $item->id)->where('statut_phase', "En-cour")->first();

                $items[] = $item;
            }
            $invests = $invest;
           
        } else {
            $invests = null;
            $items = null;
            $phase = null;
        };
  
        return view('home', [
            'user' => $user,
            'photo' => asset("$user->photo"), 
            'invest' => $invests,
            'enterprises' => $items,
            'enterprise' => $monEntreprise,
            "phase" => $phase
        ]);
    }
}
