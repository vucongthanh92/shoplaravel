<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class TinTucController extends Controller
{
    public function getList()
    {
        $tintuc = News::all();
        return view('admin.tintuc.list',['tintuc'=>$tintuc]);
    }

    public function getAdd()
    {
        return view('admin.tintuc.add');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,[
                'title'=>'required|min:3|max:100|unique:news,title',
                'description'=>'required',
                'content'=>'required',
            ],[
                'title.required'=>'Bạn chưa nhập tiêu đề',
                'title.min'=>'Tiêu đề phải từ 3 ký tự trở lên',
                'title.max'=>'Tiêu đề tối đa là 100 ký tự',
                'title.unique'=>'Tiêu đề đã tồn tại',
                'description.required'=>'Bạn chưa nhập mô tả cho tin',
                'content.required'=>'Bạn chưa nhập nội dung cho tin',
            ]);

        $tintuc = new News;
        $tintuc->title = $request->title;
        $tintuc->description = $request->description;
        $tintuc->content = $request->content;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'png' && $duoi != 'jpg' && $duoi != 'jpeg')
            {
                return redirect('admin/tintuc/add')->with('error_img','Hình ảnh không đúng định dạng');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(5)."-".$name;
            while(file_exists("upload/news/".$hinh))
            {
                $hinh = str_random(5)."-".$name;
            }
            $file->move("upload/news/",$hinh);
            $tintuc->image = $hinh;
        }
        else
        {
            $tintuc->image = "";
        }

        $tintuc->save();
        return redirect("admin/tintuc/add")->with('thongbao','Thêm tin tức thành công');
    }

    public function getEdit($id)
    {
        $tintuc = News::find($id);
        return view('admin.tintuc.edit',['tintuc'=>$tintuc]);
    }

    public function postEdit(Request $request, $id)
    {
        $tintuc = News::find($id);
        $this->validate($request,[
                'title'=>'required|min:3|max:100',
                'description'=>'required',
                'content'=>'required',
            ],[
                'title.required'=>'Bạn chưa nhập tiêu đề chi tin',
                'title.min'=>'Tiêu đề phải dài từ 3 ký tự trở lên',
                'title.max'=>'Tiêu đề dài tối đa 100 ký tự',
                'description.required'=>'Bạn chưa nhập mô tả cho tin',
                'content.required'=>'Bạn chưa nhập nội dung cho tin',
            ]);

        $tintuc->title = $request->title;
        $tintuc->description = $request->description;
        $tintuc->content = $request->content;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/tintuc/edit/'.$id)->with('error_img','Hình ảnh không đúng định dạng');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(5)."-".$name;
            while(file_exists("upload/news/".$hinh))
            {
                $hinh = str_random(5)."-".$name;
            }
            $file->move("upload/news/",$hinh);
            unlink('upload/news/'.$tintuc->image);
            $tintuc->image = $hinh;
        }

        $tintuc->save();
        return redirect('admin/tintuc/edit/'.$id)->with('thongbao','Cập nhật tin tức thành công');
    }

    public function getDel($id)
    {
    	$tintuc = News::find($id);
        $tintuc->delete();
        return redirect("admin/tintuc/list")->with('thongbao','Bạn đã xóa tin tức thành công');
    }
}
