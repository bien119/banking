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
                        <label>Tên người dùng</label>
                        <input class="form-control" name="ten" placeholder="Hãy nhập vào tên user" value="{{$user->name}}"/>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Hãy nhập vào email" disabled="disabled" value="{{$user->email}}" />
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="changepassword" id="changepassword">
                        <label>Password</label>
                        <input class="form-control password" type="password" name="password" placeholder="Hãy nhập vào password" disabled="disabled"/>
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input class="form-control password" type="password" name="password2" placeholder="Hãy nhập lại password" disabled="disabled"/>
                    </div>
                    <div class="form-group">
                        <label>Quyền truy cập</label>
                        <label class="radio-inline">
                            @if($user->quyen == 0)
                                <input name="rdoStatus" value="0" checked="checked" type="radio">Thường
                            @else
                                <input name="rdoStatus" value="0" checked="" type="radio">Thường
                            @endif
                        </label>
                        <label class="radio-inline">
                            @if($user->quyen == 1)
                                <input name="rdoStatus" value="1" checked="checked" type="radio">Admin
                            @else
                                <input name="rdoStatus" value="1" checked="" type="radio">Admin
                            @endif
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa thể loại</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
@section('js')
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $("#changepassword").change(function(event) {
                /* Act on the event */
                if($(this).is(":checked")) {
                    $(".password").removeAttr('disabled');
                } else {
                    $(".password").attr('disabled','disabled');
                }
            });
        });
    </script>
@endsection