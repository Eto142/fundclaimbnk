<?php

namespace App\Http\Controllers\User;
use App\Models\Withdrawal;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PaymentHistoryController extends Controller
{
   public function index()
{
   
    $user = auth()->user();

    $withdrawals = Withdrawal::where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get();



    return view('user.payment-history', compact('withdrawals'));
}

}
