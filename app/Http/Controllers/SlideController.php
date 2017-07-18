<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    public function getList()
    {
        $slide = Slide::all();
        return view("admin.slide.list",['slide'=>$slide]);
    }

    public function getAdd()
    {
        return view("admin.slide.add");
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,[
                'link'=>'max:200',
            ],[
                'link.max'=>'Link của bạn quá dài',
            ]);
        $slide = new Slide;
        $slide->link = $request->link;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/slide/add')->with('error_img','Hình ảnh không đúng định dạng');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(5)."-".$name;
            while(file_exists("upload/slide/".$hinh))
            {
                $hinh = str_random(5)."-".$name;
            }
            $file->move("upload/slide/",$hinh);
            $slide->image = $hinh;
        }
        else
        {
            $slide->image = "";
        }

        $slide->save();
        return redirect("admin/slide/add")->with('thongbao','Bạn đã thêm slide ảnh thành công');
    }

    public function getEdit($id)
    {
        $slide = Slide::find($id);
        return view("admin.slide.edit",['slide'=>$slide]);
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request,[
                'link'=>'max:200',
            ],[
                'link.max'=>'Link tối đa 200 ký tự'
            ]);

        $slide = Slide::find($id);
        $slide->link = $request->link;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'png' && $duoi != 'jpg' && $duoi != 'jpeg')
            {
                return redirect("admin/slide/edit/".$id)->with('error_img','Hình ảnh không đúng định dạng');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(5)."-".$name;
            while(file_exists("upload/slide/".$hinh))
            {
                $hinh = str_random(5)."-".$name;
            }
            $file->move("upload/slide/",$hinh);
            if(file_exists("upload/slide/".$slide->image))
            {
                unlink("upload/slide/".$slide->image);
            }
            $slide->image = $hinh;
        }
        $slide->save();
        return redirect("admin/slide/edit/".$id)->with('thongbao','Cập nhật thông tin slide thành công');
    }

    public function getDel($id)
    {
    	$slide = Slide::find($id);
        $slide->delete();
        return redirect("admin/slide/list")->with('thongbao','Xóa slide ảnh thành công');
    }
}
