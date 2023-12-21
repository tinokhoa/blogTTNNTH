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
    @foreach($batdongsan as $item)
        @foreach($chitiet as $items)
            <form action="{{route('batdongsan.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Tên</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Tên bất động sản"
                               value="{{$item->ten_bds}}" required name="tenbds">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Tiêu đề</label>
                        <input type="text" class="form-control" id="inputPassword4" placeholder="Tiêu để"
                               value="{{$item->tieu_de}}" required name="tieude">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Giá dự kiến</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="$"
                               value="{{$items->gia_dukien}}" required name="giadukien">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputCity">Giá hiện tại</label>
                        <input type="number" class="form-control"
                               value="{{$item->gia}}" id="inputCity" required name="gia" placeholder="$">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputAddress">Loại danh mục</label>
                        <select id="inputState" class="form-control" name="idloaidanhmuc">
                            @foreach($loaidanhmuc as $item2)
                                <option selected value="{{$item2->id}}">{{$item2->ten_loai}}</option>
                            @endforeach
                        </select>
                    </div>
                    @php $id_tinh=\Illuminate\Support\Facades\DB::table('huyen')->where('id',$items->id_huyen)->get()->first();@endphp
                    <div class="form-group col-md-2">
                        <label for="inputAddress">Tỉnh</label>
                        <select id="tinh" class="form-control" id="id_tinh">
                            <option value="">Chọn tinh</option>
                            @foreach($tinh as $tinhs)
                                <option value="{{ $tinhs->id }}" @if($tinhs->id==$id_tinh->id_tinh) SELECTED @endif>{{ $tinhs->ten_tinh}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Huyen</label>
                        <select id="huyen" class="form-control" name="idhuyen">
                            @foreach($huyen as $key)
                                <option value="{{$key->id}}" @if($items->id_huyen==$key->id) SELECTED @endif >{{$key->ten_huyen}}</option>
                            @endforeach
                        </select>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $('#tinh').on('change', function () {
                                var tinhId = $(document).ready(function () {
                                    $('#tinh').on('change', function () {
                                        var tinhId = $(this).val();
                                        if (tinhId) {
                                            $.ajax({
                                                url: '/get-huyen/' + tinhId,
                                                type: 'GET',
                                                dataType: 'json',
                                                success: function (data) {
                                                    $('#huyen').empty();
                                                    // $('#huyen').append('<option value="">Chon huyen</option>');
                                                    $.each(data, function (key, value) {
                                                        $('#huyen').append('<option value="' + value.id + '">' + value.ten_huyen + '</option>');
                                                    });
                                                }
                                            });
                                        } else {
                                            $('#huyen').empty();
                                            $('#huyen').append('<option value="">Chọn huyện</option>');
                                        }
                                    });
                                });
                            });
                        })
                    </script>>
                    <div class="form-group col-md-5">
                        <label for="inputAddress">Địa điểm</label>
                        <input type="text" class="form-control" id="inputAddress"
                               value="{{$items->diadiem}}" placeholder="VD: Số nhà... Phường... Xã..." name="diadiem">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputAddress">Tổng diện tích</label>
                        <input type="number" class="form-control" id="inputAddress"
                               value="{{$item->dientich}}" placeholder="100 m2" required name="dientich">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputAddress">Diện tích đất</label>
                        <input type="number" class="form-control" id="inputAddress"
                               value="{{$items->dientich_dat}}" placeholder="100 m2" required name="dientichdat">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputAddress">Diện tích nhà</label>
                        <input type="number" class="form-control" id="inputAddress"
                               value="{{$items->dientich_nha}}" required placeholder="VD: 100 m2" name="dientichnha">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputAddress">Số phòng ngủ</label>
                        <input type="number" class="form-control" id="inputAddress"
                               value="{{$items->phongngu}}" required name="phongngu">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputAddress">Số nhà vệ sinh</label>
                        <input type="number" class="form-control" id="inputAddress"
                               value="{{$items->nhavesinh}}" name="nhavesinh">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputAddress">Hầm để xe</label>
                        <input type="number" class="form-control" id="inputAddress"
                               value="{{$items->ham_dexe}}" name="hamdexe">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputAddress">Số tầng</label>
                        <input type="number" class="form-control" id="inputAddress"
                               value="{{$items->sotang}}" name="sotang">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputZip">Chọn ảnh bìa</label>
                        <input type="file" class="form-control" accept="image/*" value="{{$item->hinhanh}}"
                               name="file">
                    </div>
                    @if(($item->hinhanh)!=null)
                        <div class="form-group col-md-3">
                            <td><img src="{{$item->hinhanh}}" style="max-height: 100px;max-width: 100px"></td>
                        </div>
                    @endif
                    @if(($items->anhchitiet)!=null)
                        <div class="form-group col-md-3">
                            @php $files = explode(',',$items->anhchitiet) @endphp
                            @foreach($files as $img => $val)
                                <td><img src="{{$val}}" style="max-width: 100px;max-width: 100px"></td>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group col-md-3">
                        <label for="inputZip">Chọn ảnh chi tiết</label>
                        <input type="file" class="form-control"
                               value="{{$items->anhchitiet}}" accept="image/*" name="files[]" multiple="multiple">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputAddress">Nhà đầu tư</label>
                        <select id="inputState" class="form-control" name="idchudautu">
                            @foreach($chudautu as $item5)
                                <option selected value="{{$item5->id}}">{{$item5->ten}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                <textarea class="form-group col-md-12" name="noidung"
                          placeholder="Nhập nội dung mô tả bất động sản..." style="height: 200px;width: 100%">{{$items->noidung}}</textarea>
                </div>
                <button type="submit" class="btn btn-facebook" style="height: 50px">Cập nhật</button>
            </form>
        @endforeach
    @endforeach
@endsection
