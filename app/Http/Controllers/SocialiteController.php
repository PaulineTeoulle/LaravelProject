<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;


class SocialiteController extends Controller
{
    protected $providers = ["google", "github"];

    public function loginRegister()
    {
        //Retourne la view pour se login
        return view('socialite/loginRegister');
    }

    public function redirect(Request $request)
    {
        //Recupération du provider
        $provider = $request->provider;

        //Redirection vers le bon provider (google ou github)
        if (in_array($provider, $this->providers)) {
            return Socialite::driver($provider)->redirect();
        }
        abort(404);
    }

    public function callback(Request $request)
    {
        //Recupération du provider
        $provider = $request->provider;

        //Récupération des données selon le provider
        if (in_array($provider, $this->providers)) {
            $data = Socialite::driver($provider)->user();
            $email = $data->getEmail();
            if ($data->getName() !== null) {
                $name = $data->getName();
            } else if ($data->getNickname() != null)
                $name = $data->getNickname();
            $user = User::where("email", $email)->first();

            //Sauvegarde des données ou création de l'utilisateur.
            if (isset($user)) {
                $user->save();
            } else {
                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => bcrypt("c5d6s84fz6D5")
                ]);
            }
            //Connexion via les données enregistrées avant
            auth()->login($user);
            //Redirection si connexion réussie
            if (auth()->check()) return redirect(route('home'));
        }
    }
}

