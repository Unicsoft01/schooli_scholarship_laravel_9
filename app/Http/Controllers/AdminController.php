<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Settings;
use App\Models\Logo;
use App\Models\Currency;
use App\Models\Plans;
use App\Models\Btctrades;
use App\Models\Sellcard;
use App\Models\Social;
use App\Models\About;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Ticket;
use App\Models\Reply;
use App\Models\Review;
use Carbon\Carbon;
use Image;

use App\Http\Controllers\AlertController;




class AdminController extends Controller
{



    public function Sets()
    {
        $set = Settings::find(1);
       return $set;
    }
        
    // public function __construct()
    // {		
    //     $this->middleware('auth');
    // }

    // public function Destroyuser($id)
    // {
    //     $user = User::whereId($id)->delete();
    //     $card = Sellcard::whereUser_id($id)->delete();
    //     $btc = Btctrades::whereUser_id($id)->delete();
    //     $ticket = Ticket::whereUser_id($id)->delete();
    //     return back()->with(AlertController::SendAlert());
    // } 
        
    public function admin_dashboard()
    {
        $pageTitle ='Admin Dashboard';
              
        return view('admin.dashboard.index', compact('pageTitle'));
    }    
    
    public function Users()
    {
        // $set = $this->Sets();
		// $set['page']='Clients';
		// // $set['users']=User::latest()->get();
        $pageTitle = "Users applications";
        return view('admin.users.index', compact('pageTitle'));
    }    

    public function UserApplications()
    {
        $pageTitle = "Users applications";
        return view('admin.users.applications', compact('pageTitle'));
    }
    
    // public function Messages()
    // {
    //     $set = $this->Sets();
	// 	$set['page']='Messages';
	// 	$set['message']=Contact::latest()->get();
    //     return view('admin.user.message', compact('set'));
    // }    
    
    // public function Ticket()
    // {
    //     $set = $this->Sets();
	// 	$set['page']='Ticket system';
	// 	// $set['ticket']=Ticket::latest()->get();
    //     return view('admin.user.ticket', compact('set'));
    // }   
    
    // public function Email($id,$name)
    // {
	// 	$set['title']='Send email';
	// 	$set['email']=$id;
	// 	$set['name']=$name;
    //     return view('admin.user.email', $set);
    // }    
    
    // public function Promo()
    // {
    //     $set = $this->Sets();
	// 	$set['page']='  Promo';
    //     $set['client']=$user=User::all();
    //     return view('admin.user.promo', compact('set'));
    // } 
    
    // public function Sendemail(Request $request)
    // {        	
    //     $set=Settings::first();
    //     send_email($request->to, $request->name, $request->subject, $request->message);  
    //     $notification = array('message' => 'Mail Sent Successfuly!', 'alert-type' => 'success');
    //     return back()->with($notification);
    // }
    
    // public function Sendpromo(Request $request)
    // {        	
    //     $set=Settings::first();
    //     $user=User::all();
    //     foreach ($user->email as $email) {
    //         $user=User::whereEmail($email)->first();
    //         if($set->email_notify==1){
    //             send_email($request->to, $user->name, $request->subject, $request->message);
    //         }
    //     }      
    //     $notification = array('message' => 'Mail Sent Successfuly!', 'alert-type' => 'success');
    //     return back()->with($notification);
    // }    
    
    // public function Replyticket(Request $request)
    // {        
    //     $set['ticket_id'] = $request->ticket_id;
    //     $set['reply'] = $request->reply;
    //     $set['status'] = 0;
    //     $res = Reply::create($set);      
    //     if ($res) {
    //         return back()->with(AlertController::SendAlert());
    //     } else {
    //         return back()->with(AlertController::SendAlert('error', 'An error occured'));
    //     }
    // }    
    
    // public function Destroymessage($id)
    // {
    //     $set = Contact::findOrFail($id);
    //     $res =  $set->delete();
    //     if ($res) {
    //         return back()->with(AlertController::SendAlert('success', 'message was Successfully deleted!'));
    //     } else {
    //         return back()->with(AlertController::SendAlert('error', 'Problem With Deleting Request'));
    //     }
    // }     
    
    // public function Destroyticket($id)
    // {
    //     $set = Ticket::findOrFail($id);
    //     $res =  $set->delete();
    //     if ($res) {
    //         return back()->with(AlertController::SendAlert('success', 'Ticket was Successfully deleted!'));
    //     } else {
    //         return back()->with(AlertController::SendAlert('error', 'Problem With Deleting Ticket'));
    //     }
    // } 

    // public function Manageuser($id)
    // {
    //     // $set = $this->Sets();
    //     $data  = array(
    //         'client' => $user=User::find($id),
    //         'page' => $user->username,
    //          );
    //     return view('admin.user.edit', compact('data'));
    //     // return $set['client']['id'];

    // }     
    
    // public function Manageticket($id)
    // {
    //     $set['ticketid']=$id;
    //     $set['ticket']=$ticket=Ticket::find($id);
    //     $set['page']='#'.$ticket->ticket_id;
    //     $set['client']=User::whereId($ticket->user_id)->first();
    //     $set['reply']=Reply::whereTicket_id($ticket->ticket_id)->get();
    //     return view('admin.user.edit-ticket', compact('set'));
    //     // return $set['id'];
    // }    
    
    // public function Closeticket($id)
    // {
    //     $ticket=Ticket::find($id);
    //     $ticket->status=1;
    //     $ticket->save();
    //     return back()->with(AlertController::SendAlert('success', 'Ticket has been closed.'));
    // }     
    
    // public function Blockuser($id)
    // {
    //     $user=User::find($id);
    //     $user->status=1;
    //     $user->save();
    //     return redirect()->back()->with(AlertController::SendAlert('success', 'User has been suspended.'));
    // } 

    // public function Unblockuser($id)
    // {
    //     $user=User::find($id);
    //     $user->status=0;
    //     $user->save();
    //     return redirect()->back()->with(AlertController::SendAlert('success', 'User was successfully unblocked.'));
    // }

    // public function Approvekyc($id)
    // {
    //     $user=User::find($id);
    //     $user->kyc_status=1;
    //     $user->save();
    //     return back()-with(AlertController::SendAlert('success', 'Kyc has been approved.'));
    // }    
    

    // public function Rejectkyc($id)
    // {
    //     $user=User::find($id);
    //     $user->kyc_status='';
    //     $user->save();
    //     return back()->with(AlertController::SendAlert('success', 'Kyc was successfully rejected.'));
    // }

    // public function Profileupdate(Request $request)
    // {
    //     $set = User::findOrFail($request->id);
    //     $set->username=$request->username;
    //     $set->first_name=$request->first_name;
    //     $set->last_name=$request->last_name;
    //     $set->phone=$request->mobile;
    //     $set->address=$request->address;
    //     if(empty($request->email_verify))
    //     {
    //         $set->email_verify=0;	
    //     }
    //     else
    //     {
    //         $set->email_verify=$request->email_verify;
    //     }        
    //     if(empty($request->fa_status))
    //     {
    //         $set->fa_status=0;	
    //     }
    //     else
    //     {
    //         $set->fa_status=$request->fa_status;
    //     }                 
        
    //     if ($res=$set->save())
    //     {
    //         return back()->with(AlertController::SendAlert());
    //     }
    //     else {
    //         return back()->with(AlertController::SendAlert('error', 'An error occured'));
    //     }
    // }
    

    // public function logout()
    // {
    //     Auth::guard('auth:admin')->logout();
    //     session()->flash('message', 'Just Logged Out!');
    //     return redirect('/admin');
    // }
        
}
