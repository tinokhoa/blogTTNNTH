@extends('.layoutadmin.main')
@section('title','Them Nguoi Dung')

@section('content')
    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @if ($message = \Illuminate\Support\Facades\Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <h2 style="margin-bottom: 40px">CẬP NHẬT THÔNG TIN NGƯỜI DÙNG</h2>
    @foreach($user as $item)
        <form action="{{route('user.update',$item->id)}}" method="POST" enctype="multipart/form-data" >
            @method('patch')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" value="{{$item->email}}" id="inputEmail4"  name="email">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputAddress">Tên</label>
                    <input type="text" class="form-control" value="{{$item->ten}}" id="inputAddress" name="ten">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputAddress">Số điện thoại</label>
                    <input  value="{{$item->sdt}}" type="text" class="form-control"  id="inputAddress" name="sdt">
                </div>
            </div>

            <div class="form-group">
                <label for="inputAddress">Địa chỉ</label>
                <input type="text" class="form-control" value="{{$item->diachi1}}" id="inputAddress"  name="diachi1">
            </div>
            <div class="form-row">
                @if(($item->hinhanh)!=null)
                    <div class="form-group col-md-4">
                        <img src="{{$item->hinhanh}}" style="max-width: 100px;max-height: 100px">
                    </div>
                @endif
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputZip">Chọn hình ảnh</label>
                    <input type="file" class="form-control" accept="image/png,image/jpegname" name="file" value="{{$item->hinhanh}}" >
                </div>

                <div class="form-group col-md-4">
                    <label for="inputZip">Trạng thái</label>
                    <select id="inputState" class="form-control" name="trangthai">
                        <option selected value="1">Hoạt động</option>
                        <option selected value="0">Tạm vắng</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputZip">Phân quyền</label>
                    <select id="inputState" class="form-control" name="phanquyen">
                        <option selected value="1">Super Admin</option>
                        <option selected value="0">Normal Admin</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <label for="inputZip">Thông tin người dùng</label>
                <textarea class="form-group col-md-12"  style="height: 150px"
                          name="thongtin" placeholder="Thêm thông tin người dùng....">{{$item->thong_tin}}</textarea>
            </div>
            <button type="submit" class="btn btn-facebook" style="height: 50px">Cập nhật tài khoản</button>
        </form>
    @endforeach

@endsection
