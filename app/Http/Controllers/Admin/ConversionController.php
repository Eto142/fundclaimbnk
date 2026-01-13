<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conversion;
use App\Models\User;
use Illuminate\Http\Request;

class ConversionController extends Controller
{
    //

    
      public function approve($id)
{
    $escrow = Conversion::findOrFail($id);
    $escrow->status = 1;
    $escrow->save();

    return redirect()->back()->with('success', 'conversion Balance approved.');
}

public function decline($id)
{
    $escrow = Conversion::findOrFail($id);
    $escrow->status = 2;
    $escrow->save();

    return redirect()->back()->with('error', 'conversion Balance declined.');
}




    public function AddConversionBalance(Request $request, $userId)
    {
        // Validate input
        $request->validate([
            'conversion_amount' => 'required|numeric|min:0',
        ]);

        $user = User::findOrFail($userId);

        // Create a new conversion transaction
        $conversion = new Conversion();
        $conversion->user_id = $user->id;
        $conversion->amount = $request->conversion_amount;
        $conversion->status = 'completed'; // or 'pending', depending on your workflow
        $conversion->save();

        // Optionally, update user balance if you have a column for it
        // $user->conversion_balance += $conversion->amount;
        // $user->save();

        return redirect()->back()->with('success', 'conversion transaction added successfully.');
    }
}
