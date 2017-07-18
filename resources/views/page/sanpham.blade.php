@extends('master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="home">Trang Chủ</a> / <a href="category/{{$product->product_type->id}}"><span>{{$product->product_type->name}}</span> / <a href="product/{{$product->id}}">{{$product->name}}</a>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">
		<div class="row">
			<div class="col-sm-9">

				<div class="row">
					<div class="col-sm-4">
						<img src="upload/product/{{$product->image}}" alt="{{$product->name}}">
					</div>
					<div class="col-sm-8">
						<div class="single-item-body">
							<p class="single-item-title pro-title">{{$product->name}}</p>
							@if($product->promotion_price == 0)
								<p class="single-item-price"><span>{{$product->unit_price}} VNĐ</span></p>
							@endif
							@if($product->promotion_price > 0)
								<p class="single-item-price">
									<span class="flash-del">{{$product->unit_price}} VNĐ</span>
									<span class="flash-sale">{{$product->promotion_price}} VNĐ</span>
								</p>
							@endif
						</div>

						<div class="clearfix"></div>
						<div class="space10">&nbsp;</div>

						<div class="single-item-desc">
							<p>{{$product->description}}</p>
						</div>
						<div class="space20">&nbsp;</div>

						<div class="single-item-options">
							<select class="wc-select" name="color">
								@for($i=1;$i<=10;$i++)
								<option value="{{$i}}">{{$i}} {{$product->unit}}</option>
								@endfor
							</select>
							<a class="add-to-cart" href="addcart/{{$product->id}}"><i class="fa fa-shopping-cart"></i></a>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="space40">&nbsp;</div>
				<div class="woocommerce-tabs">
					<ul class="tabs">
						<li><a href="#tab-description">Mô Tả</a></li>
						<li><a href="#tab-reviews">Bình Luận</a></li>
					</ul>

					<div class="panel" id="tab-description">{!!$product->content!!}</div>
					<div class="panel" id="tab-reviews">
						<p><div class="fb-comments" data-href="{{URL::full()}}" width='100%' data-numposts="5"></div></p>
					</div>
				</div>
				<div class="space50">&nbsp;</div>
				<div class="beta-products-list">
					<h4>Sản Phẩm Cùng Loại</h4>
					<div class="space10">&nbsp;</div>
					<div class="row">
					@foreach($same_pro as $row_same)
						<div class="col-sm-4">
							<div class="single-item">
								<div class="single-item-header">
									<a href="product/{{$row_same->id}}"><img src="upload/product/{{$row_same->image}}" 
									alt="{{$row_same->name}}"></a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title">{{$row_same->name}}</p>
									@if($row_same->promotion_price == 0)
										<p class="single-item-price"><span>{{$row_same->unit_price}} VNĐ</span></p>
									@endif
									@if($row_same->promotion_price > 0)
										<p class="single-item-price">
											<span class="flash-del">{{$row_same->unit_price}} VNĐ</span>
											<span class="flash-sale">{{$row_same->promotion_price}} VNĐ</span>
										</p>
									@endif
								</div>
								<div class="single-item-caption">
									<a class="add-to-cart pull-left" href="addcart/{{$row_same->id}}"><i class="fa fa-shopping-cart"></i></a>
									<a class="beta-btn primary" href="product.html">Chi Tiết<i class="fa fa-chevron-right"></i></a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					@endforeach
					</div>
				</div> <!-- .beta-products-list -->
			</div>
			<div class="col-sm-3 aside">
				<div class="widget">
					<h3 class="widget-title">Sản Phẩm Bán Chạy</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
						@foreach($best_seller as $row_seller)
							<div class="media beta-sales-item">
								<a class="pull-left" href="product/{{$row_seller->id}}"><img src="upload/product/{{$row_seller->image}}" alt=""></a>
								<div class="media-body">
									<a class="pull-left" href="product/{{$row_seller->id}}">{{$row_seller->name}}</a>
									@if($row_seller->promotion_price == 0)
										<div class="beta-sales-price">{{$row_seller->unit_price}} VNĐ</div>
									@endif
									@if($row_seller->promotion_price > 0)
										<div class="beta-unit-price">{{$row_seller->unit_price}} VNĐ</div>
										<div class="beta-sales-price">{{$row_seller->promotion_price}} VNĐ</div>
									@endif
								</div>
							</div>
						@endforeach
						</div>
					</div>
				</div> <!-- best sellers widget -->
				<div class="widget">
					<h3 class="widget-title">Sản Phẩm Mới</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
						@foreach($new_pro as $row_new)
							<div class="media beta-sales-item">
								<a class="pull-left" href="product/{{$row_new->id}}"><img src="upload/product/{{$row_new->image}}" alt="{{$row_new->name}}"></a>
								<div class="media-body">
									<a class="pull-left" href="product/{{$row_new->id}}">{{$row_new->name}}</a>
									@if($row_new->promotion_price == 0)
										<div class="beta-sales-price">{{$row_new->unit_price}} VNĐ</div>
									@endif
									@if($row_new->promotion_price > 0)
										<div class="beta-unit-price">{{$row_new->unit_price}} VNĐ</div>
										<div class="beta-sales-price">{{$row_new->promotion_price}} VNĐ</div>
									@endif
								</div>
							</div>
						@endforeach
						</div>
					</div>
				</div> <!-- best sellers widget -->
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection