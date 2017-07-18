@extends('master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="index.html">Home</a> / <span>Tìm kiếm</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="row">
				<div class="col-sm-3">
					<ul class="aside-menu">
					@foreach($menu as $row_menu)
						<li><a href="category/{{$row_menu->id}}">{{$row_menu->name}}</a></li>
					@endforeach
					</ul>
				</div>
				<div class="col-sm-9">
					<div class="beta-products-list">
						<h4>Tìm Kiếm</h4>
						<div class="beta-products-details">
							<p class="pull-left">Có {{count($product)}} sản phẩm với từ khóa {{$tukhoa}}</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($product as $pro)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="product/{{$pro->id}}"><img src="upload/product/{{$pro->image}}" alt="{{$pro->name}}"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$pro->name}}</p>
										@if($pro->promotion_price == 0)
											<p class="single-item-price"><span>{{number_format($pro->unit_price)}} VNĐ</span></p>
										@endif
										@if($pro->promotion_price > 0)
											<p class="single-item-price">
												<span class="flash-del">{{number_format($pro->unit_price)}} VNĐ</span>
												<span class="flash-sale">{{number_format($pro->promotion_price)}} VNĐ</span>
											</p>
										@endif
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="addcart/{{$pro->id}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product/{{$pro->id}}">Chi Tiết<i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<!-- Phân trang của loại sản phẩm -->
						
						<!-- end phân trang -->

					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection