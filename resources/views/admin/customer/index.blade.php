@extends('admin.layouts.master')
@section('title') Quản lý sản phẩm @endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link href="{{ URL::asset('/assets/css/select2/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="card rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Danh sách sản phẩm</h6>
            <a href="/admin/them-moi/khach-hang" class="btn btn-dark waves-effect waves-light w-sm pt-2 pb-2">Thêm mới</a>
        </div>
    </div>
    <div class="mt-2" style="padding: 0 !important;">
        @if (session('success'))
            <div class="alert alert-success" style="margin-bottom: 0.2rem !important;">
                @lang(session('success'))
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                @lang(session('error'))
            </div>
        @endif
    </div>
    <div class="card mt-2">
        <div class="card-body">
            <form action="/admin/khach-hang" method="get">
                @foreach(request()->query() as $key => $value)
                    @if($key != 'name' && $key != 'root_id')
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endif
                @endforeach
                <div class="form-search row align-items-end">
                    <div class="col-12 col-md-4">
                        <label for="search-name" class="m-0">Tên</label>
                        <input class="form-control" value="@if(isset($input['name'])){{$input['name']}}@endif" placeholder="Nhập tên sản phẩm" name="name" id="search-name"/>
                    </div>
                    <div class="col-4 col-md-2 mt-2">
                        <button type="submit" class="btn btn-primary btn-search"><i class="bx bx-search fs-17"></i>Tìm kiếm</button>
                    </div>
                    <div class="col-3 col-md-6 d-flex align-items-center justify-content-end gap-3">
                        <div>
                            <label for="ordering" class="form-label" style="clear: both; display: inline-block">Sắp xếp thứ tự </label>
                            <select class="form-select select_ordering" name="ordering" id="ordering">
                                <option value="ASC" @if((isset($input['ordering']) && $input['ordering'] === 'ASC') || !isset($input['ordering'])) selected @endif>Tăng dần</option>
                                <option value="DESC" @if((isset($input['ordering']) && $input['ordering'] === 'DESC')) selected @endif>Giảm dần</option>
                            </select>
                        </div>

                    </div>
                </div>
            </form>
            <div class="table-responsive table-card mt-3 mb-1">
                <table class="table align-middle table-nowrap" id="customerTable">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th  data-sort="customer_name">Ảnh</th>
                        <th  data-sort="customer_name">Tên khách hàng</th>
                        <th  data-sort="address">Địa chỉ</th>
                        <th  data-sort="address">Số hiện thoại</th>
                        <th  data-sort="customer_name">Thứ tự</th>
                        <th  data-sort="action">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody class="list form-check-all">
                    @foreach($data as $index => $item)
                        <tr>
                            <td class="customer_name">{{ ++$index }}</td>
                            <td class="customer_name"><img src="{{$item->image}}" style="width:80px;height:80px"></td>
                            <td class="customer_name">{{ $item->name }}</td>
                            <td class="customer_name">{{ $item->address }}</td>
                            <td class="customer_name">{{ $item->phone_number }}</td>
                            <td class="customer_name">{{ $item->ordering }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <div class="edit">
                                        <button onclick="window.location='/admin/{{$item->id}}/khach-hang'" class="btn btn-sm btn-success edit-item-btn" >Cập nhật</button>
                                    </div>
                                    <div class="remove">
                                        <button
                                                value="{{ $item->id }}"
                                                class="btn btn-sm btn-danger remove-item-btn"
                                        >Xoá</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="noresult" style="@if(isset($data) && count($data) === 0) display: grid @else display: none @endif">
                    <div class="text-center">
                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                   colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                        </lord-icon>
                        <h5 class="mt-2">Không tìm thấy bản ghi nào.</h5>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-right">
                {!! $data->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>

    <!-- Modal delete -->
    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="form-delete">
                        @method('delete')
                        @csrf
                        <input type="hidden" id="record_id">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                       colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-4">
                                <h4>Bạn đã chắc chắn ?</h4>
                                <p class="text-muted mx-4 mb-0">Bạn chắc chắn muốn Xoá bản ghi này?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Đóng</button>
                            <button type="button" class="btn w-sm btn-danger " id="delete-record">Xoá</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end modal delete -->
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/project-create.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.js.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/select2/select2.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.5.11/full-all/ckeditor.js"></script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script src="{{ URL::asset('backend/assets/js/checkUrl.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.remove-item-btn').click(function (e) {
                e.preventDefault();
                $('#record_id').val($(this).val())
                $('#deleteRecordModal').modal('show');
            });

            $('#delete-record').click(function () {
                const item_id = $('#record_id').val()
                const form = $('#form-delete');
                form.attr('action', '/admin/'+ item_id+'/khach-hang');
                form.submit();
            });
        })
    </script>
@endsection
