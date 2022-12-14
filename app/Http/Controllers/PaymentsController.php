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
    public function Show()
    {
        
    }
    public function QueryPmt()
    {
        
    }

}
