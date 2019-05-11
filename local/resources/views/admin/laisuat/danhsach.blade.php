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
                            <th>0 tháng</th>
                            <th>1 tháng</th>
                            <th>3 tháng</th>
                            <th>6 tháng</th>
                            <th>9 tháng</th>
                            <th>12 tháng</th>
                            <th>18 tháng</th>
                            <th>24 tháng</th>
                            <th>36 tháng</th>
                            <th>Thời gian áp dụng</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($laisuat as $value)
                        <tr class="odd gradeX" align="center">
                                <td>{{$value->id}}</td>
                                <td>{{$value->m0}}</td>
                                <td>{{$value->m1}}</td>
                                <td>{{$value->m3}}</td>
                                <td>{{$value->m6}}</td>
                                <td>{{$value->m9}}</td>
                                <td>{{$value->m12}}</td>
                                <td>{{$value->m18}}</td>
                                <td>{{$value->m24}}</td>
                                <td>{{$value->m36}}</td>
                                <td>{{$value->created_at}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/laisuat/xoa/{{$value->id}}"> Delete</a></td>   
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