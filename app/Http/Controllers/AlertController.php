<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlertController extends Controller
{
    // this check for internet connecions
    static function checkInternetCon($connectTo= 'https://google.com/')
    {
        if (@fopen($connectTo, "r"))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    static function SendAlert($type='success', $msg = 'Saved successfully!')
    {
        $notification = array(
            'message' => $msg,
            'alert-type' => $type
        );
        return $notification;
    }
}
                