<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Session;
use DB;
session_start();

class Brand extends Controller{
	public function index(){
		$data = array();
		$data['title'] = 'All Barnd';
		$data['brand_info'] = DB::table('tbl_brand')->get();
		return view('admin.all_brand',$data);
	}
	public function AddBrand(){
		$data = array();
		$data['title'] = 'Add Brand';
		return view('admin.add_brand',$data);
	}
	public function SaveBrand(Request $request){
    	$this->validate($request,[
    		'brand_name' => 'required|unique:tbl_brand',
    		'brand_description' => 'required',
    	]);

    	$data = array();
    	$data['brand_name'] = $request->brand_name;
    	$data['brand_description'] = $request->brand_description;
    	$data['publication_status'] = $request->publication_status;

    	$insert  = DB::table('tbl_brand')->insert($data);

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
    public function unactive_brand($brand_id){
        $update = DB::table('tbl_brand')->where('brand_id', $brand_id)->update(['publication_status'=>0]);
        if($update){
            $notification = array();
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Sucessfully Unpublish';
            return Redirect()->back()->with($notification);
        }else{
            $notification = array();
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Error';
            return Redirect()->back()->with($notification);
        }
    }
    public function active_brand($brand_id){
        $update = DB::table('tbl_brand')->where('brand_id', $brand_id)->update(['publication_status'=>1]);
        if($update){
            $notification = array();
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Sucessfully Publish';
            return Redirect()->back()->with($notification);
        }else{
            $notification = array();
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Error Publishing';
            return Redirect()->back()->with($notification);
        }
    }
    public function EditBrand($brand_id){
        $data = array();
        $data['title'] = 'Edit Brand';
        $data['brand'] = DB::table('tbl_brand')->where('brand_id',$brand_id)->first();
        return view('admin.edit_brand',$data);
    }
    public function UpdateBrand(Request $request){
        $brand_id = $request->brand_id;
        $this->validate($request,[
            'brand_name' => 'required',
            'brand_description' => 'required',
        ]);

        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_description'] = $request->brand_description;
        $data['publication_status'] = $request->publication_status;

        $update  = DB::table('tbl_brand')->where('brand_id',$brand_id)->update($data);

        if($update){
            $notification = array();
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Sucessfully Updated';
            return Redirect::to('/all-brand')->with($notification);
        }else{
            $notification = array();
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Error Updating';
            return Redirect::to('/edit-brand/'.$brand_id)->with($notification);
        }
    }
    public function DeleteBrand($brand_id){
        $delete = DB::table('tbl_brand')->where('brand_id',$brand_id)->delete();

        if($delete){
            $notification = array();
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Sucessfully Deleted';
            return Redirect()->back()->with($notification);
        }else{
            $notification = array();
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Error Deleting';
             return Redirect()->back()->with($notification);
        }
    }

}
