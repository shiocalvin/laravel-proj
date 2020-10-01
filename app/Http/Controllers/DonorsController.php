<?php

namespace App\Http\Controllers;

use App\BloodTesting;
use App\CenterBloodBag;
use App\CentersentHospital;
use App\CenterUntestedBlood;
use App\District;
use App\Donor;
use App\Hospital;
use App\Hospital_lab_technician;
use App\HospitalBloodBags;
use App\HospitalBloodRequest;
use App\HospitalCorrupted;
use App\HospitalUntestedBlood;
use App\Http\Requests\DonorCreateRequest;
use App\Http\Requests\DonorUpdateRequest;
use App\Http\Requests\TestingRequest;
use App\Http\Requests\SendingBagsRequest;
use App\Nbts_centre;
use App\Nbts_employee;
use App\Region;
use App\Ward;
use Illuminate\Http\Request;
use App\HospitalCol;

class DonorsController extends Controller
{
    //
    
    public function dashboard($cid,$id){

        $center = Nbts_centre::findorfail($cid);

        $centertech = Nbts_employee::findorfail($id);

        $bloodbags = CenterBloodBag::where([
            ['centre_id',$center->centre_id]
        ])->get()->count();

        $hospitals = Hospital::where([
            ['centre_under_id',$center->centre_id]
        ])->get()->count();

        $donors = Donor::where([
            ['reg_centre_id',$center->centre_id]
        ])->get()->count();

        $requests = HospitalBloodRequest::where([
            ['receive_centre',$center->centre_id]
        ])->get()->count();

        $techs = Nbts_employee::where([
            ['position','nbtslab'],
            ['stationed_at',$center->centre_id]
        ])->get()->count();

        $centeruntested = CenterUntestedBlood::where('centre_id',$center->centre_id)->get()->count();


        


        return view('centertech.techdashboard',compact('center','centertech','bloodbags','hospitals','donors','requests','techs','centeruntested'));

    }

    public function index($cid,$id){

        $center = Nbts_centre::findorfail($cid);
        $centertech =Nbts_employee::findorfail($id);

        $donors = Donor::all();

        $requests = HospitalBloodRequest::where([
            ['receive_centre',$center->centre_id]
        ])->get()->count();
        return view('centertech.donors.index',compact('donors','center','centertech','requests'));
    }

    public function create($cid,$id){

        $center = Nbts_centre::findorfail($cid);

        $centertech = Nbts_employee::findorfail($id);

        $regions = Region::Pluck('name','id');
        $wards = Ward::pluck('name','id');
        $districts = District::pluck('name','id');

        $requests = HospitalBloodRequest::where([
            ['receive_centre',$center->centre_id]
        ])->get()->count();

        return view('centertech.donors.create',compact('center','centertech','regions','wards','districts','requests'));



    }

    public function store(DonorCreateRequest $request){

       $donorstore = Donor::create([

            'donors_nida'=>$request->nida,
            'first_name'=>$request->first_name,
            'middle_name'=>$request->middle_name,
            'last_name'=>$request->last_name,
            'sex'=>$request->gender,
            'dob'=>$request->date_of_birth,
            'district_id'=>$request->district_id,
            'ward_id' =>$request->ward_id,
            'region_id' =>$request->region_id,
            // 'blood_type'=>$request->blood_type,
            'reg_centre_id'=>$request->reg_centre_id
            


       ]); 

       session()->flash('success','Donor Created successfully');
       return redirect()->back();


    }

    public function edit($cid,$lid,$id){

        $center = Nbts_centre::findorfail($cid);
        $centertech =Nbts_employee::findorfail($lid);
        $donor = Donor::findorfail($id);

        $regions = Region::Pluck('name','id');
        $wards = Ward::pluck('name','id');
        $districts = District::pluck('name','id');

        $requests = HospitalBloodRequest::where([
            ['receive_centre',$center->centre_id]
        ])->get()->count();

        return view('centertech.donors.edit',compact('center','centertech','donor','regions','wards','districts','requests'));
    }

