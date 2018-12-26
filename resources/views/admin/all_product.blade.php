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
					<a>All Products</a>
				</li>
			</ul>
		

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>All Products</h2>
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
								  <th>Product Name</th>
								  <th>Product Image</th>
								  <th>Price</th>
								  <th>Category</th>
								  <th>Brand</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php $sl = 1; ?>
						  	@foreach($products as $product)
						  	
							<tr>
								<td class="center">{{$sl++}}</td>
								<td class="center">{{$product->product_name}}</td>
								<td class="center"><img style="height: 80px;" src="{{url($product->product_image)}}" alt="{{$product->product_name}}"></td>
								<td class="center">{{$product->product_price}}</td>
								<td class="center">{{$product->category_name}}</td>
								<td class="center">{{$product->brand_name}}</td>
								<td class="center">
									@if($product->product_status == 1)
									<a href="{{URL::to('/unactive-product/'.$product->product_id)}}"><span class="label label-success">Published</span></a>
									@elseif($product->product_status == 0)
									<a href="{{URL::to('/active-product/'.$product->product_id)}}"><span class="label label-danger">Un-Published</span></a>
									@endif
								</td>
								<td class="center">
									<a class="btn btn-info btn-small" href="{{URL::to('/edit-product/'.$product->product_id)}}">
										<i class="halflings-icon white edit"></i>  Edit
									</a>
									<a class="btn btn-danger btn-small" href="{{URL::to('/delete-product/'.$product->product_id)}}" onclick="return confirm('Are you sure??')">
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