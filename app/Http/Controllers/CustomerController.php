<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Bills;
use App\BillsDetail;

class CustomerController extends Controller
{
    public function getList()
    {
        $khachhang = Customer::all();
        return view('admin.customer.list',['khachhang'=>$khachhang]);
    }

    public function getEdit($id)
    {
        $khachhang = Customer::find($id);
        $bill = Bills::where('id_customer','=',$khachhang->id)->get();
        return view('admin.customer.edit',['khachhang'=>$khachhang,'bill'=>$bill]);
    }

    public function postEdit(Request $request, $id)
    {
        $khachhang = Customer::find($id);
        $this->validate($request,[
                'name'=>'required|min:3|max:100',
                'email'=>'required|min:3|max:100|email',
                'phone'=>'numeric',
            ],[
                'name.required'=>'Tên khách hàng không được để trống',
                'name.min'=>'Tên khách hàng phải từ 3 ký tự trở lên',
                'name.max'=>'Tên khách hàng tối đa 100 ký tự',
                'email.required'=>'Bạn chưa nhập email',
                'email.min'=>'Email phải từ 3 ký tự trở lên',
                'email.max'=>'Email tối đa là 100 ký tự',
                'email.email'=>'Email của bạn không đúng định dạng',
                'phone.numeric'=>'Số điện thoại chưa đúng định dạng',
            ]);

        $khachhang->name = $request->name;
        $khachhang->email = $request->email;
        $khachhang->address = $request->address;
        $khachhang->phone = $request->phone;
        $khachhang->gender = $request->gender;
        $khachhang->note = $request->note;
        $khachhang->save();
        return redirect('admin/customer/edit/'.$id)->with('thongbao','Cập nhật thông tin khách hàng thành công');
    }

    public function getDel($id)
    {
    	$khachhang = Customer::find($id);
        $hoadon = Bills::where('id_customer','=',$khachhang->id);
        foreach($hoadon as $hd)
        {
            $detail = BillsDetail::where('id_bill','=',$hd->id);
            $detail->delete();
        }
        $hoadon->delete();
        $khachhang->delete();
        return redirect('admin/customer/list')->with('thongbao','Bạn đã xóa thông tin khách hàng thành công');
    }
}