    public function update(DonorUpdateRequest $request,$id){
     
        $donorupdate = Donor::findorfail($id)->update([

            'donors_nida'=>$request->nida,
            'first_name'=>$request->first_name,
            'middle_name'=>$request->middle_name,
            'last_name'=>$request->last_name,
            'sex'=>$request->gender,
            'dob'=>$request->date_of_birth,
            'district_id'=>$request->district_id,
            'ward_id' =>$request->ward_id,
            'region_id' =>$request->region_id,
            // 'reg_centre_id'=>$request->reg_centre_id




        ]);

        session()->flash('success','Donor updated successfully');
        return redirect()->back();

    }


    public function untested($cid,$lid){

        $center = Nbts_centre::findorfail($cid);
        $centertech = Nbts_employee::findorfail($lid);
        $donors = Donor::all();

        $requests = HospitalBloodRequest::where([
            ['receive_centre',$center->centre_id]
        ])->get()->count();

        

        return view('centertech.donors.editstatus',compact('center','centertech','donors','requests'));


    }

    public function updateuntested(Request $request){

        $untestedupdate = CenterUntestedBlood::create([
            
            'donor_id' => $request->donor_id,
            'centre_id' =>$request->centre_id

        ]);

        session()->flash('success','Blood bag id generated');

        return redirect()->back();


    }

    public function donate($cid,$lid,$id){

        $center = Nbts_centre::findorfail($cid);
        $centertech = Nbts_employee::findorfail($lid);
        $donor = Donor::findorfail($id);

        $requests = HospitalBloodRequest::where([
            ['receive_centre',$center->centre_id]
        ])->get()->count();
       

        return view('centertech.donors.donate',compact('center','centertech','donor','requests'));


    }

    public function bag($cid,$lid,$did){

        $center = Nbts_centre::findorfail($cid);
        $centertech = Nbts_employee::findorfail($lid);
        $donor = Donor::findorfail($did);
        $bloodbags = CenterUntestedBlood::all();

        $requests = HospitalBloodRequest::where([
            ['receive_centre',$center->centre_id]
        ])->get()->count();

        return view('centertech.donors.bag',compact('center','centertech','donor','bloodbags','requests'));



    }

    public function testing($cid,$id){

        $center = Nbts_centre::findorfail($cid);
        $centertech = Nbts_employee::findorfail($id);
        $bloodbags =CenterUntestedBlood::all();

        $requests = HospitalBloodRequest::where([
            ['receive_centre',$center->centre_id]
        ])->get()->count();

        return view('centertech.centers.test',compact('center','centertech','bloodbags','requests'));
        
        
    }

    public function results($cid,$lid,$id){

        $center = Nbts_centre::findorfail($cid);
        $centertech = Nbts_employee::findorfail($lid);
        $bloodbag = CenterUntestedBlood::findorfail($id);

        $requests = HospitalBloodRequest::where([
            ['receive_centre',$center->centre_id]
        ])->get()->count();

        return view ('centertech.centers.result',compact('center','centertech','bloodbag','requests'));

    }

    public function resultstore(TestingRequest $request,$cid,$id){

        $center = Nbts_centre::findorfail($cid);
        $centertech = Nbts_employee::findorfail($id);

        $resultstore = BloodTesting::create([

            'taken_at_id' =>$request->taken_at_id,
            'testing_centre_id' => $request->testing_centre_id,
            'testing_centre_lab_tech' =>$request->testing_centre_lab_tech,
            'donor_id' =>$request->donor_id,
            'blood_type' =>$request->blood_type,
            'result' =>$request->result,
            'comment' =>$request->comment,
            'hosp_centre' =>$request->hosp_centre,
            'blood_bag_id' =>$request->bag_id,
            'expires_in' =>$request->expires_in,
            'taken_at' =>$request->taken_at

        ]);

        session()->flash('success','Results Submitted successfully');

        return redirect()->to('center/'.$center->centre_id.'/centerlab/'.$centertech->employee_id.'/donor/testing');

    }

    public function testingHospital($cid,$id){

        $center = Nbts_centre::findorfail($cid);
        $centertech = Nbts_employee::findorfail($id);

        $bloodbags = HospitalUntestedBlood::all();

        $requests = HospitalBloodRequest::where([
            ['receive_centre',$center->centre_id]
        ])->get()->count();

        return view('centertech.centers.hosptest',compact('center','centertech','bloodbags','requests'));

    }


