<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Countries;
use App\OrdersProducts;
use Session;
use App\Orders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
class UserController extends Controller
{
    //
	public function loginuser(Request $request)
	{
		if($request->isMethod('post')){
		  $data=$request->all();	
		  if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
			  $userStatus=User::where(['email'=>$data['email']])->first();
			  if($userStatus->status ==0)
			  {
			    return redirect()->back()->with('flash_message_error','Your Are Account is not Acivate ! Please confirm Your Email To Acivate Your Account');
			  
			  }
			  Session::put('frontSession',$data['email']);
			  if(!empty(Session::get('session_id')))
			{
				$sesion_id=Session::get('sesion_id');
				DB::table('cart')->where('session_id',$session_id)->update(['email'=>$data['email']]);
			}
			  return redirect('/cart');
		  }
		  else
		  {
             return redirect()->back()->with('flash_message_error','Invalid email');
          }			  
		}
		return view('wayshop.loginuser');
	}
	
	public function registeruser(Request $request)
	{
		$data=$request->all();
		$userCount=User::where(['email'=>$data['email']])->count();
		if($userCount>0)
		{
           return redirect()->back()->with('flash_message_error','Email is already Register');
        }
        else
        {			
		$user= new User;
		$firstname=$data['first_name'];
		$lastname=$data['last_name'];
		$name=$firstname.$lastname;
		$user->name=$firstname.$lastname;
		$user->email=$data['email'];
		$user->password=bcrypt($data['password']);
		$user->save();
		
		// send email in user
		/*
		$email=$data['email'];
		$message_data=['email'=>$data['email'],'name'=>$name];
		Mail::send('wayshop.email.register',$message_data,function($message) use($email){
			$message->to($email)->subject('Account Register for Wayshop');
		});
		*/
		
		// send configration mail
        $email=$data['email'];
        $message_data=['email'=>$data['email'],'name'=>$name,'code'=>base64_encode($data['email'])];
        Mail::send('wayshop.email.configration',$message_data,function($message) use($email){
		    $message->to($email)->subject('Account Activation For WayShop');
		});        
          return redirect()->back()->with('flash_message_success','Please confirm Your Email To Acivate Your Account');
		
		if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']]))
		{
			Session::put('frontSession',$data['email']);
			if(!empty(Session::get('session_id')))
			{
				$sesion_id=Session::get('sesion_id');
				DB::table('cart')->where('session_id',$session_id)->update(['email'=>$data['email']]);
			}
			return redirect('/cart');
		}
		}
	}
	
	public function logout()
	{
		Session::forget('frontSession');
		Auth::logout();
		return redirect('/');
	}
	
	public function account()
	{
		
		return view('wayshop.account');
	}
	
	public function changepassword(Request $request)
	{
	   if($request->isMethod('post'))
	   {
		 $data=$request->all(); 
         //dd($data);		 
         $old_pwd=User::where('id',Auth::User()->id)->first();
		 $old_password=$old_pwd->password;
		 $new_pwd=$data['new_password'];
		 
		 if(Hash::check($new_pwd,$old_password))
		 {
			 return redirect()->back()->with('flash_message_error','password will be incorrect');
		 }
		 else
		 {
			$new_password=bcrypt($new_pwd);		
            User::where('id',Auth::User()->id)->update(['password'=>$new_password]);
			return redirect()->back()->with('flash_message_success','Password will be updated!');
         }			 
       }		   
	   return view('wayshop.changepassword');	
	}
	
	public function changeaddress(Request $request)
	{
		$user_id=Auth::User()->id;
		if($request->isMethod('post'))
		{
          $data=$request->all();
		  $user=User::find($user_id);
		  $user->address=$data['address'];
		  $user->city=$data['city'];
		  $user->state=$data['state'];
		  $user->country=$data['country'];
		  $user->pincode=$data['pincode'];
		  $user->mobile=$data['mobile'];
		  $user->save();
		  return redirect()->back()->with('flash_message_success','Address has been updated!');
        }			
		
		$userdetails=User::find($user_id);
		$country=Countries::get();
		return view('wayshop.changeaddress')->with(compact('country','userdetails'));
	}
	
	public function userorder()
	{
	   $user_id=Auth::User()->id;	   
	   $orderDetails=Orders::with('orders')->where(['user_id'=>$user_id])->get();	   
	   return view('wayshop.order.user_order')->with(compact('orderDetails'));	
	}
	
	public function userorderdetails($id=null)
	{
		$orderDetails=OrdersProducts::where(['id'=>$id])->get();		
		return view('wayshop.order.user_order_details')->with(compact('orderDetails'));
	}
	
	public function confirmaccount($email)
	{
		$email=base64_decode($email);
		$userCount=User::where(['email'=>$email])->count();
		if($userCount>0)
		{
			$userdetails=User::where(['email'=>$email])->first();
			if($userdetails->status==1)
			{
				return redirect('/login')->with('flash_message_error','Your Account is already activated you can login only');
			}
			else
			{
			    User::where(['email'=>$email])->update(['status'=>'1']);
            
			// send welcome email in user		
		     
		     $message_data=['email'=>$email,'name'=>$userdetails->name];
		     Mail::send('wayshop.email.welcome',$message_data,function($message) use($email){
			 $message->to($email)->subject('Welcome To Wayshop website');
		     });
	        
				
			    return redirect('/login')->with('flash_message_success','Congrate Your Account is now activated');
				
			}
		}
		else
		{
			abort(404);
			
		}
		
	}
}
