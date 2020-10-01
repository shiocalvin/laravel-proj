<?php

namespace App\Http\Controllers;

use App\CenterBloodBag;
use Illuminate\Http\Request;
use App\Http\Requests\CenterCreateRequest;
use App\Nbts_centre;
use App\Region;
use App\District;
use App\Hospital;
use App\Ward;
use App\Nbts_employee;
use App\Zone;

class ZoneCenterController extends Controller
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

     }


     public function active($id){


     
           $zone = Zone::findorFail($id);

           $centers = Nbts_centre::where([
            ['is_active',1] ,
            ['zone_id',$zone->id]

            ])->get();

          

        

            return view('zone.center.index',compact('centers','zone'));
    }

    // public function indexy($id)
    // {
    //     //
    //     $zone = Zone::findorFail($id);
    //     $centers = Nbts_centre::where([
            
    //         ['is_active',1],
    //         ['zone_id',$zone->id]

    //     ])->get();

        

    //     return view('zone.center.index',compact('centers'));
    // }


    public function inactive($id){


    $zone = Zone::findorFail($id);   

     $centers =Nbts_centre::where([
         ['is_active',0],
         ['zone_id',$zone->id]
         
     ])->get();

     

     return view('zone.center.inactive',compact('centers','zone'));

    }

    // public function inactive($id){


    //     $zone = Zone::findorFail($id);

    //  $centers =Nbts_centre::where([
    //      ['is_active',0],
    //      ['zone_id',$zone->id]
    //  ])->get();

    //  return view('zone.center.inactive',compact('centers'));

    // }

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

        $zone = Zone::findorFail($id);

        $regions = Region::where([['zone_id',$zone->id]])->get();
        // $regions = Region::all();
        $wards = Ward::pluck('name','id');
        $districts = District::pluck('name','id');
     
     
        // $wards = Ward::where([['district_id',111]])->get();
        // $districts = District::where([['region_id',1]])->get();

        $regionsoptions = array(''=>'Select Region')+$regions->pluck('name','id')->toArray();
        // $wardsoptions = array(''=>'Select Ward')+$wards->pluck('name','id')->toArray();
        // $districtsoptions = array(''=>'Select District')+$districts->pluck('name','id')->toArray();

        return view('zone.center.create',compact('zone','districts','wards','regionsoptions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CenterCreateRequest $request)
    {
        //

        



        $center = Nbts_centre::create([

            'name' => $request->name,
            'region_id'=>$request->region_id,
            // 'zone'=>$request->zone_id,
            'district_id'=>$request->district_id,
            'ward_id' =>$request->ward_id,
            'zone_id' =>$request->zone_id




        ]);

        session()->flash('success','Center created successfully');

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
        $zone = Zone::findorFail($zid);

        $center = Nbts_centre::findorFail($id);
        $region= $center->region;
        $ward= $center->ward;
        $district =$center->district;
        // $region = Region::findorFail($id);
        // $district = District::findorFail($id);
        // $ward = Ward::findorFail($id);

        $hospitals = Hospital::where([
            ['centre_under_id',$center->centre_id]
        ])->get()->count();

        $bloodbags = CenterBloodBag::where([
            ['centre_id',$center->centre_id]
        ])->get()->count();

        $centerdirectors = Nbts_employee::where([
            ['position','nbtsdir'],
            ['stationed_at',$center->centre_id]

             
        ])->get();

        return view('zone.center.show',compact('center','centerdirectors','region','ward','district','zone','hospitals','bloodbags'));
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

        $zone =Zone::findorFail($zid);

        $center = Nbts_centre::findorFail($id);

        // $districts = District::where('region_id',$zone->id)->pluck('centre_id');

        $regions = Region::where([['zone_id',$zone->id]])->get();
        $wards =Ward::pluck('name','id');
        $districts =District::pluck('name','id');
        
        // $wards = Ward::where([['district_id',111]])->get();
        // $districts = District::where([['region_id',1]])->get();

        $regionsoptions = array(''=>'Select Region')+$regions->pluck('name','id')->toArray();
        $wardsoptions = array(''=>'Select Ward')+$wards->pluck('name','id')->toArray();
        $districtsoptions = array(''=>'Select District')+$districts->pluck('name','id')->toArray();

        return view('zone.center.edit',compact('regionsoptions','wardsoptions','districtsoptions','zone','center','districts','wards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CenterCreateRequest $request, $id)
    {
        //

        // $centerupdate = Nbts_centre::findorFail($id)->update([

        

        //     'name' => $request->name,
        //     'region'=>$request->region_id,
        //     'district'=>$request->district_id,
        //     'ward' =>$request->ward_id,
        //     'is_active'=>$request->is_active




        // ]);

        // session()->flash('success','Center updated successfully');

        // return redirect('zone/center/active');


    }


    public function updateactive(Request $request,$id){

        // $zone = Zone::findorFail($zid);

        $center = Nbts_centre::findorFail($id);

        $center->update([

          
            'name' => $request->name,
            'region_id'=>$request->region_id,
            'district_id'=>$request->district_id,
            'ward_id' =>$request->ward_id,

            'is_active'=> $request->is_active

        ]);

        session()->flash('success','Center updated');

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
        $center = Nbts_centre::findorFail($id);

        $center->delete();

        session()->flash('success','Hospital deleted successfully');

        return redirect()->back();
    }

  
}
