@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể loại
                    <small>Sửa</small>
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
                <form action="" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input class="form-control" name="m0" placeholder="Please Enter Category Name" value="{{$laisuat->m0}}" />
                    </div>
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input class="form-control" name="m1" placeholder="Please Enter Category Name" value="{{$laisuat->m1}}" />
                    </div>
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input class="form-control" name="m3" placeholder="Please Enter Category Name" value="{{$laisuat->m3}}" />
                    </div>
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input class="form-control" name="m6" placeholder="Please Enter Category Name" value="{{$laisuat->m6}}" />
                    </div>
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input class="form-control" name="m9" placeholder="Please Enter Category Name" value="{{$laisuat->m9}}" />
                    </div>
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input class="form-control" name="m12" placeholder="Please Enter Category Name" value="{{$laisuat->m12}}" />
                    </div>
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input class="form-control" name="m18" placeholder="Please Enter Category Name" value="{{$laisuat->m18}}" />
                    </div>
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input class="form-control" name="m24" placeholder="Please Enter Category Name" value="{{$laisuat->m24}}" />
                    </div>
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input class="form-control" name="m36" placeholder="Please Enter Category Name" value="{{$laisuat->m36}}" />
                    </div>
                    <button type="submit" class="btn btn-default">Sửa Lãi suất</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection