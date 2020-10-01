<?php

namespace App\Http\Controllers;

use App\Nbts_centre;
use App\Zone;
use App\Drive;
use Illuminate\Http\Request;

class BloodDriveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
     public function index(){



     }

    public function indexy($id)
    {
        //
        // $zone =Zone::findorfail($zid);
        $center = Nbts_centre::findorFail($id);

        $drives = Drive::where([
            ['centre_id',$center->centre_id],
            ['status','ongoing']
            ])->get();

        // $drive = Drive::all();
        
        return view('center.blooddrive.index',compact('center','drives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $center = Nbts_centre::Findorfail($id);

        return view('center.blooddrive.create',compact('center'));
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
        $drive = Drive::create([
            'centre_id'=>$request->centre_id,
            'blood_drive_name'=>$request->name,
            'number_days' =>$request->days,
            'start_date' =>$request->startDate,
            'end_date' =>$request->endDate
        ]);

        session()->flash('success','Blood drive created');

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

    public function editey($cid,$id)
    {
        //
        $center = Nbts_centre::findorfail($cid);

        $drive = Drive::findorfail($id);

        return view('center.blooddrive.edit',compact('center','drive'));
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

        $driveupdate = Drive::findorfail($id)->update([

            'centre_id'=>$request->centre_id,
            'blood_drive_name'=>$request->name,
            'number_days' =>$request->days,
            'start_date' =>$request->startDate,
            'end_date' =>$request->endDate,
            'status' =>$request->status

        ]);

        session()->flash('success','Blood drive updated');

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


        $drive = Drive::findorFail($id);

        $drive->delete();

        session()->flash('success','Drive deleted successfully');

        return redirect()->back();




    }
}
