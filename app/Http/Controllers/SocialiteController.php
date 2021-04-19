<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;

// <-- ne pas oublier

class SocialiteController extends Controller
{
    protected $providers = ["google", "github"];

    public function loginRegister()
    {
        return view('socialite/loginRegister');
    }

    public function redirect(Request $request)
    {

        $provider = $request->provider;

        if (in_array($provider, $this->providers)) {
            return Socialite::driver($provider)->redirect();
        }
        abort(404);
    }

    public function callback(Request $request)
    {

        $provider = $request->provider;

        if (in_array($provider, $this->providers)) {

            $data = Socialite::driver($provider)->user();

            $email = $data->getEmail();
            $name = $data->getName();
            $nickname = $data->getNickname();
            $user = User::where("email", $email)->first();

            if (isset($user)) {
                if ($name != null) $user->name = $name;
                else $user->name = $nickname;
                $user->save();
            } else {
                $user = User::create([
                    'name' => $user->name,
                    'email' => $email,
                    'password' => bcrypt("c5d6s84fz6D5") // On attribue un mot de passe
                ]);
            }

            auth()->login($user);

            if (auth()->check()) return redirect(route('home'));
        }
        abort(404);
    }

}
