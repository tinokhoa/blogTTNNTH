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
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">QUẢN LÝ CHỦ ĐẦU TƯ</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-2">
                <p class="m-0 font-weight-bold text-primary" style="float: right"><a href="{{\Illuminate\Support\Facades\URL::to('themchudautu')}}">Tạo CĐT</a></p>
                <p class="m-0 font-weight-bold text-primary">Thông tin chủ đầu tư</p>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Hình ảnh</th>
                            <th>Ngày tạo</th>
                            <th>Thông tin</th>
                            <th>Trạng thái</th>
                            <th>Địa chỉ</th>
                            <th>Xóa</th>
                            <th>Cập nhật</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Tên</th>
                            <th>Hình ảnh</th>
                            <th>Ngày tạo</th>
                            <th>Thông tin</th>
                            <th>Trạng thái</th>
                            <th>Địa chỉ</th>
                            <th>Xóa</th>
                            <th>Cập nhật</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($chudautu as $item)
                            <tr>
                                <td>{{$item->ten}}</td>
                                <td><img src="{{$item->hinhanh}}" style="max-width: 100px;max-height:100px"></td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->thongtin}}</td>
                                <td>{{$item->trangthai}}</td>
                                <td>{{$item->diachi}}</td>
                                <td><a><button data-toggle="modal" data-target="#exampleModal" data-whatever="{{$item->id}}" class="btn btn-danger">Xóa</button></a></td>
                                <td><a href="{{route('capnhatchudautu',$item->id)}}" class="btn btn-danger">Sửa</a></td>
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
{{--@include('.layoutadmin.modal')--}}
<!-- Footer -->
@include('.layoutadmin.footer')
<!-- End of Footer -->
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
        modal.find('.modal-title').text('Bạn muốn xóa CDT có id là ' + recipient)
        modal.find('.modal-body form').attr('action','/chudautu/'+recipient)
    })
</script>
</body>

</html>
