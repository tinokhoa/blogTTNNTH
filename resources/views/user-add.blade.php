@extends('.layoutadmin.main')
@section('title','Thêm người dùng')
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
    <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data" >
       @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Mật khẩu</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Tên</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="ten">
        </div>
        <div class="form-group">
            <label for="inputAddress">Địa chỉ</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="diachi1">
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputCity">Thành phố</label>
                <input type="text" class="form-control" id="inputCity" name="thanhpho">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">Tỉnh</label>
                <select id="inputState" class="form-control" name="tinh">
                    @foreach($tinh as $item)
                        <option selected value="{{$item->id}}">{{$item->ten_tinh}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">Huyện</label>
                <select id="inputState" class="form-control" name="huyen">
                    @foreach($huyen as $item)
                        <option selected value="{{$item->id}} ">{{$item->ten_huyen}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="inputZip">Chọn hình đại diện</label>
                <input type="file" class="form-control" accept="image/png,image/jpegname" name="file" >
            </div>
            <div class="form-group col-md-4">
                <label for="inputZip">Trạng thái</label>
                <select id="inputState" class="form-control" name="trangthai">
                    <option selected value="1">Hoạt động</option>
                    <option selected value="0">Vắng</option>
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
        <button type="submit" class="btn btn-facebook"  style="height: 50px">Tạo tài khoản</button>
    </form>
@endsection
