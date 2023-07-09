<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    function index()
    {
        return view('auth.index');
    }

    function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    function callback()
    {
        $user = Socialite::driver('github')->user();
        $id = $user->getId();
        $profile = $user->getAvatar();
        $email = $user->getEmail();
        $name = $user->getName();
        $check = User::where('email', $email)->count();
        if ($check > 0) {
            $user = User::updateOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'github_id' => $id,
                    'profile' => $profile
                ]
            );
            Auth::login($user);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('auth')->with('error', 'Account tersebut tidak diizinkan menggunakan halaman admin');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->to('auth');
    }
}
