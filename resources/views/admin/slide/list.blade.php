<!-- Page Content -->
    @extends('admin.layout.index')
    @section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide Ảnh
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
                                <th>Hình Ảnh</th>
                                <th>Link</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($slide as $row)
                            <tr class="odd gradeX" align="center">
                                <td>{{$row->id}}</td>
                                <td><img width="250px" src="upload/slide/{{$row->image}}"></td>
                                <td>{{$row->link}}</td>
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i>
                                    <a href="admin/slide/delete/{{$row->id}}">Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i>
                                    <a href="admin/slide/edit/{{$row->id}}">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    @endsection
<!-- /#page-wrapper -->