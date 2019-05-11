<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use App\SavingAccount;
use App\Interestrate;
use App\Loanrate;
use Excel;

class KhachhangController extends Controller
{
    //
    public function listAction() {
    	$customer = Customer::all();
    	return view('admin.customer.danhsach',['customer'=>$customer]);
    }

    public function listtkAction() {
        $customer = SavingAccount::all();
        $Interestrate = Interestrate::all();
        return view('admin.customer.danhsachtk',['acc'=>$customer, 'interestrate'=>$Interestrate]);
    }

    public function listcvAction() {
        $customer = SavingAccount::all();
        $loanrate = Loanrate::all();
        return view('admin.customer.danhsachcv',['acc'=>$customer, 'loanrate' => $loanrate]);
    }

    public function add_get_Action() {
    	return view('admin.customer.them');
    }

    public function add_post_Action(Request $rq) {
    	$this->validate($rq,
    		[
    			'ten' => 'required|min:3',
    			'address' => 'required|min:3',
    			'idcard' => 'required',
    			'phone' => 'required'
    		],
    		[
    			'ten.required' =>'Bạn chưa nhập tên người dùng',
    			'ten.min' =>'Tên người dùng có độ dài từ 3 ký tự',
    			'address.required' =>'Bạn chưa nhập địa chỉ khách hàng',
                'idcard.required' =>'Bạn chưa nhập số tài khoản',
                'phone.required' =>'Bạn chưa nhập số điện thoại'
    		]
    	);
    	$customer 				= new Customer;
    	$customer->name 	    = $rq->ten;
    	$customer->address 	    = $rq->address;
        $customer->idcard      = $rq->idcard;
        $customer->phone      = $rq->phone;
    	$customer->save();
    	return redirect('admin/khachhang/them')->with('thongbao','Thêm thành công');
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
                return redirect('admin/theloai/danhsach')->with('thongbao','Đăng nhập thành công');
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

    public function downloadExcel() {
        $type = 'xlsx';
        $data = Customer::get()->toArray();
                    
        return Excel::create('client_list', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function deleteAction($id) {
        $cl = Customer::find($id);

        if($cl) {
            $cl = Customer::all()->where('id','=',$id)->delete();
            return redirect('admin/theloai/danhsach')->with('thongbao','Xóa thành công');
        }
        echo "Không có tính năng này";
    }
}
