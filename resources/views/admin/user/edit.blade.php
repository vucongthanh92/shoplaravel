<!-- Page Content -->
@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tài Khoản
                        <small>Sửa</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">

                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}} <br>
                        @endforeach
                    </div>
                @endif

                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif

                    <form action="admin/user/edit/{{$user->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control" name="full_name" placeholder="" value="{{$user->full_name}}" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}" readonly="" />
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="changePassword" id="changePassword">
                            <label>Đổi mật khẩu</label>
                            <input class="form-control password" type="password" name="password" value="" disabled="" />
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input class="form-control password" type="password" name="passwordAgain" value="" disabled="" />
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại</label>
                            <input class="form-control" name="phone" value="{{$user->phone}}" />
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input class="form-control" name="address" value="{{$user->address}}" />
                        </div>
                        <div class="form-group">
                            <label>Quyền</label>
                            <label class="radio-inline">
                                <input name="quyen" value="0" 
                                @if($user->quyen == 0)
                                    {{'checked'}} 
                                @endif
                                type="radio">User
                            </label>
                            <label class="radio-inline">
                                <input name="quyen" 
                                @if($user->quyen == 1)
                                    {{'checked'}}
                                @endif
                                value="1" type="radio">Admin
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <button type="reset" class="btn btn-default">Làm Mới</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
<!-- /#page-wrapper -->

@section('script')
    <script>
        $(document).ready(function()
        {
            $("#changePassword").change(function()
            {
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection