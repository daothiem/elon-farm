@extends('admin.layouts.master')
@section('title') Quản lý chương trình khuến mãi @endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link href="{{ URL::asset('/assets/css/select2/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="card rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Danh sách chương trình khuyến mãi</h6>
            <a href="/admin/them-moi/promotion" class="btn btn-dark waves-effect waves-light w-sm pt-2 pb-2">Thêm mới</a>
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
            <form action="/admin/promotion" method="get">
                @foreach(request()->query() as $key => $value)
                    @if($key != 'name' && $key != 'root_id')
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endif
                @endforeach
                <div class="form-search row align-items-end">
                    <div class="col-12 col-md-3">
                        <label for="search-name" class="m-0">Tên</label>
                        <input class="form-control" value="@if(isset($input['name'])){{$input['name']}}@endif" placeholder="Nhập tên sản phẩm" name="name" id="search-name"/>
                    </div>
                    <div class="col-4 col-md-2 mt-2">
                        <button type="submit" class="btn btn-primary btn-search"><i class="bx bx-search fs-17"></i>Tìm kiếm</button>
                    </div>
                    <div class="col-3 col-md-3 d-flex align-items-start flex-column">
                        <label for="ordering" class="form-label" style="clear: both; display: inline-block">Sắp xếp thứ tự </label>
                        <select class="form-select select_ordering" name="ordering" id="ordering">
                            <option value="ASC" @if((isset($input['ordering']) && $input['ordering'] === 'ASC') || !isset($input['ordering'])) selected @endif>Tăng dần</option>
                            <option value="DESC" @if((isset($input['ordering']) && $input['ordering'] === 'DESC')) selected @endif>Giảm dần</option>
                        </select>
                    </div>
                </div>
            </form>
            <div class="table-responsive table-card mt-3 mb-1">
                <table class="table align-middle table-nowrap" id="customerTable">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th  data-sort="customer_name">Tên chương trình</th>
                        <th  data-sort="customer_name">Mã code</th>
                        <th  data-sort="address">TG bắt đấu</th>
                        <th  data-sort="address">TG kết thúc</th>
                        <th  data-sort="address">Min đơn hàng</th>
                        <th  data-sort="address">Số tiền max được áp dụng</th>
                        <th  data-sort="address">Phần trăm áp dụng</th>
                        <th  data-sort="action">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody class="list form-check-all">
                    @foreach($data as $index => $item)
                        <tr>
                            <td class="customer_name">{{ ++$index }}</td>
                            <td class="customer_name">{{ $item->name }}</td>
                            <td class="customer_name">{{ $item->code }}</td>
                            <td class="customer_name">{{ date('d-m-Y', strtotime($item->from_date)) }}</td>
                            <td class="customer_name">{{ date('d-m-Y', strtotime($item->to_date)) }}</td>
                            <td class="customer_name">{{ number_format($item->min_total) }}</td>
                            <td class="customer_name">{{ number_format($item->max_discount) }}</td>
                            <td class="customer_name">{{ $item->fixed_percent }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <div class="edit">
                                        <button onclick="window.location='/admin/{{$item->id}}/promotion'" class="btn btn-sm btn-success edit-item-btn" >Cập nhật</button>
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
                form.attr('action', '/admin/'+ item_id+'/san-pham');
                form.submit();
            });

            $('.select2_select-categories').select2({
                allowClear: true,
                multiple: false,
                placeholder: 'Chọn danh mục sản phẩm',
            });
        })
    </script>
@endsection
