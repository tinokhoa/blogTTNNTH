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
    @if ($message = \Illuminate\Support\Facades\Session::get('message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <h2 style="margin-bottom: 20px">CẬP NHẬT BẤT ĐỘNG SẢN</h2>
    @foreach($chudautu as $item)
            <form action="{{route('chudautu.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <lable>tên</lable>
                        <input name="ten" type="text" value="{{$item->ten}}" class="form-control">
                    </div>
                </div>
<div class="form-row">
                    <div class="form-group col-md-5">
                        <lable>Dia chi</lable>
                        <input name="diachi" type="text" value="{{$item->diachi}}" class="form-control">
                    </div>
                </div>
<div class="form-row">
                    <div class="form-group col-md-5">
                        <lable>Thong tin</lable>
                        <input name="thongtin" type="text" value="{{$item->thongtin}}" class="form-control">
                    </div>
                </div>
<div class="form-row">
                    <div class="form-group col-md-4">
                <label for="inputAddress">Loại danh mục</label>
                <select id="inputState" class="form-control" name="id_loaidanhmuc">
                  
                        <option value="1" @if($item->trangthai==1)
                            {{'selected'}}
                            @endif>Active</option>
<option value="0" @if($item->trangthai==0)
                            {{'selected'}}
                            @endif>Inactive</option>
                    
                </select>
            </div>
                </div>
<div class="form-row">
                    <div class="form-group col-md-5">
                        <lable>Thong tin</lable>
                        <input name="file" type="file" value="{{$item->hinhanh}}" class="form-control">
                    </div>
                </div>
              
                
                <button type="submit" class="btn btn-facebook" style="height: 50px">Cập nhật</button>
            </form>
    @endforeach
@endsection
