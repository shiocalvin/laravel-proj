<?php

namespace App\Http\Controllers;

use App\District;
use Illuminate\Http\Request;
use App\Hospital;
use App\Hospital_lab_technician;
use App\HospitalBloodBags;
use App\Nbts_centre;
use App\Region;
use App\Ward;
use App\Zone;

class ZoneHospitalController extends Controller
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


     public function index(){}

    public function active($id)
    {
        //
        // $region =Region::findorfail($id);
        $center = Nbts_centre::findorFail($id);

        $hospitals = Hospital::where([
            ['is_active',1],
            ['centre_under_id',$center->centre_id] 
            ])->get();

        return view('center.hospital.index',compact('hospitals','center'));
        
    }

    public function inactive($id){

        $center = Nbts_centre::findorFail($id);

        $hospitals = Hospital::where([
            ['is_active',0],
            ['centre_under_id',$center->centre_id]
            ])->get();

        return view('center.hospital.inactive',compact('hospitals','center'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function create(){
         
     }


    public function createy($id)
    {
        //
        // $zone = Zone::findorFail($zid);

        $center =Nbts_centre::findorfail($id);

        $regions = Region::where([['zone_id',$center->zone_id]])->get();
       
        $wards = Ward::pluck('name','id');
        $districts =District::pluck('name','id');
       
        // $wards = Ward::where([['district_id',111]])->get();
        // $districts = District::where([['region_id',1]])->get();

        $regionsoptions = array(''=>'Select Region')+$regions->pluck('name','id')->toArray();
        $wardsoptions = array(''=>'Select Ward')+$wards->pluck('name','id')->toArray();
        $districtsoptions = array(''=>'Select District')+$districts->pluck('name','id')->toArray();

        return view('center.hospital.create',compact('regionsoptions','wards','districts','center'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $hospital = Hospital::create([

            'hospital_name' => $request->name,
            'region_id'=>$request->region_id,
            'district_id'=>$request->district_id,
            'ward_id' =>$request->ward_id,
            'centre_under_id' =>$request->centre_under_id




        ]);

        session()->flash('success','Hospital created successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

    }
    public function shows($zid,$id)
    {

        //
        $center = Nbts_centre::findorFail($zid);

        $hospital = Hospital::findorFail($id);

        $region = $hospital->region;
        $ward =$hospital->ward;
        $district = $hospital->district;

        $bloodbags = HospitalBloodBags::where([
            ['hospital_id',$hospital->hospital_id]
        ])->get()->count();


        $hospitaltechs = Hospital_lab_technician::where([
            
            ['hospital_id',$hospital->hospital_id]
             
        ])->get();

        return view('center.hospital.show',compact('hospital','hospitaltechs','center','region','ward','district','bloodbags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

    }
    public function edits($zid,$id)
    {
        //
        $center =Nbts_centre::findorFail($zid);

        $hospital = Hospital::findorFail($id);

        $regions = Region::where([['zone_id',$center->zone_id]])->get();
        $wards = Ward::where([['district_id',111]])->get();
        $districts = District::where([['region_id',1]])->get();

        $regionsoptions = array(''=>'Select Region')+$regions->pluck('name','id')->toArray();
        $wardsoptions = array(''=>'Select Ward')+$wards->pluck('name','id')->toArray();
        $districtsoptions = array(''=>'Select District')+$districts->pluck('name','id')->toArray();

        return view('center.hospital.edit',compact('regionsoptions','wardsoptions','districtsoptions','center','hospital'));
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
        // $hospital = Hospital::findorFail($id)->update([
        
        


        //     'hospital_name' => $request->name,
        //     'region'=>$request->region_id,
        //     'zone'=>$request->zone_id,
        //     'district'=>$request->district_id,
        //     'ward' =>$request->ward_id,
        //     'zone_id' =>$request->zone_id,
        //     'is_active'=>$request->is_active



        // ]);

        // session()->flash('success','Hospital updated successfully');

        // return redirect('zone/hospital/active');
       
    }


    public function updateactive(Request $request,$id){

        $hospital =Hospital::findorFail($id);

        $hospital->update([

            'hospital_name' => $request->name,
            'region_id'=>$request->region_id,
            'district_id'=>$request->district_id,
            'ward_id' =>$request->ward_id,

            'is_active' =>$request->is_active

        ]);

        session()->flash('success','Hospital updated ');

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
        $hospital = Hospital::findorFail($id);

        $hospital->delete();

        session()->flash('success','Hospital deleted successfully');

        return redirect()->back();
    }
}
