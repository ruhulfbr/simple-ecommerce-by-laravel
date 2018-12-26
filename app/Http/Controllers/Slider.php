<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Session;
use DB;
session_start();

class Slider extends Controller{
       public function AddSlider(){
    	$data = array();
        $data['title'] = 'Add Slider';
    	return view('admin.add_slider',$data);
    }
    public function AllSlider(){
    	$data = array();
        $data['title'] = 'All Slider';
        $data['sliders'] = DB::table('tbl_slider')->get();
        return view('admin.all_slider')->with($data);
    }
    public function SaveSlider(Request $request){
    	$this->validate($request,[
    		'slider_title' => 'required',
    	]);

    	$data = array();
    	$data['slider_title'] = $request->slider_title;
    	if($request->slider_status){
    		$data['slider_status'] = $request->slider_status;
    	}else{
    		$data['slider_status'] = 0;
    	}
    	
    	$image = $request->file('slider_image');
		if($image){
			$image_name = str_random(20);
			$ext = strtolower($image->getClientOriginalExtension());
			$image_fullname = $image_name.'.'.$ext;
			$path = 'public/images/slider/';
			$image_url = $path.$image_fullname;
			$success = $image->move($path,$image_fullname);
			if($success){
				$data['slider_image'] = $image_url;
			}
		}

    	$insert  = DB::table('tbl_slider')->insert($data);

    	if($insert){
    		$notification = array();
    		$notification['alert-type'] = 'success';
    		$notification['message'] = 'Sucessfully Inserted';
    		return Redirect()->back()->with($notification);
    	}else{
    		$notification = array();
    		$notification['alert-type'] = 'error';
    		$notification['message'] = 'Error Insrting';
    		return Redirect()->back()->with($notification);
    	}

    }
    public function UnactiveSlider($slider_id){
        $update = DB::table('tbl_slider')
                  ->where('slider_id',$slider_id)
                  ->update(['slider_status'=>0]);

         if($update){
            $notification = array();
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Deactive Successfull';
            return Redirect()->back()->with($notification);
        }else{
            $notification = array();
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Something Went wrong';
            return Redirect()->back()->with($notification);
        }
    }
    public function ActiveSlider($slider_id){
        $update = DB::table('tbl_slider')
                  ->where('slider_id',$slider_id)
                  ->update(['slider_status'=>1]);

         if($update){
            $notification = array();
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Active Successfull';
            return Redirect()->back()->with($notification);
        }else{
            $notification = array();
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Something Went wrong';
            return Redirect()->back()->with($notification);
        }
    }
   	public function DeleteSlider($slider_id){
		$old_slider = DB::table('tbl_slider')->where('slider_id',$slider_id)->first();
		$slider_image = $old_slider->slider_image;
		 if($slider_image){
		 	 if(file_exists($slider_image)){
		 	 	unlink($slider_image);
		 	 }
		 }
		 $delete = $old_slider = DB::table('tbl_slider')->where('slider_id',$slider_id)->delete();
		 if($delete){
		 	$feadback = array();
			$feadback['alert-type'] = 'success';
			$feadback['message'] = 'Successfully Deleted';
			return Redirect::to('/all-slider')->with($feadback);
		}else{
			$feadback = array();
			$feadback['alert-type'] = 'error';
			$feadback['message'] = 'Error Deleting';
			return Redirect::to('/all-slider')->with($feadback);
		}
	}
}
