<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function showLoginForm(){
        return view('auth.login');
    }



    /**
     * Handle login request.
     */
    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email'    => 'required|email',
    //         'password' => 'required|string',
    //     ]);

    //     if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
    //         $user = Auth::user();

    //         // ✅ Check access code verification
    //         if (!$user->verified) {
    //             return redirect()->route('access.code')
    //                 ->with('warning', 'Please verify your access code first.');
    //         }

    //         return redirect()->route('home')->with('success', 'Welcome back, ' . $user->name . '!');
    //     }

    //     return back()->withErrors([
    //         'email' => 'Invalid credentials. Please try again.',
    //     ])->withInput($request->only('email'));
    // }





    public function login(Request $request)
{
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required|string',
    ]);

    if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
        $user = Auth::user();

        // // 🔒 Suspend check
        // if ($user->suspended == 1) {
        //     Auth::logout();
        //     return redirect()->route('login')->withErrors([
        //         'email' => 'Were very sorry to inform you that your access link has been suspended. Kindly contact support for more help using the email address below',
        //     ]);
        // }


        //  // 🔒 Suspend check
        // if ($user->suspended == 1) {
        //     Auth::logout();
        //     return redirect()->route('login')->withErrors([
        //         'email' => 'We’re very sorry to inform you that your access link has been suspended. Kindly contact support for more help using the email address below.',
        //     ]);
        // }

        
        // 🔒 Suspend check
        if ($user->suspended == 1) {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'We’re very sorry to inform you that your access link has been suspended. Kindly contact support for more help using the email address below:<br><a href="mailto:support@getnowpay.online" style="color:#0d6efd; text-decoration:underline;">support@getnowpay.online</a>',
            ]);
        }




        // ✅ Access code verification check
        if (!$user->verified) {
            return redirect()->route('access.code')
                ->with('warning', 'Please verify your access code first.');
        }

        return redirect()->route('home')->with('success', 'Welcome back, ' . $user->name . '!');
    }

    return back()->withErrors([
        'email' => 'Invalid credentials. Please try again.',
    ])->withInput($request->only('email'));
}




    /**
     * Logout the user.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}


