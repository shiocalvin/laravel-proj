<?php

namespace App\Http\Controllers;

use App\Http\Requests\ZoneDirectorCreateRequest;
use App\Http\Requests\ZoneDirectorEditRequest;
use App\Http\Requests\ZoneEditRequest;
use App\Nbts_centre;
use App\Nbts_employee;
use App\Region;
use Illuminate\Http\Request;

class CenterLabController extends Controller
{
    //

    // public function __construct()
    // {
    //     $this->middleware('auth:nbts');
    // }

    public function index($id){

        $center = Nbts_centre::findorFail($id);

        $centerlabs = Nbts_employee::where([

          ['position','nbtslab'],
          ['stationed_at',$center->centre_id]


        ])->get();


        return view ('center.centelabtech.index',compact('center','centerlabs'));

    }

    public function create($id){

        $center = Nbts_centre::findorfail($id);

        return view('center.centelabtech.create',compact('center'));

    }

    public function store(ZoneDirectorCreateRequest $request){

        $centerdirector = Nbts_employee::create([

            'employees_nida'=>$request->nida,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'sex'=>$request->gender,
            'dob'=>$request->date_of_birth,
            'position'=>$request->position,
            'stationed_at'=>$request->centre_id


        ]);

        session()->flash('success','Laboratory technician created successfully');

        return redirect()->back();

    }

    public function edit($cid,$id){

        $center = Nbts_centre::findorfail($cid);
        $centerlabtech = Nbts_employee::findorfail($id);

        return view('center.centelabtech.edit',compact('center','centerlabtech'));
    }

    public function update(ZoneDirectorEditRequest $request,$id){

        $labtechupdate = Nbts_employee::findorFail($id)->update([

            'employees_nida'=>$request->nida,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'sex'=>$request->gender,
            'dob'=>$request->date_of_birth,
            // 'position'=>$request->position,
            // 'stationed_at'=>$request->zone_id

        ]);

        session()->flash('success','Lab technician updated successfully.');
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
        $centerlabtech = Nbts_employee::findorFail($id);

        $centerlabtech->delete();

        session()->flash('success','Center lab technician deleted successfully');

        return redirect()->back();
    }
    
    
}
