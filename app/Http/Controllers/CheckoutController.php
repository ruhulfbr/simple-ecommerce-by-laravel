<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Session;
use DB;
use Cart;
session_start();

class CheckoutController extends Controller{
	public function Checkout(){
		if(empty(Session::get('customer_id'))){
			return Redirect::to('/checkout-login');
		}
		if(!empty(Session::get('shipping_id'))){
			return Redirect::to('/payment');
		}
		$data = array();
		$data['title'] = 'Checkout';
		return view('pages.checkout',$data);
	}
	public function SaveShipping_details(Request $request){

		$this->validate($request,[
			'shipping_first_name'  =>'required',
			'shipping_last_name'   =>'required',
			'shipping_email'       =>'required',
			'shipping_address'     =>'required',
			'shipping_contact_no'  =>'required',
			'shipping_city'        =>'required'
		]);

		$data = array();
		$data['shipping_first_name'] = $request->shipping_first_name;
		$data['shipping_last_name'] = $request->shipping_last_name;
		$data['shipping_email'] = $request->shipping_email;
		$data['shipping_address'] = $request->shipping_address;
		$data['shipping_contact_no'] = $request->shipping_contact_no;
		$data['shipping_city'] = $request->shipping_city;
		$shipping_id = DB::table('tbl_shipping')->insertGetId($data);
		Session::put('shipping_id', $shipping_id);
		return Redirect::to('/payment');
	}
	public function Payment(){
		if(empty(Session::get('customer_id'))){
			return Redirect::to('/');
		}
		$data = array();
		$data['title'] = 'Payment';
		return view('pages.payment',$data);
	}
	public function OrderPlace(Request $request){
		$payment_method = $request->payment_method;
		$pdata = array();
		$pdata['payment_method'] = $payment_method;
		$pdata['payment_status'] = 0;
		$payment_id = DB::table('tbl_payment')->insertGetId($pdata);

		$odata = array();
		$odata['customer_id'] = Session::get('customer_id');
		$odata['shipping_id'] = Session::get('shipping_id');
		$odata['payment_id']  = $payment_id;
		$odata['order_total'] = Cart::getTotal();
		$odata['order_status'] = 0;
		/*echo '<pre>';
		print_r($odata);exit();*/

		$order_id = DB::table('tbl_order')->insertGetId($odata);

		$oddata = array();

		$cartCollection = Cart::getContent();
		foreach ($cartCollection as $cart) {
			$oddata['order_id'] = $order_id;
			$oddata['product_id'] = $cart->id;
			$oddata['product_name'] = $cart->name;
			$oddata['product_price'] = $cart->price;
			$oddata['product_sales_quantity'] = $cart->quantity;
			DB::table('tbl_order_detail')->insert($oddata);
		}
		Cart::clear();
		Session::put('shipping_id',null);

		if($payment_method == 'hand_cash'){
			Session::put('message', 'Payment Successfully Done by Hand Cash');
		}elseif($payment_method == 'bkash'){
			Session::put('message', 'Payment Successfully Done by bkash');
		}elseif ($payment_method == 'master_card') {
			Session::put('message', 'Payment Successfully Done by Master Card');
		}elseif ($payment_method == 'paypal') {
			Session::put('message', 'Payment Successfully Done by Paypal');
		}else{
			Session::put('message', 'Something Went Worng');
		}

		Session::put('total', $odata['order_total']);
		 return Redirect::to('/success');
	}

	public function Success(){
		if(empty(Session::get('message'))){
			return Redirect::to('/');
		}
		$data = array();
		$data['title'] = 'Success';
		return view('pages.success',$data);
	}




	public function CheckoutLogin(){
		if(!empty(Session::get('customer_id'))){
			return Redirect::to('/checkout');
		}
		$data = array();
		$data['title'] = 'Checkout Login';
		return view('pages.checkout_login',$data);
	}
	public function CustomerRegistration(Request $request){
		$this->validate($request,[
			'customer_name'=>'required|min:3',
			'customer_email'=>'required|unique:tbl_customer',
			'customer_cell_no'=>'required|min:1',
			'customer_password'=>'required|min:6'
		]);

		$data = array();
		$data['customer_name'] = $request->customer_name;
		$data['customer_email'] = $request->customer_email;
		$data['customer_cell_no'] = $request->customer_cell_no;
		$data['customer_password'] = md5($request->customer_password);

		$customer_id = DB::table('tbl_customer')->insertGetId($data);
		Session::put('customer_id',$customer_id);
		Session::put('customer_name',$data['customer_name']);

		return Redirect::to('/checkout');
	}
	public function CustomerLogin(Request $request){
		$email = $request->customer_email;
		$password = md5($request->customer_password);

		$login_check = DB::table('tbl_customer')->where('customer_email',$email )
					->where('customer_password',$password)->first();
		if(!empty($login_check)){
			Session::put('customer_name', $login_check->customer_name);
			Session::put('customer_id', $login_check->customer_id);
			return Redirect::to('/checkout');
		}else{
			Session::put('login_message', "Email or Password is Invalid <br> If you do'nt have account then plsease Registration first");
    	return Redirect::to('/checkout-login');
		}
	}

	public function CustomerLogout(){
		Session::put('customer_name', null);
    	Session::put('customer_id', null);
    	return Redirect::to('/');
    }
}
