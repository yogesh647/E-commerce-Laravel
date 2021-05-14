<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\categories;
use App\Products;
use App\ProductsAttributes;
use Image;
use Session;
use DB;
use App\User;
use App\ProductsImages;
use App\Cart;
use Auth;
use App\Countries;
use App\Delivery;
use App\Orders;
use App\OrdersProducts;
class ProductController extends Controller
{
    
	public function add_product(Request $request)
	{
	  if($request->isMethod('post'))
	  {
		 $data=$request->all();
         //echo "<pre>";print_r($data);die;
		 $product=new Products;
		 $product->category_id=$data['category_id'];
         $product->name=$data['product_name'];
		 $product->code=$data['product_code'];
		 $product->color=$data['product_color'];
		 $product->description=$data['product_description'];
		 $product->price=$data['product_price'];
		  if($request->hasfile('product_image')) 
		  {
            $file = $request->file('product_image');
            $extension = $file->getClientOriginalExtension();
			$fileName=rand(600,5000).".".$extension;
			$destinationPath = public_path().'/upload/product/' ;
            $file->move($destinationPath,$fileName);
            $product->image = $fileName;
          }
		 
		 $product->save();
		 return redirect('/admin/view_product')->with('flash_message_success','product has been updated!');
	  }
      	$categories=Categories::where(['parent_id'=>0])->get();
        $categories_dropdown="<option value='' selected disableSelect>Select</option>";
       	foreach($categories as $cat)
		{
		   $categories_dropdown.="<option value='".$cat->id."'>".$cat->name."</option>";		   
           $sub_categories_dropdown=Categories::where(['parent_id'=>$cat->id])->get();
		   
		   foreach($sub_categories_dropdown as $subcat)
		   {
			   $categories_dropdown.="<option value='".$subcat->id."'>&nbsp;&nbsp;&nbsp;".$subcat->name."</option>";
		       
		   }
		   
        }
         		
	    return view('admin.product.add_product')->with(compact('categories_dropdown'));	
	  	
	}
   
    public function view_product()
	{
	   $productDetails=Products::get();	   
       return view('admin.product.view_product')->with(compact('productDetails'));

    }
	
	public function edit_product(Request $request,$id=null)
	{
		if($request->isMethod('post'))
		{
		  $data=$request->all();	
		  $product_name=$data['product_name'];
		  $product_code=$data['product_code'];
		  $product_color=$data['product_color'];
		  $product_price=$data['product_price'];
		  $product_description=$data['product_description'];
		  if($request->hasfile('product_image'))
		  {
		    $file = $request->file('product_image');
            $extension = $file->getClientOriginalExtension();
			$fileName=rand(600,5000).".".$extension;
			$destinationPath = public_path().'/upload/product/' ;
            $file->move($destinationPath,$fileName);
            $product_image = $fileName;
		  }
		  else{
			  $product_image=$data['old_image'];
			  
		  }
		 Products::where(['id'=>$id])->update(['name'=>$product_name,'code'=>$product_code,'color'=>$product_color,'description'=>$product_description,'price'=>$product_price,'image'=>$product_image]);
			
		}
		$productDetails=Products::where(['id'=>$id])->first();
		return view('admin.product.edit_product')->with(compact('productDetails'));
	}	
    public function delete_product($id=null)
	{
	  $productdetails=Products::where(['id'=>$id])->first();
      $img_path="upload/product/";	  
	  if(file_exists($img_path.$productdetails->image))
	  {
        unlink($img_path.$productdetails->image);
       }
	   
	  Products::where(['id'=>$id])->delete();
	  return redirect()->back()->with('flash_message_success','Product has been deleted');

    }

    public function Productstatusupdate(Request $request,$id=null)
    {
	   $data=$request->all();
       Products::where(['id'=>$data['id']])->update(['status'=>$data['status']]);

    }

    public function add_productsimage(Request $request,$id=null)
    {
      if($request->isMethod('post')){
		  $data=$request->all();
		  $image=new ProductsImages;
		  
		  if($request->hasfile('product_image'))
		  {
		    $files = $request->file('product_image');
			foreach($files as $file)
			{
            $extension = $file->getClientOriginalExtension();
			$fileName=rand(600,5000).".".$extension;
			$destinationPath = public_path().'/upload/product/' ;
            $file->move($destinationPath,$fileName);
			$image->image=$fileName;
			$image->product_id=$data['product_id'];
			$image->save();
		    }
		  }
		  return redirect()->back()->with('flash_message_success','product image has been add!');
	  }
      $productDetails=Products::where(['id'=>$id])->get();
	  $productimageDetails=ProductsImages::where(['product_id'=>$id])->get();
      return view('admin.product.add_productsimage')->with(compact('productDetails','productimageDetails'));
    }

