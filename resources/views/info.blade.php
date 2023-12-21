
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
    @foreach($user as $item)
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Thông Tin Người Dùng</h5>
                </div>
                @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                @if ($message = \Illuminate\Support\Facades\Session::get('error'))
                    <div class="alert alert-danger alert-danger" style="text-align: center">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if ($message = \Illuminate\Support\Facades\Session::get('message'))
                    <div class="alert alert-success alert-success" style="text-align: center">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong style="text-align: center">{{ $message }}</strong>
                    </div>
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if(($item->hinhanh)!=null)
                                <img src="{{$item->hinhanh}}" alt="Profile Picture" class="img-fluid rounded-circle">
                            @else
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <input type="file" class="form-control"
                                           required="" name="image">
                                    <button style="margin-top: 20px" class="btn btn-primary text-center"><i class="icon icon-upload-cloud">
                                        </i>Upload avatar</button>
                                </form>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h4 class="card-title" style="margin-top: 10px">Tên Tài Khoản : {{$item->ten}}</h4>
                            <h5 class="card-text" style="margin-top: 20px">Địa Chỉ Email : {{$item->email}}</h5>
                            <h5 class="card-text" style="margin-top: 20px">Số điện thoại : {{$item->sdt}}</h5>
                            <h5 class="card-text" style="margin-top: 20px">Địa chỉ thường trú : {{$item->diachi1}}</h5>
{{--                            <p class="card-text">Role : @if($item->role==0) Client @else Admin @endif</p>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
