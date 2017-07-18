<!-- Page Content -->
@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thể Loại
                        <small>Sửa:{{$theloai->Ten}}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">

                @if(count($errors) > 0)
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

                    <form action="admin/theloai/edit/{{$theloai->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Tên thể loại</label>
                            <input class="form-control" name="name" placeholder="Điền tên thể loại" value="{{$theloai->name}}" />
                        </div>
                        <div class="form-group">
                            <label>Mô Tả</label>
                            <textarea class="form-control" name="description" rows="3">{{$theloai->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Hình Ảnh</label>
                            <input type="file" name="image" />
                            @if(isset($error_img))
                                <div class="alert alert-danger">{{$error_img}}</div>
                            @endif
                            <br><img width="200px" src="upload/category/{{$theloai->image}}">
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