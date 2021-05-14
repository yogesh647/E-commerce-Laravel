<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    //
	public function login(Request $request){
		if($request->isMethod('post'))
		{
			$data=$request->all();
			//echo "<pre>";print_r($data);die;
		    if(Auth::attempt(['email'=>$data['username'],'password'=>$data['password'],'Role'=>'1']))
			{	
				return redirect('/dashboard');
			}
            else
            {
              return redirect('/admin')->with('flash_message_error','invalid username and password');
            }				
		}
	  return view('admin.login')->with('flash_message_error','invalid username and password');
	}
	
	public function dashbaord(){
		if(Auth::check()==true)
		{
		  return view('admin.dashboard');
		}
		else
		{
		  return redirect('/admin');
		}	
	}
	
	public function logout()
	{
		Auth::logout();
		return redirect('/admin')->with('flash_message_success','admin logout successfully!');
	}
}
