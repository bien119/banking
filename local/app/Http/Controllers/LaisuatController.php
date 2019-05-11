<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;

use App\Interestrate;
use App\Loanrate;

class LaisuatController extends Controller
{
    //
    public function listAction() {
    	$laisuat = Interestrate::all();
    	return view('admin.laisuat.danhsach',['laisuat'=>$laisuat]);
    }

    public function listLoanAction() {
        $laisuat = Loanrate::all();
        return view('admin.laisuat.danhsachloan',['laisuat'=>$laisuat]);
    }
    public function add_get_Action() {
        $laisuat = Interestrate::orderBY('created_at','desc')->first();
    	return view('admin.laisuat.them', ['laisuat'=> $laisuat]);
    }
    public function addloan_get_Action() {
        $laisuat = Loanrate::orderBY('created_at', 'desc')->first();
        return view('admin.laisuat.themloan', ['laisuat'=> $laisuat]);
    }

    public function add_post_Action(Request $rq) {
    	$this->validate($rq,
    		[
                'm0' => 'required|regex:/^\d+(\.\d{1,2})?$/',
    			'm1' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'm3' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'm6' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'm9' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'm12' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'm18' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'm24' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'm36' => 'required|regex:/^\d+(\.\d{1,2})?$/'
    		],
    		[
    			'm0.required' =>'Bạn chưa nhập lãi suất m0',
    			'm0.regex' =>'Rate là một số hữu tỷ',
                'm1.required' =>'Bạn chưa nhập lãi suất m0',
                'm1.regex' =>'Rate là một số hữu tỷ',
                'm3.required' =>'Bạn chưa nhập lãi suất m0',
                'm3.regex' =>'Rate là một số hữu tỷ',
                'm6.required' =>'Bạn chưa nhập lãi suất m0',
                'm6.regex' =>'Rate là một số hữu tỷ',
                'm9.required' =>'Bạn chưa nhập lãi suất m0',
                'm9.regex' =>'Rate là một số hữu tỷ',
                'm12.required' =>'Bạn chưa nhập lãi suất m0',
                'm12.regex' =>'Rate là một số hữu tỷ',
                'm18.required' =>'Bạn chưa nhập lãi suất m0',
                'm18.regex' =>'Rate là một số hữu tỷ',
                'm24.required' =>'Bạn chưa nhập lãi suất m0',
                'm24.regex' =>'Rate là một số hữu tỷ',
                'm36.required' =>'Bạn chưa nhập lãi suất m0',
                'm36.regex' =>'Rate là một số hữu tỷ'
    		]
    	);
    	$laisuat 				= new Interestrate;
    	$laisuat->m0 			= $rq->m0;
        $laisuat->m1            = $rq->m1;
        $laisuat->m3            = $rq->m3;
        $laisuat->m6            = $rq->m6;
        $laisuat->m9            = $rq->m9;
        $laisuat->m12            = $rq->m12;
        $laisuat->m18            = $rq->m18;
        $laisuat->m24           = $rq->m24;
        $laisuat->m36           = $rq->m36;
    	$laisuat->save();
    	return redirect('admin/laisuat/them')->with('thongbao','Thêm thành công');
    }

        public function addloan_post_Action(Request $rq) {
        $this->validate($rq,
            [
                'm0' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            ],
            [
                'm0.required' =>'Bạn chưa nhập lãi suất m0',
                'm0.regex' =>'Rate là một số hữu tỷ'
            ]
        );
        $laisuat                = new Loanrate;
        $laisuat->oneyear       = $rq->m0;
        $laisuat->save();
        return redirect('admin/laisuat/themloan')->with('thongbao','Thêm thành công');
    }

    public function deleteAction($id) {
        $Laisuat = Interestrate::find($id);
        if($Laisuat != null) {
            $Laisuat->delete();
            return redirect('admin/laisuat/sua/'.$id)->with('thongbao','Xóa comment thành công');
        }
        echo "Không có tính năng này";
    }

    public function edit_get_Action($id) {
        $laisuat = Interestrate::find($id);
        if($laisuat != null) {
            return view('admin.laisuat.sua',['laisuat'=>$laisuat]);
        }
        echo "Không có tính năng này";
        
    }

    public function edit_post_Action($id,Request $rq) {
        $this->validate($rq,
            [
                'tlName' => 'required|min:3|Max:100|unique:theloai,ten'
            ],
            [
                'tlName.unique' => 'Tên thể loại bị trùng',
                'tlName.required' =>'Bạn chưa nhập tên thể loại',
                'tlName.min' =>'Tên thể loại có độ dài từ 3 đến 100 ký tự',
                'tlName.max' =>'Tên thể loại có độ dài từ 3 đến 100 ký tự'
            ]
        );
        $theloai                = TheLoai::find($id);
        $theloai->Ten           = $rq->tlName;
        $theloai->TenKhongDau   = changeTitle($rq->tlName);
        $theloai->save();
        return redirect('admin/theloai/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function downloadExcel() {
        $type = 'xlsx';
        $data = Interestrate::get()->toArray();
                    
        return Excel::create('rate_list', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
}
