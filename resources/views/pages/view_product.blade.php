@extends('layout')

@section('content')

<div class="col-sm-9 padding-right">
	<div class="product-details"><!--product-details-->
		<div class="col-sm-5">
			<div class="view-product">
				<img src="{{URL::to($product->product_image)}}" alt="{{$product->product_name}}" />
				<h3>ZOOM</h3>
			</div>
		</div>
		<div class="col-sm-7">
			<div class="product-information"><!--/product-information-->
				<img src="images/product-details/new.jpg" class="newarrival" alt="">
				<h2>{{$product->product_name}}</h2>
				<p>Color : {{$product->product_color}}</p>
				<img src="images/product-details/rating.png" alt="">
				<span>
					<span>US ${{$product->product_price}}</span>
					
					<form method="post" action="{{url('/add-to-cart')}}">
						@csrf
						<label>Quantity:</label>
						<input type="text" value="1" name="quantity">
						<input type="hidden" name="product_id" value="{{$product->product_id}}">
						<button type="submit" class="btn btn-fefault cart">
							<i class="fa fa-shopping-cart"></i>
							Add to cart
						</button>
					</form>
					

				</span>
				<p><b>Availability:</b> In Stock</p>
				<p><b>Condition:</b> New</p>
				<p><b>Brand:</b><a href="{{URL::to('/brand-product/'.$product->product_brand)}}">{{$product->brand_name}}</a> </p>
			</div><!--/product-information-->
		</div>
	</div><!--/product-details-->
	
	<div class="category-tab shop-details-tab"><!--category-tab-->
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#reviews" data-toggle="tab">Description</a></li>
			</ul>
		</div>
		<div class="tab-content">
				
			<div class="tab-pane fade active in" id="reviews">
				<div class="col-sm-12">

					<p>{{$product->product_long_desc}}</p>
				
				</div>
			</div>
			
		</div>
	</div><!--/category-tab-->
	
	
</div>


@endsection