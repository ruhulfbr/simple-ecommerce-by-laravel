<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Session;
use DB;
session_start();

class Category extends Controller{
    public function AddCategory(){
    	$data = array();
        $data['title'] = 'Add Category';
    	return view('admin.add_category',$data);
    }
    public function AllCategory(){
    	$data = array();
        $data['title'] = 'All Category';
        /*$data['all_category'] = DB::table('category')->get();*/
        $category_info = DB::table('category')->get();;
        $manage_category = view('admin.all_category',$data)->with('category_info',$category_info);

        return view('admin_layout')->with('admin.all_category',$manage_category)->with('title', 'All Category');
    	/*return view('admin.all_category',$data);*/
    }
    public function SaveCategory(Request $request){
    	$this->validate($request,[
    		'category_name' => 'required|unique:category',
    		'category_description' => 'required',
    	]);

    	$data = array();
    	$data['category_name'] = $request->category_name;
    	$data['category_description'] = $request->category_description;
    	$data['publication_status'] = $request->publication_status;

    	$insert  = DB::table('category')->insert($data);

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
    public function unactive_category($category_id){
        $update = DB::table('category')
                  ->where('category_id',$category_id)
                  ->update(['publication_status'=>0]);

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
        public function active_category($category_id){
        $update = DB::table('category')
                  ->where('category_id',$category_id)
                  ->update(['publication_status'=>1]);

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
    public function EditCategory($category_id){
        $data = array();
        $data['title'] = 'Edit Category';
        $data['category'] = DB::table('category')->where('category_id',$category_id)->first();
        return view('admin.edit_category',$data);
    }
     public function UpdateCategory(Request $request){
        $category_id = $request->category_id;
        $this->validate($request,[
            'category_name' => 'required',
            'category_description' => 'required',
        ]);

        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;

        $update  = DB::table('category')->where('category_id',$category_id)->update($data);

        if($update){
            $notification = array();
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Sucessfully Updated';
            return Redirect::to('/all-category')->with($notification);
        }else{
            $notification = array();
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Error Updating';
            return Redirect::to('/edit-category/'.$category_id)->with($notification);
        }

    }
    public function DeleteCategory($category_id){
        $delete  = DB::table('category')->where('category_id',$category_id)->delete();

        if($delete){
            $notification = array();
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Sucessfully Deleted';
            return Redirect::to('/all-category')->with($notification);
        }else{
            $notification = array();
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Error Deleting';
            return Redirect::to('/all-category')->with($notification);
        }
    }
   
}
