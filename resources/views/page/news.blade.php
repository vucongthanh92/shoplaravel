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
            <div class="col-sm-3">
				<ul class="aside-menu">
				@foreach($menu as $row_menu)
					<li><a href="category/{{$row_menu->id}}">{{$row_menu->name}}</a></li>
				@endforeach
				</ul>
			</div>

            <div class="col-md-9 ">
                <div class="beta-products-list">
                    <h4>Tin Tức</h4>
                    <div class="space20">&nbsp;</div>
                    @foreach($news as $row)
                    <div class="row-item row">
                        <div class="col-md-3">
                            <a href="news/{{$row->id}}">
                                <img width="200px" height="200px" class="img-responsive" src="upload/news/{{$row->image}}" 
                                alt="{{$row->title}}">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <p class="single-item-title">{{$row->title}}</p>
                            <p class="single-item-description">{{$row->description}}</p>
                            <a class="btn btn-primary" href="news/{{$row->id}}">Xem Thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    <div class="space20">&nbsp;</div>
                    @endforeach

                </div>
            </div> 

        </div>
	</div>
    </div>
    <!-- end Page Content -->
@endsection