<!-- Page Content -->
    @extends('admin.layout.index')
    @section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tài Khoản
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
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Quyền</th>
                                <th>Ngày Tạo</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $row)
                            <tr class="odd gradeX" align="center">
                                <td>{{$row->id}}</td>
                                <td>{{$row->full_name}}</td>
                                <td>{{$row->email}}</td>
                                <td>
                                    @if($row->quyen == 0)
                                        {{'User'}}
                                    @elseif($row->quyen == 1)
                                        {{'Admin'}}
                                    @endif
                                </td>
                                <td>{{$row->created_at}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/delete/{{$row->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/user/edit/{{$row->id}}">Edit</a></td>
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