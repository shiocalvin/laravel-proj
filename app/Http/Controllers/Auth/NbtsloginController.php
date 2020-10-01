<?php

namespace App\Http\Controllers\Auth;

use App\Nbtslogin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
//use Illuminate\Validation\ValidationException;

class NbtsloginController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('guest:nbts');
        
    }

    public function showlogin(){

        return view('auth.nbtslogin');
    }

//     public function login(Request $request){

//      //validate form data
    
//      $this->validate($request,[
//          'username' =>'required',
//          'station' =>'required',
//          'password' => 'required|min:5'

//      ]);



    

//      //Attempt lo log the user in
//   if (Auth::guard('nbts')->attempt([
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
        
//         return redirect()->intended('/zone/'.$request->station);

//     }
//     if ($request->position =='nbtsdir' && 'is_active'==1) {

//         return redirect()->intended('/center/'.$request->station);
//     }

//     if ($request->position =='nbtslab' && 'is_active'==1) {
        
//         return redirect()->intended('/center/'.$request->station.'/centerlab/'.$request->username);
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
        






    $nbts = Nbtslogin::where('username', $request->username)
        ->where('password', $request->password)
        ->where('category', $request->position)
        ->where('stationed_at', $request->station)
        ->first();

    if(!isset($nbts)){
        
        
        // session()->flash('error',$message);



        // throw ValidationException::withMessages([
        //     $this->username() => [trans('auth.failed')],
        // ]);



        return redirect()->back();
    }

    // Auth::guard('nbts')->login($nbts);

    //return true;


    if ($nbts->category =='exec') {
        
        return redirect()->intended('/admin');

    }


    if ($nbts->category =='zonaldir') {
        
               return redirect()->intended('/zone/'.$nbts->stationed_at);
        
             }

    if($nbts->category =='nbtsdir'&& $nbts->is_active==1){
        
        return redirect()->intended('/center/'.$nbts->stationed_at);

    }else{
        return redirect()->back();
    }    
    
    
    if($nbts->category == 'nbtslab' && $nbts->is_active==1 ){

        return redirect()->intended('/center/'.$nbts->stationed_at.'/centerlab/'.$nbts->username);

    }else{
        return redirect()->back();
    }    
}



// protected function sendFailedLoginResponse(Request $request)
// {
//     throw ValidationException::withMessages([
//         $this->username() => [trans('auth.failed')],
//     ]);
// }


// public function username()
// {
//     return 'username';
// }











}
