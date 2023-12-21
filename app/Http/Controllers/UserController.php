<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use App\Models\Huyen;
use App\Models\Tinh;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=User::all();
        return view('admin',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tinh=Tinh::all();
        $huyen=Huyen::all();
        return view('user-add',compact('tinh','huyen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Auth::user()->id;
        $check_role_admin=User::all()->where('id',$data)->value('phan_quyen');
        $check_Exist = DB::table('users')->where('email', $request->email)->get()->first();
        if (!Auth::check()) {
            return redirect('login')->with('error','Hãy đăng nhập để vào trang quản trị');
        } else if ($check_role_admin == 0) {
            if (is_null($check_Exist)) {
                if ($image = $request->file('file')) {
                    $destinationPath = 'images/';
                    $profileImage = date('YmdHis') . "." . $image->getClientOriginalName();
                    $image->move($destinationPath, $profileImage);
                    $data= "http://127.0.0.1:8000/images/$profileImage";
                }
                User::create([
                    'ten' => $request->ten,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'hinhanh' => $data,
                    'trang_thai' => $request->trangthai,
                    'phan_quyen' => $request->phanquyen,
                    'diachi1' => $request->diachi1,
                ]);
                return redirect()->back()->with('error', 'Thêm thông tin người dùng thành công');
            } else {
                return redirect()->back()->with('error', 'Email đã tồn tại. Hãy sử dụng một email khác');
            }
        } else {
            return redirect('user-add')->with('error', 'Ban khong the su dung chuc nang nay');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        //
        $user=User::all()->where('id',$id);
        return view('user-edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::all()->where('id',$id);
        foreach ($user as $item)
        {
            if ($image = $request->file('file')) {
                $destinationPath = 'images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalName();
                $image->move($destinationPath, $profileImage);
                $data = "http://127.0.0.1:8000/images/$profileImage";
                Storage::delete('public/images/' .$item->hinhanh);
            }
            else{
                $data=$item->hinhanh;
            }
            DB::table('users')->where('id', $id)->update([
                'ten'=>$request->ten,
                'email'=>$request->email,
                'diachi1'=>$request->diachi1,
                'phan_quyen'=>$request->phanquyen,
                'trang_thai'=>$request->trangthai,
                'hinhanh'=>$data,
                'sdt'=>$request->sdt,
                'thong_tin'=>$request->thongtin
            ]);
           return redirect()->back()->with('error','Cập nhật thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check=Auth::user()->id;
        $check_role_admin = DB::table('users')->where('id', $check)->get()->value('phan_quyen');
        if ($check_role_admin == 1) {
          return redirect()->back()->with('error','Không thể xóa thông tin người dùng này');
        }
        else {
            User::destroy($id);
            return redirect()->back()->with('message','Xóa thành công');
        }

    }
    public function logout()
    {
        Auth::logout();
        return redirect('login')->with('message','Logout successful');
    }
    public function login(LoginRequest $request)
    {
        $data_login = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($data_login)) {
            return redirect('/user')->with('message', 'Đăng nhập thành công');
        } else {
            return redirect()->back()->with('error', 'Email hoặc mật khẩu không chính xác');
        }
    }

    public function profile()
    {
        $id=Auth::user()->id;
        $user=User::all()->where('id',$id);
        return view('info',compact('user'));

    }

}
