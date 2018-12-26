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
					<a>Add Products</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Create New Product</h2>
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
						<form class="form-horizontal" action="{{url('/save-product')}}" method="post" enctype="multipart/form-data">
							@csrf
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="date01">Product Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_name" placeholder="Enter Product Name" required="">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="fileInput">Product Image</label>
							  <div class="controls">
								<div class="uploader" id="uniform-fileInput">
									<input class="input-file uniform_on" name="product_image" id="fileInput" type="file" required=""><span class="filename" style="user-select: none;">No file selected</span><span class="action" style="user-select: none;">Choose File</span>
								</div>
							  </div>
							</div>
							<div class="control-group">
								<label class="control-label" for="selectError3">Product Category</label>
								<div class="controls">
								  <select id="selectError3" name="product_category" required="">
									<option value="">Select Category</option>
									@foreach($categories as $category)
									<option value="{{$category->category_id}}">{{$category->category_name}}</option>
									@endforeach
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="selectError3">Product Brand</label>
								<div class="controls">
								  <select id="selectError3" name="product_brand" required="">
									<option value="">Select Brand</option>
									@foreach($brands as $brand)
									<option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
									@endforeach
								  </select>
								</div>
							  </div>
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Short Description</label>
							  <div class="controls">
								<textarea style="width: 320px" rows="3" cols="50" name="product_short_desc" placeholder=" Product Short Description" required=""></textarea>
							  </div>
							</div>
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Long Description</label>
							  <div class="controls">
								<textarea style="width: 400px" rows="4" cols="50" name="product_long_desc" placeholder="Product long Description" required=""></textarea>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">Product Price</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_price" placeholder="Enter Product Price" required="">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">Product Size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_size" placeholder="Enter Product Size">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">Product Color</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_color" placeholder="Enter Product Color">
							  </div>
							</div>
							<div class="control-group">
								<label class="control-label">Publication Status</label>
								<div class="controls">
								  <label class="checkbox inline">
									<div class="checker" id="uniform-inlineCheckbox1"><span class="">
										<input type="checkbox" id="inlineCheckbox1" name="product_status" value="1"></span></div>
								  </label>
								</div>
						    </div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save Product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection