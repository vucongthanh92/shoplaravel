<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;

class SanPhamController extends Controller
{
    public function getList()
    {
        $sanpham = Product::orderBy('id','DESC')->get();
        return view('admin.sanpham.list',['sanpham'=>$sanpham]);
    }

    public function getAdd()
    {
        $theloai = ProductType::all();
        return view('admin.sanpham.add',['theloai'=>$theloai]);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,[
                'product_type'=>'required',
                'name'=>'required|min:3|max:100|unique:products,name',
                'description'=>'required',
                'content'=>'required',
                'unit_price'=>'required',
                'promotion_price'=>'required',
            ],[
                'product_type.required'=>'Bạn chưa chọn thể loại cho sản phẩm',
                'name.required'=>'Bạn chưa nhập tiêu đề sản phẩm',
                'name.min'=>'Tiêu đề phải từ 3 ký tự trở lên',
                'name.max'=>'Tiêu đề tối đa 100 ký tự',
                'name.unique'=>'Tiêu đề đã tồn tại',
                'description.required'=>'Bạn chưa nhập mô tả sản phẩm',
                'content.required'=>'Bạn chưa nhập nội dung sản phẩm',
                'unit_price.required'=>'Bạn chưa nhập đơn giá cho sản phẩm',
                'promotion_price.required'=>'Bạn chưa nhập giá khuyến mãi cho sản phẩm',
            ]);

        $sanpham = new Product;
        $sanpham->id_type = $request->product_type;
        $sanpham->name = $request->name;
        $sanpham->description = $request->description;
        $sanpham->content = $request->content;
        $sanpham->new = $request->new;
        $sanpham->unit_price = $request->unit_price;
        $sanpham->promotion_price = $request->promotion_price;
        $sanpham->unit = $request->unit;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/sanpham/add')->with('error_img','Ảnh không đúng định dạng');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(5)."-".$name;
            while(file_exists("upload/product/".$hinh))
            {
                $hinh = str_random(5)."-".$name;
            }
            $file->move("upload/product/",$hinh);
            $sanpham->image = $hinh;
        }
        else
        {
            $sanpham->image = '';
        }

        $sanpham->save();
        return redirect('admin/sanpham/add')->with('thongbao','Thêm sản phẩm thành công');
    }

    public function getEdit($id)
    {
        $theloai = ProductType::all();
        $sanpham = Product::find($id);
        return view("admin.sanpham.edit",['sanpham'=>$sanpham,'theloai'=>$theloai]);
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request,[
                'product_type'=>'required',
                'name'=>'required|min:3|max:100',
                'description'=>'required',
                'content'=>'required',
                'unit_price'=>'required',
                'promotion_price'=>'required',
            ],[
                'product_type.required'=>'Bạn chưa chọn thể loại',
                'name.required'=>'Bạn chưa nhập tiêu đề',
                'name.min'=>'Tiêu đề phải từ 3 ký tự trở lên',
                'name.max'=>'Tiêu đề tối đa 100 ký tự',
                'description.required'=>'Bạn chưa nhập mô tả',
                'content.required'=>'Bạn chưa nhập nội dung',
            ]);

        $sanpham = Product::find($id);
        $sanpham->name = $request->name;
        $sanpham->id_type = $request->product_type;
        $sanpham->description = $request->description;
        $sanpham->content = $request->content;
        $sanpham->new = $request->new;
        $sanpham->unit_price = $request->unit_price;
        $sanpham->promotion_price = $request->promotion_price;
        $sanpham->unit = $request->unit;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/sanpham/edit/'.$id)->with('error_img','Bạn chọn hình chưa đúng định dạng');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(5)."-".$name;
            while(file_exists("upload/product/".$hinh))
            {
                $hinh = str_random(5)."-".$name;
            }
            if(file_exists("upload/product/".$sanpham->image))
            {
                unlink("upload/product/".$sanpham->image);
            }
            $file->move("upload/product/",$hinh);
            $sanpham->image = $hinh;
        }
        $sanpham->save();
        return redirect("admin/sanpham/edit/".$id)->with('thongbao','Bạn đã sửa sản phẩm thành công');
    }

    public function getDel($id)
    {
        $sanpham = Product::find($id);
        $sanpham->delete();
        return redirect("admin/sanpham/list")->with('thongbao','Xóa sản phẩm thành công');
    }
}
