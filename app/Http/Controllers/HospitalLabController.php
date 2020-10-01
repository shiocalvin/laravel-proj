<?php

namespace App\Http\Controllers;
use App\Http\Requests\HospitaltechRequest;

use App\Hospital;
use App\Hospital_lab_technician;
use App\Nbts_centre;
use App\Region;
use App\Zone;
use Illuminate\Http\Request;

class HospitalLabController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth:nbts');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }


    public function createlabtech($zid,$id){

        $center = Nbts_centre::findorFail($zid);
        $hospital = Hospital::findorFail($id);

        return view ('center.hospital.labtechnician.create',compact('hospital','center'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HospitaltechRequest   $request)
    {
        //

        $centerdirector = Hospital_lab_technician::create([

            'techs_nida'=>$request->nida,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'sex'=>$request->gender,
            'dob'=>$request->date_of_birth,
            'hospital_id'=>$request->hospital_id


        ]);

        session()->flash('success','Hospital laboratory technican created successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

 public function edit($id){


     }

     public function edits($zid,$hid,$id)
    {
        
        
        $center = Nbts_centre::findorfail($zid);
        $hospital = Hospital::findorfail($hid);      
        $hospitaltech = Hospital_lab_technician::findorFail($id);

        return view('center.hospital.labtechnician.edit',compact('hospitaltech','hospital','center'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HospitaltechRequest $request, $id)
    {
        //
        $technician = Hospital_lab_technician::findorFail($id)->update([

            'employees_nida'=>$request->nida,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'sex'=>$request->gender,
            'dob'=>$request->date_of_birth,
            // 'position'=>$request->position,
            // 'stationed_at'=>$request->zone_id

        ]);

        session()->flash('success','Hospital laboratory technician updated successfully.');
        return redirect()->back();
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
        $hospitaltech = Hospital_lab_technician::findorFail($id);

        $hospitaltech->delete();

        session()->flash('success','Hospital laboratory technician deleted successfully');

        return redirect()->back();
    }
}
