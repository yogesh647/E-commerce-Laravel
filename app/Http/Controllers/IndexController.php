<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banners;
use App\Categories;
use App\Products;
class IndexController extends Controller
{
    //
	public function index(){
		
		$bannerDetails=Banners::get();
		$category=Categories::with('categories')->where(['parent_id'=>0])->get();
		$productdetails=Products::get();
		return view('wayshop.index')->with(compact('bannerDetails','category','productdetails'));
	}
	
	public function category($id=null)
	{
		$productdetails=Products::where(['category_id'=>$id])->get();
		$category=Categories::with('categories')->where(['parent_id'=>0])->get();
		$product_name=Products::where(['category_id'=>$id])->first();
		return view('wayshop.category')->with(compact('category','productdetails','product_name'));
	}
	
	public function home(){
		
		$bannerDetails=Banners::get();
		$category=Categories::with('categories')->where(['parent_id'=>0])->get();
		$productdetails=Products::get();
		return view('wayshop.index')->with(compact('bannerDetails','category','productdetails'));
	}
}