    public function untestedhospital($hid,$id){

        $hospital = Hospital::findorfail($hid);
        $hospitaltech = Hospital_lab_technician::findorfail($id);
        $donors = Donor::all();


        

        return view('centertech.donors.editstatushosp',compact('hospital','hospitaltech','donors'));


    }

    public function hospdonate($hid,$lid,$id){

        $hospital = Hospital::findorfail($hid);
        $hospitaltech = Hospital_lab_technician::findorfail($lid);
        $donor = Donor::findorfail($id);
       

        return view('centertech.donors.hospdonate',compact('hospital','hospitaltech','donor'));


    }

    public function hospupdateuntested(Request $request){

        $untestedupdate = HospitalUntestedBlood::create([
            
            'donor_id' => $request->donor_id,
            'hospital_id' =>$request->hospital_id

        ]);

        session()->flash('success','Blood bag id generated');

        return redirect()->back();


    }

    public function hospbag($cid,$lid,$did){

        $hospital = Hospital::findorfail($cid);
        $hospitaltech = Hospital_lab_technician::findorfail($lid);
        $donor = Donor::findorfail($did);
        $bloodbags = HospitalUntestedBlood::all();

        return view('centertech.donors.hospbag',compact('hospital','hospitaltech','donor','bloodbags'));



    }

    public function hospresults($cid,$lid,$id){

        $center = Nbts_centre::findorfail($cid);
        $centertech = Nbts_employee::findorfail($lid);
        $bloodbag = HospitalUntestedBlood::findorfail($id);

        $requests = HospitalBloodRequest::where([
            ['receive_centre',$center->centre_id]
        ])->get()->count();

        return view ('centertech.centers.hospresult',compact('center','centertech','bloodbag','requests'));

    }


    public function hospresultstore(TestingRequest $request,$cid,$id){

        $center = Nbts_centre::findorfail($cid);
        $centertech = Nbts_employee::findorfail($id);

        $resultstore = BloodTesting::create([

            'taken_at_id' =>$request->taken_at_id,
            'testing_centre_id' => $request->testing_centre_id,
            'testing_centre_lab_tech' =>$request->testing_centre_lab_tech,
            'donor_id' =>$request->donor_id,
            'blood_type' =>$request->blood_type,
            'result' =>$request->result,
            'comment' =>$request->comment,
            'hosp_centre' =>$request->hosp_centre,
            'blood_bag_id' =>$request->bag_id,
            'expires_in' =>$request->expires_in,
            'taken_at' =>$request->taken_at

        ]);

        session()->flash('success','Results Submitted successfully');

        return redirect()->to('center/'.$center->centre_id.'/centerlab/'.$centertech->employee_id.'/donor/hospital/testing');

    }


    public function centersbloodbags($cid,$id){

        $center = Nbts_centre::findorfail($cid);
        $centertech = Nbts_employee::findorfail($id);
        $hospitals = Hospital::where([
            ['centre_under_id',$center->centre_id]
        ])->get();

        $bloodbagstested = CenterBloodBag::where([

            ['centre_id',$center->centre_id]

        ])->get();

        $requests = HospitalBloodRequest::where([
            ['receive_centre',$center->centre_id]
        ])->get()->count();
        

        return view('centertech.centers.bloodbags',compact('center','centertech','bloodbagstested','hospitals','requests')); 

    }

    public function sendingbags(SendingBagsRequest $request){

        $bloodbags = CentersentHospital::create([

            'blood_bag_id'=>$request->bag_id,
            'centre_id' =>$request->center_id,
            'blood_type' =>$request->blood_type,
            'receipient_hospital_id' =>$request->hospital,
            'taken_at' =>$request->taken_at,
            'test_id' =>$request->test_id,
            'expires_in' =>$request->expires_in

        ]);

        session()->flash('success','Blood bag sent waiting for confirmation');
        
        return redirect()->back();
        
    }


    public function confirmation($hid,$lid){

        $hospital = Hospital::findorfail($hid);

        $hospitaltech = Hospital_lab_technician::findorfail($lid);

        $bloodbags = CentersentHospital::where([

            ['receipient_hospital_id',$hospital->hospital_id]

        ])->get();


        return view('hospital.confirmation',compact('hospital','hospitaltech','bloodbags'));



    }

