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
    <h2>CẬP NHẬT DỰ ÁN</h2>
    {{--    @foreach($duan as $item)--}}
    <form action="{{route('duan.update',$duan->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail4">Tên dự án</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Tên dự án"
                       value="{{$duan->ten_duan}}" name="tenduan">
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword4">Giá dự kiến</label>
                <input type="text" class="form-control" id="inputPassword4"
                       value="{{$duan->gia_dukien}}" placeholder="Giá dự kiến $" name="giadukien">
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword4">Pháp lý</label>
                <input type="text" class="form-control" id="inputPassword4"
                       value="{{$duan->phap_ly}}"
                       placeholder="VD: sổ hồng, sổ đỏ, giấy tay,..." name="phaply">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputAddress">Loại danh mục</label>
                <select id="inputState" class="form-control" name="id_loaidanhmuc">
                    @foreach($loaidanhmuc as $item)
                        <option value="{{$item->id}}" @if($duan->id_loaidanhmuc==$item->id)
                            {{'selected'}}
                            @endif>{{$item->ten_loai}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputAddress">Chủ đầu tư</label>
                <select id="inputState" class="form-control" name="id_chudautu">
                    @foreach($chudautu as $item3)
                        <option value="{{$item3->id}}">{{$item3->ten}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputAddress">Huyện</label>
                <select id="inputState" class="form-control" name="idhuyen">
                    @foreach($huyen as $item4)
                        <option selected value="{{$item4->id}}">{{$item4->ten_huyen}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputAddress">Địa điểm</label>
                <input type="text" class="form-control" id="inputAddress"
                       value="{{$duan->diadiem}}" placeholder="VD: Cần Thạnh huyện Cần Giờ ..." name="diadiem">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputCity">Ngày khởi công</label>
                <input type="date" class="form-control"
                       id="inputCity" name="ngaykhoicong" placeholder="{{$duan->ngay_khoicong}}">
            </div>
            <div class="form-group col-md-3">
                <label for="inputCity">Ngày mở bán</label>
                <input type="date" class="form-control"
                       id="inputCity" name="ngaymoban" placeholder="{{$duan->ngay_moban}}">
            </div>
        </div>
        <div class="form-row">
            @if(($duan->anh_bia)!=null)
                <div class="form-group col-md-2">
                    <td ><img src="{{$duan->anh_bia}}" style="max-height: 100px;max-width: 100px"></td>
                </div>
            @endif
            <div class="form-group col-md-2">
                <label for="inputZip">Ảnh bìa dự án</label>
                <input type="file" class="form-control"
                       value="{{$duan->anh_bia}}" accept="image/*" name="file">
            </div>
        </div>
        <div class="row">
            @if(($duan->hinh_anh)!=null)
                @php $files =explode(',',$duan->hinh_anh) @endphp
                @foreach($files as $img =>$val)
                    <div class="form-group">
                        <td style="margin-left: 5px"><img src="{{$val}}" style="max-width: 100px;max-height: 100px"></td>
                    </div>
                @endforeach
            @endif
            <div class="form-group col-md-2">
                <label for="inputZip">Chọn hình ảnh</label>
                <input type="file" class="form-control" accept="image/*"
                       value="{{$duan->hinh_anh}}" name="files[]" multiple="multiple">
            </div>
        </div>
        <div class="form-row">
            <label for="inputState">Thông tin dự án</label>
            <div class="form-group" style="width: 100%">
                    <textarea style="height: 150px;width: 100%" name="noidung" class="form-group"
                              placeholder="VD: Dự án nằm ở khu tiện ích trường học bệnh viện ,...">
                        {{$duan->noidung}}
                    </textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-success" style="height: 50px">Cập nhật bất động sản</button>
    </form>
    {{--    @endforeach--}}
@endsection
