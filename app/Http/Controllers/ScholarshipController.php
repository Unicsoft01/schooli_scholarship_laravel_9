<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;
use App\Models\Requirements;
use App\Http\Controllers\AlertController;
use App\Models\Applications;
use Image;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "All Registered Programs";
        return view('admin.scholarship.index', compact('pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Program Descriptions";
        return view('admin.scholarship.requirements', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // admin saving new scholar pro
        // return $request; 
        $data['name'] = $request->name;
        $data['type'] = $request->type;
        $data['sponsor'] = $request->sponsor;
        $data['cert'] = $request->cert;
        $data['country'] = $request->country;
        $data['about'] = $request->about;
        $data['price'] = $request->price;
        $data['slots'] = $request->slots;
        $data['status'] = "open";
        // if($request->file('image')){
        //     $image = $request->file('image');
        //     $filename = 'program_'.time().'.jpg';
        //     $location = 'img/' . $filename;
        //     Image::make($image)->save($location);
        //     $data['sch_img'] = $filename;
        //     // Image::make($request->file('photo')->getRealPath())
        // }
//         if($request->file('sch_img'))
// {
//    $image = $request->file('sch_img');
//    $filename = 'program_'.time().'.jpg';
//    $image = $image->move(public_path('img'), $filename);
//             // Image::make($image)->save($location);
//             $data['sch_img'] = $filename;
//             // Image::make($request->file('photo')->getRealPath())
//         }
if($request->file('sch_img'))
{
   $image = $request->file('sch_img');
   $filename = 'program_'.time().'.jpg';
   $image->move(public_path('img'), $filename);
    $data['sch_img'] = $filename;
            // Image::make($request->file('photo')->getRealPath())
}
// return  $data['sch_img'];
        $res = Scholarship::create($data);
        if ($res)
        {
            return redirect()->route('Scholarship.create')->with(AlertController::SendAlert());
        }
        else
        {
            return back()->with(AlertController::SendAlert('danger', 'Not saved!'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // individual programs
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Applications::find($id);
        $item->status = "approved";
        $item->pmt_status = "approved";
        $item->save();
        return back()->with(AlertController::SendAlert());
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

    public function Req_store(Request $request)
    {
        // return $request;
        foreach($request->requirement as $require)
        {
            $data['sch_id'] = $request->program;
            $data['requirements'] = $require;
            // print_r($data);
            $res = Requirements::create($data);
            
        }
        if ($res)
            {
                return redirect()->route('Scholarship.create')->with(AlertController::SendAlert());
            }
            else
            {
                return back()->with(AlertController::SendAlert('danger', 'Not saved!'));
            }

    }
}
