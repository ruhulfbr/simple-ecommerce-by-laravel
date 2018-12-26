<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Cart;
use Session;
use DB;
session_start();


class CartController extends Controller{

	public function __construct(){
		$condition = new \Darryldecode\Cart\CartCondition(array(
		    'name' => 'VAT 1.5%',
		    'type' => 'tax',
		    'target' => 'total', // this condition will be applied to cart's subtotal when getSubTotal() is called.
		    'value' => '1.5%',
		    'attributes' => array( // attributes field is optional
		    	'description' => 'Value added tax',
		    	'more_data' => 'more data here'
		    )
		));
		Cart::condition($condition);
	}


    public function AddToCart(Request $request){

    	$product_id = $request->product_id;
    	$quantity = $request->quantity;
    	$product = DB::table('tbl_products')->where('product_id',$product_id)->first();

    	$data['id']= $product->product_id;
    	$data['name']= $product->product_name;
    	$data['price']= $product->product_price;
    	$data['quantity']= $quantity;
    	$data['attributes']['image']= $product->product_image;

    	Cart::add($data);
    	return Redirect::to('/show-cart');
    }
    public function ShowCart(){
    	$data  = array();
    	$data['title'] = 'Show Cart';
    	return view('pages.show_cart',$data);
    }
    public function DeleteCartItem($item_id){
    	Cart::remove($item_id);
    	return Redirect::to('/show-cart');
    }
    public function UpdateCart(Request $request){
        $page = $request->page;
    	$item_id = $request->item_id;
    	$quantity = $request->quantity;
    	if($quantity == 0){
    		Cart::remove($item_id);
            if($page=='payment'){
                return Redirect::to('/payment');
            }else{
                return Redirect::to('/show-cart');
            }
    		
    	}else{
		Cart::update($item_id, array(
			  'quantity' => array(
			      'relative' => false,
			      'value' => $quantity,
			  ),
			));
		  if($page=='payment'){
                return Redirect::to('/payment');
            }else{
                return Redirect::to('/show-cart');
            }
		}
    }
}
