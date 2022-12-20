<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use Illuminate\Http\Request;
use App\Http\Controllers\AlertController;

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

// "":{},
// "":{},
// "":{},
// "":{},
// "":{},
// "":{},
// "":{},
// "":{}}
// 
// return $request;


// $fileName = time().'.'.$request->file->extension();  

// $request->file->move(public_path('uploads'), $fileName);


            $data['type'] = $request->cert;
            $data['sponsor'] = $request->sponsor;
            $data['sch_name'] = $request->sch_name;
            $data['sch_id'] = $request->sch_id;
            $data['payable'] = $request->payable;
            $data['status'] = "pending";
            $data['pmt_status'] = "pending";
            $data['user_id'] = $request->user_id;

            $cert_file = "cert_file".time().'.'.$request->cert_file->extension();  
            $resume = "resume".time().'.'.$request->resume->extension();  
            $letter_recommend = "letter_recommend".time().'.'.$request->letter_recommend->extension();  
            $passport = "passport".time().'.'.$request->passport->extension();  
            $eng_prof = "eng_prof".time().'.'.$request->eng_prof->extension();  
            $sop = "sop".time().'.'.$request->sop->extension();  
            $addition = "addition".time().'.'.$request->addition->extension();  
            $pmt_proof = "pmt_proof".time().'.'.$request->pmt_proof->extension();  
            $degree = "degree".time().'.'.$request->degree->extension();  
         
            $request->cert_file->move(public_path('uploads'), $cert_file);
            $request->resume->move(public_path('uploads'), $resume);
            $request->letter_recommend->move(public_path('uploads'), $letter_recommend);
            $request->passport->move(public_path('uploads'), $passport);
            $request->eng_prof->move(public_path('uploads'), $eng_prof);
            $request->sop->move(public_path('uploads'), $sop);
            $request->addition->move(public_path('uploads'), $addition);
            $request->pmt_proof->move(public_path('uploads'), $pmt_proof);
            $request->degree->move(public_path('uploads'), $degree);


            $data['cert_file'] = $cert_file;
            $data['resume'] = $resume;
            $data['letter_recommend'] = $letter_recommend;
            $data['passport'] = $passport;
            $data['eng_prof'] = $eng_prof;
            $data['sop'] = $sop;
            $data['addition'] = $addition;
            $data['pmt_proof'] = $pmt_proof;
            $data['degree'] = $degree;



            $res = Applications::create($data);
            if ($res)
            {
                return redirect()->route('Applications.index')->with(AlertController::SendAlert());
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

    public function download($file){
        $file_path = public_path('uploads/'.$file);
        return response()->download( $file_path);
    }
}
