<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Session;
use DB;
session_start();

class Product extends Controller{

	public function index(){
		$data = array();
		$data['title']    = 'All Product';
		$data['products'] = DB::table('tbl_products')
							->join('category', 'tbl_products.product_category', '=', 'category.category_id')
							->join('tbl_brand', 'tbl_products.product_brand', '=','tbl_brand.brand_id')
							->orderby('product_id','ASC')->get();
		return view('admin.all_product')->with($data);
	}
	public function AddProduct(){
		$data               = array();
		$data['title']      = 'Add Product';
		$data['brands']     = DB::table('tbl_brand')->where('publication_status',1)->get();
		$data['categories'] = DB::table('category')->where('publication_status',1)->get();
		return view('admin.add_product')->with($data);
	}
    
//     public function saveFile(Request $request){
//         $image = $request->file('image_file');
//         if($image){
//             $image_name = str_random(20);
//             $ext = strtolower($image->getClientOriginalExtension());
//             $img = Image::make($image->getRealPath())->resize(300, 200);

//             $image_fullname = $image_name.'.'.$ext;
//             $path = 'public/image/sized/';
//             $image_url = $path.$image_fullname;
//             $img->save($image_url);


//             $path2 = 'public/image/';
//             $success = $image->move($path2,$image_fullname);


//             if($success){
//                 return "successFully uploaded";
//             }else{
//                 return "Not Success";
//             }
//         }else{
//             return "Uploading Problem";
//         }
//     }
    
    
    
	public function SaveProduct(Request $request){
		$this->validate($request,[
			'product_name'       => 'required',
			'product_category'   => 'required',
			'product_brand'      => 'required',
			'product_image'      => 'required',
			'product_price'      => 'required',
			'product_short_desc' => 'required',
			'product_long_desc'  => 'required'
		]);
		$data = array();
		$data['product_name'] = $request->product_name;
		$data['product_category'] = $request->product_category;
		$data['product_brand'] = $request->product_brand;
		$data['product_short_desc'] = $request->product_short_desc;
		$data['product_long_desc'] = $request->product_long_desc;
		$data['product_price'] = $request->product_price;
		$data['product_size'] = $request->product_size;
		$data['product_color'] = $request->product_color;
		$data['product_status'] = $request->product_status;

		$image = $request->file('product_image');
		if($image){
			$image_name = str_random(20);
			$ext = strtolower($image->getClientOriginalExtension());
			$image_fullname = $image_name.'.'.$ext;
			$path = 'public/images/products/';
			$image_url = $path.$image_fullname;
			$success = $image->move($path,$image_fullname);
			if($success){
				$data['product_image'] = $image_url;
			}
		}
		$insert = DB::table('tbl_products')->insert($data);

		if($insert){
			$feadback = array();
			$feadback['alert-type'] = 'success';
			$feadback['message'] = 'Save Product Successfull';
			return Redirect()->back()->with($feadback);
		}else{
			$feadback = array();
			$feadback['alert-type'] = 'error';
			$feadback['message'] = 'Error Saving';
			return Redirect()->back()->with($feadback);
		}
	}
	public function UnactiveProduct($product_id){
		$unactive = DB::table('tbl_products')->where('product_id',$product_id)
					->update(['product_status'=>0]);

		if($unactive){
			$feadback = array();
			$feadback['alert-type'] = 'success';
			$feadback['message'] = 'Successfull Unpublished';
			return Redirect::to('/all-product')->with($feadback);
		}else{
			$feadback = array();
			$feadback['alert-type'] = 'error';
			$feadback['message'] = 'Error Unpublished';
			return Redirect::to('/all-product')->with($feadback);
		}
	}
	public function ActiveProduct($product_id){
		$active = DB::table('tbl_products')->where('product_id',$product_id)
					->update(['product_status'=>1]);

		if($active){
			$feadback = array();
			$feadback['alert-type'] = 'success';
			$feadback['message'] = 'Successfully Publish';
			return Redirect::to('/all-product')->with($feadback);
		}else{
			$feadback = array();
			$feadback['alert-type'] = 'error';
			$feadback['message'] = 'Error Publish';
			return Redirect::to('/all-product')->with($feadback);
		}
	}
	public function EditProduct($product_id){
		$data = array();
		$data['title'] = 'Edit Product';
		$data['brands']     = DB::table('tbl_brand')->where('publication_status',1)->get();
		$data['categories'] = DB::table('category')->where('publication_status',1)->get();
		$data['product'] = DB::table('tbl_products')->where('product_id',$product_id)->first();
		return view('admin.edit_product',$data);
	}
	public function UpdateProduct(Request $request,$product_id){
		$this->validate($request,[
			'product_name'       => 'required',
			'product_category'   => 'required',
			'product_brand'      => 'required',
			'product_price'      => 'required',
			'product_short_desc' => 'required',
			'product_long_desc'  => 'required'
		]);
		$data = array();
		$data['product_name'] = $request->product_name;
		$data['product_category'] = $request->product_category;
		$data['product_brand'] = $request->product_brand;
		$data['product_short_desc'] = $request->product_short_desc;
		$data['product_long_desc'] = $request->product_long_desc;
		$data['product_price'] = $request->product_price;
		$data['product_size'] = $request->product_size;
		$data['product_color'] = $request->product_color;
		if($request->product_status){
			$data['product_status'] = $request->product_status;
		}else{
			$data['product_status'] = 0;
		}
		

		$image = $request->file('product_image');
		if($image){

			$old_product = DB::table('tbl_products')->where('product_id',$product_id)->first();
			$product_image = $old_product->product_image;
			 if($product_image){
			 	 if(file_exists($product_image)){
			 	 	unlink($product_image);
			 	 }
			 }

			$image_name = str_random(20);
			$ext = strtolower($image->getClientOriginalExtension());
			$image_fullname = $image_name.'.'.$ext;
			$path = 'public/images/products/';
			$image_url = $path.$image_fullname;
			$success = $image->move($path,$image_fullname);
			if($success){
				$data['product_image'] = $image_url;
			}
		}
		$update = DB::table('tbl_products')->where('product_id',$product_id)->update($data);

		if($update){
			$feadback = array();
			$feadback['alert-type'] = 'success';
			$feadback['message'] = 'Update Product Successfull';
			return Redirect::to('/all-product')->with($feadback);
		}else{
			$feadback = array();
			$feadback['alert-type'] = 'error';
			$feadback['message'] = 'Error Updating';
			return Redirect()->back()->with($feadback);
		}
	}
	public function DeleteProduct($product_id){
		$old_product = DB::table('tbl_products')->where('product_id',$product_id)->first();
		$product_image = $old_product->product_image;
		 if($product_image){
		 	 if(file_exists($product_image)){
		 	 	unlink($product_image);
		 	 }
		 }
		 $delete = $old_product = DB::table('tbl_products')->where('product_id',$product_id)->delete();
		 if($delete){
		 	$feadback = array();
			$feadback['alert-type'] = 'success';
			$feadback['message'] = 'Successfully Deleted';
			return Redirect::to('/all-product')->with($feadback);
		}else{
			$feadback = array();
			$feadback['alert-type'] = 'error';
			$feadback['message'] = 'Error Deleting';
			return Redirect::to('/all-product')->with($feadback);
		}
	}
}

