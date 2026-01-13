<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fiat;
use App\Models\User;
use Illuminate\Http\Request;

class FiatBalanceController extends Controller
{
    //

      public function approve($id)
{
    $escrow = Fiat::findOrFail($id);
    $escrow->status = 1;
    $escrow->save();

    return redirect()->back()->with('success', 'Fiat Balance approved.');
}

public function decline($id)
{
    $escrow = Fiat::findOrFail($id);
    $escrow->status = 2;
    $escrow->save();

    return redirect()->back()->with('error', 'Fiat Balance declined.');
}




    public function AddFiatBalance(Request $request, $userId)
    {
        // Validate input
        $request->validate([
            'fiat_amount' => 'required|numeric|min:0',
        ]);

        $user = User::findOrFail($userId);

        // Create a new fiat transaction
        $fiat = new Fiat();
        $fiat->user_id = $user->id;
        $fiat->amount = $request->fiat_amount;
        $fiat->status = 'completed'; // or 'pending', depending on your workflow
        $fiat->save();

        // Optionally, update user balance if you have a column for it
        // $user->fiat_balance += $fiat->amount;
        // $user->save();

        return redirect()->back()->with('success', 'Fiat transaction added successfully.');
    }
}




