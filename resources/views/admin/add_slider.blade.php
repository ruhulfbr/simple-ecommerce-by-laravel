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
					<a>Add Slider</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Create New Slider</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						 @if(count($errors)>0)
					        @foreach($errors->all() as $error)

					          <div class="alert alert danger">{{$error}}</div>
					        @endforeach
					      @endif
						<form class="form-horizontal" action="{{url('/save-slider')}}" method="post" enctype="multipart/form-data">
							@csrf
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="date01">Slider Title</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="slider_title" placeholder="Enter Slider Title" required="">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="fileInput">Slider Image</label>
							  <div class="controls">
								<div class="uploader" id="uniform-fileInput">
									<input class="input-file uniform_on" name="slider_image" id="fileInput" type="file" required=""><span class="filename" style="user-select: none;">No file selected</span><span class="action" style="user-select: none;">Choose File</span>
								</div>
							  </div>
							</div>
							<div class="control-group">
								<label class="control-label">Slider Status</label>
								<div class="controls">
								  <label class="checkbox inline">
									<div class="checker" id="uniform-inlineCheckbox1"><span class="">
										<input type="checkbox" id="inlineCheckbox1" name="slider_status" value="1"></span></div>
								  </label>
								</div>
						    </div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save Slider</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection