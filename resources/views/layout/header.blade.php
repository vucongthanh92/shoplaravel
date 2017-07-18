<div id="header">
	<div class="header-top">
		<div class="container">
			<div class="pull-left auto-width-left">
				<ul class="top-menu menu-beta l-inline">
					<li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
					<li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
				</ul>
			</div>
			<div class="pull-right auto-width-right">
				<ul class="top-details menu-beta l-inline">
					@if(Auth::check())
					<li><a href="#"><i class="fa fa-user"></i>Chào {{Auth::user()->full_name}}</a></li>
					<li><a href="dangxuat">Đăng Xuất</a></li>
					@else
					<li><a href="dangky">Đăng kí</a></li>
					<li><a href="dangnhap">Đăng nhập</a></li>
					@endif
				</ul>
			</div>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .header-top -->
	<div class="header-body">
		<div class="container beta-relative">
			<div class="pull-left">
				<a href="index.html" id="logo"><img src="assets/dest/images/logo-cake.png" width="200px" alt=""></a>
			</div>
			<div class="pull-right beta-components space-left ov">
				<div class="space10">&nbsp;</div>
				<div class="beta-comp">
					<form role="search" method="post" id="searchform" action="search">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
				        <input type="text" value="" name="tukhoa" id="s" placeholder="Nhập từ khóa..." required />
				        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
					</form>
				</div>

				<div class="beta-comp">
					@if(Session::has('cart'))
					<div class="cart">
						<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng ({{Session('cart')->totalQty}}) 
						<i class="fa fa-chevron-down"></i></div>
						<div class="beta-dropdown cart-body">
							@foreach(Session('cart')->items as $product)
							<div class="cart-item">
								<a class="cart-item-delete" href="delcart/{{$product['item']['id']}}">
									<i class="fa fa-times"></i>
								</a>
								<div class="media">
									<a class="pull-left" href="product/{{$product['item']['id']}}">
										<img src="upload/product/{{$product['item']['image']}}" alt=""></a>
									<div class="media-body">
										<div class="cart-item-title">{{$product['item']['name']}}</div>
										@if($product['item']['promotion_price']>0)
											<div class="cart-item-amount">Đơn giá: <span>
											{{number_format($product['item']['promotion_price'])}} VNĐ
											</span></div>
										@else
											<div class="cart-item-amount">Đơn giá: <span>
											{{number_format($product['item']['unit_price'])}} VNĐ
											</span></div>
										@endif
										<div class="cart-item-options">Số lượng: {{$product['qty']." ".$product['item']['unit']}}</div>
									</div>
								</div>
							</div>
							@endforeach

							<div class="cart-caption">
								<div class="cart-total text-right">Tổng tiền: 
									<span class="cart-total-value">{{number_format(Session('cart')->totalPrice)." VNĐ"}}
								</span></div>
								<div class="clearfix"></div>

								<div class="center">
									<div class="space10">&nbsp;</div>
									<a href="checkout" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
					</div> <!-- .cart -->
					@endif
				</div>
			</div>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .header-body -->
	<div class="header-bottom" style="background-color: #0277b8;">
		<div class="container">
			<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
			<div class="visible-xs clearfix"></div>
			<nav class="main-menu">
				<ul class="l-inline ov">
					<li><a href="home">Trang chủ</a></li>
					<li><a>Sản phẩm</a>
						<ul class="sub-menu">
							@foreach($menu as $row_menu)
							<li><a href="category/{{$row_menu->id}}">{{$row_menu->name}}</a></li>
							@endforeach
						</ul>
					</li>
					<li><a href="news">Tin Tức</a></li>
					<li><a href="contact">Liên hệ</a></li>
				</ul>
				<div class="clearfix"></div>
			</nav>
		</div> <!-- .container -->
	</div> <!-- .header-bottom -->
</div> <!-- #header -->