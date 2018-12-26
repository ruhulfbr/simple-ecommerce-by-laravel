@extends('layout')

@section('slider')
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<?php $sl = -1; foreach($sliders as $slider ){ $sl++; ?>
							<li data-target="#slider-carousel" data-slide-to="<?php echo $sl; ?>" class="<?php if($sl == 0){echo 'active';} ?>"></li>
							<?php } ?>
						</ol>
						
						<div class="carousel-inner">
							<?php $sl = 0; foreach($sliders as $slider ){ $sl++; ?>

							<div class="item <?php if($sl == 1){echo 'active';} ?> ">
								<img style="width: 100%" src="{{URL::to($slider->slider_image)}}" class="girl img-responsive" alt="{{$slider->slider_title}}" />
							</div>
							<?php } ?>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->

@endsection


@section('content')

	<div class="col-sm-9 padding-right">
		<div class="features_items"><!--features_items-->
			<h2 class="title text-center">Features Items</h2>
			<?php foreach ($products as $product) { ?>
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
							<li>
								<a href="{{URL::to('/brand-product/'.$product->product_brand)}}"><i class="fa fa-plus-square"></i>{{$product->brand_name}}</a>
							</li>
							<li><a href="{{URL::to('/view-product/'.$product->product_id)}}"><i class="fa fa-plus-square"></i>View Product</a></li>
						</ul>
					</div>
				</div>
			</div>
			<?php } ?>
			
		</div><!--features_items-->
		
		<div class="category-tab"><!--category-tab-->
			<div class="col-sm-12">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
					<li><a href="#blazers" data-toggle="tab">Blazers</a></li>
					<li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
					<li><a href="#kids" data-toggle="tab">Kids</a></li>
					<li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane fade active in" id="tshirt" >
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{URL::to('public/images/home/gallery1.jpg')}}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{URL::to('public/images/home/gallery2.jpg')}}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{URL::to('public/images/home/gallery3.jpg')}}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{URL::to('public/images/home/gallery4.jpg')}}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				
				<div class="tab-pane fade" id="blazers" >
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{URL::to('public/images/home/gallery4.jpg')}}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{URL::to('public/images/home/gallery3.jpg')}}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{URL::to('public/images/home/gallery2.jpg')}}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{URL::to('public/images/home/gallery1.jpg')}}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				
				<div class="tab-pane fade" id="sunglass" >
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{URL::to('public/images/home/gallery3.jpg')}}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{URL::to('public/images/home/gallery4.jpg')}}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{URL::to('public/images/home/gallery1.jpg')}}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{URL::to('public/images/home/gallery2.jpg')}}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				
				<div class="tab-pane fade" id="kids" >
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{URL::to('public/images/home/gallery1.jpg')}}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{URL::to('public/images/home/gallery2.jpg')}}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{URL::to('public/images/home/gallery3.jpg')}}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{URL::to('public/images/home/gallery4.jpg')}}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				
				<div class="tab-pane fade" id="poloshirt" >
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{URL::to('public/images/home/gallery2.jpg')}}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{URL::to('public/images/home/gallery4.jpg')}}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{URL::to('public/images/home/gallery3.jpg')}}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{URL::to('public/images/home/gallery1.jpg')}}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/category-tab-->
		
		<div class="recommended_items"><!--recommended_items-->
			<h2 class="title text-center">recommended items</h2>
			
			<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<div class="item active">	
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{URL::to('public/images/home/recommend1.jpg')}}" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{URL::to('public/images/home/recommend2.jpg')}}" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{URL::to('public/images/home/recommend3.jpg')}}" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
					</div>
					<div class="item">	
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{URL::to('public/images/home/recommend1.jpg')}}" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{URL::to('public/images/home/recommend2.jpg')}}" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{URL::to('public/images/home/recommend3.jpg')}}" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				  </a>
				  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
					<i class="fa fa-angle-right"></i>
				  </a>			
			</div>
		</div><!--/recommended_items-->
		
	</div>

@endsection