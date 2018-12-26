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
					<a>All Order</a>
				</li>
			</ul>
		

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>All Order</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Sl No </th>
								  <th>Customer Name</th>
								  <th>Order Total</th>
								  <th>Order Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php $sl = 1; ?>
						  	@foreach($orders as $order)
						  	
							<tr>
								<td class="center">{{$sl++}}</td>
								<td class="center">{{$order->customer_name}}</td>
								<td class="center">{{$order->order_total}}</td>
								<td class="center">
									@if($order->order_status == 1)
									<a><span class="label label-success">Completed</span></a>
									@elseif($order->order_status == 0)
									<a href="{{URL::to('/complete-order/'.$order->order_id)}}"><span class="label label-danger">Pending</span></a>
									@endif
								</td>
								<td class="center">
									<a class="btn btn-small btn-info" href="{{URL::to('/view-order/'.$order->order_id)}}">
										<i class="halflings-icon white eye"></i>  View
									</a>
									<a class="btn btn-small btn-danger" href="{{URL::to('/delete-order/'.$order->order_id)}}" onclick="return confirm('Are you sure??')">
										<i class="halflings-icon white trash"></i>  Delete
									</a>
								</td>
							</tr>
							@endforeach
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection