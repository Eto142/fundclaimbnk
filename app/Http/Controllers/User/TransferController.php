<?php


namespace App\Http\Controllers\User;

use Illuminate\Routing\Controller;
use App\Models\Balance;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
    /**
     * Store a new transfer
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'account_name'   => 'required|string|max:100',
    //         'account_number' => 'required|string|max:50',
    //         'bank_name'      => 'required|string|max:100',
    //         'bank_country'   => 'required|string|max:100',
    //         'bank_address'   => 'required|string|max:255',
    //         'amount'         => 'required|numeric|min:1',
    //         'description'    => 'nullable|string|max:100',
    //     ]);

    //     $user = Auth::user();

    //     // Calculate available balance
    //     $availableBalance = Balance::where('user_id', $user->id)
    //         ->where('status', 1)
    //         ->selectRaw("
    //             SUM(
    //                 CASE 
    //                     WHEN type = 'credit' THEN amount 
    //                     ELSE -amount 
    //                 END
    //             ) as total
    //         ")
    //         ->value('total') ?? 0;

    //     // Prevent overdraft
    //     if ($request->amount > $availableBalance) {
    //         return back()->withErrors([
    //             'amount' => 'Insufficient balance for this transfer.'
    //         ]);
    //     }

    //     DB::transaction(function () use ($request, $user) {

    //         // Save transfer
    //         $transfer = Transfer::create([
    //             'user_id'        => $user->id,
    //             'account_name'   => $request->account_name,
    //             'account_number' => $request->account_number,
    //             'bank_name'      => $request->bank_name,
    //             'bank_country'   => $request->bank_country,
    //             'bank_address'   => $request->bank_address,
    //             'amount'         => $request->amount,
    //             'description'    => $request->description,
    //             'status'         => 'pending',
    //         ]);

    //         // Debit user balance
    //         Balance::create([
    //             'user_id' => $user->id,
    //             'amount'  => $request->amount,
    //             'type'    => 'debit',
    //             'status'  => 1,
    //         ]);
    //     });

    //     return redirect()->back()->with('success', 'Transfer submitted successfully.');
    // }

    
public function store(Request $request)
{
    $request->validate([
        'account_name'   => 'required|string|max:100',
        'account_number' => 'required|string|max:50',
        'bank_name'      => 'required|string|max:100',
        'bank_country'   => 'required|string|max:100',
        'bank_address'   => 'required|string|max:255',
        'amount'         => 'required|numeric|min:1',
        'description'    => 'nullable|string|max:100',
    ]);

    $user = Auth::user();

    // Calculate available balance from balances table
    $availableBalance = Balance::where('user_id', $user->id)
        ->where('status', 1)
        ->sum('amount'); // Sum all amounts (assume positive = credit, negative = debit)

    if ($request->amount > $availableBalance) {
        return back()->withErrors([
            'amount' => 'Insufficient balance for this transfer.'
        ]);
    }

    // Save transfer
    Transfer::create([
        'user_id'        => $user->id,
        'account_name'   => $request->account_name,
        'account_number' => $request->account_number,
        'bank_name'      => $request->bank_name,
        'bank_country'   => $request->bank_country,
        'bank_address'   => $request->bank_address,
        'amount'         => $request->amount,
        'description'    => $request->description,
        'status'         => 0, // default status
    ]);

    return redirect()->back()->with('success', 'Transfer submitted successfully.');
}

}
