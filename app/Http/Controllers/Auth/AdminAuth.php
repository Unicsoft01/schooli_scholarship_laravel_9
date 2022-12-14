<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;

// use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use App\Models\Admin;
use App\Models\Settings;
use App\Models\Audit;
use Carbon\Carbon;
use Session;

class AdminAuth extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    //     $this->middleware('guest:admin');
    // }

    public function Sets()
    {
        $set = Settings::find(1);
       return $set;
    }
 
    public function adminlogin()
    {
        $set = $this->Sets();
		$set['page'] = "Admin Login page";
        return view('admin.index', compact('set'));
    }


     /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function StoreAdminLogin(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::AdminHome);
    }

    public function Admindashboard()
    {
        $set = $this->Sets();
        $set['page'] = "Admin Dasnboard";
        return view('admin.dashboard.index', compact('set'));
    }

 


  //   public function StoreAdminLogin(Request $request){
		// if (Auth::guard('admin')->attempt([
		// 	'username' => $request->username,
		// 	'password' => $request->password
		// ])) {
		// 	return redirect()->intended('admin/dashboard');
		// }else{
		// 	return back()->with('alert', 'Oops! You have entered invalid credentials');
		// }
  //   }
    

}
