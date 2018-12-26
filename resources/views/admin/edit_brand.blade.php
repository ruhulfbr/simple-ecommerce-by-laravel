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
					<a>Edit Brand</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Existing Brand</h2>
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
						<form class="form-horizontal" action="{{url('/update-brand')}}" method="post">
							@csrf
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="date01">Brand Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="brand_name" placeholder="Enter Barnd Name" required="" value="{{$brand->brand_name}}">
							  </div>
							</div>
							<input type="hidden" name="brand_id" value="{{$brand->brand_id}}">
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Brand Description</label>
							  <div class="controls">
								<textarea style="width: 270px" rows="3" cols="50" name="brand_description" placeholder="Description" required="">{{$brand->brand_description}}</textarea>
							  </div>
							</div>
							<div class="control-group">
								<label class="control-label">Publication Status</label>
								<div class="controls">
								  <label class="checkbox inline">
									<div class="checker" id="uniform-inlineCheckbox1"><span class="">
										<input type="checkbox" id="inlineCheckbox1" name="publication_status" value="1" @if($brand->publication_status==1) checked @endif></span></div>
								  </label>
								</div>
						    </div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update Brand</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection