<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enterprise;
use App\Models\User;
use App\Models\Invest;
use App\Models\Phase;
use stdClass;

class Action {
    public $phase_id;
    public $prix_action;
    public $nombre_action; 
    public $name_enterprise;
    public $phase;
    public $statut_phase;
    public $recu; 

    public $created_at;

}

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
    public function index()
    {

        $user = auth()->user();

        if (!$user) {
            return abort(404);
        }

        $invests = Invest::where('user_id', $user->id)->get();

        $data = new stdClass();
        $actionObjects = [];

        if (count($invests) > 0) { 
 
            foreach ($invests as $actionData) {
                $action = new Action();
                $action->phase_id = $actionData["phase_id"];
                $action->prix_action = $actionData["prix_action"];
                $action->created_at = $actionData["created_at"];
                $action->nombre_action = $actionData["nombre_action"];

                $enterprise = Enterprise::where('id', $actionData->enterprise_id)->first();
                $phase = Phase::where('enterprise_id', $enterprise->id)->where('statut_phase', "En-cour")->first();

                $action->name_enterprise = $enterprise->name_enterprise;
                $action->phase = $phase->phase;
                $action->statut_phase = $phase->statut_phase;
                $actionObjects[] = $action;
            }
        } else {
            $invests = null;
            $entreprises = null;
            $phase = null;

        }
        $data->actions = $actionObjects;
        $actions = $data->actions;
        
        $monEntreprise = Enterprise::where('user_id', $user->id)->first();

        // dd($data, $invests, $actions);

        // dd($phases, $entreprises, $invests);

        // if (count($entreprises) > 0) {
        //     foreach ($entreprises as $item) {
        //         $invest = Invest::with('entreprise')->where('user_id', $user->id)->where('enterprise_id', $item->id)->get();

        //         $phase[] = Phase::with('entreprise')->where('enterprise_id', $item->id)->where('statut_phase', "En-cour")->first();

        //         $items[] = $item;
        //     }
        //     $invests = $invest;

        // } else {
        //     $invests = null;
        //     $items = null;
        //     $phase = null;
        // };

        return view('home', [
            'user' => $user,
            'photo' => asset("$user->photo"),
            'invest' => $actions, 
            'enterprise' => $monEntreprise, 
        ]);
    }
}
