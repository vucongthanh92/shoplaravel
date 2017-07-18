@extends('master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-right">
			<div class="beta-breadcrumb">
				<a href="index.html">Home</a> / <span>Đăng kí</span>
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

		<form action="dangky" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<h4>Đăng kí</h4>
					<div class="space20">&nbsp;</div>
					<div class="form-block">
						<label for="email">Địa chỉ Email*</label>
						<input type="email" class="form-control" id="email" name="email" required>
					</div>

					<div class="form-block">
						<label for="your_last_name">Họ tên*</label>
						<input type="text" class="form-control" id="your_last_name" name="full_name" required>
					</div>

					<div class="form-block">
						<label for="adress">Địa chỉ*</label>
						<input type="text" id="adress" class="form-control" value="Street Address" name="address" required>
					</div>
					<div class="form-block">
						<label for="phone">Số điện thoại*</label>
						<input type="text" id="phone" class="form-control" name="phone" required>
					</div>
					<div class="form-block">
						<label for="phone">Mật khẩu*</label>
						<input type="password" class="form-control" id="phone" name="password" required>
					</div>
					<div class="form-block">
						<label for="phone">Nhập lại mật khẩu*</label>
						<input type="password" id="phone" class="form-control" name="passwordAgain" required>
					</div>
					<div class="form-block">
						<button type="submit" class="btn btn-primary">Đăng ký</button>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection