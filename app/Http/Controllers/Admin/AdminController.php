<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
// use App\Http\Middleware\Admin;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Hash;


// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use App\Http\Middleware\Admin as AdminMiddleware;
// use Illuminate\Http\Request;
// use Auth;
// use Validator;
// use Hash;
// use App\Models\Admin as AdminModel;



class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
       }
       public function login(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            // echo"<pre>";print_r($data);


            $rules=[

                'email'=>'required|email|max:255',
                'password'=>'required:max:30',
            ];

            $customMessages=[
                'eamil.required'=>"email is requried",
                'email.email'=>'valied is required',
                'password.required'=>'password is required',
            ];
            $this->validate($request,$rules,$customMessages);

            if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])){

                return redirect("admin/dashboard");
            }else{
                return redirect()->back()->with("error_message","invalied Email of Password");
            }
        }
        return view('admin.login');

       }
       public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
       }
       public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            //check if current password is correct
            if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password)){
                //check if new password and confirmed password is same
                if($data['new_password']==$data['confirmed_password']){
                    //update new password
                    Admin::where ('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_password'])]);
                    return redirect()->back()->with('success_message','your new password hass been updated!');


                }else{
                    return redirect()->back()->with('error_message','your new password is  and comfirmed password is not match');

                }

            }else{
                return redirect()->back()->with('error_message','your current password is incorrect');
            }

        }

        return view('admin.update_password');
       }


       public function checkCurrentPassword(Request $request){
        $data=$request->all();

            if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
            return "true";
        }else{
            return "false";
        }
       }
}
