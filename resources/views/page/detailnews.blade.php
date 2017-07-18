@extends('master')
@section('content')
<!-- Page Content -->
<div class="inner-header">
    <div class="container">
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Home</a> / <span>Tin Tức</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content" class="space-top-none">
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-9">
                <!-- Preview Image -->
                <img class="img-responsive detailnews-img" src="upload/news/{{$tintuc->image}}" alt="{{$tintuc->title}}">
                <!-- Title -->
                <h1 class="detailnews-title">{{$tintuc->title}}</h1>
                <p class="detailnews-des">{{$tintuc->description}}</p>
                <!-- Date/Time -->
                <p class="detailnews-time"><span class="glyphicon glyphicon-time"></span> Posted on {{$tintuc->created_at}}</p>
                <hr style="clear: both;">
                <!-- Post Content -->
                <p class="lead">{!! $tintuc->content !!}</p>
                <div class="space20">&nbsp;</div>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin Khác</b></div>
                    <div class="panel-body">
                        <!-- item -->
                        @foreach($tincungloai as $row)
                        <div class="row hotnews">
                            <div class="col-news-img">
                                <a href="news/{{$row->id}}">
                                    <img class="img-responsive" src="upload/news/{{$row->image}}" alt="{{$row->title}}">
                                </a>
                            </div>
                            <div class="col-news-title">
                                <a href="news/{{$row->id}}"><b>{{$row->title}}</b></a>
                            </div>
                            <p class="col-news-mota">{{str_limit($row->description,50,'...')}}</p>
                            <div class="break"></div>
                        </div>
                        @endforeach
                        <!-- end item -->
                    </div>
                </div>    
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>
<!-- end Page Content -->
@endsection