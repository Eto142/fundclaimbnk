<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    //

    
 public function AddUserBalance(Request $request)
    {
       
 
        $topUp = new Balance;
     
        $topUp->user_id = $request['id'];
       
        $topUp->amount = $request['amount'];
        $topUp->status = 1;
        $topUp->save();




        return redirect()->back()->with('success', 'User Balance Added Successfully');
    }
}