    public function confirmationupdate(Request $request,$id){

        $bagupdate = CentersentHospital::findorfail($id)->update([

            'transfer_stat'=>$request->transfer_stat,

        ]);

        session()->flash('success','Blood bag recieved');

        return redirect()->back();


    }

    public function hospdashboard($hid,$id){
        
        $hospital = Hospital::findorfail($hid);

        $hospitaltech = Hospital_lab_technician::findorfail($id);

        $bloodbags = HospitalBloodBags::where([
            ['hospital_id',$hospital->hospital_id]
        ])->get()->count();

        $receivedbags = CentersentHospital::where([
            ['receipient_hospital_id',$hospital->hospital_id],
            ['transfer_stat','in transit']

        ])->get()->count();

        $techs = Hospital_lab_technician::where('hospital_id',$hospital->hospital_id)->get()->count();

        $untested = HospitalUntestedBlood::where('hospital_id',$hospital->hospital_id)->get()->count();

        $corrupted = HospitalCorrupted::where('hosp_id',$hospital->hospital_id)->get()->count();





        $Ap = HospitalBloodBags::where([
            ['hospital_id',$hospital->hospital_id],
            ['blood_type','A+']
        ])->get()->count();

        $An = HospitalBloodBags::where([
            ['hospital_id',$hospital->hospital_id],
            ['blood_type','A-']
        ])->get()->count();

        $Bp = HospitalBloodBags::where([
            ['hospital_id',$hospital->hospital_id],
            ['blood_type','B+']
        ])->get()->count();

        $Bn =HospitalBloodBags::where([
            ['hospital_id',$hospital->hospital_id],
            ['blood_type','B-']
        ])->get()->count();

        $ABp =HospitalBloodBags::where([
            ['hospital_id',$hospital->hospital_id],
            ['blood_type','AB+']
        ])->get()->count();

        $ABn =HospitalBloodBags::where([
            ['hospital_id',$hospital->hospital_id],
            ['blood_type','AB-']
        ])->get()->count();

        $Op = HospitalBloodBags::where([
            ['hospital_id',$hospital->hospital_id],
            ['blood_type','O+']
        ])->get()->count();

        $On = HospitalBloodBags::where([
            ['hospital_id',$hospital->hospital_id],
            ['blood_type','O-']
        ])->get()->count();

        $RH =HospitalBloodBags::where([
            ['hospital_id',$hospital->hospital_id],
            ['blood_type','RH-null']
        ])->get()->count();




       $jan = HospitalCol::where('hospital_id',$hospital->hospital_id)->whereMonth('taken_date','1')->get()->count();
       $feb = HospitalCol::where('hospital_id',$hospital->hospital_id)->whereMonth('taken_date','2')->get()->count();
       $march = HospitalCol::where('hospital_id',$hospital->hospital_id)->whereMonth('taken_date','3')->get()->count();
       $april = HospitalCol::where('hospital_id',$hospital->hospital_id)->whereMonth('taken_date','4')->get()->count();
       $may = HospitalCol::where('hospital_id',$hospital->hospital_id)->whereMonth('taken_date','5')->get()->count();
       $june = HospitalCol::where('hospital_id',$hospital->hospital_id)->whereMonth('taken_date','6')->get()->count();
       $july = HospitalCol::where('hospital_id',$hospital->hospital_id)->whereMonth('taken_date','7')->get()->count();
       $aug = HospitalCol::where('hospital_id',$hospital->hospital_id)->whereMonth('taken_date','8')->get()->count();
       $sept = HospitalCol::where('hospital_id',$hospital->hospital_id)->whereMonth('taken_date','9')->get()->count();
       $oct = HospitalCol::where('hospital_id',$hospital->hospital_id)->whereMonth('taken_date','10')->get()->count();
       $nov = HospitalCol::where('hospital_id',$hospital->hospital_id)->whereMonth('taken_date','11')->get()->count();
       $dec = HospitalCol::where('hospital_id',$hospital->hospital_id)->whereMonth('taken_date','12')->get()->count();












        return view('hospital.hospdashboard',compact('hospital','hospitaltech','bloodbags','receivedbags','techs','untested','corrupted','Ap','An','Bp','Bn','ABp','ABn','Op','On','RH','jan','feb','march','april','may','june','july','aug','sept','oct','nov','dec'));
    }




}
