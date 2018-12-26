@extends('admin_layout')

@section('admin_content')
<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{URL::to('/dashboard')}}">Home</a>
			<i class="icon-angle-right"></i> 
		</li>
		<li>
			<i class="icon-edit"></i>
			<a>View Order</a>
		</li>
	</ul>

<!-- Customer Details Table -->
	<div class="row-fluid sortable">
		<div class="box span6">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon edit"></i><span class="break"></span>Customer Details</h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered ">
				  <thead>
					  <tr>
						  <th> Name</th>
						  <th> Email</th>
						  <th> Cell No</th>
					  </tr>
				  </thead>   
				  <tbody>
				  	
					<tr>
						<td class="center">{{$order->customer_name}}</td>
						<td class="center">{{$order->customer_email}}</td>
						<td class="center">{{$order->customer_cell_no}}</td>
				  </tbody>
			  </table>            
			</div>
		</div><!--/span-->

<!-- Shipping Details Table -->

		<div class="box span6">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon edit"></i><span class="break"></span>Shipping Details</h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered ">
				  <thead>
					  <tr>
						  <th>Name</th>
						  <th>Email</th>
						  <th>Contact</th>
						  <th>Address</th>
					  </tr>
				  </thead>   
				  <tbody>
					<tr>
						<td class="center">{{$order->shipping_first_name.' '.$order->shipping_last_name}}</td>
						<td class="center">{{$order->shipping_email}}</td>
						<td class="center">{{$order->shipping_contact_no}}</td>
						<td class="center">{{$order->shipping_address}}</td>
					</tr>
				  </tbody>
			  </table>            
			</div>
		</div><!--/span-->

<!-- Order Details Table -->

		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon edit"></i><span class="break"></span>Order Details</h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered ">
				  <thead>
					  <tr>
						  <th>Sl No </th>
						  <th>Product Name</th>
						  <th>Product Quantity</th>
						  <th>Product Price</th>
						  <th>Product Subtotal</th>
					  </tr>
				  </thead>   
				  <tbody>
				  	<?php
				  		$sl = 0;
				  		foreach ($order_detail as $value) { $sl++;
				  	?>
					<tr>
						<td class="center">{{$sl}}</td>
						<td class="center">{{$value->product_name}}</td>
						<td class="center">{{$value->product_sales_quantity}}</td>
						<td class="center">{{$value->product_price}}</td>
						<td class="center">= {{$value->product_price * $value->product_sales_quantity}}</td>
					</tr>
					<?php } ?>
					
					<tr>
						<td class="center" colspan="4">Total With 1.5% Vat : </td>
						<td class="center">= {{$order->order_total}}</td>
					</tr>
				  </tbody>
			  </table>            
			</div>
		</div><!--/span-->

	</div><!--/row-->
@endsection