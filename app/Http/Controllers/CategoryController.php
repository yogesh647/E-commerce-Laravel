<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Categories;
class CategoryController extends Controller
{
    //
	public function add_category(Request $request)
	{
		if($request->isMethod('post'))
		{ 
         $data=$request->all();
		 $category=new Categories;
         $category->name=$data['category_name'];
		 $category->parent_id=$data['parent_id'];
		 $category->url=$data['category_url'];
		 $category->description=$data['category_description'];
		 $category->save();
		 return redirect('/admin/add_categories')->with('flash_message_success','category has been add');
        }
        $level=Categories::where(['parent_id'=>0])->get();		
		return view('admin.category.add_categories')->with(compact('level'));
		
	}
    
    public function view_category(Request $request)
    {

      $categoryDetails=Categories::get();
      return view('admin.category.view_categories')->with(compact('categoryDetails'));
	}
    
    public function edit_category(Request $request,$id=null)
    {
      if($request->isMethod('post'))
	  {
        $data=$request->all();
         $category_name=$data['category_name'];
		 $category_parent_id=$data['parent_id'];
		 $category_url=$data['category_url'];
		 $category_description=$data['category_description'];
		 Categories::where(['id'=>$id])->update(['name'=>$category_name,'parent_id'=>$category_parent_id,'url'=>$category_url,'description'=>$category_description]);
         return redirect()->back()->with('flash_message_success','category has been update!');
      }
      $level=Categories::where(['parent_id'=>0])->get();	  
      $categoryDetails=Categories::where(['id'=>$id])->first();
      return view('admin.category.edit_categories')->with(compact('categoryDetails','level'));
    }

    public function Categorystatusupdate(Request $request,$d=null)
    {
	   $data=$request->all();	
       Categories::where(['id'=>$data['id']])->update(['status'=>$data['status']]);
       
    }
    
    public function delete_category($id=null)
    {
      Categories::where(['id'=>$id])->delete();
	  return redirect()->back()->with('flash_message_success','category has been deleted!');

    }		
}
