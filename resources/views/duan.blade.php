<!DOCTYPE html>
<html lang="en">

@include('.layoutadmin.header')

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    @include('.layoutadmin.nav')
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">QUẢN LÝ BẤT DỰ ÁN</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-2">
                <p class="m-0 font-weight-bold text-primary" style="float: right"><a href="{{\Illuminate\Support\Facades\URL::to('themduan')}}">Tạo Dự án</a></p>
                <p class="m-0 font-weight-bold text-primary">Thông tin dự án</p>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Giá dự kiến</th>
                            <th>Pháp lý</th>
                            <th>Chủ đầu tư</th>
                            <th>Loại danh mục</th>
                            <th>Địa điểm</th>
                            <th>Ảnh bìa</th>
                            <th>Ngày khởi công</th>
                            <th>Xóa</th>
                            <th>Sửa</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Tên</th>
                            <th>Giá dự kiến</th>
                            <th>Pháp lý</th>
                            <th>Chủ đầu tư</th>
                            <th>Loại danh mục</th>
                            <th>Địa điểm</th>
                            <th>Ảnh bìa</th>
                            <th>Ngày khởi công</th>
                            <th>Xóa</th>
                            <th>Sửa</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($duan as $item)
                            <tr>
                                <td>{{$item->ten_duan}}</td>
                                <td>{{$item->gia_dukien}} $</td>
                                <td>{{$item->phap_ly}}</td>
                                @php $loaidanhmuc=\App\Models\LoaiDanhmuc::all()->where('id',$item->id_loaidanhmuc);
                                    $chudautu=\App\Models\ChuDautu::all()->where('id',$item->id_chudautu);
                                @endphp
                                @foreach($chudautu as $item3)
                                    <td>{{$item3->ten}}</td>
                                @endforeach
                                @foreach($loaidanhmuc as $item2)
                                    <td>{{$item2->ten_loai}}</td>
                                @endforeach
                                <td>{{$item->diadiem}}</td>
                                <td><img src="{{$item->anh_bia}}" style="max-width: 100px;max-height:100px"></td>
                                <td>{{$item->ngay_khoicong}}</td>
                                <td><a><button data-toggle="modal" data-target="#exampleModal" data-whatever="{{$item->id}}" class="btn btn-danger">Xóa</button></a></td>
                                <td><a href="{{route('capnhatduan',$item->id)}}" class="btn btn-danger">Sửa</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Footer -->
@include('.layoutadmin.footer')
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
@include('.layoutadmin.logout')
@include('.layoutadmin.script')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf
                    @method('delete')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Bạn muốn xóa user có id là ' + recipient)
        modal.find('.modal-body form').attr('action','/duan/'+recipient)
    })
</script>
</body>

</html>
