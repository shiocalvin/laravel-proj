<?php

namespace App\Http\Controllers;

use App\CenterBloodBag;
use App\CenterUntestedBlood;
use App\Hospital;
use App\Hospital_lab_technician;
use App\HospitalUntestedBlood;
use App\Nbts_centre;
use App\Nbts_employee;
use App\HospitalBloodRequest;
use Illuminate\Http\Request;

class NonDonorController extends Controller
{
    //
    public function requestbagid($cid,$lid){
        
        $center = Nbts_centre::findorfail($cid);

        $centertech = Nbts_employee::findorfail($lid);

        $requests = HospitalBloodRequest::where([
            ['receive_centre',$center->centre_id]
        ])->get()->count();
        

        return view('centertech.nondonor.requestbagid',compact('center','centertech','requests'));

    }




    public function store(Request $request){


        $bloodbag = CenterUntestedBlood::create([

            'non_donor'=>$request->nondonor_id,
            'centre_id'=>$request->centre_id

        ]);

        session()->flash('success','Blood bag id generated');
        
        return redirect()->back();

    }

    public function show($cid,$lid){

        $center = Nbts_centre::findorfail($cid);
        $centertech = Nbts_employee::findorfail($lid);

        $bloodbags = CenterUntestedBlood::whereNotNull('non_donor')->get();

        $requests = HospitalBloodRequest::where([
            ['receive_centre',$center->centre_id]
        ])->get()->count();
        

        return view ('centertech.nondonor.view_nondonors',compact('center','centertech','bloodbags','requests'));

    }


    public function hosprequestbagid($hid,$lid){

        $hospital =Hospital::findorfail($hid);

        $hospitaltech = Hospital_lab_technician::findorfail($lid);

        return view('centertech.nondonor.hosprequestbagid',compact('hospital','hospitaltech'));


    }

    public function hospstore(Request $request){

        $bloodbag = HospitalUntestedBlood::create([


            'non_donor' =>$request->nondonor_id,
            'hospital_id' =>$request->hospital_id



        ]);
        
        session()->flash('success','Blood bag id generated');

        return redirect()->back();
    }

    public function hospshow($hid,$lid){


        $hospital = Hospital::findorfail($hid);

        $hospitaltech = Hospital_lab_technician::findorfail($lid);

        $bloodbags = HospitalUntestedBlood::whereNotNull('non_donor')->get();
        
        return view('centertech.nondonor.view_hospnondonors',compact('hospital','hospitaltech','bloodbags'));

    }



}
