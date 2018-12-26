@extends('layout')

@section('content')

	<div class="col-sm-9 padding-right">
		<div class="features_items"><!--features_items-->
			<h2 class="title text-center">Product of <?php echo $title; ?> Brand</h2>
			<?php foreach ($brand_products as $product) { ?>
			<div class="col-sm-4">
				<div class="product-image-wrapper">
					<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{URL::to($product->product_image)}}" alt="{{$product->product_name}}" />
								<h2>${{$product->product_price}}</h2>
								<p>{{$product->product_name}}</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
							</div>
							<div class="product-overlay">
								<div class="overlay-content">
									<h2>${{$product->product_price}}</h2>
									<p><a href="{{URL::to('/view-product/'.$product->product_id)}}">{{$product->product_name}}</a></p>
									<a href="{{URL::to('/view-product/'.$product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
							</div>
					</div>
					<div class="choose">
						<ul class="nav nav-pills nav-justified">
							<li><a href="{{URL::to('/brand-product/'.$product->product_brand)}}"><i class="fa fa-plus-square"></i>{{$product->brand_name}}</a></li>
							<li><a href="{{URL::to('/view-product/'.$product->product_id)}}"><i class="fa fa-plus-square"></i>View Product</a></li>
						</ul>
					</div>
				</div>
			</div>
			<?php } ?>
			
		</div><!--features_items-->
	</div>

@endsection