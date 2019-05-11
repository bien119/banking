@extends('admin.layout.index')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Khách hàng
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="admin/khachhang/them" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tên khách hàng</label>
                            <input class="form-control" type="text" name="ten" placeholder="Hãy nhập vào tên khách hàng" />
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control" type="text" name="address" placeholder="Hãy nhập vào địa chỉ" />
                        </div>
                        <div class="form-group">
                            <label>IdCard</label>
                            <input class="form-control" type="text" name="idcard" placeholder="Hãy nhập vào số thẻ" />
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control" type="text" name="phone" placeholder="Hãy nhập lại password" />
                        </div>
                        <button type="submit" class="btn btn-default">Thêm khách hàng</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection