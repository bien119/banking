<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    //
    public function listAction() {
    	$user = User::all();
    	return view('admin.user.danhsach',['user'=>$user]);
    }

    public function add_get_Action() {
    	return view('admin.user.them');
    }

    public function add_post_Action(Request $rq) {
    	$this->validate($rq,
    		[
    			'ten' => 'required|min:3',
    			'email' => 'required|email|unique:users,email',
    			'password' => 'required|min:3|max:32',
    			'password2' => 'required|same:password',
    		],
    		[
    			'ten.required' =>'Bạn chưa nhập tên người dùng',
    			'ten.min' =>'Tên người dùng có độ dài từ 3 ký tự',
    			'email.required' =>'Bạn chưa nhập email',
    			'email.email' =>'Email sai định dạng',
    			'email.unique' =>'Email bị trùng',
    			'password.required' =>'Bạn chưa nhập password',
    			'password.min' =>'password có độ dài từ 3 đến 32 ký tự',
    			'password.max' =>'password loại có độ dài từ 3 đến 32 ký tự',
    			'password2.required' =>'Bạn chưa nhập lại password',
    			'password2.same' =>'Mật khẩu nhập lại không đúng',
    		]
    	);
    	$user 				= new User;
    	$user->name 			= $rq->ten;
    	$user->email 	= $rq->email;
    	$user->password =bcrypt($rq->password);
    	$user->quyen =  $rq->rdoStatus;
    	$user->save();
    	return redirect('admin/user/them')->with('thongbao','Thêm thành công');
    }

    public function deleteAction($id) {
        $user = User::find($id);
        if($user != null) {
            $user->delete();

            return redirect('admin/user/danhsach')->with('thongbao','Xóa thành công');
        }
        echo "Không có tính năng này";
    }

    public function edit_get_Action($id) {
        $user = User::find($id);
        if($user != null) {
            return view('admin.user.sua',['user'=>$user]);
        }
        echo "Không có tính năng này";
        
    }

    public function edit_post_Action($id,Request $rq) {
        $this->validate($rq,
    		[
    			'ten' => 'required|min:3',
    			// 'email' => 'required|email|unique:users,email',
    			// 'password' => 'required|min:3|max:32',
    			// 'password2' => 'required|same:password',
    		],
    		[
    			'ten.required' =>'Bạn chưa nhập tên người dùng',
    			'ten.min' =>'Tên người dùng có độ dài từ 3 ký tự',
    			// 'email.required' =>'Bạn chưa nhập email',
    			// 'email.email' =>'Email sai định dạng',
    			// 'email.unique' =>'Email bị trùng',
    			// 'password.required' =>'Bạn chưa nhập password',
    			// 'password.min' =>'password có độ dài từ 3 đến 32 ký tự',
    			// 'password.max' =>'password loại có độ dài từ 3 đến 32 ký tự',
    			// 'password2.required' =>'Bạn chưa nhập lại password',
    			// 'password2.same' =>'Mật khẩu nhập lại không đúng',
    		]
    	);
    	$user 			= User::find($id);
    	$user->name 	= $rq->ten;
    	$user->quyen 	=  $rq->rdoStatus;
    	if($rq->password2 == 'on') {
    		$this->validate($rq,
    		[
    			'password' => 'required|min:3|max:32',
    			'password2' => 'required|same:password',
    		],
    		[
    			'password.required' =>'Bạn chưa nhập password',
    			'password.min' =>'password có độ dài từ 3 đến 32 ký tự',
    			'password.max' =>'password loại có độ dài từ 3 đến 32 ký tự',
    			'password2.required' =>'Bạn chưa nhập lại password',
    			'password2.same' =>'Mật khẩu nhập lại không đúng',
    		]
    	);
    		$user->password =bcrypt($rq->password);
    	}    	
    	$user->save();
    	return redirect('admin/user/them')->with('thongbao','Sửa thành công');
    }
    public function logIn() {
        return view('admin.login');
    }
    public function logInPost(Request $rq) {
        $this->validate($rq,
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Bạn chưa nhập email',
                'email.email' =>'Email sai định dạng',
                'password.required' =>'Bạn chưa nhập mật khẩu'
            ]
        );
        if (Auth::attempt(['email' => $rq->email, 'password' => $rq->password])) {
            // The user is active, not suspended, and exists.
            if(Auth::user()->quyen == 1) {
                return redirect('admin/khachhang/danhsach')->with('thongbao','Đăng nhập thành công');
            } else {
                return redirect('admin/login')->with('thongbao','Sai mật khẩu hoặc bạn không có quyền truy cập vào mục này');
            }

        } else {
            return redirect('admin/login')->with('thongbao','Sai thông tin đăng nhập hoặc bạn không có quyền truy cập vào mục này');
        }
    }

    public function logOut() {
        Auth::logOut();
        return redirect('admin/login');
    }
}
