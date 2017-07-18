<!-- Page Content -->
@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Khách Hàng
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

                    <form action="admin/customer/edit/{{$khachhang->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Họ Tên</label>
                            <input class="form-control" name="name" value="{{$khachhang->name}}" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="email" value="{{$khachhang->email}}" />
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input class="form-control" name="address" value="{{$khachhang->address}}" />
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại</label>
                            <input class="form-control" name="phone" value="{{$khachhang->phone}}" />
                        </div>
                        <div class="form-group">
                            <label>Giới Tính</label>
                            <label class="radio-inline">
                                <input name="gender" value="nam" type="radio"
                                @if($khachhang->gender == 'nam')
                                    {{"checked"}}
                                @endif
                                >Nam
                            </label>
                            <label class="radio-inline">
                                <input name="gender" value="nu" type="radio"
                                @if($khachhang->gender == 'nu')
                                    {{"checked"}}
                                @endif>Có
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Ghi Chú</label>
                            <textarea class="form-control" name="note" rows="3">{{$khachhang->note}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Cập Nhật</button>
                        <button type="reset" class="btn btn-default">Làm Mới</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->

            <!-- Phần Comment trong sửa tin tức -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Đơn Hàng
                        <small>Danh Sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->

                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Ngày Tạo</th>
                            <th>Tổng Tiền</th>
                            <th>Phương Thức</th>
                            <th>Ghi Chú</th>
                            <th>Xóa</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($bill as $hoadon)
                        <tr class="odd gradeX" align="center">
                            <td>{{$hoadon->id}}</td>
                            <td>{{$hoadon->date_order}}</td>
                            <td>{{number_format($hoadon->total)}} VNĐ</td>
                            <td>{{$hoadon->payment}}</td>
                            <td>{{$hoadon->note}}</td>
                            <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/bill/delete/{{$hoadon->id}}">Xóa</a></td>
                            <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/bill/edit/{{$hoadon->id}}">Sửa</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
            <div class="space20">&nbsp;</div>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
<!-- /#page-wrapper -->