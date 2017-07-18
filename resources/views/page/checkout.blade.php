@extends('master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-right">
			<div class="beta-breadcrumb">
				<a href="index.html">Trang chủ</a> / <span>Đặt hàng</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">
		
		@if(count($errors) > 0)
			<div class="alert alert-danger">
				@foreach($errors->all() as $err)
					{{$err}} <br>
				@endforeach
			</div>
		@endif

		<form action="savecart" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="row">
				<div class="col-sm-6">
					<h4>Đặt hàng</h4>
					<div class="space20">&nbsp;</div>

					<div class="form-block">
						<label for="name">Họ tên*</label>
						<input type="text" id="name" name="name" placeholder="Họ tên" required>
					</div>
					<div class="form-block">
						<label>Giới tính </label>
						<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
						<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
									
					</div>

					<div class="form-block">
						<label for="email">Email*</label>
						<input type="email" id="email" name="email" required placeholder="expample@gmail.com">
					</div>

					<div class="form-block">
						<label for="adress">Địa chỉ*</label>
						<input type="text" id="adress" name="address" placeholder="Địa chỉ" required>
					</div>
					

					<div class="form-block">
						<label for="phone">Điện thoại*</label>
						<input type="text" id="phone" name="phone" required>
					</div>
					
					<div class="form-block">
						<label for="notes">Ghi chú</label>
						<textarea id="notes" name="note"></textarea>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="your-order">
						<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
						<div class="your-order-body" style="padding: 0px 10px">
							<div class="your-order-item">
								<div>
								<!--  one item	 -->
								@foreach(Session('cart')->items as $product)
									<div class="media">
										<img width="20%" src="upload/product/{{$product['item']['image']}}" alt="{{$product['item']['name']}}" class="pull-left">
										<div class="media-body">
											<p class="font-large">{{$product['item']['name']}}</p>
											@if($product['item']['promotion_price']>0)
												<span class="color-gray your-order-info">Đơn giá: <span>
												{{number_format($product['item']['promotion_price'])}} VNĐ
												</span></div>
											@else
												<span class="color-gray your-order-info">Đơn giá: <span>
												{{number_format($product['item']['unit_price'])}} VNĐ
												</span></div>
											@endif
											<span class="color-gray your-order-info">Số Lượng <span>{{$product['qty']}} {{$product['item']['unit']}}</span></span>
										</div>
									</div>
								@endforeach
								<!-- end one item -->
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="your-order-item">
								<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
								<div class="pull-right"><h5 class="color-black">{{number_format(Session('cart')->totalPrice)}} VNĐ</h5></div>
								<div class="clearfix"></div>
							</div>
						</div>

						
						<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
						<div class="your-order-body">
							<ul class="payment_methods methods">
								<li class="payment_method_bacs">
									<input id="payment_method_bacs" type="radio" class="input-radio" name="payment" value="COD" checked="checked" data-order_button_text="">
									<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
									<div class="payment_box payment_method_bacs" style="display: block;">
										Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
									</div>						
								</li>

								<li class="payment_method_cheque">
									<input id="payment_method_cheque" type="radio" class="input-radio" name="payment" value="ATM" data-order_button_text="">
									<label for="payment_method_cheque">Chuyển khoản </label>
									<div class="payment_box payment_method_cheque" style="display: none;">
										Chuyển tiền đến tài khoản sau:
										<br>- Số tài khoản: 123 456 789
										<br>- Chủ TK: Nguyễn A
										<br>- Ngân hàng ACB, Chi nhánh TPHCM
									</div>						
								</li>
								
							</ul>
						</div>

						<div class="text-center"><button type="submit" class="btn btn-default">Thanh Toán</button></div>
					</div> <!-- .your-order -->
				</div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection