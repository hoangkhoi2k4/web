<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Liên kết Font Awesome CSS từ CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/assets/css/home.css">
    <title>Trang chủ</title>
    <style>
        #header {
            .modal-body {
                background-color: #fff;
            }

            .modal-header {
                border-bottom: none;
            }

            .form-label {
                font-size: 14px;
                color: #333;
            }

            .btn-register {
                background-color: #ff4d4d;
                border: none;
            }

            .btn-register:hover {
                background-color: #e04343;
            }

            .modal-content {
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            }
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <div id="navbar" class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <img src="<?= asset('../../public/assets/images/Free-Editable-Abstract-Logo-Design-PNG-Transparent-2048x2048.png') ?>" alt="logo"
                    width="60px" height="auto">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" style="width: 80px;" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="width: 100px;" href="#content1">Giới thiệu</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a style="width: 100px;" class="nav-link" href="#content3" id="navbarDropdown">
                                    Tính năng
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#content3">Quản lý nhà cung cấp</a></li>
                                    <li><a class="dropdown-item" href="#content4">Quản lý hợp đồng</a></li>
                                    <li><a class="dropdown-item" href="#content5">Lịch sử giao dịch và gửi thông báo</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="width: 90px;" href="#content6">Xếp hạng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="width: 90px;" href="#content7">Liên hệ</a>
                            </li>
                       
                            <li class="nav-item" id ="home">
                                <a class="nav-link"
                                    href="/public/index.php?page=dashboard">  
                                    <span class="me-2">Trang quản lý</span><span><i
                                            class="fa-solid fa-right-from-bracket"></i></span>
                                </a>
                            </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- img -->
    <div id="header" style="background-image: url(<?= asset('../../public/assets/images/ncc_1366.png') ?>)">
        <!-- moveInLeft1 -->
        <div class="overlay-text text-white moveInLeft1">
            <p style="letter-spacing: 3px;">P h ầ n m ề m q u ả n l ý</p>
            <h2 class="mt-2 mb-3">NHÀ CUNG CẤP</h2>
            <pre style="width:400px;" id="header-content">Phần mềm cho phép quản lý thông tin, đánh 
giá chất lượng về các nhà cung cấp nhằm 
giúp doanh nghiệp đưa ra lựa chọn đơn vị 
phù hợp khi thực hiện kế hoạch mua sắm tài
sản, sửa chữa, xây dựng cho doanh nghiệp.
            </pre>
            <div class="btn btn-md btn-danger d-inline-flex align-items-center p-2 px-4 hover-effect"
                style="border-radius: 30px;" data-bs-toggle="modal" data-bs-target="#headerModal">
                <span class="me-2">Liên hệ ngay</span><i class="fa-solid fa-forward"></i>
            </div>
        </div>

        <!-- modal -->
        <div class="modal fade" id="headerModal" tabindex="-1" aria-labelledby="headerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-4" style="border-radius: 20px;">
                    <div class="modal-header">
                        <h5 class="modal-title text-center w-100" id="registerModalLabel">ĐĂNG KÝ NHẬN TƯ VẤN GSOFT
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center text-muted mb-4">Trải nghiệm hệ thống phần mềm quản trị đầu tư mua sắm
                            và
                            quản lý tài sản gAMSPRO</p>

                        <div class="mb-3">
                            <label for="company" class="form-label">Công ty <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="company" name="company" required>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Tên bạn <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="position" class="form-label">Chức vụ (v7) <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" id="position" name="position" required>
                                    <option value="">Loại đạc (CEO, CFO,...)</option>
                                    <option value="ceo">CEO</option>
                                    <option value="cfo">CFO</option>
                                    <option value="other">Khác</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Số điện thoại <span
                                        class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="col-md-6">
                                <label for="staff" class="form-label">Số lượng nhân sự <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" id="staff" name="staff" required>
                                    <option value="">Dưới 10 người</option>
                                    <option value="under10">Dưới 10 người</option>
                                    <option value="10to50">10 - 50 người</option>
                                    <option value="over50">Trên 50 người</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="city" class="form-label">Tỉnh thành phố <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" id="city" name="city" required>
                                    <option value="">Hà Nội</option>
                                    <option value="hanoi">Hà Nội</option>
                                    <option value="hcm">TP. Hồ Chí Minh</option>
                                    <option value="other">Khác</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="agree" name="agree">
                            <label class="form-check-label" for="agree">Vui lòng check để đảm bảo thông tin ở trên
                                là
                                chính xác.</label>
                        </div>
                        <button type="button" class="btn btn-md btn-danger w-100" data-bs-dismiss="modal"
                            aria-label="Close" style="border-radius: 10px;">
                            Đăng Ký
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- images responsive -->
    <div class="responsive-header">
        <div class="moveInLeft1">
            <p style="letter-spacing: 3px;">P h ầ n m ề m q u ả n l ý</p>
            <h2 class="mt-2 mb-3">NHÀ CUNG CẤP</h2>
            <div id="header-content" class="ms-2 me-2">Phần mềm cho phép quản lý thông tin, đánh giá chất lượng về các
                nhà cung cấp nhằm
                giúp doanh nghiệp đưa ra lựa chọn đơn vị phù hợp khi thực hiện kế hoạch mua sắm tài sản,
                sửa chữa, xây dựng cho doanh nghiệp.
            </div>
            <div class="btn btn-md btn-danger d-inline-flex align-items-center p-2 mt-4 px-4 hover-effect"
                style="border-radius: 30px;" data-bs-toggle="modal" data-bs-target="#headerModal">
                <span class="me-2">Liên hệ ngay</span><i class="fa-solid fa-forward"></i>
            </div>
        </div>
    </div>

    <!-- content1 -->
    <div id="content1" class="container">
        <h4 class="text-danger" style="text-align: center; padding-top: -10px;">
            Vì sao doanh nghiệp nên lựa chọn nhà cung cấp phù hợp
        </h4>
        <!-- leftElement -->
        <div class="row leftElement">
            <div class="col-md-6 col-12">
                <div class="mt-4">
                    <img src="<?= asset('public/assets/images/content1.avif') ?>" alt="" width="100%">
                    <p class="ms-5 mt-3 w-75" style="text-align: center;">
                        Lựa chọn đơn vị cung cấp sẽ ảnh hưởng rất lớn đến việc chọn nguồn cung cấp tài sản phù hợp, hiệu
                        quả để sử dụng được hết công năng, hiệu suất của tài sản, các vấn đề liên quan đến tuổi thọ tài
                        sản.
                    </p>
                </div>
            </div>
            <!-- rightElement -->
            <div class="col-md-6 col-12 rightElement">
                <div class="mt-4">
                    <img src="../../public/assets/images/content2.avif" alt="" width="100%">
                </div>
                <p class="ms-5 w-75" style="text-align: center;">
                    Khi có các kế hoạch xây dựng, sửa chữa doanh nghiệp, việc có các báo cáo đánh giá chi tiết nhà cung
                    cấp giúp cho doanh nghiệp lựa chọn đơn vị phù hợp, hiệu quả nhất để dự án thực hiện nhanh chóng.
                </p>
            </div>
        </div>
    </div>

    <!-- content2 -->
    <div id="content2" style="background-image: url(../../assets/images/background-2-1.png); height: 500px; width: 100vw;">
        <div class="container pt-5 mt-4">
            <h4 class="text-danger" style="text-align: center; padding-top: -10px;">Lợi ích của việc sử dụng phần mềm
                quản lý, đánh giá nhà cung cấp</h4>
        </div>
        <div class="row container">
            <!-- Left Element -->
            <div class="col-md-6 col-12 ">
                <div class="row ms-5 mt-5">
                    <div class="row ms-5 col-12">
                        <span class="col-md-10 col-12">
                            <b class="text-primary">Kiểm soát được chi phí, các rủi ro tiềm ẩn</b> trong quá trình vận
                            tìm kiếm nhà cung cấp,
                            đảm bảo chất lượng sản phẩm từ phía nhà cung cấp, thu được lợi ích lâu dài cho doanh nghiệp.
                        </span>
                    </div>

                    <div class="row ms-5 mt-5  col-12">
                        <span class="col-md-10 col-12">
                            Tính năng quản lý nhà cung cấp của phần mềm quản lý tài sản gAMSPro giúp doanh nghiệp <b
                                class="text-primary">quản lý được các báo cáo đánh giá, tình trạng của nhà cung cấp</b>
                            qua các kỳ đánh giá.
                        </span>
                    </div>
                </div>
            </div>
            <!-- Right Element -->
            <div class="col-md-6 col-12">
                <div class="row ms-5 mt-5">
                    <div class="row ms-5 col-12">
                        <span class="col-md-10 col-12">
                            Không như cách quản lý truyền thống bằng giấy tờ, exel, việc sử dụng phần mềm giúp cho <b
                                class="text-primary">doanh nghiệp có được nhiều thông tin tổng quan, chi tiết</b> về nhà
                            cung cấp đảm bảo cho việc lựa chọn đơn vị cung cấp phù hợp cho doanh nghiệp
                        </span>

                    </div>

                    <div class="row ms-5 mt-4  col-12">
                        <span class="col-md-10 col-12">
                            Phần mềm đưa ra <b class="text-primary">cái nhìn chuẩn xác</b>, hỗ trợ doanh nghiệp trong
                            việc ra quyết định nên tiếp tục ký kết với nhà cung cấp đó không, hay tìm đơn vị hợp tác
                            mới.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- content3 -->
    <div class="container mt-5" id="content3">
        <div class="row align-items-center">
            <!-- Carousel -->
            <div class="col-lg-6">
                <div id="carousel1" class="carousel slide" data-bs-ride="carousel">
                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carousel1" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carousel1" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                    </div>

                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../../public/assets/images/supplier.jpg" alt="Slide 1">
                        </div>
                        <div class="carousel-item">
                            <img src="../../public/assets/images/supplier2.jpg" alt="Slide 2">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Text Content -->
            <div class="col-lg-6 content-text mt-5">
                <h2>QUẢN LÝ DANH SÁCH NHÀ CUNG CẤP</h2>
                <ul>
                    <li>Thông tin nhà cung cấp được quản lý chi tiết bao gồm: tên, thông tin liên lạc, địa chỉ, lĩnh vực
                        hoạt động...</li>
                    <li>Thông tin này sẽ được nhập một lần duy nhất. Khi người dùng thực hiện các thao tác như: nhập tài
                        sản, nhập hợp đồng, tạo phiếu gởi hàng, nhập công cụ lao động... thì thông tin nhà cung cấp sẽ
                        được liên kết mà không phải nhập lại.</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- content4 -->
    <div id="content4" style="background-image: url(assets/images/background-2-1.png); height: 500px; width: 100vw;">
        <div class="container mt-5">
            <div class="row align-items-center">
                <!-- Text Content -->
                <div class="col-lg-6 content-text mt-5">
                    <h2>QUẢN LÝ HỢP ĐỒNG</h2>
                    <ul>
                        <li>Hỗ trợ người dùng quản lý thêm sửa xóa hợp đồng</li>
                        <li>Lên lịch đánh giá giúp người dùng kiểm soát được thời gian, thời lượng hết hạn hợp đồng

                        </li>
                        <li>
                            Việc đánh giá nhà hợp đồng bằng cách cho điểm theo tiêu chí khách quan trên giúp thống nhất
                            cách đánh giá
                            chung cho các bộ phận, đơn vị, phòng ban của doanh nghiệp. Nhờ vậy, việc đánh giá không còn
                            dựa
                            theo cảm tính mà được áp theo một tiêu chuẩn nhất định.
                        </li>
                    </ul>
                </div>

                <!-- Carousel -->
                <div class="col-lg-6">
                    <div id="carousel2" class="carousel slide" data-bs-ride="carousel">
                        <!-- Indicators -->
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carousel2" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carousel2" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>

                        <!-- Carousel items -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../../public/assets/images/contract1.jpg" alt="Slide 1">
                            </div>
                            <div class="carousel-item">
                                <img src="../../public/assets/images/contract2.jpg" alt="Slide 2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- content5 -->
    <div class="container mt-5" id="content5">
        <div class="row align-items-center">
            <!-- Carousel -->
            <div class="col-lg-6">
                <div id="carousel3" class="carousel slide" data-bs-ride="carousel">
                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carousel3" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carousel3" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                    </div>

                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../../public/assets/images/history.jpg" alt="Slide 1">
                        </div>
                        <div class="carousel-item">
                            <img src="../../public/assets/images/sendemail.jpg" alt="Slide 2">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Text Content -->
            <div class="col-lg-6 content-text mt-5">
                <h2>LỊCH SỬ GIAO DỊCH VÀ GỬI THÔNG BÁO</h2>
                <ul>
                    <li>Giúp người dùng kiểm soát được nào dịch vụ nào hết hạn, chậm tiến độ</li>
                    <li>Chức năng gửi thông báo giúp người quản lý có thể thông báo cho các nhà cung cấp
                        một khi tiến độ bị chậm trể hay chưa hoàn thành công việc,...
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- content6 -->
    <div id="content6" style="background-image: url(../../assets/images/background-2-1.png); height: 500px; width: 100vw;">
        <div class="container mt-5 p-5">
            <h4 class="text-danger" style="text-align: center; padding-top: -10px;">Xếp hạng và đánh giá</h4>
        </div>

        <!-- Carousel -->
        <div id="supplierCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner ">
                <!-- Slide 1 -->
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="carousel-item active p-2">
                            <div class="d-flex justify-content-center ">
                                <div class="supplier-card">
                                    <h5 class="mt-2 mb-4">Công Ty TNHH Cấp Và Thoát Nước Mới Trường Số 1 Hà Nội</h5>
                                    <p>Chuyên cung cấp nước sạch sinh hoạt và công nghiệp với tiêu chuẩn chất lượng cao,
                                        đảm bảo
                                        an toàn sức khỏe người dùng...</p>
                                    <button class="btn btn-custom" data-bs-toggle="modal"
                                        data-bs-target="#reportModal">Xem thêm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="carousel-item active p-2">
                            <div class="d-flex justify-content-center">
                                <div class="supplier-card">
                                    <h5 class="mt-2 mb-4">Canon Việt Nam – Công Ty TNHH Canon Việt Nam</h5>
                                    <p>Canon Việt Nam là nhà sản xuất hàng đầu trong lĩnh vực thiết bị hình ảnh và máy
                                        in</p>
                                    <button class="btn btn-custom" data-bs-toggle="modal"
                                        data-bs-target="#reportModal">Xem thêm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="carousel-item active p-2">
                            <div class="d-flex justify-content-center">
                                <div class="supplier-card">
                                    <h5 class="mt-2 mb-4">Công Ty TNHH Sản Xuất Và Thương Mại Tổng Hợp Wisevear</h5>
                                    <p>CWisevear Design Việt Nam chuyên thiết kế, sản xuất và phân phối các sản phẩm
                                        thời trang</p>
                                    <button class="btn btn-custom" data-bs-toggle="modal"
                                        data-bs-target="#reportModal">Xem thêm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal -->
            <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="registerModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-4" style="border-radius: 20px;">
                        <div class="modal-header">
                            <h5 class="modal-title text-center w-100" id="registerModalLabel">Công Ty TNHH Cấp Và Thoát
                                Nước Mới Trường Số 1 Hà Nội
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>CWisevear Design Việt Nam chuyên thiết kế, sản xuất và phân phối các sản phẩm
                                thời trang</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- content7 -->
    <div id="content7" style="background-image: url(../../assets/images/background-2-1.png); height: 700px; width: 100vw;">
        <div class="container p-3">
            <div class="form-container">
                <h2 class="form-title">Đăng ký demo phần mềm</h2>
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fullName" class="form-label">Họ và tên (*)</label>
                            <input type="text" class="form-control is-invalid" id="fullName"
                                placeholder="Nhập tên của bạn">
                            <div class="invalid-feedback">Trường này không được bỏ trống</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email (*)</label>
                            <input type="email" class="form-control is-invalid" id="email"
                                placeholder="Nhập email của bạn">
                            <div class="invalid-feedback">Trường này không được bỏ trống</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Số điện thoại (*)</label>
                            <input type="text" class="form-control is-invalid" id="phone"
                                placeholder="Nhập số điện thoại của bạn">
                            <div class="invalid-feedback">Trường này không được bỏ trống</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="website" class="form-label">Website (*)</label>
                            <input type="text" class="form-control is-invalid" id="website"
                                placeholder="Nhập website của bạn">
                            <div class="invalid-feedback">Trường này không được bỏ trống</div>
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input is-invalid" id="confirm">
                        <label class="form-check-label" for="confirm">Vui lòng check để đảm bảo thông tin trên là chính
                            xác</label>
                        <div class="invalid-feedback">Trường này không được bỏ trống</div>
                    </div>
                    <button type="submit" class="btn btn-submit">Gửi yêu cầu <span>&rsaquo;</span></button>

                    <!-- Thông báo lỗi -->
                    <div class="error-message">
                        One or more fields have an error. Please check and try again.
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- content8 -->
    <div id="content8">
        <section class="main-content">
            <div class="container">
                <div class="row">
                    <!-- Support Section -->
                    <div class="col-md-4 support-section">
                        <h5>HỖ TRỢ KHÁCH HÀNG</h5>
                        <p>Hướng dẫn quản lý</p>
                        <p>Câu hỏi thường gặp</p>
                        <p>Chính sách quy định</p>
                        <p>Thông tin - Công nghệ</p>
                        <p>Chính sách bảo mật</p>
                        <p>Chính sách cookie</p>
                        <p>Email: <a href="mailto:cskh@supplier.com" style="color: #ffd700;">cskh@supplier.com</a></p>
                        <p>Hotline: 0999.999.999</p>
                    </div>
                    <!-- Map Section -->
                    <div class="col-md-8">
                        <h5 class="mb-3">BẢN ĐỒ</h5>
                        <div class="map-section">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.096439844806!2d105.8411323154017!3d21.03377698599352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab145bf1c94b%3A0x3db454a8e5d4d!2zSGFuoiBTdHJlZXQgTWFya2V0!5e0!3m2!1sen!2s!4v1697691234567!5m2!1sen!2s"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <p>Copyright 2025 - Thiết kế và phát triển bởi Supplier. All rights reserved</p>
                        <p>Chủ quản: ông Hoàng Văn Khôi</p>
                        <p>MST của nhánh: 0999999999</p>
                        <p>Số ĐKKD: 41G8031109 do UBND Quận Hà Đông - TP. Hà Nội cấp ngày 21/04/2025</p>
                        <p>Nhóm Hiểu "Supplier" đã được đăng ký độc quyền tại Cục sở hữu trí tuệ Việt Nam</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>