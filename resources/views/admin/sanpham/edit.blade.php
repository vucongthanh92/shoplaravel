<!-- Page Content -->
@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin Tức
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

                    <form action="admin/sanpham/edit/{{$sanpham->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Thể Loại</label>
                            <select class="form-control" name="product_type" id="theloai">
                            @foreach($theloai as $tl)
                                <option
                                @if($sanpham->product_type->id == $tl->id)
                                    {{"selected"}}
                                @endif
                                value="{{$tl->id}}">{{$tl->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiêu Đề</label>
                            <input class="form-control" name="name" value="{{$sanpham->name}}" />
                        </div>
                        <div class="form-group">
                            <label>Mô Tả</label>
                            <textarea class="form-control" name="description" rows="3">{{$sanpham->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội Dung</label>
                            <textarea class="form-control ckeditor" id="noidung" name="content" rows="3">{{$sanpham->content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Hình Ảnh</label>
                            <input type="file" name="image" />
                            @if(session('error_img'))
                                <div class="alert alert-danger">{{session('error_img')}}</div>
                            @endif
                            <br><img width="200px" src="upload/product/{{$sanpham->image}}">
                        </div>
                        <div class="form-group">
                            <label>Đơn Giá</label>
                            <input class="form-control" name="unit_price" value="{{$sanpham->unit_price}}" />
                        </div>
                        <div class="form-group">
                            <label>Giá Khuyến Mãi</label>
                            <input class="form-control" name="promotion_price" value="{{$sanpham->promotion_price}}" />
                        </div>
                        <div class="form-group">
                            <label>Đơn vị</label>
                            <input class="form-control" name="unit" value="{{$sanpham->unit}}" />
                        </div>
                        <div class="form-group">
                            <label>Sản Phẩm Mới &nbsp;</label>
                            <label class="radio-inline">
                                <input name="new" value="0" type="radio"
                                @if($sanpham->new == 0)
                                    {{"checked"}}
                                @endif
                                >Không
                            </label>
                            <label class="radio-inline">
                                <input name="new" value="1" type="radio"
                                @if($sanpham->new == 1)
                                    {{"checked"}}
                                @endif>Có
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Sửa Sản Phẩm</button>
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