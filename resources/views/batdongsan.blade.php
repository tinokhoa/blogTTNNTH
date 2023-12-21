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
        <h1 class="h3 mb-2 text-gray-800">QUẢN LÝ BẤT ĐỘNG SẢN</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-2">
                <p class="m-0 font-weight-bold text-primary" style="float: right"><a href="{{\Illuminate\Support\Facades\URL::to('them-batdongsan')}}">Tạo BDS</a></p>
                <p class="m-0 font-weight-bold text-primary">Thông tin bất động sản</p>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Tiêu đề</th>
                            <th>Hình ảnh</th>
                            <th>Ngày tạo</th>
                            <th>Giá</th>
                            <th>Diện tích</th>
                            <th>Xóa</th>
                            <th>Cập nhật</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Tên</th>
                            <th>Tiêu đề</th>
                            <th>Hình ảnh</th>
                            <th>Ngày tạo</th>
                            <th>Giá</th>
                            <th>Diện tích</th>
                            <th>Xóa</th>
                            <th>Cập nhật</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($batdongsan as $item)
                            <tr>
                                <td>{{$item->ten_bds}}</td>
                                <td>{{$item->tieu_de}}</td>
                                <td><img src="{{$item->hinhanh}}" style="max-width: 100px;max-height:100px"></td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->gia}} $</td>
                                <td>{{$item->dientich}} m2</td>
                                <td><a><button data-toggle="modal" data-target="#exampleModal" data-whatever="{{$item->id}}" class="btn btn-danger">Xóa</button></a></td>
                                <td><a href="{{route('updatebds',$item->id)}}" class="btn btn-danger">Sửa</a></td>
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
{{--MODAL--}}
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
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Bạn muốn xóa bất động sản có id là ' + recipient)
        modal.find('.modal-body form').attr('action','/batdongsan/'+recipient)
    })
</script>
</body>

</html>
