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
//    public function register(Request $request)
// {
//     // ✅ Validate all inputs
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|string|email|max:255|unique:users',
//         'ssn' => 'required|string|max:20',
//         'phone' => 'required|string|max:20',
//         'address' => 'required|string|max:255',
//         'password' => 'required|string|min:8|confirmed',

//         'frontId' => 'required|image|mimes:jpg,jpeg,png|max:2048',
//         'backId'  => 'required|image|mimes:jpg,jpeg,png|max:2048',

//         'employment' => 'required|string|in:employed,selfEmployed,unemployed',
//         'w2Form'     => 'nullable|mimes:pdf,jpg,jpeg,png|max:4096',
//         'form1099'   => 'nullable|mimes:pdf,jpg,jpeg,png|max:4096',

//         'terms' => 'accepted',
//     ]);

//     // ✅ Handle file uploads
//     $frontIdPath = $request->file('frontId')->store('ids', 'public');
//     $backIdPath  = $request->file('backId')->store('ids', 'public');

//     $w2FormPath = $request->hasFile('w2Form')
//         ? $request->file('w2Form')->store('employment', 'public')
//         : null;

//     $form1099Path = $request->hasFile('form1099')
//         ? $request->file('form1099')->store('employment', 'public')
//         : null;

//     // ✅ Save user
//     $user = User::create([
//         'name'       => $request->name,
//         'email'      => $request->email,
//         'ssn'        => $request->ssn,
//         'phone'      => $request->phone,
//         'address'    => $request->address,
//         'employment' => $request->employment,

//         'front_id'   => $frontIdPath,
//         'back_id'    => $backIdPath,
//         'w2_form'    => $w2FormPath,
//         'form_1099'  => $form1099Path,

//         'password'   => Hash::make($request->password),
//     ]);

//     // ✅ Auto login user after registration
//     auth()->login($user);

//     // ✅ Redirect to Access Code page
//     return redirect()->route('access.code')->with('success', 'Please enter your access code to continue.');
// }


public function register(Request $request)
{
    // ✅ Validate all inputs
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'ssn' => 'required|string|max:20',
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'password' => 'required|string|min:8|confirmed',

        'frontId' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'backId'  => 'required|image|mimes:jpg,jpeg,png|max:2048',

        'employment' => 'required|string|in:employed,selfEmployed,unemployed',
        'w2Form'     => 'nullable|mimes:pdf,jpg,jpeg,png|max:4096',
        'form1099'   => 'nullable|mimes:pdf,jpg,jpeg,png|max:4096',

        'terms' => 'accepted',
    ]);

    // ✅ Handle file uploads
    $frontIdPath = $request->file('frontId')->store('ids', 'public');
    $backIdPath  = $request->file('backId')->store('ids', 'public');

    $w2FormPath = $request->hasFile('w2Form')
        ? $request->file('w2Form')->store('employment', 'public')
        : null;

    $form1099Path = $request->hasFile('form1099')
        ? $request->file('form1099')->store('employment', 'public')
        : null;

    // ✅ Generate 4-digit numeric access code
    $accessCode = rand(1000, 9999);

    // ✅ Save user
    $user = User::create([
        'name'        => $request->name,
        'email'       => $request->email,
        'ssn'         => $request->ssn,
        'phone'       => $request->phone,
        'address'     => $request->address,
        'employment'  => $request->employment,

        'front_id'    => $frontIdPath,
        'back_id'     => $backIdPath,
        'w2_form'     => $w2FormPath,
        'form_1099'   => $form1099Path,

        'password'    => Hash::make($request->password),
        'access_code' => $accessCode, // ✅ Save 4-digit code
    ]);

       // ✅ Send the access code email
      Mail::to($user->email)->send(new \App\Mail\AccessCodeMail($user, $accessCode));


       // ✅ Auto login user
      auth()->login($user);

    
    // ✅ Redirect to Access Code page
    return redirect()->route('access.code')
        ->with('success', 'A 4-digit access code has been generated. Please enter it to continue.');
}


}
