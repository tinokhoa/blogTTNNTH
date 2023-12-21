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
    <h2 style="margin-bottom: 20px">THÊM THÔNG TIN BẤT ĐỘNG SẢN</h2>
    <form action="{{route('batdongsan.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputEmail4">Tên</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Tên bất động sản"
                       name="tenbds" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">Tiêu đề</label>
                <input type="text" class="form-control" id="inputPassword4" placeholder="Tiêu để"
                       name="tieude" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Giá dự kiến</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="$"
                       name="giadukien" required>
            </div>
            <div class="form-group col-md-2">
                <label for="inputCity">Giá hiện tại</label>
                <input type="number" class="form-control"
                       id="inputCity" name="gia" placeholder="$" required>
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
            <div class="form-group col-md-2">
                <label for="inputAddress">Tỉnh</label>
                <select id="tinh" class="form-control" id="id_tinh" required>
                    <option value="">Chọn tỉnh</option>
                    @foreach($tinh as $tinhs)
                        <option value="{{ $tinhs->id }}">{{ $tinhs->ten_tinh }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                <label>Huyen</label>
                <select id="huyen" class="form-control" name="idhuyen" required>
                    <option value="">Chọn huyện</option>
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
                                            $('#huyen').append('<option value="">Chọn huyện</option>');
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
            </script>
            <div class="form-group col-md-5">
                <label for="inputAddress">Địa điểm</label>
                <input type="text" class="form-control" id="inputAddress"
                       placeholder="VD: Số nhà... Phường... Xã..." name="diadiem" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputAddress">Tổng diện tích</label>
                <input type="number" class="form-control" id="inputAddress"
                       placeholder="100 m2" name="dientich" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputAddress">Diện tích đất</label>
                <input type="number" class="form-control" id="inputAddress"
                       placeholder="100 m2" name="dientichdat" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputAddress">Diện tích nhà</label>
                <input type="number" class="form-control" id="inputAddress"
                       placeholder="VD: 100 m2" name="dientichnha" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputAddress">Số phòng ngủ</label>
                <input type="number" class="form-control" id="inputAddress"
                       value="1" name="phongngu" required>
            </div>
            <div class="form-group col-md-2">
                <label for="inputAddress">Số nhà vệ sinh</label>
                <input type="number" class="form-control" id="inputAddress"
                       value="1" name="nhavesinh" required>
            </div>
            <div class="form-group col-md-2">
                <label for="inputAddress">Hầm đề xe</label>
                <input type="number" class="form-control" id="inputAddress"
                       value="1" name="hamdexe" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputAddress">Số tầng</label>
                <input type="number" class="form-control" id="inputAddress"
                       value="1" name="sotang" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputZip">Chọn ảnh bìa</label>
                <input type="file" class="form-control" accept="image/*"
                       name="file" >
            </div>
            <div class="form-group col-md-3">
                <label for="inputZip">Chọn ảnh chi tiết</label>
                <input type="file" class="form-control" accept="image/*" name="files[]" multiple="multiple">
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
                    <textarea class="form-control col-md-12" name="noidung"
                              placeholder="Nhập nội dung mô tả bất động sản..."
                              required style="height: 200px;width: 100%"></textarea>
        </div>
        <button type="submit" class="btn btn-success" style="height: 50px;margin-top: 20px">Tạo Bất Động Sản</button>
    </form>
@endsection
