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
					<a>All Brand</a>
				</li>
			</ul>
		

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>All Brand</h2>
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
								  <th>Brand Name</th>
								  <th>Brand Description</th>
								  <th>publication Status Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php $sl = 1; ?>
						  	@foreach($brand_info as $brand)
						  	
							<tr>
								<td class="center">{{$sl++}}</td>
								<td class="center">{{$brand->brand_name}}</td>
								<td class="center">{{$brand->brand_description}}</td>
								<td class="center">
									@if($brand->publication_status == 1)
									<a href="{{URL::to('/unactive-brand/'.$brand->brand_id)}}"><span class="label label-success">Published</span></a>
									@elseif($brand->publication_status == 0)
									<a href="{{URL::to('/active-brand/'.$brand->brand_id)}}"><span class="label label-danger">Un-Published</span></a>
									@endif
								</td>
								<td class="center">
									<a class="btn btn-info btn-small" href="{{URL::to('/edit-brand/'.$brand->brand_id)}}">
										<i class="halflings-icon white edit"></i>  Edit
									</a>
									<a class="btn btn-danger btn-small" href="{{URL::to('/delete-brand/'.$brand->brand_id)}}" onclick="return confirm('Are you sure??')">
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