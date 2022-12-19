<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Scholarship Application page";
        return view('users.applications', compact('pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // sch_id	
// pmt_status	
// status	
// "sch_name"
// user_id
// payable
// sponsor
// cert
// pmt_proof
// return $request;
       
            $data['type'] = $request->cert;
            $data['sponsor'] = $request->sponsor;
            $data['sch_name'] = $request->sch_name;
            $data['sch_id'] = $request->sch_id;
            $data['payable'] = $request->payable;
            $data['status'] = "pending";
            $data['pmt_status'] = "pending";
            $data['user_id'] = $request->user_id;
            // if($request->hasFile('image')){
            //     $image = $request->file('image');
            //     $filename = 'paypal_'.time().'.jpg';
            //     $location = 'oldasset/images/' . $filename;
            //     Image::make($image)->save($location);
            //     $data['image'] = $filename;
            // }
            $res = Applications::create($data);
            if ($res)
            {
                return redirect()->route('Applications.index')->with('success', 'success');
            }
            else
            {
                return back()->with('alert', 'An error occured');
            }

// return $request;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return $id;
        $string = $id;
        $id = explode (",", $string); 
        // print_r($id);
        return view('admin.users.showapp', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function CreateApplication($id)
    {
        // return $id;
        return view('users.application_form', compact('id'));
    }

    public function MyApplications()
    {
        // return $id;
        $pageTitle = "Scholarship Application page";
        return view('users.my_applications', compact('pageTitle'));
    }
}
