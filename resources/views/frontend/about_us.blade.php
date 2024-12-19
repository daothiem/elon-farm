@extends('frontend.layouts.master')
@section('title')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/frontend/css/product-detail.css') }}">
@endsection
@section('main-content')
    <div class="page-content">
        <div class="holder mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/">Trang chủ</a></li>
                    <li><span>Tìm hiểu về chúng tôi</span></li>
                </ul>
            </div>
        </div>
        <div class="holder mt-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 aside aside--left">
                        <div class="list-group">
                            <a class="list-group-item nav-link active" data-toggle="tab" href="#tab1">Về nhà máy Z121</a>
                            <a class="list-group-item nav-link" data-toggle="tab" href="#tab2">Chúng tôi là ai</a>
                            <a class="list-group-item nav-link" data-toggle="tab" href="#tab3">Chính sách bán hàng</a>
                        </div>
                    </div>
                    <div class="col-md-9 aside">
                        <h2>Tìm hiểu về chúng tôi</h2>
                        <div class="tab-content tab-category-content">
                            <div class="tab-pane active" id="tab1">
                                <p>
                                    <a href="https://21chemical.vn/">Nhà máy Z121</a> (Công ty TNHH một thành viên Hóa chất 21) là một trong những doanh nghiệp Quốc Phòng hàng đầu Việt Nam, chuyên sản xuất thuốc nổ, phụ kiện nổ công nghiệp, các mặt hàng quốc phòng phục vụ Quân đội. Đồng thời, đây là đơn vị duy nhất được cấp phép sản xuất, kinh doanh các loại pháo hoa, pháo hỏa thuật phục vụ người dân vào các dịp lễ hội và xuất khẩu.
                                </p>
                                <p>
                                    Đặc biệt, trong những ngày lễ lớn của đất nước hay tết cổ truyền, nhà máy Z121 là đơn vị duy nhất được phép lắp đặt và triển khai thực hiện bắn pháo hoa tầm cao, phục vụ nhu cầu thưởng thức nghệ thuật pháo hoa của đông đảo nhân dân.
                                </p>
                                <p>
                                    Nghị định số 137/2020/NĐ – CP của Chính phủ ban hành về quản lý, sử dụng pháo hoa đã mang đến niềm vui và phấn khởi cho người dân cả nước. Theo đó, kể từ năm 2021 tới nay, nhà máy Z121 đã tích cực triển khai nghiên cứu, cho ra mắt nhiều sản phẩm pháo hoa đa dạng, có hiệu ứng đẹp mắt và an toàn để phục vụ nhu cầu của người dân.
                                </p>
                                <p>
                                    Với sự nỗ lực của nhà máy, chắc chắc mỗi người dân Việt Nam, dù ở độ tuổi nào, khu vực nào, sẽ được trở về với cảm xúc háo hức và hân hoan trong khoảnh khắc giao thừa, báo hiệu cho một năm mới sung túc và ngập tràn hạnh phúc.
                                </p>

                                <ul class="mt-1">
                                    <li>Website: https://21chemical.vn/</li>
                                    <li>Địa chỉ liên hệ: xã Phú Hộ, thị xã Phú Thọ, tỉnh Phú Thọ</li>
                                    <li>Điện thoại: 0210.3865055</li>
                                    <li>Fax: 0210.3865054</li>
                                    <li>Email: congtyhoachat21@z121.vn</li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="tab2">
                                <p>Là cơ sở giới thiệu và bán sản phẩm Pháo hoa - địa điểm kinh doanh số 9 tại D10-06 KDT Dịch Vọng, đường Trần Thái Tông, Cầu Giấy,
                                    <a href="https://phaohoasukien.vn/">Phaohoasukien</a> luôn nỗ lực để mang tới cho khách hàng.</p>
                                <p>
                                    - Tin cậy: là cơ sở được cấp phép phân phối sản phẩm, bán pháo hoa không tiếng nổ hợp pháp, được cấp phép bởi nhà máy Z121 Bộ Quốc Phòng. Sản phẩm được lưu kho theo tiêu chuẩn kiểm định, mang tới hiệu ứng tốt nhất và an toàn cho người sử dụng.
                                </p>
                                <p>
                                    Với tôn chỉ: “Luôn đem lại cho quý khách hàng những trải nghiệm tuyệt vời nhất”, <a href="https://phaohoasukien.vn/">Phaohoasukien</a> xin cam kết:
                                </p>
                                <p>
                                    Là đơn vị phân phối sản phẩm, bán pháo hoa không tiếng nổ hợp pháp, được cấp phép bởi nhà máy Z121 Bộ Quốc Phòng.
                                    <br>
                                    <div>
                                        Tất cả các sản phẩm pháo hoa tại <a href="https://phaohoasukien.vn/">Phaohoasukien</a> đều đã được kiểm định chất lượng khắt khe, chính vì vậy mỗi sản phẩm pháo hoa đến tay quý khách hàng đều đảm bảo chất lượng, an toàn khi sử dụng và lưu thông hợp pháp.
                                    <br>
                                        Đem đến tay quý khách hàng sản phẩm pháo hoa với giá cả phải chăng, dễ tiếp cận.
                                    <br>
                                    Hướng tới mang lại cho khách hàng trải nghiệm mua pháo hoa tiện lợi nhất.
                                    <br>
                                    </div>
                                </p>
                                <p>
                                    Là trang web cập nhật các tin tức liên quan đến pháo hoa trên toàn quốc. Các sản phẩm pháo hoa đều đảm bảo tuyệt đối các tiêu chuẩn về kho bãi, khu trưng bày, an toàn PCCC…
                                    <br>
                                    <a href="https://phaohoasukien.vn/">Phaohoasukien</a> bán ra thị trường cho người dân sử dụng là những loại pháo hoa an toàn, không tiếng nổ, không gây nguy hại cho người sử dụng.
                                    <br> Khi mua hàng, khách hàng cần xuất trình CMT hoặc căn cước công dân để chứng minh đủ 18 tuổi.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="tab3">
                                Chính sách bán hàng của công ty
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
