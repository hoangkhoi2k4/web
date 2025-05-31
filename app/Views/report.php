<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <link rel="stylesheet" href="../../public/assets/css/main.css">
    <link rel="stylesheet" href="../../public/assets/css/navbar.css">
    <title>Đánh giá</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        .container {
            max-width: 1400px;
            margin: 20px auto;
            padding: 0 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        select, button {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .export-buttons button {
            margin-right: 10px;
            background-color: #2196F3;
        }

        .export-buttons button:hover {
            background-color: #1976D2;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        th, td {
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

        canvas {
            max-width: 100%;
            margin: 20px 0;
        }

        .pagination button {
            padding: 8px 16px;
            font-size: 14px;
        }

        .pagination button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .pagination span {
            font-size: 16px;
            margin: 0 10px;
        }

        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }

            thead {
                display: none;
            }

            tr {
                margin-bottom: 15px;
                border: 1px solid #ddd;
            }

            td {
                display: flex;
                justify-content: space-between;
                padding: 10px;
                border: none;
                border-bottom: 1px solid #eee;
            }

            td:before {
                content: attr(data-label);
                font-weight: bold;
                width: 50%;
            }

            td:last-child {
                border-bottom: none;
            }

            .filter-section {
                flex-direction: column;
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
                <!-- content -->
                <div class="container">
                    <h2 style="text-align: center;" class="fw-bold">XẾP HẠNG NHÀ CUNG CẤP</h2>
                    
                    
                    <table id="rankingTable">
                        <thead>
                            <tr>
                                <th>Tên nhà cung cấp</th>
                                <th>Điểm trung bình</th>
                                <th>Số hợp đồng</th>
                                <th>Số hợp đồng chậm tiến độ</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <?php foreach ($topProviders as $provider): ?>
                                <tr>
                                    <td data-label="Tên nhà cung cấp"><?= htmlspecialchars($provider['provider_name']) ?></td>
                                    <td data-label="Điểm trung bình"><?= number_format($provider['avg_score'], 2) ?></td>
                                    <td data-label="Số hợp đồng"><?= $provider['total_contracts'] ?></td>
                                    <td data-label="Số hợp đồng chậm tiến độ"><?= $provider['expired_contracts'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <canvas id="avgScoreChart"></canvas>
                    <canvas id="delayedContractsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../public/assets/js/main.js"></script>
    <!-- <script src="../../public/assets/js/report.js"></script> -->
</body>

</html>