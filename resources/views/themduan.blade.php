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
    <h2>TẠO BẤT ĐỘNG SẢN</h2>
    <form action="{{route('duan.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail4">Tên dự án</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Tên dự án" name="tenduan" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword4">Giá dự kiến</label>
                <input type="text" class="form-control" id="inputPassword4" placeholder="$" name="giadukien" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword4">Pháp lý</label>
                <input type="text" class="form-control" id="inputPassword4"  required placeholder="VD: sổ hồng, sổ đỏ, giấy tay,..." name="phaply">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputAddress">Loại danh mục</label>
                <select id="inputState" class="form-control" name="id_loaidanhmuc">
                    @foreach($loaidanhmuc as $item)
                        <option selected value="{{$item->id}}">{{$item->ten_loai}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputAddress">Chủ đầu tư</label>
                <select id="inputState" class="form-control" name="id_chudautu">
                    @foreach($chudautu as $item)
                        <option selected value="{{$item->id}}">{{$item->ten}}</option>
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
            <div class="form-group col-md-4">
                <label for="inputAddress">Địa điểm</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="VD: Cần Thạnh huyện Cần Giờ ..."
                       required name="diadiem">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputCity">Ngày khởi công</label>
                <input type="date" class="form-control" id="inputCity" name="ngaykhoicong" placeholder="" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputCity">Ngày mở bán</label>
                <input type="date" class="form-control" id="inputCity" name="ngaymoban" placeholder="" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputZip">Ảnh bìa dự án</label>
                <input type="file" class="form-control" accept="image/png,image/jpegname" name="file">
            </div>
            <div class="form-group col-md-3" >
                <label for="inputZip">Chọn hình ảnh</label>
                <input type="file" class="form-control" accept="image/png,image/jpegname" name="files[]" multiple="multiple">
            </div>
        </div>
        <div class="form-row">
            <label for="inputState">Thông tin dự án</label>
            <div class="form-group" style="width: 100%">

                <textarea style="height: 150px;width: 100%" required name="noidung" class="form-group" placeholder="VD: Dự án nằm ở khu tiện ích trường học bệnh viện ,..."></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-success" style="height: 50px">Tạo bất động sản</button>
    </form>
@endsection
