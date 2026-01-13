<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Conversion;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversionController extends Controller
{


//    public function store(Request $request)
// {
//     $request->validate([
//         'fromCrypto' => 'required|string',
//         'toCurrency' => 'required|string',
//         'amount'     => 'required|numeric|min:0.01',
//     ]);

//     // Calculate 0.7% miner's fee
//     $minersFee = $request->amount * 0.007; 

//     // Optionally, you can also calculate the final total (amount + fee)
//     $totalWithFee = $request->amount + $minersFee;

//     // Save the conversion record
//     $conversion = Conversion::create([
//         'user_id'     => Auth::id(),
//         'from_crypto' => $request->fromCrypto,
//         'to_currency' => $request->toCurrency,
//         'amount'      => $request->amount,
//         // Optional: you could save the fee too if you have a column
//         // 'miners_fee'  => $minersFee,
//     ]);

//     // Attach the fee and total to the session so you can display them
//     $conversion->miners_fee = $minersFee;
//     $conversion->total_with_fee = $totalWithFee;

//     // Redirect to billing page with all details
//     return redirect()->route('gas-billing')
//         ->with('conversion', $conversion);
// }


//     public function store(Request $request)
// {
//     $request->validate([
//         'fromCrypto' => 'required|string',
//         'toCurrency' => 'required|string',
//         'amount'     => 'required|numeric|min:0.01',
//     ]);

//     $user = Auth::user();

//     // Get total deposits
//     $deposit_total = Deposit::where('user_id', $user->id)->sum('amount');

//     // Get approved conversions
//     $conversion_total = Conversion::where('user_id', $user->id)
//                                   ->where('status', 1)
//                                   ->sum('amount');

//     // Available balance (deposit left after approved conversions)
//     $available_balance = $deposit_total - $conversion_total;

//     // 🚫 If requested conversion amount is greater than available, stop
//     if ($request->amount > $available_balance) {
//         return back()->withErrors([
//             'amount' => 'Insufficient balance for this conversion.',
//         ])->withInput();
//     }

//     // Calculate 0.7% miner's fee
//     $minersFee = $request->amount * 0.007; 
//     $totalWithFee = $request->amount + $minersFee;

//     // Save the conversion record
//     $conversion = Conversion::create([
//         'user_id'     => $user->id,
//         'from_crypto' => $request->fromCrypto,
//         'to_currency' => $request->toCurrency,
//         'amount'      => $request->amount,
//         // 'miners_fee' => $minersFee, // optional if column exists
//     ]);

//     // Attach fee + total (for displaying only, not saved in DB here)
//     $conversion->miners_fee = $minersFee;
//     $conversion->total_with_fee = $totalWithFee;

//     // Redirect to billing page with all details
//     return redirect()->route('gas-billing')
//         ->with('conversion', $conversion);
// }





public function store(Request $request)
{
    // Validate input
    $request->validate([
        'fromCrypto' => 'required|string',
        'toCurrency' => 'required|string',
        'amount'     => 'required|numeric|min:0.01',
    ]);

    $user = Auth::user();

    // Get total deposits
    $deposit_total = Deposit::where('user_id', $user->id)->sum('amount');

    // Get approved conversions
    $conversion_total = Conversion::where('user_id', $user->id)
                                  ->where('status', 1)
                                  ->sum('amount');

    // Available balance (deposit left after approved conversions)
    $available_balance = $deposit_total - $conversion_total;

    // ✅ If conversion_status is 1 but amount != available balance
    if ($user->conversion_status == 1 && $request->amount != $available_balance) {
        $message = '
           <div style="
    background: linear-gradient(145deg, #fff9e6, #fff3cd);
    border: 1px solid rgba(255, 222, 130, 0.9);
    border-left: 6px solid #f5c518;
    border-radius: 12px;
    padding: 22px 28px;
    margin: 25px auto;
    max-width: 640px;
    color: #5f490f;
    font-size: 15px;
    font-weight: 600;
    line-height: 1.7;
    text-align: left;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
    backdrop-filter: blur(3px);
    transition: all 0.3s ease-in-out;
">
    <div style="display: flex; align-items: center; gap: 12px;">
        <div style="
            background-color: #f5c518;
            color: white;
            font-weight: bold;
            border-radius: 50%;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        ">
            ⚠️
        </div>
        <div>
            <div style="font-size: 16px; font-weight: 700;">
                Action Required: Convert Your Assets
            </div>
            <div style="margin-top: 6px; color: #7a6d39; font-size: 14px; font-weight: 500;">
                Kindly convert your whole assets to prevent fluctuations.<br>
                <span style="color: #6f6332;">Converting helps stabilize your portfolio against market volatility.</span>
            </div>
        </div>
    </div>
</div>

        ';

        // Redirect to homepage with the warning
        return redirect()->route('home')->with('message', $message);
    }

    // 🚫 If requested conversion amount is greater than available, stop
    if ($request->amount > $available_balance) {
        return back()->withErrors([
            'amount' => 'Insufficient balance for this conversion.',
        ])->withInput();
    }

    // Calculate 0.7% miner's fee
    $minersFee = $request->amount * 0.007; 
    $totalWithFee = $request->amount + $minersFee;

    // Save the conversion record
    $conversion = Conversion::create([
        'user_id'     => $user->id,
        'from_crypto' => $request->fromCrypto,
        'to_currency' => $request->toCurrency,
        'amount'      => $request->amount,
    ]);

    // Attach fee + total (for displaying only, not saved in DB here)
    $conversion->miners_fee = $minersFee;
    $conversion->total_with_fee = $totalWithFee;

    // Redirect to billing page with all details
    return redirect()->route('gas-billing')->with('conversion', $conversion);
}

}


