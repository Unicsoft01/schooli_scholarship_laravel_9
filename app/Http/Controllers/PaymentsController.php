<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function index()
    {
        $pageTitle = "My payments";
        return view('users.my_payments', compact('pageTitle'));
    }

    // SHOW PAYMENTS ON ADMIN PANEL
    public function Show()
    {
        $pageTitle = "All payments";
        return view('admin.users.payments', compact('pageTitle'));
    }
    public function QueryPmt()
    {
        
    }

}
