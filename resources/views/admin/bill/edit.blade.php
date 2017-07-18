<!-- Page Content -->
@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Đơn Hàng
                        <small>Sửa</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7">

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

                    <form action="admin/customer/edit/{{$bill->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Tên Khách Hàng:</label> {{$bill->customer->name}}
                        </div>
                        <div class="form-group">
                            <label>Ngày Đặt:</label> {{$bill->date_order}}
                        </div>
                        <div class="form-group">
                            <label>Tổng Tiền:</label> {{number_format($bill->total)}} VNĐ
                        </div>
                        <div class="form-group">
                            <label>Phương Thức:</label> {{$bill->payment}}
                        </div>
                        <div class="form-group">
                            <label>Ghi Chú:</label> {{$bill->note}}
                        </div>
                    <form>
                </div>
            </div>
            <!-- /.row -->

            <!-- Phần sản phẩm trong đơn hàng -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Đơn Hàng
                        <small>Danh Sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Hình Ảnh</th>
                            <th>Thể Loại</th>
                            <th>Đơn Giá</th>
                            <th>Giá Khuyến Mãi</th>
                            <th>Số Lượng</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($detail as $sanpham)
                        <tr class="odd gradeX" align="center">
                            <td>{{$sanpham->id_product}}</td>
                            <td>{{$sanpham->product->name}}</td>
                            <td><img width="70" src="upload/product/{{$sanpham->product->image}}"></td>
                            <td>{{$sanpham->product->product_type->name}}</td>
                            <td>{{number_format($sanpham->product->unit_price)}} VNĐ</td>
                            <td>{{number_format($sanpham->product->promotion_price)}} VNĐ</td>
                            <td>{{number_format($sanpham->quantity)}}</td>
                            <td class="center"><i class="fa fa-trash-o fa-fw"></i>
                                <a href="admin/bill/del-product/{{$bill->id}}/{{$sanpham->id}}">Xóa</a></td>
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