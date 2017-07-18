<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function getList()
    {
        $user = User::all();
        return view('admin.user.list',['user'=>$user]);
    }

    public function getAdd()
    {
        return view("admin.user.add");
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,[
                'full_name'=>'required|min:3|max:100',
                'email'=>'required|min:3|max:100|email|unique:users,email',
                'password'=>'required|min:3|max:100',
                'passwordAgain'=>'required|same:password',
                'phone'=>'numeric',
            ],[
                'full_name.required'=>'Bạn chưa nhập họ tên',
                'full_name.min'=>'Họ tên phải từ 3 ký tự trở lên',
                'full_name.max'=>'Họ tên tối đa là 100 ký tự',
                'email.required'=>'Bạn chưa nhập email',
                'email.min'=>'Email phải từ 3 ký tự trở lên',
                'email.max'=>'Email tối đa là 100 ký tự',
                'email.email'=>'Email không đúng định dạng',
                'email.unique'=>'Email đã tồn tại',
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu phải từ 3 ký tự trở lên',
                'password.max'=>'Mật khẩu tối đa 100 ký tự',
                'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same'=>'Nhập lại mật khẩu chưa đúng',
                'phone.numeric'=>'Số điện thoại không đúng định dạng',
            ]);

        $user = New User;
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = $request->quyen;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect("admin/user/add")->with('thongbao','Bạn đã tạo tài khoản mới thành công');
    }

    public function getEdit($id)
    {
        $user = User::find($id);
        return view("admin.user.edit",['user'=>$user]);
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request,[
                'full_name'=>'required|min:3|max:100',
                'email'=>'required|min:3|max:100|email',
                'phone'=>'numeric',
            ],[
                'full_name.required'=>'Bạn chưa nhập họ tên',
                'full_name.min'=>'Họ tên phải từ 3 ký tự trở lên',
                'full_name.max'=>'Họ tên tối đa là 100 ký tự',
                'email.required'=>'Bạn chưa nhập email',
                'email.min'=>'Email phải từ 3 ký tự trở lên',
                'email.max'=>'Email tối đa là 100 ký tự',
                'email.email'=>'Email không đúng định dạng',
                'phone.numeric'=>'Số điện thoại không đúng định dạng',
            ]);

        $user = User::find($id);
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->quyen = $request->quyen;
        if($request->changePassword == 'on')
        {
            $this->validate($request,[
                    'password'=>'required|min:3|max:100',
                    'passwordAgain'=>'required|same:password',
                ],[
                    'password.required'=>'Bạn chưa nhập mật khẩu',
                    'password.min'=>'Mật khẩu phải từ 3 đến 100 ký tự',
                    'password.max'=>'Mật khẩu phải từ 3 đến 100 ký tự',
                    'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                    'passwordAgain.same'=>'Mật khẩu nhập lại chưa trùng khớp',
                ]);
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect('admin/user/edit/'.$id)->with('thongbao','Bạn đã sửa thông tin người dùng thành công');
    }

    public function getDel($id)
    {
    	$user = User::find($id);
        $user->delete();
        return redirect("admin/user/list")->with('thongbao','Bạn đã xóa tài khoản thành công');
    }

    public function getLogin()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request,[
                'email'=>'required|email',
                'password'=>'required|min:3|max:100',
            ],[
                'email.required'=>'Bạn chưa nhập tài khoản email',
                'email.email'=>'Email chưa đúng định dạng',
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 3 ký tự',
                'password.max'=>'mật khẩu tối đa 100 ký tự',
            ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('admin/');
        }
        else
        {
            return redirect('admin/dangnhap')->with('thongbao','Tài khoản hoặc mật khẩu không đúng');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}
