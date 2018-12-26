<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;

class HomeController extends Controller{
   public function index(){
   		$data = array();
   		$data['title']    = 'Home';
   		$data['sliders'] = DB::table('tbl_slider')->where('slider_status', 1)->orderby('slider_id','DESC')->limit(5)->get();
   		$data['products'] = DB::table('tbl_products')->where('product_status',1)
						  ->join('category', 'tbl_products.product_category', '=', 'category.category_id')
						  ->join('tbl_brand', 'tbl_products.product_brand', '=', 'tbl_brand.brand_id')
						  ->limit(9)->orderby('product_id','DESC')->get();
   		return view('pages.home',$data);
   }
   public function ProducByCategory($category_id){
   		$data = array();
   		$data['products'] = DB::table('tbl_products')->where('product_status',1)->where('product_category',$category_id)
   							->join('category', 'tbl_products.product_category', '=', 'category.category_id')
						    ->join('tbl_brand', 'tbl_products.product_brand', '=', 'tbl_brand.brand_id')
						    ->limit(9)->orderby('product_id','DESC')->get();
		$category = DB::table('category')->where('category_id',$category_id)->first();
		$data['title'] = $category->category_name;
		return view('pages.category_product',$data);
   }
   public function ProducByBrand($brand_id){
   		$data = array();
   		$data['brand_products'] = DB::table('tbl_products')->where('product_status',1)->where('product_brand',$brand_id)
   							  ->join('category', 'tbl_products.product_category', '=', 'category.category_id')
							  ->join('tbl_brand', 'tbl_products.product_brand', '=', 'tbl_brand.brand_id')
							  ->limit(9)->orderby('product_id','DESC')->get();
		$brand = DB::table('tbl_brand')->where('brand_id',$brand_id)->first();
		$data['title'] = $brand->brand_name;
		return view('pages.brand_product',$data);
   }
   public function ViewProduct($product_id){
   		$data = array();
   		$data['product'] = DB::table('tbl_products')->where('product_id',$product_id)
   							  ->join('category', 'tbl_products.product_category', '=', 'category.category_id')
							  ->join('tbl_brand', 'tbl_products.product_brand', '=', 'tbl_brand.brand_id')
							  ->first();
		$data['title'] = $data['product']->product_name;
		return view('pages.view_product',$data);
   }
}
