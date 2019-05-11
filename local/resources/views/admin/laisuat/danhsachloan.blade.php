@extends('admin.layout.index')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Lãi Suất
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div>
                    <a href="admin/laisuat/export">Xuất danh sách</a>
                </div></br>

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>1 năm</th>
                            <th>Thời gian bắt đầu áp dụng</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($laisuat as $value)
                        <tr class="odd gradeX" align="center">
                                <td>{{$value->id}}</td>
                                <td>{{$value->oneyear}}</td>
                                <td>{{$value->created_at}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/laisuat/xoa/{{$value->id}}"> Xóa</a></td>   
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