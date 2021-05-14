<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banners;
use Image;
class BannerController extends Controller
{
    
	public function addbanner(Request $request)
	{
		if($request->isMethod('post'))
		{
          $data=$request->all();
		  $banner=new Banners();
		  $banner->name=$data['banner_name'];
          $banner->text_style=$data['banner_text-style'];
		  $banner->link=$data['banner_link'];
		  $banner->content=$data['banner_content'];
		  $banner->sort_order=$data['banner_sort-order'];
		  if($request->hasfile('banner_image')) 
		  {
            $file = $request->file('banner_image');
            $extension = $file->getClientOriginalExtension();
			$fileName=rand(600,5000).".".$extension;
			$destinationPath = public_path().'/upload/banner/' ;
            $file->move($destinationPath,$fileName);
            $banner->image = $fileName;
          }
		  $banner->save();
		  return redirect()->back()->with('flash_message_success','Banner has been add!');
		  
		}			
		return view('admin.Banner.addbanner');
	}
	
	public function viewbanner()
	{
		$bannerDetails=Banners::get();
		return view('admin.Banner.viewbanner')->with(compact('bannerDetails'));
	}
	
	public function bannerstatusupdate(Request $request,$id=null)
	{
		$data=$request->all();
		Banners::where(['id'=>$data['id']])->update(['status'=>$data['status']]);
		
	  	
	}

    public function editbanner(Request $request,$id=null)
    {
      if($request->isMethod('post'))
	  {
        $data=$request->all();
		if($request->hasfile('banner_image'))
		  {
		    $file = $request->file('banner_image');
            $extension = $file->getClientOriginalExtension();
			$fileName=rand(600,5000).".".$extension;
			$destinationPath = public_path().'/upload/banner/' ;
            $file->move($destinationPath,$fileName);
            $banner_image = $fileName;
		  }
		else
		{
           $banner_image=$data['old_image'];

		}			
		Banners::where(['id'=>$id])->update(['name'=>$data['banner_name'],'text_style'=>$data['banner_text-style'],'link'=>$data['banner_link'],'content'=>$data['banner_content'],'sort_order'=>$data['banner_sort-order'],'image'=>$banner_image]);
        return redirect()->back()->with('flash_message_success','Banner has been add!');
	  }		  
	  
	  $bannerDetails=Banners::where(['id'=>$id])->get();
      return view('admin.banner.editbanner')->with(compact('bannerDetails'));
    }
    
    public function deletebanner($id=null)
    {
	  $bannerdetails=Banners::where(['id'=>$id])->first();
      $img_path="upload/banner/";	  
	  if(file_exists($img_path.$bannerdetails->image))
	  {
        unlink($img_path.$bannerdetails->image);
       }	
      Banners::where(['id'=>$id])->delete();
	  return redirect()->back()->with('flash_message_success','Banner has been Deleted');

    }		
	
}
