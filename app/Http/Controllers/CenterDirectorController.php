<?php

namespace App\Http\Controllers;

use App\CenterBloodBag;
use App\CorruptedSample;
use App\Donor;
use App\Hospital;
use App\HospitalBloodRequest;
use App\Nbts_centre;
use App\Nbts_employee;
use Illuminate\Http\Request;
use App\Http\Requests\ZoneDirectorCreateRequest;
use App\Http\Requests\ZoneDirectorEditRequest;
use App\Zone;
use App\CenterCol;

class CenterDirectorController extends Controller
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


    public function dashboard($id){

        $center = Nbts_centre::findorfail($id);
        
        $bloodbags = CenterBloodBag::where([
            ['centre_id',$center->centre_id]
        ])->get()->count();

        $hospitals = Hospital::where([
            ['centre_under_id',$center->centre_id]
        ])->get()->count();

        $donors = Donor::where([
            ['reg_centre_id',$center->centre_id]
        ])->get()->count();


        $directors = Nbts_employee::where([

            ['position','nbtsdir'],
            ['stationed_at',$center->centre_id]

        ])->get()->count();

        $bloodrequests = HospitalBloodRequest::where([
            ['receive_centre',$center->centre_id]
        ])->get()->count();

        $corrupted = CorruptedSample::where('centre_id',$center->centre_id)->get()->count();

        $male = Donor::where([
            ['reg_centre_id',$center->centre_id],
            ['sex','male']
        
        ])->get()->count();

        $female = Donor::where([
            ['reg_centre_id',$center->centre_id],
            ['sex','female'] 
        ])->get()->count();

        $Ap = CenterBloodBag::where([
            ['centre_id',$center->centre_id],
            ['blood_type','A+']
        ])->get()->count();

        $An = CenterBloodBag::where([
            ['centre_id',$center->centre_id],
            ['blood_type','A-']
        ])->get()->count();

        $Bp = CenterBloodBag::where([
            ['centre_id',$center->centre_id],
            ['blood_type','B+']
        ])->get()->count();

        $Bn = CenterBloodBag::where([
            ['centre_id',$center->centre_id],
            ['blood_type','B-']
        ])->get()->count();

        $ABp = CenterBloodBag::where([
            ['centre_id',$center->centre_id],
            ['blood_type','AB+']
        ])->get()->count();

        $ABn = CenterBloodBag::where([
            ['centre_id',$center->centre_id],
            ['blood_type','AB-']
        ])->get()->count();

        $Op = CenterBloodBag::where([
            ['centre_id',$center->centre_id],
            ['blood_type','O+']
        ])->get()->count();

        $On = CenterBloodBag::where([
            ['centre_id',$center->centre_id],
            ['blood_type','O-']
        ])->get()->count();

        $RH = CenterBloodBag::where([
            ['centre_id',$center->centre_id],
            ['blood_type','RH-null']
        ])->get()->count();



      $jan = CenterCol::where('centre_id',$center->centre_id)->whereMonth('taken_date','1')->get()->count();
       $feb = CenterCol::where('centre_id',$center->centre_id)->whereMonth('taken_date','2')->get()->count();
       $march = CenterCol::where('centre_id',$center->centre_id)->whereMonth('taken_date','3')->get()->count();
       $april = CenterCol::where('centre_id',$center->centre_id)->whereMonth('taken_date','4')->get()->count();
       $may = CenterCol::where('centre_id',$center->centre_id)->whereMonth('taken_date','5')->get()->count();
       $june = CenterCol::where('centre_id',$center->centre_id)->whereMonth('taken_date','6')->get()->count();
       $july = CenterCol::where('centre_id',$center->centre_id)->whereMonth('taken_date','7')->get()->count();
       $aug = CenterCol::where('centre_id',$center->centre_id)->whereMonth('taken_date','8')->get()->count();
       $sept = CenterCol::where('centre_id',$center->centre_id)->whereMonth('taken_date','9')->get()->count();
       $oct = CenterCol::where('centre_id',$center->centre_id)->whereMonth('taken_date','10')->get()->count();
       $nov = CenterCol::where('centre_id',$center->centre_id)->whereMonth('taken_date','11')->get()->count();
       $dec = CenterCol::where('centre_id',$center->centre_id)->whereMonth('taken_date','12')->get()->count();








        return view ('center.dashboard',compact('center','bloodbags','hospitals','donors','directors','bloodrequests','corrupted','male','female','Ap','An','Bp','Bn','ABp','ABn','Op','On','RH','jan','feb','march','april','may','june','july','aug','sept','oct','nov','dec'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */

     public function create(){

     }


    public function createdir($zid,$id)
    {
        //
        $zone = Zone::findorFail($zid);
        $center = Nbts_centre::findorFail($id);

        return view('zone.center.centerdirector.create',compact('center','zone'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ZoneDirectorCreateRequest $request)
    {
        //

        $centerdirector = Nbts_employee::create([

            'employees_nida'=>$request->nida,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'sex'=>$request->gender,
            'dob'=>$request->date_of_birth,
            'position'=>$request->position,
            'stationed_at'=>$request->centre_id


        ]);

        session()->flash('success','Center Director created successfully');

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

    public function edits($zid,$cid,$id)
    {
        //
        $zone = Zone::findorFail($zid);
        $center = Nbts_centre::findorFail($cid);
        $centerdirector = Nbts_employee::findorFail($id);

        return view('zone.center.centerdirector.edit',compact('centerdirector','zone','center'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ZoneDirectorEditRequest  $request, $id)
    {
        //
        //$center = Nbts_centre::findorFail($id);

        $directorupdate = Nbts_employee::findorFail($id)->update([

            'employees_nida'=>$request->nida,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'sex'=>$request->gender,
            'dob'=>$request->date_of_birth,
            // 'position'=>$request->position,
            // 'stationed_at'=>$request->zone_id

        ]);

        session()->flash('success','Center Director updated successfully.');
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
        $centerdirector = Nbts_employee::findorFail($id);

        $centerdirector->delete();

        session()->flash('success','Center director deleted successfully');

        return redirect()->back();
    }
}
