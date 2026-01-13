<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    //
    public function showRegistrationForm(){
        return view('auth.register');
    }



    
    /**
     * Handle registration submission.
     */

public function register(Request $request)
{
    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
        'country'  => 'required|string|max:100',
    ]);

    // ✅ Generate numeric-only account ID
    $latestUser = User::latest('id')->first();
    $nextNumber = $latestUser ? $latestUser->id + 1 : 1;

    // 6-digit numeric ID, e.g., 000001
    $idNumber = str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

    $user = User::create([
        'id_number' => $idNumber,
        'name'      => $request->name,
        'email'     => $request->email,
        'country'   => $request->country,
        'password'  => Hash::make($request->password),
    ]);

    auth()->login($user);

   return redirect()->route('home')
        ->with('success', 'Registration successful. Your Account ID is ' . $idNumber);
}


}
