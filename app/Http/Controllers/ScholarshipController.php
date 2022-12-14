<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;

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
        // admin creating new scho programs
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
        $data['price'] = "price";
        $data['slots'] = "slots";
        $data['status'] = "open";
        // if($request->hasFile('image')){
        //     $image = $request->file('image');
        //     $filename = 'paypal_'.time().'.jpg';
        //     $location = 'oldasset/images/' . $filename;
        //     Image::make($image)->save($location);
        //     $data['image'] = $filename;
        // }
        $res = Scholarship::create($data);
        if ($res)
        {
            return redirect()->route('Scholarship.index')->with('success', 'success');
        }
        else
        {
            return back()->with('alert', 'An error occured');
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
}
