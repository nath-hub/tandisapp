<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnterpriseUpdateRequest;
use App\Models\Enterprise;
use App\Models\Phase;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class EnterpriseController extends Controller
{

    public function index()
    {
        $enterprises = Enterprise::where('state', 'ACTIF')->paginate(3);

        foreach ($enterprises as $enter) {
            if ($enter->objectif == !0) {
                $avancement = ($enter->montant_actuel / $enter->objectif) * 100;
            } else {
                $avancement = 0;
            }
            $enter->bar = $avancement;
            $enter->progress = $avancement . '%';

            $date_souhaitee = $enter->updated_at;
            $date_actuelle = date("Y-m-d H:i:s");

            $difference_secondes = strtotime($date_actuelle) - strtotime($date_souhaitee);

            $unite_temps = "";

            if ($difference_secondes < 60) {
                $unite_temps = "seconde";
                $nb_unite_temps = $difference_secondes;
            } else if ($difference_secondes < 3600) {
                $unite_temps = "minute";
                $nb_unite_temps = round($difference_secondes / 60);
            } else if ($difference_secondes < 86400) {
                $unite_temps = "heure";
                $nb_unite_temps = round($difference_secondes / 3600);
            } else if ($difference_secondes < 2592000) {
                $unite_temps = "jour";
                $nb_unite_temps = round($difference_secondes / 86400);
            } else {

                return;
            }

            if ($nb_unite_temps > 1) {
                $unite_temps .= "s";
            }

            $enter->date = $nb_unite_temps . " " . $unite_temps;

            $phase = Phase::select('date_fin')->where('enterprise_id', $enter->id)->where('statut_phase', "En-cour")->first();
            $date = $phase->date_fin; 
        }

        return view('welcome', compact('enterprises', 'date'));
    }

    public function show($enterprises) // Route binding for enterprises
    {
        $enterprise = Enterprise::where('id', $enterprises)->first();

        return view('enterprise.show', [
            'enterprises' => $enterprise,
        ]);
    }
    public function edit(Enterprise $enterprise)
    {
        return view('enterprise.edit', [
            'enterprise' => $enterprise,
        ]);
    }

    public function update(Request $request, Enterprise $enterprise)
    {
    
        if (empty($request->file('livress'))) {
            $livre = $enterprise->livres;
        } else {
            $livre = $request->livress->store('fichiers/tmp', 'public');
        }

        if (empty($request->file('politiques'))) {
            $politique = $enterprise->politique;
        } else {
            $politique = $request->politiques->store('fichiers/tmp', 'public');
        }

        // if (empty($request->file('image'))) {
        //     if (empty($enterprise->image)) {
        //         $image = ('assets/images/pp.jpg');

        //     } else {
        //         $image = $enterprise->image;
        //     }

        // } else {
        //     $image = $request->image->store('shop/tmp', 'public');
        // }

        if (!empty($request->file('photo'))) {
            $image = $request->photo->store('shop/tmp', 'public');
        } else {
            $image = $enterprise->image;
        }

        $enterprise->siren = $request->sirens;
        $enterprise->commercial_register = $request->commercial_registers;
        $enterprise->name_enterprise = $request->name_enterprises;
        $enterprise->address = $request->addres;
        $enterprise->livres = $livre;
        $enterprise->politique = $politique;
        $enterprise->objectif = $request->objectifs;
        $enterprise->montant_actuel = $request->montant_actuels;
        $enterprise->web_site = $request->web_sites;
        $enterprise->description = $request->descriptions;
        $enterprise->prix_action = $request->prix_action;
        $enterprise->nombre_action = $request->nombre_action;
        $enterprise->image = $image;

        $enterprise->save();

        $user = $request->user();

        return redirect()->route('phases.create', [
            'enterprise' => $enterprise,
            'user' => $user
        ]);
    }

    public function service()
    {
        return view('service');
    }
    public function contact()
    {
        return view('contact');
    }

    public function projet()
    {
        $enterprises = Enterprise::where('state', 'ACTIF')->get();

        foreach ($enterprises as $enter) {
            if ($enter->objectif == !0) {
                $avancement = ($enter->montant_actuel / $enter->objectif) * 100;
            } else {
                $avancement = 0;
            }

            // dd($enter->objectif);

            $enter->bar = $avancement;
            $enter->progress = $avancement . '%';

            $date_souhaitee = $enter->updated_at;
            $date_actuelle = date("Y-m-d H:i:s");

            $difference_secondes = strtotime($date_actuelle) - strtotime($date_souhaitee);

            $unite_temps = "";

            if ($difference_secondes < 60) {
                $unite_temps = "seconde";
                $nb_unite_temps = $difference_secondes;
            } else if ($difference_secondes < 3600) {
                $unite_temps = "minute";
                $nb_unite_temps = round($difference_secondes / 60);
            } else if ($difference_secondes < 86400) {
                $unite_temps = "heure";
                $nb_unite_temps = round($difference_secondes / 3600);
            } else if ($difference_secondes < 2592000) {
                $unite_temps = "jour";
                $nb_unite_temps = round($difference_secondes / 86400);
            } else {

                return;
            }

            if ($nb_unite_temps > 1) {
                $unite_temps .= "s";
            }

            $enter->date = $nb_unite_temps . " " . $unite_temps;

            $phase = Phase::select('date_fin')->where('enterprise_id', $enter->id)->where('statut_phase', "En-cour")->first();
            $date = $phase->date_fin;
        }
        
        return view('projet', compact('enterprises', 'date'));
    }

    public function about()
    {
        return view('about');
    }
}
