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
                <div class="col-lg-8" style="padding-bottom:20px">
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

                    <form action="admin/tintuc/edit/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Tiêu Đề</label>
                            <input class="form-control" name="title" value="{{$tintuc->title}}" />
                        </div>
                        <div class="form-group">
                            <label>Tóm Tắt</label>
                            <textarea class="form-control" name="description" rows="3">{{$tintuc->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội Dung</label>
                            <textarea class="form-control ckeditor" name="content" rows="3">{{$tintuc->content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Hình Ảnh</label>
                            <input type="file" name="image" />
                            @if(isset($error_img))
                                <div class="alert alert-danger">{{$error_img}}</div>
                            @endif
                            <br><img width="200px" src="upload/news/{{$tintuc->image}}">
                        </div>
                        <button type="submit" class="btn btn-default">Cập Nhật</button>
                        <button type="reset" class="btn btn-default">Làm Mới</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection