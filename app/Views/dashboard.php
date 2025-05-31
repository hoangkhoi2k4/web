<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Liên kết Font Awesome CSS từ CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/assets/css/main.css">
    <link rel="stylesheet" href="../../public/assets/css/dashboard.css">
    <link rel="stylesheet" href="../../public/assets/css/navbar.css">
    <title>Bảng điều khiển</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        @media (max-width : 576px) {
            #chart {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div id="main">
        <div class="row">
            <!-- navbar -->
            <div class="col-sm-2 col-5">
                <div id="navbar" style="overflow: hidden;">
                    <div id="navbar_body">
                        <ul class="list-group">
                            <div class="group ">

                                <li class="list-group-item">
                                    <span class="me-3"><i class="fa-regular fa-circle-user"></i></span>
                                    <span>Menu</span>
                                </li>

                                <li class="list-group-item">
                                    <a href="index.php?page=dashboard" class="d-flex align-items-center"
                                        onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-house"></i></span>
                                        <span>Bảng điều khiển</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="index.php?page=supplier" class="d-flex align-items-center" onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-truck"></i></span>
                                        <span>Nhà cung cấp</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="index.php?page=contract" class="d-flex align-items-center" onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-file-contract"></i></span>
                                        <span>Hợp đồng</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="index.php?page=transaction-history" class="d-flex align-items-center"
                                        onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-clock"></i></span>
                                        <span>Lịch sử giao dịch</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="index.php?page=progress-evaluation" class="d-flex align-items-center"
                                        onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-star"></i></span>
                                        <span>Đánh giá tiến độ</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="index.php?page=report" class="d-flex align-items-center" onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-chart-column"></i></span>
                                        <span>Báo cáo</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="index.php?page=send-notification" class="d-flex align-items-center" onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-bell"></i></span>
                                        <span>Gửi thông báo</span>
                                    </a>
                                </li>
                               
                                <li class="list-group-item">
                                    <a href="index.php?page=login" class="d-flex align-items-center" onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-right-from-bracket"></i></span>
                                        <span>Đăng xuất</span>
                                    </a>
                                </li>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-7">
                <!-- Header -->
                <div id="header">
                    <div class="container">
                        <ul class="nav justify-content-between">
                            <div id="header-left">
                                <li class="nav-item  ">
                                    <h3 class="mt-3 fs-3 fw-bold" href="#">BẢNG ĐIỀU KHIỂN</h3>
                                </li>
                            </div>

                            <div id="header-right" class="d-inline-flex gap-5 mt-3 ms-5 me-md-5">
                                <li class="nav-item">
                                    <p class=" fs-3" aria-current="page" href="#">
                                        <i class="fa-solid fa-bell"></i>
                                    </p>
                                </li>
                                <li class="nav-item">
                                    <p class=" fs-3" aria-current="page" href="#">
                                        <i class="fa-regular fa-circle-user"></i>
                                    </p>
                                </li>
                            </div>
                        </ul>
                    </div>
                </div>

                <!-- Main content -->
                <div id="main-content">
                    <!-- statictis supplier -->
                    <div id="statictis-supplier">
                        <div class="container">
                            <div class="row ">
                                <!-- Card 1 -->
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="card card-custom card-blue">
                                        <div class="d-flex flex-column">
                                            <div>
                                                <span class="card-number"><?= count($providers) ?></span>
                                            </div>
                                        </div>
                                        <span class="card-title">Tổng số nhà cung cấp</span>
                                    </div>
                                </div>

                                <!-- Card 2 -->
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="card card-custom card-red">
                                        <div class="d-flex flex-column">

                                            <span class="card-number"><?= $expiredContracts ?></span>

                                        </div>
                                        <span class="card-title">Số hợp đồng sắp hết hạn</span>
                                    </div>
                                </div>

                                <!-- Card 3 -->
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="card card-custom card-yellow">
                                        <div class="d-flex flex-column">

                                            <span class="card-number">8</span>
                                        </div><span class="card-title">Số dịch vụ chậm tiến độ</span>
                                    </div>
                                </div>

                                <!-- Card 4 -->
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="card card-custom card-green">
                                        <div class="d-flex flex-column">

                                            <span class="card-number">18</span>
                                        </div><span class="card-title">Tổng giao dịch tuần này</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Top suppliers -->
                    <div id="top-suppliers">
                        <div class="container mt-4">
                            <h3>Top nhà cung cấp uy tín</h3>
                            <!-- table-info table-striped table-hover -->
                            <table class="mb-3 mt-4">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Nhà cung cấp</th>
                                        <th>Số hợp đồng (tháng)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($providers)): ?>
                                        <?php foreach ($providers as $index => $provider): ?>
                                            <tr>
                                                <td><?= $index + 1 ?></td>
                                                <td><?= htmlspecialchars($provider['name']) ?></td>
                                                <td><?= htmlspecialchars($provider['total_contracts']) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3" class="text-center">Không có dữ liệu nhà cung cấp.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    
                    
                </div>
            </div>
        </div>

</body>

</html>