<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Enterprise;
use App\Models\Invest;
use App\Models\Phase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('register', compact('users'));
    }

    public function create()
    {
        return view('register');
    }
    public function store(Request $request)
    {
        $estAdmin = $request->type;

        if ($estAdmin === "on") {
            $role = 'ENTERPRISE';
        } else {
            $role = 'INVEST';
        }

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "type" => $role,
            "photo" => $request->photo,
            "password" => Hash::make($request->password),
        ]);

        Mail::send('confirmEmail', ['id' => $user->id], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject("E-mail de validation");
        });

        if ($role === "ENTERPRISE") {
            Enterprise::create([
                "user_id" => $user->id,
                "web_site" => $request->web_site,
                "name_enterprise" => $request->name_enterprise,
                "address" => $request->address,
            ]);
        }

        return redirect()->route('login')->with('success', 'User created successfully.');

    }

    public function log()
    {
        return view('login');
    }


    public function login(UserStoreRequest $request)
    {

        $user = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        $validate = User::where('email', $user['email'])->first();

        // if (!empty($validate) && $validate->email_verified_at != null) {
        if (Auth::attempt(['email' => $user['email'], 'password' => $user['password']])) {

            // if (Auth::loginUsingId($validate->id)) {
            //     $request->session()->regenerate();

            return redirect('/');
            // }

        } else {
            return back()->withErrors([
                'email' => 'Veuillez verifier votre compte en validant votre adresse mail',
            ]);
        }
    }

    public function loginUsingFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook()
    {
        try {

            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('facebook_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);
            } else {
                $newUser = User::create([
                    'login' => $user->name,
                    'email' => $user->email,
                    "phone" => $user->phone,
                    'facebook_id' => $user->id,
                    'email_verified_at' => Carbon::now(),
                    'password' => encrypt('my-google')

                ]);

                Auth::login($newUser);
            }

            return redirect('/');

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);
            } else {
                $newUser = User::create([
                    'login' => $user->name,
                    'email' => $user->email,
                    "phone" => $user->phone,
                    'google_id' => $user->id,
                    'email_verified_at' => Carbon::now(),
                    'password' => encrypt('my-google')

                ]);

                Auth::login($newUser);
            }

            return redirect('/');

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


    public function show(User $user)
    {

        

        $entreprises = $user->invests;
 
        if (count($entreprises) > 0) {
            foreach ($entreprises as $item) {
                $invest[] = Invest::with('entreprise')->where('user_id', $user->id)->where('enterprise_id', $item->id)->get();

                $items[] = $item;
            }
            $invests = $invest;
        } else {
            $invests = null;
            $items = null;
        }
        ;
        $enterprise = Enterprise::where('user_id', $user->id)->first();

        $phase = Phase::where('enterprise_id', $enterprise->id)->where('statut_phase', "En-cour")->get();

        return view('users.show', [
            'user' => $user,
            'photo' => asset("$user->photo"),
            'enterprise' => $enterprise,
            'invest' => $invests,
            'enterprises' => $items,
            "phase" => $phase
        ]);
    }
    public function edit(user $user)
    {

        $enterprise = Enterprise::where('user_id', $user->id)->first();
// dd($enterprise);
        return redirect()->route('profile.edit', [
            'user' => $user,
            'enterprise' => $enterprise
        ]);
    }
    public function update(Request $request, User $user)
    {
        // dd($request->all());

        if (!empty($request->file('photo'))) {
            $avatarPath = $request->photo->store('cni/tmp', 'public');
        } else {
            $avatarPath = $user->photo;
        }


        if (!empty($request->file('cniverso'))) {
            $cniverso = $request->cniverso->store('cni/tmp', 'public');
        } else {
            $cniverso = $user->cniverso;
        }


        if (!empty($request->file('cnirecto'))) {
            $cnirecto = $request->cnirecto->store('cni/tmp', 'public');
        } else {
            $cnirecto = $user->cnirecto;
        }

        $user->cniverso = $cniverso;
        $user->cnirecto = $cnirecto;
        $user->photo = $avatarPath;

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Utilisateur mis à jour avec succès !');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'user deleted successfully');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
