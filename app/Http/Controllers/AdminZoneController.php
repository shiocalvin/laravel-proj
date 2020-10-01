<?php

namespace App\Http\Controllers;

use App\CenterBloodBag;
use App\CenterCol;
use App\Donor;
use App\Hospital;
use Illuminate\Http\Request;
use App\Http\Requests\ZoneDirectorCreateRequest;
use App\Http\Requests\ZoneDirectorEditRequest;
use App\Http\Requests\ZoneEditRequest;
use App\Nbts_centre;
use App\Nbts_employee;
use App\Zone;
use App\Region;
use App\User;
use App\Nbtslogin;
use Cron\MonthField;
use Illuminate\Support\Facades\DB;

class AdminZoneController extends Controller
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
        $zones = Zone::all();
        return view('Admin.Zone.index',compact('zones'));
    }

    public function exec(){

        $zones = Zone::count();
        $hospitals = Hospital::count();
        $centers = Nbts_centre::count();
        $donors = Donor::count();
        $bloodbags = CenterBloodBag::count();

        $employees = Nbts_employee::count();


        $male = Donor::where([
        
            ['sex','male']
        ])->get()->count();

        $female = Donor::where([
        
            ['sex','female']
        ])->get()->count();

        $Ap = CenterBloodBag::where([
            ['blood_type','A+']
        ])->get()->count();


        $An = CenterBloodBag::where([
            ['blood_type','A-']
        ])->get()->count();

        $Bp = CenterBloodBag::where([
            ['blood_type','B+']
        ])->get()->count();

        $Bn = CenterBloodBag::where([
            ['blood_type','B-']
        ])->get()->count();

        $ABp = CenterBloodBag::where([
            ['blood_type','AB+']
        ])->get()->count();

        $ABn = CenterBloodBag::where([
            ['blood_type','AB-']
        ])->get()->count();

        $Op = CenterBloodBag::where([
            ['blood_type','O+']
        ])->get()->count();
        $On = CenterBloodBag::where([
            ['blood_type','O-']
        ])->get()->count();

        $RH = CenterBloodBag::where([
            ['blood_type','RH-null']
        ])->get()->count();

        $jan = CenterCol::whereMonth('taken_date','1')->get()->count();
        $feb = CenterCol::whereMonth('taken_date','2')->get()->count();
        $march = CenterCol::whereMonth('taken_date','3')->get()->count();
        $april = CenterCol::whereMonth('taken_date','4')->get()->count();
        $may = CenterCol::whereMonth('taken_date','5')->get()->count();
        $june = CenterCol::whereMonth('taken_date','6')->get()->count();
        $july = CenterCol::whereMonth('taken_date','7')->get()->count();
        $aug = CenterCol::whereMonth('taken_date','8')->get()->count();
        $sept = CenterCol::whereMonth('taken_date','9')->get()->count();
        $oct = CenterCol::whereMonth('taken_date','10')->get()->count();
        $nov = CenterCol::whereMonth('taken_date','11')->get()->count();
        $dec = CenterCol::whereMonth('taken_date','12')->get()->count();







       
        return view('Admin.index',compact('zones','hospitals','centers','donors','bloodbags','male','female','Ap','An','Bp','Bn','ABp','ABn','Op','On','RH','employees','jan','feb','march','april','may','june','july','aug','sept','oct','nov','dec'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //create zone director

    public function create()
    {
        //
        // $zone = Zone::findorFail();
        
        // return view('Admin.Zone.create',compact('zone'));
    }

    public function createdirector($id)
    {
        //
        $zone = Zone::findorFail($id);
        
        return view('Admin.Zone.create',compact('zone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     //Store zone directors
    public function store(ZoneDirectorCreateRequest $request)
    {


        //storing the data from the form


        
        $zonemployee = Nbts_employee::create([

            'employees_nida'=>$request->nida,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'sex'=>$request->gender,
            'dob'=>$request->date_of_birth,
            'position'=>$request->position,
            'stationed_at'=>$request->zone_id

        ]);
        

        session()->flash('success','Zone Director created successfully.');

        return redirect('admin/zone');


    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //Show zones
    public function show($id)
    {
        //showing zones and their specific regions
        $zone =Zone::findorfail($id);

       
       $centres = Nbts_centre::where('zone_id',$zone->id)->pluck('centre_id');

        

        $centers = Nbts_centre::where([
            ['zone_id',$zone->id]
        ])->get()->count();

        $regions =$zone->regions;
        
        //sorting zone directors according to their specific zones
        $zonedirectors = Nbts_employee::where([
            ['position','zonaldir'],
            ['stationed_at',$zone->id]
             
        ])->get();

        // $hospitals =DB::table('nbts_centres')
        // ->leftJoin('hospital_centres','nbts_centres.centre_id','=','hospital_centres.centre_under_id')
        // ->having('zone_id','=',$zone->id)
        // ->groupBy('nbts_centres.centre_id','hospital_centres.hospital_id')
        // ->get()->count();

        $hospitals = Hospital::whereIn('centre_under_id',$centres)->get()->count();


        $bloodbags = CenterBloodBag::whereIn('centre_id',$centres)->get()->count();

        // $bloodbags = DB::table('nbts_centres')
        //              ->leftJoin('centres_blood_bags','nbts_centres.centre_id','=','centres_blood_bag.centre_id')
        //              ->where('zone_id','=',$zone->id)
        //              ->select('centres_blood_bags.blood_bag_id')
                     
        //              ->get()->count();
       

        

        return view('Admin.Zone.show',compact('zone','regions','zonedirectors','centers','bloodbags','hospitals'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id){

     }
     //Edit zone directors

    public function editzonedirector($id)
    {
      
        $zonedirector = Nbts_employee::findorFail($id);
        return view('Admin.Zone.director.directoredit',compact('zonedirector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //update zone directors
    public function update(ZoneDirectorEditRequest $request, $id)
    {
       

        $directorupdate = Nbts_employee::findorFail($id)->update([

            'employees_nida'=>$request->nida,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'sex'=>$request->gender,
            'dob'=>$request->date_of_birth,
            // 'position'=>$request->position,
            // 'stationed_at'=>$request->zone_id

        ]);

        session()->flash('success','Zone Director updated successfully.');
        return redirect('admin/zone');
    }


    // public function showinfo($id){

    //     $admin = Nbtslogin::findorfail($id);
    //     return view('Admin.showinfo');
    // }


    // public function editinfo($id){

    //     $admin = Nbtslogin::findorfail($id);
    //     return view ('Admin.editinfo',compact('admin'));

    // }


    // public function updateinfo(Request $request,$id){

    // }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $zonedirector = Nbts_employee::findorFail($id);

        $zonedirector->delete();

        session()->flash('success','Zone director deleted successfully');

        return redirect()->back();
    }
}
