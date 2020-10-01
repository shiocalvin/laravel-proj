<?php

namespace App\Http\Controllers\Auth;

use App\Hosplogin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HospitalloginController extends Controller
{
    //






    public function __construct()
    {
        $this->middleware('guest:hospital');
    }

    public function showlogin(){

        return view('auth.hosplogin');
    }

//     public function login(Request $request){

//      //validate form data
    
//      $this->validate($request,[
//          'username' =>'required',
//          'station' =>'required',
//          'password' => 'required|min:5'

//      ]);



    

//      //Attempt lo log the user in
//   if (Auth::guard('hospital')->attempt([
//     'username'=>$request->username,
//     'category'=>$request->position,
//     'password'=>$request->password,
//     'stationed_at'=>$request->station
//     ],$request->remember)) {

//     //if successful 
//     if ($request->position =='exec') {
        
//         return redirect()->intended('/admin');

//     }

//     if ($request->position =='zonaldir') {
        
//         return redirect()->intended('/');

//     }


   


    
// }
     




//      //if successful, then redirect to their intended location

//      return redirect()->back()->withInput($request->only('username','stationed_at'));



//      //if unsuccessful the redirect back












//     }



protected function attemptLogin(Request $request)
{


    $this->validate($request,[
                 'username' =>'required',
                  'station' =>'required',
                  'password' => 'required|min:5'
        
              ]);
        






    $hospital = Hosplogin::where('username', $request->username)
        ->where('password', $request->password)
        ->where('hospital_id', $request->station)
        ->first();

    if(!isset($hospital)){
        session()->flash('error','invalid inputs');
        return redirect()->back();
    }

    // Auth::guard('nbts')->login($nbts);

    //return true;


    
        
        // return redirect()->intended('/hospital/'.$hospital->hospital_id.'/hosplab/'.$hospital->username);

        return redirect('/hospital/'.$hospital->hospital_id.'/hosplab/'.$hospital->username);

    


    
}




























}
