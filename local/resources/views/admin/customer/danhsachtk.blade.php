@extends('admin.layout.index')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Khách hàng
                        <small>Danh sach</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div>
                    <a href="admin/khachhang/export">Xuất danh sách</a>
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
                            <th>Tên</th>
                            <th>Số tài khoản</th>
                            <th>Số điện thoại</th>
                            <th>Loại sổ</th>
                            <th>Lãi suất</th>
                            <th>Số dư</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($acc as $value)
   
                        <tr class="odd gradeX" align="center">
                    
                                <td>{{$value->id}}</td>
                                <td>{{$value->customer->name}}</td>
                                <td>{{$value->number}}</td>
                                <td>{{$value->customer->phone}}</td>
                                <td>{{$value->kind}}</td>
                                @foreach($interestrate as $val)
                                    @if($value->id_rate == $val->id)
                                        <td>{{$val->m0}}</td>
                                    @endif
                                @endforeach
                                {{-- <td>{{$value->interestrate->m0}}</td> --}}
                                <td>{{$value->cash}}</td>
                                {{-- <td>{{$value->interestrate->}}</td> --}}
                                {{-- <td>{{$value->customer->phone}}</td> --}}
{{--                                 <td>{{$value->created_at}}</td>
                                <td>{{$value->updated_at}}</td> --}}
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/khachhang/xoa/{{$value->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/khachhang/sua/{{$value->id}}">Edit</a></td>       
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