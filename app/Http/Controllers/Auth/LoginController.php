<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
//use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }




//     public function login(Request $request){

//         //validate form data
       
//         $this->validate($request,[
//             'username' =>'required',
//             'station' =>'required',
//             'password' => 'required|min:5'
   
//         ]);
   
   
   
       
       
   
//         //Attempt lo log the user in
//      if (Auth::guard('nbts')->attempt([
//        'username'=>$request->username,
//        'category'=>$request->position,
//        'password'=>$request->password,
//        'stationed_at'=>$request->station
//        ],$request->remember)) {
   
//        //if successful 
//        if ($request->position =='exec') {
           
//            return redirect()->intended('/admin');
   
//        }
   
//        if ($request->position =='zonaldir') {
           
//            return redirect()->intended('/');
   
//        }
   
   
      
   
   
       
//    }
        
   
   
   
   
//         //if successful, then redirect to their intended location
   
//         return redirect()->back()->withInput($request->only('username','stationed_at'));
   
   
   
//         //if unsuccessful the redirect back
   
   
   
   
   
   
   
   
   
   
   
   
//        }

       public function logout(){
           return redirect('nbts/login');
       }






}
