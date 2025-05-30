<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Liên kết Font Awesome CSS từ CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    <title>Gửi thông báo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            /* min-height: 100vh; */
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
        }

        .sidebar h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 10px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
        }

        .form-section,
        .history-section {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-section h2,
        .history-section h2 {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group select,
        .form-group textarea,
        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group textarea {
            height: 150px;
            resize: vertical;
        }

        .button-group {
            display: flex;
            gap: 10px;
        }

        .button-group button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .send-btn {
            background-color: #28a745;
            color: white;
        }

        .draft-btn {
            background-color: #ffc107;
            color: black;
        }

        .template-btn {
            background-color: #007bff;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f8f9fa;
        }

        .search-filter {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .search-filter input,
        .search-filter select {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .status-success {
            color: green;
        }

        .status-failed {
            color: red;
        }

        .detail-btn {
            background-color: #17a2b8;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 90%;
        }

        .popup h3 {
            margin-top: 0;
        }

        .popup .close-btn {
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
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
                                    <a href="dashboard.html" class="d-flex align-items-center"
                                        onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-house"></i></span>
                                        <span>Bảng điều khiển</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="supplier.html" class="d-flex align-items-center" onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-truck"></i></span>
                                        <span>Nhà cung cấp</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="contract.html" class="d-flex align-items-center" onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-file-contract"></i></span>
                                        <span>Hợp đồng</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="transaction-history.html" class="d-flex align-items-center"
                                        onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-clock"></i></span>
                                        <span>Lịch sử giao dịch</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="progress-evaluation.html" class="d-flex align-items-center"
                                        onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-star"></i></span>
                                        <span>Đánh giá tiến độ</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="report.html" class="d-flex align-items-center" onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-chart-column"></i></span>
                                        <span>Báo cáo</span>
                                    </a>
                                </li>
                                <!-- nut cuoi -->
                                <li class="list-group-item">
                                    <a href="send-notification.html" class="d-flex align-items-center"
                                        onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-bell"></i></span>
                                        <span>Gửi thông báo</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="login.html" class="d-flex align-items-center" onclick="setActive(this)">
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
                <!-- Main Content -->
                <div class="main-content">
                    <!-- Form Gửi Thông báo -->
                    <div class="form-section">
                        <h4 style="text-align: center;" class = "fw-bold mb-3" > GỬI EMAIL</h4>
                        <form id="notification-form">
                            <div class="form-group mb-3">
                                <label for="supplier" class = "text-success">Chọn nhà cung cấp</label>
                                <select id="supplier" name="supplier" required>
                                    <option value="">Chọn nhà cung cấp</option>
                                    <option value="ncc1">Nhà cung cấp 1 - Vệ sinh</option>
                                    <option value="ncc2">Nhà cung cấp 2 - Điện</option>
                                    <option value="ncc3">Nhà cung cấp 3 - Xây dựng</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="warning-type" class = "text-success">Loại Cảnh báo</label>
                                <select id="warning-type" name="warning-type" required>
                                    <option value="">Chọn loại...</option>
                                    <option value="delay">Trễ tiến độ</option>
                                    <option value="expire">Hết hạn hợp đồng</option>
                                    <option value="other">Khác</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="content" class = "text-success">Nội dung Email</label>
                                <textarea id="content" name="content" required></textarea>
                            </div>
                            <div class="button-group">
                                <button type="button" class="template-btn" onclick="loadTemplate()">Tải mẫu</button>
                                <button type="submit" class="send-btn">Gửi</button>
                                <button type="button" class="draft-btn" onclick="saveDraft()">Lưu nháp</button>
                            </div>
                        </form>
                    </div>

                    <!-- Lịch sử Email -->
                    <div class="history-section">
                        <h2>Lịch sử Email đã gửi</h2>
                        <div class="search-filter">
                            <input type="text" id="search-input" placeholder="Tìm kiếm theo NCC...">
                            <select id="filter-type">
                                <option value="">Tất cả loại cảnh báo</option>
                                <option value="delay">Trễ tiến độ</option>
                                <option value="expire">Hết hạn hợp đồng</option>
                                <option value="other">Khác</option>
                            </select>
                        </div>
                        <table id="email-table">
                            <thead>
                                <tr>
                                    <th>Nhà cung cấp</th>
                                    <th>Ngày gửi</th>
                                    <th>Loại cảnh báo</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>NCC 1 - Vệ sinh</td>
                                    <td>2025-04-15</td>
                                    <td>Trễ tiến độ</td>
                                    <td class="status-success">Thành công</td>
                                    <td><button class="detail-btn"
                                            onclick="showDetails('NCC 1 - Vệ sinh', '2025-04-15', 'Trễ tiến độ', 'Vui lòng hoàn thành công việc trước 20/04/2025.')">Xem
                                            chi tiết</button></td>
                                </tr>
                                <tr>
                                    <td>NCC 2 - Điện</td>
                                    <td>2025-04-14</td>
                                    <td>Hết hạn hợp đồng</td>
                                    <td class="status-failed">Thất bại</td>
                                    <td><button class="detail-btn"
                                            onclick="showDetails('NCC 2 - Điện', '2025-04-14', 'Hết hạn hợp đồng', 'Hợp đồng sẽ hết hạn vào 18/04/2025.')">Xem
                                            chi tiết</button></td>
                                </tr>
                                <tr>
                                    <td>NCC 3 - Xây dựng</td>
                                    <td>2025-04-13</td>
                                    <td>Khác</td>
                                    <td class="status-success">Thành công</td>
                                    <td><button class="detail-btn"
                                            onclick="showDetails('NCC 3 - Xây dựng', '2025-04-13', 'Khác', 'Vui lòng kiểm tra chất lượng công trình.')">Xem
                                            chi tiết</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="popup" id="detail-popup">
        <button class="close-btn" onclick="closePopup()">Đóng</button>
        <h3>Chi tiết Email</h3>
        <p><strong>Nhà cung cấp:</strong> <span id="popup-supplier"></span></p>
        <p><strong>Ngày gửi:</strong> <span id="popup-date"></span></p>
        <p><strong>Loại cảnh báo:</strong> <span id="popup-type"></span></p>
        <p><strong>Nội dung:</strong> <span id="popup-content"></span></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/main.js"></script>
    <script src="../../assets/js/send-notification.js"></script>
</body>

</html>