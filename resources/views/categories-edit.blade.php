@extends('.layoutadmin.main')
@section('title','Cap nhat nguoi dung')
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
    <h2>CẬP NHẬT THÔNG TIN DANH MỤC</h2>
    @foreach($danhmuc as $item)
        <form action="{{route('danhmuc.update',$item->id)}}" method="POST">
            @method('patch')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Tên danh mục</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Tên danh mục"
                           name="ten_danhmuc" value="{{$item->ten_danhmuc}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Tiêu đề</label>
                    <input type="text" class="form-control" id="inputPassword4" placeholder="Tiêu đề"
                           name="tieu_de" value="{{$item->tieu_de}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    @endforeach
@endsection
