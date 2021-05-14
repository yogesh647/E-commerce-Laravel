<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupons;
class CouponController extends Controller
{
    //
	public function addcoupon(Request $request)
	{
	 if($request->isMethod('post'))
     {
       $data=$request->all();
	   $coupon= new Coupons;
	   $coupon->coupon_code=$data['coupon_code'];
	   $coupon->amount=$data['coupon_amount']; 
	   $coupon->amount_type=$data['amount_type'];
	   $coupon->expiry_date=$data['expiry_date'];
	   $coupon->save();
	   return redirect()->back()->with('flash_message_success','coupon has been updated!');
	 
	 }		 
	 return view('admin.Coupon.addcoupon');	
	}

    public function viewcoupon()
    {
     
      $coupondetails=Coupons::get();
      return view('admin.Coupon.viewcoupon')->with(compact('coupondetails'));
    }

    public function editcoupon(Request $request,$id=null)
    {
	  if($request->isMethod('post'))
      {
	     
       $data=$request->all();
	   Coupons::where(['id'=>$id])->update(['coupon_code'=>$data['coupon_code'],'amount'=>$data['coupon_amount'],'amount_type'=>$data['amount_type'],'expiry_date'=>$data['expiry_date']]);
       return redirect()->back()->with('flash_message_success','coupon has been updated!');
      }		  
      $coupondetails=Coupons::where(['id'=>$id])->get();
	  
      return view('admin.Coupon.editcoupon')->with(compact('coupondetails'));
    }
    public function Couponstatusupdate(Request $request,$id=null)
    {
      $data=$request->all();
		Coupons::where(['id'=>$data['id']])->update(['status'=>$data['status']]);
		
    }
    public function deletecoupon($id=null)
    {
      Coupons::where('id',$id)->delete();
      return redirect()->back()->with('flash_message_success','coupon has been deleted!');
    }		
}
