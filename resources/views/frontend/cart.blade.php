@extends('frontend.layouts.master')
@section('title')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/frontend/css/product-detail.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/frontend/css/cart.css') }}">
    <link href="{{ URL::asset('/assets/css/select2/select2.min.css') }}" rel="stylesheet">
@endsection
@section('main-content')
    <div class="page-content">
        <div class="holder mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/">Trang chủ</a></li>
                    <li><span>Giỏ hàng</span></li>
                </ul>
            </div>
        </div>
        <div class="holder mt-0">
            <div class="container">
                <h1 class="text-center">Giỏ hàng</h1>
                <div class="row">
                    <div class="col-md-8">
                        <div class="cart-table">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar-block">
                            <div class="card-total d-flex flex-row justify-content-between">
                                Giá trị đơn hàng <span class="card-total-price"></span>
                            </div>
                            <div class="card-total d-flex flex-row justify-content-between">
                                Giảm giá <span class="card-discount-price">0đ</span>
                            </div>
                            <div class="card-total d-flex flex-row justify-content-between">
                                Thành tiền <span class="final-price"></span>
                            </div>
                            <button class="btn btn--full btn--lg btn-request-checkout d-flex justify-content-center gap-2">
                                <div class="loading spin-loading set-loading d-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 4335 4335" width="20" height="20">
                                        <path fill="#008DD2" d="M3346 1077c41,0 75,34 75,75 0,41 -34,75 -75,75 -41,0 -75,-34 -75,-75 0,-41 34,-75 75,-75zm-1198 -824c193,0 349,156 349,349 0,193 -156,349 -349,349 -193,0 -349,-156 -349,-349 0,-193 156,-349 349,-349zm-1116 546c151,0 274,123 274,274 0,151 -123,274 -274,274 -151,0 -274,-123 -274,-274 0,-151 123,-274 274,-274zm-500 1189c134,0 243,109 243,243 0,134 -109,243 -243,243 -134,0 -243,-109 -243,-243 0,-134 109,-243 243,-243zm500 1223c121,0 218,98 218,218 0,121 -98,218 -218,218 -121,0 -218,-98 -218,-218 0,-121 98,-218 218,-218zm1116 434c110,0 200,89 200,200 0,110 -89,200 -200,200 -110,0 -200,-89 -200,-200 0,-110 89,-200 200,-200zm1145 -434c81,0 147,66 147,147 0,81 -66,147 -147,147 -81,0 -147,-66 -147,-147 0,-81 66,-147 147,-147zm459 -1098c65,0 119,53 119,119 0,65 -53,119 -119,119 -65,0 -119,-53 -119,-119 0,-65 53,-119 119,-119z"
                                        />
                                    </svg>
                                </div>
                                Yêu cầu thanh toán
                            </button>
                        </div>
                        <form class="form-order">
                            <input type="hidden" name="send_to" value="{{$infoBasic['email']}}" />
                            <input type="hidden" class="total_discount" name="total_discount" value="0" />
                            <div class="sidebar-block open">
                                <div class="sidebar-block_title"><span>Áp dụng mã khuyến mãi</span>
                                    <div class="toggle-arrow"></div>
                                </div>
                                <div class="sidebar-block_content"><label class="text-uppercase">Mã khuyến mãi:</label>
                                    <div class="form-flex flex-column">
                                        <div class="form-flex mb-0">
                                            <div class="form-group">
                                                <input type="text" name="promo_code" placeholder="Nhập mã khuyến mãi nếu có" class="form-control promo_code_input">
                                            </div>
                                            <button type="button" class="btn btn--form btn--alt button-apply-promo-code d-flex gap-2">
                                                <div class="loading spin-loading spin-loading-apply set-loading-apply d-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 4335 4335" width="15" height="15">
                                                        <path fill="#008DD2" d="M3346 1077c41,0 75,34 75,75 0,41 -34,75 -75,75 -41,0 -75,-34 -75,-75 0,-41 34,-75 75,-75zm-1198 -824c193,0 349,156 349,349 0,193 -156,349 -349,349 -193,0 -349,-156 -349,-349 0,-193 156,-349 349,-349zm-1116 546c151,0 274,123 274,274 0,151 -123,274 -274,274 -151,0 -274,-123 -274,-274 0,-151 123,-274 274,-274zm-500 1189c134,0 243,109 243,243 0,134 -109,243 -243,243 -134,0 -243,-109 -243,-243 0,-134 109,-243 243,-243zm500 1223c121,0 218,98 218,218 0,121 -98,218 -218,218 -121,0 -218,-98 -218,-218 0,-121 98,-218 218,-218zm1116 434c110,0 200,89 200,200 0,110 -89,200 -200,200 -110,0 -200,-89 -200,-200 0,-110 89,-200 200,-200zm1145 -434c81,0 147,66 147,147 0,81 -66,147 -147,147 -81,0 -147,-66 -147,-147 0,-81 66,-147 147,-147zm459 -1098c65,0 119,53 119,119 0,65 -53,119 -119,119 -65,0 -119,-53 -119,-119 0,-65 53,-119 119,-119z"
                                                        />
                                                    </svg>
                                                </div>
                                                Áp dụng
                                            </button>
                                        </div>

                                        <div class="text-danger show-message-error-discount m-0"> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-block collapsed open">
                                <div class="sidebar-block_title"><span>Địa chỉ nhận hàng</span>
                                    <div class="toggle-arrow"></div>
                                </div>
                                <div class="sidebar-block_content">
                                    <label class="text-uppercase">Tên: <span class="text-danger">*</span></label>
                                    <div>
                                        <input type="text" name="customer_name" placeholder="Điền tên của bạn" class="form-control input-name">
                                        <div class="error-message-name"></div>
                                    </div>
                                    <label class="text-uppercase">Số điện thoại: <span class="text-danger">*</span></label>
                                    <div class="parent-phone-number">
                                        <input type="text" name="customer_phone" maxlength="13" placeholder="Điền số điện thoại của bạn" class="form-control input-phonenumber">
                                        <div class="error-message-phone"></div>
                                    </div>
                                    <label class="text-uppercase">Tỉnh/Thành phố:</label>
                                    <div>
                                        <select class="form-control select2_select-province w-100" name="province_code" id="province_code">
                                            {!! $province_html !!}
                                        </select>
                                    </div>
                                    <label class="text-uppercase">Quận/Huyện:</label>
                                    <div class="form-group select-wrapper">
                                        <div>
                                            <select class="form-control select2_select-district w-100" name="district_code" id="district_code">

                                            </select>
                                        </div>
                                    </div>
                                    <label class="text-uppercase">Xã/Phường/Thị trấn :</label>
                                    <div class="form-group select-wrapper">
                                        <div>
                                            <select class="form-control select2_select-ward w-100" name="ward_code" id="ward_code">

                                            </select>
                                        </div>
                                    </div>
                                    <label class="text-uppercase">Địa chỉ khác:</label>
                                    <div class="form-group">
                                        <input type="text" name="other_address" placeholder="Địa chỉ chi tiết" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-block collapsed">
                            <div class="sidebar-block_title">
                                <span>Ghi chú đơn hàng</span>
                                <div class="toggle-arrow"></div>
                            </div>
                            <div class="sidebar-block_content">
                                <label class="text-uppercase">Viết ghi chú của bạn ở đây:</label>
                                <textarea name="note" class="form-control textarea--height-200"></textarea>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ URL::asset('/assets/js/select2/select2.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <script>
        $(document).ready(function () {
            let orders = localStorage.getItem("orders");
            orders = JSON.parse(orders) || [];
            let html = ``;
            for (let i = 0; i < orders.length; i++) {
                const item = orders[i];
                html += `
                <div class="cart-table-prd">
                                <div class="cart-table-prd-image"><a href="${item.alias}"><img src="${item.avatar}" alt=""></a></div>
                                <div class="cart-table-prd-name">
                                    <h5><a href="${item.alias}">${item.subtitle}</a></h5>
                                    <h2><a href="${item.alias}">${item.name}</a></h2>
                                </div>
                                <div class="cart-table-prd-qty"><span>Số lượng:</span> <b>${item.quantity}</b></div>
                                <div class="cart-table-prd-price"><span>Giá:</span> <b>${item.priceText}</b></div>
                                <div class="cart-table-prd-action"> <a href="javascript:void(0)" data-product_id="${item.id}" class="icon-cross remove-product"></a></div>
                            </div>
                `
            }
            $('.cart-table').html(html);

            $('.select2_select-province').select2({
                multiple: false,
                placeholder: 'Chọn thành phố của bạn',
            });
            $('.select2_select-district').select2({
                multiple: false,
                placeholder: 'Chọn quận/huyện của bạn',
            });
            $('.select2_select-ward').select2({
                multiple: false,
                placeholder: 'Chọn xã/phường/thị trấn của bạn',
            });
            $('#province_code').change(async function () {
                const valueProvince = $(this).val();
                const res = await $.get(`/api/districts/${valueProvince}`);
                $('.select2_select-district').html(res.data);
            })
            $('#district_code').change(async function () {
                const valueDistrict = $(this).val();
                const res = await $.get(`/api/ward/${valueDistrict}`);
                $('.select2_select-ward').html(res.data);
            })
            const phoneFormat = (input) => {
                if (input === '') return { isSuccess: false, value: 'Vui lòng điền số điện thoại' }
                if(!input || isNaN(input)) return { isSuccess: false, value: `Số điện thoại chỉ được nhập số ${input}` }
                if(typeof(input) !== 'string') input = input.toString()
                if(input.length === 10){
                    return {
                        isSuccess: true,
                        value: input.replace(/(\d{4})(\d{3})(\d{3})/, "$1-$2-$3")
                    }
                } else {
                    return {
                        isSuccess: false,
                        value: 'Có vẻ bạn sdt của bạn đang sai. Hãy kiểm tra lại'
                    }
                }
            }
            function removeClassErrorPhoneNumber(element) {
                element.removeClass('error');
                $('.error-message-phone').html('')
            }
            $('.input-phonenumber').focus(function () {
                const elementParent = $(this).parent();
                removeClassErrorPhoneNumber(elementParent);
            })
            $('.input-phonenumber').blur(function () {
                const numberFormat = phoneFormat($(this).val());
                const elementParent = $(this).parent();
                elementParent.removeClass('error');
                if (!numberFormat.isSuccess) {
                    elementParent.addClass('error');
                    const html = `<div class="text-danger">${numberFormat.value}</div>`
                    $('.error-message-phone').html(html)
                }
            })
            function isNumber(evt) {
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }
            $('.input-phonenumber').keydown(function (e) {
                if (!isNumber(e)) {
                    e.preventDefault();
                }
                return true;
            })
            $('.input-name').focus(function () {
                $('.error-message-name').html('')
                $(this).parent().removeClass('error');
            })

            $('.input-name').blur(function () {
                const val = $(this).val();
                $('.error-message-name').html('')
                $(this).parent().removeClass('error');
                if (!val.length) {
                    $(this).parent().addClass('error');
                    const html = `<div class="text-danger">Vui lòng điền tên của bạn</div>`
                    $('.error-message-name').html(html)
                }
            })
            function validateForm() {
                const allValue = $('.form-order').serializeArray();
                const valueName = allValue.find(item => item.name === 'customer_name');
                const valuePhoneNumber = allValue.find(item => item.name === "customer_phone");
                removeClassErrorPhoneNumber($('.input-phonenumber').parent());
                let isPass = true;
                if (!valueName.value.length) {
                    isPass = false;
                    $('.input-name').parent().addClass('error');
                    const html = `<div class="text-danger">Vui lòng điền tên của bạn</div>`
                    $('.error-message-name').html(html)
                }
                const resPhoneNumber = phoneFormat(valuePhoneNumber.value);
                if (!resPhoneNumber.isSuccess) {
                    isPass = false;
                    const elementParent = $('.input-phonenumber').parent()
                    elementParent.addClass('error');
                    const html = `<div class="text-danger">${resPhoneNumber.value}</div>`
                    $('.error-message-phone').html(html)
                }

                return isPass
            }
            function setLoading(value) {
                const element = $('.set-loading');
                if (!value) {
                    element.addClass('d-none');
                    element.parent().attr('disabled', false);
                } else {
                    element.parent().attr('disabled', true);
                    element.removeClass('d-none');
                }
            }
            $('.btn-request-checkout').click(async function () {
                const isPass = validateForm();
                if (!isPass) {
                    window.scrollTo({top: 330, behavior: 'smooth'});
                } else {
                    setLoading(true);
                    let orders = localStorage.getItem("orders");
                    orders = JSON.parse(orders) || [];
                    const allValue = $('.form-order').serializeArray();
                    const res = await $.post('/api/create-order', {basic_info: allValue, orders});
                    if(res.isSuccess) {
                        $('.form-order')[0].reset();
                        localStorage.removeItem("orders");
                        swal({
                            title: "Đặt hàng thành công",
                            text: "Nhân viên của chúng tôi sẽ liên hệ lại ngay. Xin cảm ơn !",
                            type: "success"
                        }).then(function() {
                            window.location = "/";
                        });
                    } else {
                        swal({
                            title: "Đặt hàng không thành công",
                            text: "Hệ thống đang gặp lỗi. Hay thử lại. Xin cảm ơn !",
                            type: "error"
                        });
                    }

                    setLoading(false);
                }
            })
            function setLoadingApply(value) {
                const element = $('.set-loading-apply');
                if (!value) {
                    element.addClass('d-none');
                    element.parent().attr('disabled', false);
                } else {
                    element.parent().attr('disabled', true);
                    element.removeClass('d-none');
                }
            }
            function calculatorTotal() {
                let orders = localStorage.getItem("orders");
                orders = JSON.parse(orders) || [];
                let total = 0;
                for (let i = 0; i < orders.length; i++) {
                    total += orders[i]['quantity'] * orders[i]['price'];
                }
                const discount = $('.total_discount').val();
                total = total - discount;
                $('.final-price').html(`${convertMoney(total.toString())}đ`)
            }
            $('.button-apply-promo-code').click(async function () {
                const value = $('.promo_code_input').val();
                if (!value.length) {
                    $(this).parent().find('.form-group').toggleClass('error');
                    return
                }
                setLoadingApply(true);
                let orders = localStorage.getItem("orders");
                orders = JSON.parse(orders) || [];
                try {
                    const res = await $.post(`/api/promotion/${value}`, { orders });
                    if (res.success) {
                        $('.total_discount').val(res.discount);
                        $('.card-discount-price').html(`${convertMoney(res.discount.toString())}đ`)
                        $(this).parent().find('.form-group').removeClass('success');
                        $('.show-message-error-discount').removeClass('text-danger')
                        $('.show-message-error-discount').addClass('text-success')
                    } else {
                        $('.promo_code_input').parent().addClass('error');
                        $(this).parent().find('.form-group').removeClass('error');
                        $('.show-message-error-discount').addClass('text-danger')
                        $('.show-message-error-discount').removeClass('text-success')
                        $('.card-discount-price').html(`0đ`)
                        $('.total_discount').val(0);
                    }
                    calculatorTotal();
                    $('.show-message-error-discount').html(res.message)
                } catch (e) {

                } finally {
                    setLoadingApply(false);
                }
            })
        })
    </script>
@endsection
