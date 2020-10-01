<?php

namespace App\Http\Controllers;

use App\HospitalBloodRequest;
use App\Nbts_centre;
use App\Nbts_employee;
use Illuminate\Http\Request;

class CenterRequestController extends Controller
{
    //

    // public function __construct()
    // {
    //     $this->middleware('auth:nbts');
    // }


    public function receivedrequest($cid,$id){

        $center = Nbts_centre::findorfail($cid);

        $centertech = Nbts_employee::findorfail($id);

        $hospitals = HospitalBloodRequest::where([

            ['receive_centre',$center->centre_id]

        ])->get();

        $requests = HospitalBloodRequest::where([
            ['receive_centre',$center->centre_id]
        ])->get()->count();
        

        

        return view('centertech.receivedrequest',compact('center','centertech','hospitals','requests'));

    }


    public function update(Request $request,$id){

        $requestupdate = HospitalBloodRequest::findorfail($id)->update([
         
            'req_stat' =>$request->req_stat
        ]);


        session()->flash('success','Received');
         return redirect()->back();

    }
}

