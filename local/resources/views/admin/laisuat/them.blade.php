@extends('admin.layout.index')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Lãi suất
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
        
                    <form action="admin/laisuat/them" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>0 tháng</label>
                            <input class="form-control" name="m0" placeholder="Hãy nhập vào lãi suất" value="{{$laisuat->m0}}" />
                        </div>
                        <div class="form-group">
                            <label>1 tháng</label>
                            <input class="form-control" name="m1" placeholder="Hãy nhập vào lãi suất" value="{{$laisuat->m1}}"/>
                        </div>
                        <div class="form-group">
                            <label>3 tháng</label>
                            <input class="form-control" name="m3" placeholder="Hãy nhập vào lãi suất" value="{{$laisuat->m3}}"/>
                        </div>
                        <div class="form-group">
                            <label>6 tháng</label>
                            <input class="form-control" name="m6" placeholder="Hãy nhập vào lãi suất" value="{{$laisuat->m6}}"/>
                        </div>
                        <div class="form-group">
                            <label>9 tháng</label>
                            <input class="form-control" name="m9" placeholder="Hãy nhập vào lãi suất" value="{{$laisuat->m9}}"/>
                        </div>
                        <div class="form-group">
                            <label>12 tháng</label>
                            <input class="form-control" name="m12" placeholder="Hãy nhập vào lãi suất" value="{{$laisuat->m12}}"/>
                        </div>
                        <div class="form-group">
                            <label>18 tháng</label>
                            <input class="form-control" name="m18" placeholder="Hãy nhập vào lãi suất" value="{{$laisuat->m18}}"/>
                        </div>
                        <div class="form-group">
                            <label>24 tháng</label>
                            <input class="form-control" name="m24" placeholder="Hãy nhập vào lãi suất" value="{{$laisuat->m24}}"/>
                        </div>
                        <div class="form-group">
                            <label>36 tháng</label>
                            <input class="form-control" name="m36" placeholder="Hãy nhập vào lãi suất" value="{{$laisuat->m36}}"/>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm Lãi suất</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection