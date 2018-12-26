<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Session;
use DB;
session_start();

class SuperadminController extends Controller{
    public function logout(){
    	/*Session::put('admin_name', null);
    	Session::put('admin_id', null);*/
    	Session::flush();  //Better Use 
    	session::put('message','Successfully Logged Out');
    	return Redirect::to('/admin');
    }
    public function CustomerLogout(){
    	Session::flush();  //Better Use 
    	return Redirect::to('/checkout-login');
    }
}