    public function delete_product_image($id=null)
    {
      ProductsImages::where(['id'=>$id])->delete();
	  return redirect()->back()->with('flash_message_success','product image has been deleted!');
	  
    }

    public function add_productatrribute(Request $request,$id=null)
    {
      if($request->isMethod('post')){
		  $data=$request->all();
		  foreach($data['sku'] as $key=>$val)
		  {
		  if(!empty($val))
          {
            $skucount=ProductsAttributes::where('sku',$val)->count();
			if($skucount>0)
			{
          	  return redirect()->back()->with('flash_message_success','sku are already exits');
            }
            $sizecount=ProductsAttributes::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
            if($sizecount>0)
            {
             return redirect()->back()->with('flash_message_success','size are already exits');
            }				
		  $productattribute= new ProductsAttributes;
		  
		  $productattribute->product_id=$data['product_id'];
		  $productattribute->sku=$val;
		  $productattribute->size=$data['size'][$key];
		  $productattribute->stock=$data['stock'][$key];
		  $productattribute->price=$data['price'][$key];
		  $productattribute->save();
		  }
		  
		  }	
		  return redirect()->back()->with('flash_message_success','product atrribute has been updated');
	   
	  }
      $productDetails=Products::where(['id'=>$id])->get();
      $productAtrtibuteDetails=ProductsAttributes::where(['product_id'=>$id])->get();	  
      return view('admin.product.addproduct_atrribute')->with(compact('productDetails','productAtrtibuteDetails'));
    }

    public function editproductatrribute(Request $request,$id=null)
    {
	  $data=$request->all();	  
	  ProductsAttributes::where(['id'=>$id])->update(['sku'=>$data['sku'],'size'=>$data['size'],'stock'=>$data['stock'],'price'=>$data['price']]);
      return redirect()->back()->with('flash_message_success','Product Atrributes has been updated!');

    }

    public function delete_atrribute($id=null)
    {
     ProductsAttributes::where(['id'=>$id])->delete();
	  return redirect()->back()->with('flash_message_success','product atrribute has been deleted!');
	  
    }

    public function product($id=null)
    {
      $productDetails=Products::with('attributes')->where(['id'=>$id])->first();
	  $productImage=ProductsImages::where(['product_id'=>$id])->get();
      return view('wayshop.product_details')->with(compact('productDetails','productImage'));
    }

    public function addcart(Request $request)
	{
      	  
        $data=$request->all();
		
		if(empty($data['users_email'])){
			$data['users_email']=Auth::User()->email;
		}
		
		$sessions_id=Session::get('sessions_id');
        if(empty($sessions_id))
		{
         $sessions_id=str_random(40);
		 Session::put('sessions_id',$sessions_id);
		 
        }
		if($data['qnty']==0)
		{
           return redirect()->back()->with('flash_message_error','product quantity not zero please try once more');
        }			
		$cartsize=explode('-',$data['size']);
        $cartCount=DB::table('carts')->where(['product_id'=>$data['product_id'],'product_name'=>$data['product_name'],'product_code'=>$data['product_code'],'product_color'=>$data['product_color'],'product_size'=>$cartsize[1],'users_email'=>$data['users_email'],'session_id'=>$sessions_id,'price'=>$data['price'],'quantity'=>$data['qnty']])->count();		
        if($cartCount>0){
			return redirect()->back()->with('flash_message_error','Product has been Already add');
		}
		else{
			DB::table('carts')->insert(['product_id'=>$data['product_id'],'product_name'=>$data['product_name'],'product_code'=>$data['product_code'],'product_color'=>$data['product_color'],'product_size'=>$cartsize[1],'users_email'=>$data['users_email'],'session_id'=>$sessions_id,'price'=>$data['price'],'quantity'=>$data['qnty']]);
			
		}
	   return redirect('/cart')->with('flash_message_success','Product has been added');	  
     
	}
	
    public function cart(Request $request)
    {
	  
	  $sessions_id=Session::get('sessions_id');
      $CartDetails=Cart::where(['session_id'=>$sessions_id])->get();
      foreach($CartDetails as $key=>$product)
      {
	
		  $productDetails=DB::table('products')->where(['id'=>$product->product_id])->first();
          $CartDetails[$key]->image=$productDetails->image;
		  //dd($CartDetails[$key]->image);
      }		  
      return view('wayshop.product.cart')->with(compact('CartDetails'));
    }
    
    public function getprice(Request $request)
    {
       $data=$request->all();
	   $proAtrr=explode("-",$data['id1']);
	   //echo print_r($proAtrr);die;
	   $proAtt=ProductsAttributes::where(['product_id'=>$proAtrr[0],'size'=>$proAtrr[1]])->first();
	   //echo "<pre>"; print_r($proAtt->price);
       echo $proAtt->price;
	   
    }

