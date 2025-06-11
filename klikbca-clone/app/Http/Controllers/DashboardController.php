<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Transfer;
use App\Models\Transaction;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
}
