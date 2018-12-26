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
					<a>All Slider</a>
				</li>
			</ul>
		

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>All Slider</h2>
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
								  <th>Slider Title</th>
								  <th>Slider Image</th>
								  <th>Slider Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php $sl = 1; ?>
						  	@foreach($sliders as $slider)
						  	
							<tr>
								<td class="center">{{$sl++}}</td>
								<td class="center">{{$slider->slider_title}}</td>
								<td class="center"><img style="height: 80px;" src="{{url($slider->slider_image)}}" alt="{{$slider->slider_title}}"></td>
							
								<td class="center">
									@if($slider->slider_status == 1)
									<a href="{{URL::to('/unactive-slider/'.$slider->slider_id)}}"><span class="label label-success">Published</span></a>
									@elseif($slider->slider_status == 0)
									<a href="{{URL::to('/active-slider/'.$slider->slider_id)}}"><span class="label label-danger">Un-Published</span></a>
									@endif
								</td>
								<td class="center">
									<a class="btn btn-danger btn-small" href="{{URL::to('/delete-slider/'.$slider->slider_id)}}" onclick="return confirm('Are you sure??')">
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