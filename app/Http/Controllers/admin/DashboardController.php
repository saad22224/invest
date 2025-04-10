<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totalusersbalance = User::sum('balance');
        $totalusers = User::count();
        $totaluserswithdrawals = Withdrawal::sum('amount');
        $totalwithdrawals = Withdrawal::count();
        $totalusersdeposits = Deposit::sum('amount');
        $totaldeposits = Deposit::count();

        return view('dashboard.index', [
            'totalusersbalance' => $totalusersbalance,
            'totalusers' => $totalusers,
            'totaluserswithdrawals' => $totaluserswithdrawals,
            'totalwithdrawals' => $totalwithdrawals,
            'totalusersdeposits' => $totalusersdeposits,
            'totaldeposits' => $totaldeposits
        ]);
    }
}
