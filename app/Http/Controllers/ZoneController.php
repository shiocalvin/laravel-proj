<?php

namespace App\Http\Controllers;

use App\CenterBloodBag;
use App\Donor;
use App\Zone;
use App\Hospital;
use App\Nbts_centre;
use App\Nbts_employee;
use App\CenterCol;
use App\District;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ZoneController extends Controller
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

     public function index(){

        // $hospitals = Hospital::count();
        // $centers = Nbts_centre::count();
        // return view('zone.index',compact('hospitals','centers'));

     }

    public function indexy($id)
    {
        //
        $zone = Zone::findorFail($id);    

        $centers = Nbts_centre::where([

            ['zone_id',$zone->id]

        ])->get()->count();


        // $hospitals =DB::table('nbts_centres')
        //            ->leftJoin('hospital_centres','nbts_centres.centre_id','=','hospital_centres.centre_under_id')
        //            ->having('zone_id','=',$zone->id)
        //            ->groupBy('nbts_centres.centre_id','hospital_centres.hospital_id')
        //            ->get()->count();


        //  $bloodbags =DB::table('nbts_centres')
        //            ->leftJoin('centres_blood_bags','nbts_centres.centre_id','=','centres_blood_bags.centre_id')
        //            ->having('zone_id','=',$zone->id)
        //            ->groupBy('nbts_centres.zone_id','nbts_centres.centre_id','centres_blood_bags.blood_bag_id','centres_blood_bags.centre_id','centres_blood_bags.blood_type','centres_blood_bags.taken_at','centres_blood_bags.test_id','centres_blood_bags.expires_in')
        //            ->get()->count();    

        // query to get blood bags of a specific zone
       $centres = Nbts_centre::where('zone_id',$zone->id)->pluck('centre_id');

       $hospitals = Hospital::whereIn('centre_under_id',$centres)->get()->count();

       $bloodbags = CenterBloodBag::whereIn('centre_id',$centres)->get()->count();

       $Ap =  CenterBloodBag::whereIn('centre_id',$centres)->where('blood_type','A+')->get()->count();
       $An =  CenterBloodBag::whereIn('centre_id',$centres)->where('blood_type','A-')->get()->count();
       $Bp =  CenterBloodBag::whereIn('centre_id',$centres)->where('blood_type','B+')->get()->count();
       $Bn =  CenterBloodBag::whereIn('centre_id',$centres)->where('blood_type','B-')->get()->count();
       $ABp =  CenterBloodBag::whereIn('centre_id',$centres)->where('blood_type','AB+')->get()->count();
       $ABn =  CenterBloodBag::whereIn('centre_id',$centres)->where('blood_type','AB-')->get()->count();
       $Op =  CenterBloodBag::whereIn('centre_id',$centres)->where('blood_type','O+')->get()->count();
       $On =  CenterBloodBag::whereIn('centre_id',$centres)->where('blood_type','O-')->get()->count();
       $RH =  CenterBloodBag::whereIn('centre_id',$centres)->where('blood_type','RH-null')->get()->count();

       $donors = Donor::whereIn('reg_centre_id',$centres)->get()->count();

       $male = Donor::whereIn('reg_centre_id',$centres)->where('sex','male')->get()->count();
       $female = Donor::whereIn('reg_centre_id',$centres)->where('sex','female')->get()->count();



       $zonedirectors = Nbts_employee::where([
           ['stationed_at',$zone->id],
           ['position','zonaldir']
       
       ])->count();



       $jan = CenterCol::whereIn('centre_id',$centres)->whereMonth('taken_date','1')->get()->count();
       $feb = CenterCol::whereIn('centre_id',$centres)->whereMonth('taken_date','2')->get()->count();
       $march = CenterCol::whereIn('centre_id',$centres)->whereMonth('taken_date','3')->get()->count();
       $april = CenterCol::whereIn('centre_id',$centres)->whereMonth('taken_date','4')->get()->count();
       $may = CenterCol::whereIn('centre_id',$centres)->whereMonth('taken_date','5')->get()->count();
       $june = CenterCol::whereIn('centre_id',$centres)->whereMonth('taken_date','6')->get()->count();
       $july = CenterCol::whereIn('centre_id',$centres)->whereMonth('taken_date','7')->get()->count();
       $aug = CenterCol::whereIn('centre_id',$centres)->whereMonth('taken_date','8')->get()->count();
       $sept = CenterCol::whereIn('centre_id',$centres)->whereMonth('taken_date','9')->get()->count();
       $oct = CenterCol::whereIn('centre_id',$centres)->whereMonth('taken_date','10')->get()->count();
       $nov = CenterCol::whereIn('centre_id',$centres)->whereMonth('taken_date','11')->get()->count();
       $dec = CenterCol::whereIn('centre_id',$centres)->whereMonth('taken_date','12')->get()->count();






        
        return view('zone.index',compact('zone','centers','hospitals','bloodbags','Ap','donors','zonedirectors','Ap','An','Bp','Bn','ABp','ABn','Op','On','RH','male','female','jan','feb','march','april','may','june','july','aug','sept','oct','nov','dec'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    // public function ajaxregion(Request $request){


    //     $district = District::where('region_id','=',$request->region_id)->get();

    //     return HttpResponse::json($district);



    // }
}
