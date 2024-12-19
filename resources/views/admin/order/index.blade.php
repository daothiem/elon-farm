@extends('admin.layouts.master')
@section('title') Quản lý sản phẩm @endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link href="{{ URL::asset('/assets/css/select2/select2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@endsection
@section('content')
    <div class="card rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Danh sách đơn hàng</h6>
        </div>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <form action="/admin/don-hang" method="get">
                @foreach(request()->query() as $key => $value)
                    @if($key != 'name' && $key != 'root_id')
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endif
                @endforeach
                <div class="form-search row align-items-end">
                    <div class="col-12 col-md-3">
                        <label for="search-name" class="m-0">Tên khách hàng</label>
                        <input class="form-control" value="@if(isset($input['name'])){{$input['name']}}@endif" placeholder="Nhập tên khách hàng" name="name" id="search-name"/>
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="choices-sex-input" class="form-label" style="clear: both; display: inline-block; white-space: nowrap;">Phân loại đơn hàng</label>
                        <select class="form-select" name="send_to" id="choices-sex-input">
                            {!! $send_to_html !!}
                        </select>
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="choices-sex-input" class="form-label" style="clear: both; display: inline-block; white-space: nowrap;">Trạng thái</label>
                        <select class="form-select" name="status" id="choices-sex-input">
                            {!! $status_html !!}
                        </select>
                    </div>
                    <div class="col-4 col-md-2 mt-2">
                        <button type="submit" class="btn btn-primary btn-search"><i class="bx bx-search fs-17"></i>Tìm kiếm</button>
                    </div>
                    <div class="col-3 col-md-1 d-flex align-items-center flex-column p-0">
                        <label for="ordering" class="form-label" style="clear: both; display: inline-block">Sắp xếp</label>
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
                        <th  data-sort="customer_name">Tên khách hàng</th>
                        <th  data-sort="customer_name">Số điện thoại</th>
                        <th  data-sort="address">Địa chỉ</th>
                        <th  data-sort="address">Trạng thái</th>
                        <th  data-sort="address">Send mail tới</th>
                        <th  data-sort="address">Ngày lập đơn</th>
                        <th  data-sort="address">Tổng tiền</th>
                        <th  data-sort="action">Thay đổi trạng thái</th>
                    </tr>
                    </thead>
                    <tbody class="list form-check-all">
                    @foreach($data as $index => $item)
                        <tr>
                            <td class="customer_name">{{ ++$index }}</td>
                            <td class="customer_name">{{ $item->customer_name }}</td>
                            <td class="customer_name">{{ $item->customer_phone }}</td>
                            <td class="customer_name">{{ $item->other_address }}, {{ $item->ward?->full_name }}, {{ $item->district?->full_name }}, {{ $item->province?->full_name }}</td>
                            <td class="status-order-tr">
                                @if($item->status === 'progress')
                                    <span class="badge badge-info">Đang hoàn thiện</span>
                                @elseif($item->status === 'done')
                                    <span class="badge badge-success">Đã hoành thành</span>
                                @elseif($item->status === 'pending')
                                    <span class="badge badge-Secondary">Chờ giải quyết</span>
                                @else
                                    <span class="badge badge-danger">Huỷ đơn</span>
                                @endif
                            </td>
                            <td class="customer_name">{{ $item->send_to }}</td>
                            <td class="customer_name">{{ $item->created_at->format('d-m-Y H:i') }}</td>
                            <td class="customer_name">{{ number_format($item->total_price) }}</td>
                            <td>
                                <a class="nav-link menu-link" href="javascript:void(0)" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-more-2-line"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @if($item->status !== 'progress')
                                        <a class="dropdown-item change-status-order" data-order_id="{{$item->id}}" data-value="progress" href="javascript:void(0)">Đang hoàn thiện</a>
                                    @endif
                                    @if($item->status !== 'done')
                                        <a class="dropdown-item change-status-order" data-order_id="{{$item->id}}" data-value="done" href="javascript:void(0)">Đã hoàn thiện</a>
                                    @endif
                                    @if($item->status !== 'pending')
                                       <a class="dropdown-item change-status-order" data-order_id="{{$item->id}}" data-value="pending" href="javascript:void(0)">Chờ giải quyết</a>
                                    @endif
                                    @if($item->status !== 'cancel')
                                        <a class="dropdown-item change-status-order" data-order_id="{{$item->id}}" data-value="cancel" href="javascript:void(0)">Huỷ đơn</a>
                                    @endif
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
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.5.11/full-all/ckeditor.js"></script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script src="{{ URL::asset('backend/assets/js/checkUrl.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <script>
        $(document).ready(function () {
            $('.change-status-order').click(async function () {
                const orderId = $(this).data('order_id');
                const status = $(this).data('value');
                const res = await $.post('/api/change-status-order', {orderId, status});
                const element = $(this).parents('tr').find('.status-order-tr');

                if (res.isSuccess) {
                    swal({
                        title: "Thành công",
                        text: "Chuyển trạng thái đơn hàng thành công !",
                        type: "success"
                    })
                    let html = '';
                    if (status === 'progress') {
                        html = `<span class="badge badge-info">Đang hoàn thiện</span>`
                    } else if (status === 'done') {
                        html = `<span class="badge badge-success">Đã hoành thành</span>`
                    } else if (status === 'pending') {
                        html = `<span class="badge badge-Secondary">Chờ giải quyết</span>`
                    } else {
                        html = `<span class="badge badge-danger">Huỷ đơn</span>`
                    }
                    element.html(html);
                } else {
                    swal({
                        title: "Không thành công",
                        text: "Hãy thử lại. Xin cảm ơn!",
                        type: "error"
                    })
                }
            })
        })
    </script>
@endsection
