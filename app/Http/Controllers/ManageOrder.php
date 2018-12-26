<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Session;
use DB;
session_start();

class ManageOrder extends Controller{

	public function index(){
		$data = array();
		$data['title'] = 'Manage Order';
		$data['orders'] = DB::table('tbl_order')
						  ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
						  ->select('tbl_order.*','tbl_customer.customer_name')
						  ->get();
		return view('admin.manage_order',$data);
	}
	public function CompleteOrder($order_id){
		$update = DB::table('tbl_order')->where('order_id',$order_id)->update(['order_status'=>1]);

		if($update){
    		$notification = array();
    		$notification['alert-type'] = 'success';
    		$notification['message'] = 'Sucessfully Completed';
    		return Redirect()->back()->with($notification);
    	}else{
    		$notification = array();
    		$notification['alert-type'] = 'error';
    		$notification['message'] = 'Error';
    		return Redirect()->back()->with($notification);
    	}
	}

	public function ViewOrder($order_id){
		$data = array();
		$data['title'] = 'View Order';
		$data['order'] = DB::table('tbl_order')
						->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
						->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shiping_id')
						->select('tbl_order.*','tbl_customer.*','tbl_shipping.*')
						->first();
		$data['order_detail'] = DB::table('tbl_order_detail')->where('order_id',$order_id)->get();
		return view('admin.view_order',$data);
	}

	public function DeleteOrder($order_id){
		$order = DB::table('tbl_order')->where('order_id',$order_id)->first();
		$payment_id = $order->payment_id;
		$shipping_id = $order->shipping_id;

		DB::table('tbl_payment')->where('payment_id',$payment_id)->delete();
		DB::table('tbl_shipping')->where('shiping_id',$shipping_id)->delete();
		$delete = DB::table('tbl_order')->where('order_id',$order_id)->delete();
		if($delete){
    		$notification = array();
    		$notification['alert-type'] = 'successfully Deleted';
    		$notification['message'] = 'Sucessfully Completed';
    		return Redirect()->back()->with($notification);
    	}else{
    		$notification = array();
    		$notification['alert-type'] = 'error';
    		$notification['message'] = 'Error Deleting';
    		return Redirect()->back()->with($notification);
    	}


	}
}
