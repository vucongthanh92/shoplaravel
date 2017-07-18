@extends('master')
@section('content')
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4>Sản Phẩm Mới</h4>
						<div class="beta-products-details">
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($newproduct as $row_news)
							<div class="col-sm-3">
								<div class="single-item">
									<div class="single-item-header">
										<a href="product/{{$row_news->id}}"><img src="upload/product/{{$row_news->image}}" alt="{{$row_news->name}}"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$row_news->name}}</p>
										@if($row_news->promotion_price == 0)
											<p class="single-item-price"><span>{{number_format($row_news->unit_price)}} VNĐ</span>
											</p>
										@endif
										@if($row_news->promotion_price > 0)
											<p class="single-item-price">
												<span class="flash-del">{{number_format($row_news->unit_price)}} VNĐ</span>
												<span class="flash-sale">{{number_format($row_news->promotion_price)}} VNĐ</span>
											</p>
										@endif
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="addcart/{{$row_news->id}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product/{{$row_news->id}}">Chi Tiết<i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<h4>Sản Phẩm Khuyến Mãi</h4>
						<div class="beta-products-details">
							<div class="clearfix"></div>
						</div>
						<div class="row">
							@foreach($topproduct as $row_top)
							<div class="col-sm-3">
								<div class="single-item">
									<div class="single-item-header">
										<a href="product/{{$row_top->id}}"><img src="upload/product/{{$row_top->image}}" alt="{{$row_top->name}}"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$row_top->name}}</p>
										<p class="single-item-price">
											<span class="flash-del">{{number_format($row_top->unit_price)}} VNĐ</span>
											<span class="flash-sale">{{number_format($row_top->promotion_price)}} VNĐ</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="addcart/{{$row_top->id}}">
											<i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product/{{$row_top->id}}">Chi Tiết
											<i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->
		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection