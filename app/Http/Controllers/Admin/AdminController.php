<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conversion;
use App\Models\Withdrawal;
use App\Models\Transaction;
use App\Models\PaymentProof;
use App\Models\PaymentInfo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index (){

          // User Statistics
        $newUsersCount = User::where('created_at', '>=', Carbon::now()->subDays(7))->count();
        $totalUsersCount = User::count();
        $totalConversionCount = Conversion::count();
        // $totalPaymentinfoCount = Paymentinfo::count();
        // $totalPaymentproofCount = PaymentProof::count();
        $totalWithdrawalCount = Withdrawal::count();
        //  $totalTransactionCount = Transaction::count();

         // Recent Activity
        $recentUsers = User::latest()->take(5)->get();


        return view('admin.dashboard', compact(
            'newUsersCount',
            'totalUsersCount',
            'totalConversionCount',
            
            'totalWithdrawalCount',
           
            'recentUsers',
        ));
     
    }

}
