<?php

namespace App\Http\Controllers;

use App\Admemo;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests\AdminmemoRequest;

class AdmemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $memos = Admemo::orderBy('id')->get();
        return view('Admin.Memo.index',compact('memos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('Admin.Memo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminmemoRequest $request)
    {
        //
        $memo = Admemo::create([

            'content'=>$request->content


        ]);

        session()->flash('success','Memo created successfully');

        return redirect('admin/memo');


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
        $memo = Admemo::findorFail($id);
        return view('Admin.Memo.edit',compact('memo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminmemoRequest $request, $id)
    {
        //

       $memo = Admemo::findorFail($id);

       $memo->content = $request->input('content');
       $memo->save();

        session()->flash('success','Memo updated successfully');

        return redirect('admin/memo');



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
}
