<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\Hospital_lab_technician;
use App\HospitalBloodBags;
use App\HospitalBloodRequest;
use App\HospitalTransfusion;
use Illuminate\Http\Request;

class HospitalRequestController extends Controller
{
    //

    // public function __construct()
    // {
    //     $this->middleware('auth:hospital');
    // }


    public function sendrequest($hid,$lid){

        $hospital = Hospital::findorfail($hid);

        $hospitaltech = Hospital_lab_technician::findorfail($lid);

        $requests = HospitalBloodRequest::all();

        return view('hospital.sendrequest',compact('hospital','hospitaltech','requests'));



    }

    public function store(Request $request){

      $requestedbags = HospitalBloodRequest::create([

        'req_hospital' =>$request->hospital_id,
        'req_hospital_name' =>$request->req_hospital_name,
        'receive_centre' =>$request->centre_id

      ]);

      session()->flash('success','Request sent');

      return redirect()->back();

    }

    public function bloodstorage($hid,$lid){

      $hospital = Hospital::findorfail($hid);

      $hospitaltech = Hospital_lab_technician::findorfail($lid);

      $bloodbags = HospitalBloodBags::where([

        ['hospital_id',$hospital->hospital_id]

      ])->get();

      return view('hospital.bloodbags',compact('hospital','hospitaltech','bloodbags'));

    }

    public function usebag(Request $request){

      $usebag = HospitalTransfusion::create([

        'blood_bag_id'=>$request->blood_bag_id,
        'hospital_id' =>$request->hospital_id,
        'blood_type' =>$request->blood_type,
        'test_id' =>$request->test_id


      ]);

      session()->flash('success','Blood bag used');
      return redirect()->back();

    }

}
