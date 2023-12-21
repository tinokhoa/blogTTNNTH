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
    @if ($message = \Illuminate\Support\Facades\Session::get('message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <form action="{{route('chudautu.store')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4" >
                <label for="inputAddress">Tên</label>
                <input type="text" class="form-control" id="inputAddress" required placeholder="Name of..." name="ten">
            </div>
            <div class="form-group col-md-4">
                <label for="inputAddress">Địa chỉ</label>
                <input type="text" class="form-control" id="inputAddress" required placeholder="1234 Nguyen Trai street ..." name="diachi">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Trang thai</label>
                <select id="inputState" class="form-control" name="trangthai">
                    <option selected value="1">Active</option>
                    <option selected value="0">Inactive</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Choose Image</label>
                <input type="file" name="file" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-10">
                <label>Thong tin</label>
                <textarea required style="width: 100%;height: 200px" name="thongtin" placeholder="Thong tin lien he cua chu dau tu"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-facebook"  style="height: 50px">Tạo tài khoản</button>
    </form>
@endsection
