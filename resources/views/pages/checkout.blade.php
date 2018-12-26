@extends('layout')

@section('content')
	<div class="col-sm-9 padding-right">
	<section id="cart_items">
		<div class="">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->
			<div class="register-req">
				<p>Please Fillup the from fro checkout</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Shipping Details</p>
							@if(count($errors)>0)
						        @foreach($errors->all() as $error)
						          <p style="color: red;">{{$error}}</p>
						        @endforeach
						    @endif
							<div class="form-one">
								<form method="post" action="{{URL::to('/save-shipping-details')}}">	
									@csrf
									<input type="text" placeholder="First Name *" name="shipping_first_name" required="">
									<input type="text" placeholder="Last Name" name="shipping_last_name" required>
									<input type="email" placeholder="Email*" name="shipping_email" required>
									<input type="text" placeholder="Address *" name="shipping_address" required>
									<input type="text" placeholder="Contact No" name="shipping_contact_no" required>
									<input type="text" placeholder="City *" name="shipping_city" required>
									<button style="width: 100%;margin-left: 0px;" type="sumbit" class="btn btn-default check_out">Order</button>
								</form>
							</div>
						</div>
					</div>					
				</div>
			</div>
			<!-- <div class="review-payment">
				<h2>Payment</h2>
			</div> -->
		</div>
	</section>
	</div>

@endsection

<!-- php artisan make:migration create_tbl_order_detail_table --create=tbl_order_detail -->