    public function deleteaddcart($id=null)
    {
      //$data=$request->all();
	  Session::forget('couponamount');
	  Session::forget('coupon_code');
      DB::table('carts')->where(['id'=>$id])->delete();
	  return redirect()->back()->with('flash_message_error','Product has been deleted');

    }
	
	public function applycouponcode(Request $request)
	{
	    if($request->isMethod('post'))
	    {		
		  $data=$request->all();
		  $coupondetails=DB::table('coupons')->where(['coupon_code'=>$data['coupon_code']])->count();
		  if($coupondetails==0)
		  {
             return redirect()->back()->with('flash_message_error','coupon is not present');
          }
          else
          {
             $coupondetail=DB::table('coupons')->where(['coupon_code'=>$data['coupon_code']])->first();
			 if($coupondetail->status==0)
			 {
               return redirect()->back()->with('flash_message_error','coupon code is not active');
             }
			 $current_date=date('yy-m-d');
             if($current_date>$coupondetail->expiry_date){		 
                return redirect()->back()->with('flash_message_success','coupon date will be expired');
			 }
			 $totalamount=0;
			 $sessions_id=Session::get('sessions_id');
			 $usercart=DB::table('carts')->where(['session_id'=>$sessions_id])->get();
			 foreach($usercart as $cart){
				 $totalamount=$totalamount+($cart->price*$cart->quantity);
			 }
			 if($coupondetail->amount_type=="Fixed"){
				 $couponamount=$totalamount;
			 }
			 else{
				 $couponamount=$totalamount*($coupondetail->amount/100);
			 }
			 Session::put('couponamount',$couponamount);
			 Session::put('coupon_code',$data['coupon_code']);
			 return redirect()->back()->with('flash_message_success','coupon code will be Apply');
          }			  
		}
	}

    public function checkout(Request $request)
    {
	   $user_id=Auth::User()->id;
       $user_email=Auth::User()->email;	   
       $countries=Countries::get();
       $userdetails=User::where('id',Auth::User()->id)->first();
	   $shippingcount=DB::table('deliveries')->where(['user_id'=>$user_id])->count();
	   $shippingDetails=array();
	   if($shippingcount >0)
	   {
         $shippingDetails=DB::table('deliveries')->where(['user_id'=>$user_id])->first();
       }
       	   
	   if($request->isMethod('post'))
	   {
		$data=$request->all();  
        
		User::where(['id'=>$user_id])->update(['name'=>$data['billing_name'],'address'=>$data['billing_address'],'city'=>$data['billing_city'],'state'=>$data['billing_state'],'country'=>$data['billing_country'],'pincode'=>$data['billing_pincode'],'mobile'=>$data['billing_mobile']]);
		if($shippingcount >0)
		{
		  DB::table('deliveries')->where('user_id',$user_id)->update(['name'=>$data['shipping_name'],'address'=>$data['shipping_address'],'city'=>$data['shipping_city'],'state'=>$data['shipping_state'],'country'=>$data['shipping_country'],'pincode'=>$data['shipping_pincode'],'mobile'=>$data['shipping_mobile']]);
		   	
 		}
		else
		{
		
        if(empty($data['shipping_name']))
		{
           return redirect()->back()->with('flash_message_error','name not empty');
        }
		else if(empty($data['shipping_address']))
		{
          return redirect()->back()->with('flash_message_error','address not empty');
        }
        else if(empty($data['shipping_city']))
		{
          return redirect()->back()->with('flash_message_error','city not empty');
        }
        else if(empty($data['shipping_state']))
		{
          return redirect()->back()->with('flash_message_error','state not empty');
        }
        else if(empty($data['shipping_pincode']))
		{
          return redirect()->back()->with('flash_message_error','pincode not empty');
        }
        else if(empty($data['shipping_mobile']))
		{
          return redirect()->back()->with('flash_message_error','mobile not empty');
        }		
        else
        {			
		 DB::table('deliveries')->insert(['user_id'=>$user_id,'name'=>$data['shipping_name'],'address'=>$data['shipping_address'],'city'=>$data['shipping_city'],'state'=>$data['shipping_state'],'country'=>$data['shipping_country'],'pincode'=>$data['shipping_pincode'],'mobile'=>$data['shipping_mobile']]);
        }
		}			
		return redirect('/order_review');
       }		  
       
       return view('wayshop.product.checkout')->with(compact('userdetails','countries','shippingDetails'));
    }

