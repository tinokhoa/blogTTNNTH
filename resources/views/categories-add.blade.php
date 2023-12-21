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
    <form action="{{route('danhmuc.store')}}" method="post" >
        @csrf
        <div style="margin-left: 20%">
            <h1>THÊM DANH MỤC</h1>
            <div class="form-row" style="margin-top: 20px">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Tên Danh Mục</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Tên danh mục" name="tendanhmuc">
                </div>
            </div>
            <div class="form-row" style="margin-top: 10px" >
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Tiêu đề danh mục</label>
                    <input type="text" class="form-control" id="inputPassword4" placeholder="Tiêu đề" name="tieude">
                </div>
            </div>
            <button type="submit" class="btn btn-facebook" style="height: 50px">Tạo danh mục</button>
        </div>


    </form>
@endsection
