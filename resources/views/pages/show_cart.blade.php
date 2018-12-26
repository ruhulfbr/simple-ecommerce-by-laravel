@extends('layout')

@section('content')
	<div class="col-sm-9 padding-right">
		<section id="cart_items">
		<div class="">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Product Image</td>
							<td class="description">Product Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total Price</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						<?php
							$cartCollection = Cart::getContent();
							foreach ($cartCollection as $cart) {
						?>
						<tr>
							<td class="cart_product">
								<a href=""><img style="height: 80px;" src="{{URL::to($cart->attributes->image)}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$cart->name}}</a></h4>
								<p>Product ID: ESH0{{$cart->id}}</p>
							</td>
							<td class="cart_price">
								<p>${{$cart->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form method="post" action="{{URL::to('/update-cart')}}">
										@csrf
										<input type="hidden" name="item_id" value="{{$cart->id}}">
										<input class="cart_quantity_input" type="text" name="quantity" value="{{$cart->quantity}}" autocomplete="off" size="2" name="quantity">
										<button style="margin-top: 0px; margin-left: 2px;padding-top: 3px" class="btn btn-default update" type="submit"><i class="fa fa-check"></i></button>
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$cart->quantity * $cart->price }}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-cart-item/'.$cart->id)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php } ?>

					</tbody>
				</table>
			</div>

		</div>
		<div class="col-sm-12">
			<div class="total_area">
				<ul>
					<li>Cart Sub Total <span>$ {{Cart::getSubTotal()}}</span></li>
					<?php
						
					?>
					<li>Eco Tax <span>
						<?php
							$condition = Cart::getCondition('VAT 1.5%');
							echo $condition->getCalculatedValue(Cart::getSubTotal());
						?>
					</span></li>
					<li>Shipping Cost <span>Free</span></li>
					<li>Total <span>${{Cart::getTotal()}}</span></li>
				</ul>
					<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Check Out</a>
			</div>
		</div>
	</section>
	</div>
@endsection