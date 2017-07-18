<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Bills;
use App\BillsDetail;

class BillController extends Controller
{
    public function getList()
    {
        $bill = Bills::all();
        return view("admin.bill.list",['bill'=>$bill]);
    }

    public function getEdit($id)
    {
        $bill = Bills::find($id);
        $detail = BillsDetail::where('id_bill','=',$bill->id)->get();
        return view('admin.bill.edit',['bill'=>$bill,'detail'=>$detail]);
    }

    public function getDel($id)
    {
    	$hoadon = Bills::find($id);
        $sanpham = BillsDetail::where('id_bill','=',$id);
        $sanpham->delete();
        $hoadon->delete();
        return redirect('admin/bill/list')->with('thongbao','Bạn đã xóa đơn hàng thành công');
    }

    public function delProduct($id_bill, $id_product)
    {
        $pro_del = BillsDetail::find($id_product);
        $donhang = Bills::find($id_bill);
        $total = ($donhang->total) - ($pro_del->unit_price);
        $donhang->total = $total;
        $donhang->save();
        $pro_del->delete();
        return redirect('admin/bill/edit/'.$id_bill)->with('thongbao','Bạn đã xóa sản phẩm trong đơn hàng');
    }
}
