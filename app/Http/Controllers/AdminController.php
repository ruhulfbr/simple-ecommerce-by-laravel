<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Session;
use DB;
session_start();

class AdminController extends Controller
{
    public function index(){
        if(Session::get('admin_id')){
            return Redirect::to('/dashboard');
        }
    	return view('admin_login');
    }
    public function ShowDashboard(){
        $data = array();
        $data['title'] = 'Dashboard';
    	return view('admin.dashboard',$data);
    }
    public function Dashboard(Request $request){
    	$admin_email = $request->admin_email;
    	$admin_password = md5($request->admin_password);

    	$result = DB::table('tbl_admin')
		    	->where('admin_email', $admin_email)
		    	->where('admin_password',$admin_password)
		    	->first();

		  if($result){
		  		session::put('admin_name',$result->admin_name);
		  		session::put('admin_id',$result->admin_id);
		  		return Redirect::to('/dashboard');
		  }else{
		  		session::put('message','Email or Password are Invalid');
		  		return Redirect::to('/admin');
		  }
    	
    }
}
