<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="/admin" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset($about_us->logo_mobile) }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                 <img src="{{ URL::asset($about_us->logo_pc) }}" alt="" height="50">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="/admin" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset($about_us->logo_mobile) }}" alt="" height="22">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <!-- end product Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarCategoryAll" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCategoryAll">
                        <i class="ri-share-line"></i> <span>Sản phẩm</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCategoryAll">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/admin/tour" class="nav-link">Danh sách tour</a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/amenity" class="nav-link">Danh sách tiện ích</a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/order" class="nav-link">Danh sách đơn hàng</a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/about-us" class="nav-link">Thông tin cơ bản</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- end news Menu -->

                <!-- end news Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarCampaign" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarNewsCategory">
                        <i class="las la-thumbtack"></i> <span>Quảng cáo</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCampaign">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/admin/sliders" class="nav-link">Danh sách slider</a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/posters" class="nav-link">Danh sách posters</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- end news Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarNewsCategory" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarNewsCategory">
                        <i class="bx bx-news"></i> <span>Tin tức</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarNewsCategory">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/admin/danh-muc-tin-tuc" class="nav-link">Danh mục tin tức</a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/tin-tuc" class="nav-link">Bài đăng tin tức</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- end news Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarUser" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMenu">
                        <i class="ri-user-3-line"></i> <span>Người dùng</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarUser">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/admin/user" class="nav-link">Danh sách người dùng</a>
                            </li>
                            {{--<li class="nav-item">
                                <a href="/admin/nhan-vien" class="nav-link">Danh sách nhân viên</a>
                            </li>--}}
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
