<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        if(request('credential')){
            $gClient = new \Google_Client(['client_id' => '239666970121-ndbj5jbouevql1lglth17cqkff4029f8.apps.googleusercontent.com']);
            $payload = $gClient->verifyIdToken($request['credential']);
            if ($payload) {
                $name=$payload['given_name'];
                $last_name=$payload['family_name'];
                $email=$payload['email'];
                $password=Hash::make(\Illuminate\Support\Str::random(8));
            } else {
                // Invalid ID token
                return redirect()->route('register')->flash("error","accesso all'account Google non riuscito.");
            }
        }
        
        else{
            $request->validate([
                'name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $name=$request->name;
            $last_name=$request->last_name;
            $email=$request->email;
            $password=Hash::make($request->password);
        }

        $user = User::firstOrCreate([
            'email' => $email,
        ],[
            'name' => $name,
            'last_name' => $last_name,
            'password' => $password,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
