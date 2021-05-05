<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            $finduser = User::where('google_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->route('frontend.home');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone_number' => "+880162875".random_int(1000,9999),
                    'google_id' => $user->id,
                    'password' => bcrypt('password')
                ]);
                Auth::login($newUser);
                return redirect()->route('frontend.home');
            }
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