    public function order_review(Request $request)
    {
     $user_id=Auth::User()->id;
	 $billingdetails=User::where('id',$user_id)->first();
	 $shippingDetails=DB::table('deliveries')->where('user_id',$user_id)->first();
	 $sessions_id=Session::get('sessions_id');
     $CartDetails=Cart::where(['session_id'=>$sessions_id])->get();
	 foreach($CartDetails as $key=>$product)
      {
	
		  $productDetails=DB::table('products')->where(['id'=>$product->product_id])->first();
          $CartDetails[$key]->image=$productDetails->image;
		  //dd($CartDetails[$key]->image);
      }  
     	 
     return view('wayshop.product.order_review')->with(compact('billingdetails','shippingDetails','CartDetails'));
    }

    public function place_order(Request $request)
    {
      if($request->isMethod('post'))
	  {
		$data=$request->all();
        $user_id=Auth::User()->id;
		$user_email=Auth::User()->email;
		$coupon_code=Session::get('coupon_code');
		if(empty($coupon_code))
		{
			$coupon_code='';
		}
		$coupon_amount=Session::get('couponamount');
		if(empty($coupon_amount))
		{
			$coupon_amount='';
		}
		$delivery=Delivery::where('user_id',$user_id)->first();
		$order=new Orders();
		$order->user_id=$user_id;
		$order->user_email=$user_email;
		$order->name=$delivery->name;
		$order->address=$delivery->address;
		$order->city=$delivery->city;
		$order->state=$delivery->state;
		$order->country=$delivery->country;
		$order->pincode=$delivery->pincode;
		$order->mobile=$delivery->mobile;
		$order->coupon_code=$coupon_code;
		$order->coupon_amount=$coupon_amount;
		$order->payment_method=$data['paymentMethod'];
		$order->grand_total=$data['grand_total'];
		$order->save();
		
		$order_id=DB::getPdo()->lastinsertID();
		$cartProduct=DB::table('carts')->where(['users_email'=>$user_email])->get();
		Session::put('grand_total',$data['grand_total']);
		Session::put('order_id',$order_id);
		foreach($cartProduct as $pro)
		{
			$cartpro=new OrdersProducts;
			$cartpro->order_id=$order_id;
		    $cartpro->user_id=$user_id;
		    $cartpro->product_id=$order_id;
			$cartpro->product_name=$pro->product_name;
		    $cartpro->product_code=$pro->product_code;
		    $cartpro->product_color=$pro->product_color;
		    $cartpro->product_size=$pro->product_size;
		    $cartpro->product_price=$pro->price;
		    $cartpro->product_qty=$pro->quantity;
			$cartpro->save();
		
		}
		if($data['paymentMethod']=='cod')
		{
			return redirect('/thankyou');
		}
		else
		{
			return redirect('/stripe');
		}
		
	  }	  

    }
	
	public function stripe(Request $request)
	{
		// Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51Hx4FCCOvMS2wKPpAOUPWLfMA8G3ui2PXjTiF1uIw3xXGvQ6kvZSkRpBc6R12C6moc3sUYKWlX5fX5Dn4wshQlb400HIxxWrAM');
        		
		$amount = 100;
		$amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'INR',
			'description' => 'Payment From FreeShopping',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('wayshop.order.stripe')->with(compact('intent'));
	}
	
	public function afterpayment()
	{
	   echo 'Payment Has been Received';	
	}

    public function thankyou()
    {

      return view('wayshop.product.thankyou');
    }

    public function vieworder()
    {
      	 
	  $orderProduct=Orders::with('orders')->orderBy('id','DESC')->get();
	 
      	  
      //$orderProduct=OrdersProducts::get();
      return view('admin.order.view_order')->with(compact('orderProduct'));
	}

    public function vieworderdetails($id=null)
    {
      
      $orderProduct=Orders::with('orders')->where('id',$id)->orderBy('id','DESC')->get();
	  //dd($orderProduct);
      return view('admin.order.view_order_details')->with(compact('orderProduct'));
	}

    public function orderstatusupdate(Request $request)
    {
	  $data=$request->all();	
      Orders::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);
      return redirect()->back();
      

    }		

    public function viewcustomer()
    {
	  	
      $userdetails=User::where('Role','0')->get();
      //dd($userdetails);
      return view('admin.customer.view_customer')->with(compact('userdetails'));
    }

    public function	customerstatusupdate(Request $request,$id=null)
	{
			$data=$request->all();
            User::where(['id'=>$data['id']])->update(['status'=>$data['status']]);
		
	}
	
	public function deletecustomer($id=null)
	{
		User::where(['id'=>$id])->delete();
	  return redirect()->back()->with('flash_message_success','customer has been deleted!');
		
	}
	
	public function invoiceorder($id=null)
	{
		//dd($id);
		//$userdetails=User::where('id',$id)->get();
       //dd($userdetails);
		return view('admin.order.invoice_order');
		
	}
}
