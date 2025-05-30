<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Liên kết Font Awesome CSS từ CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- CSS của Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="../../public/assets/css/main.css">
    <link rel="stylesheet" href="../../public/assets/css/navbar.css">
    <title>Hợp Đồng</title>
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
        .table-container {
            width: 100%;
            /* Đảm bảo thẻ cha có chiều rộng linh hoạt */
            overflow-x: auto;
            /* Tạo thanh cuộn ngang khi nội dung vượt quá */
        }

        .table {
            min-width: 100%;
            /* Đảm bảo bảng luôn chiếm ít nhất chiều rộng thẻ cha */
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
                <!-- Header -->
                <div id="header">
                    <div class="container">
                        <ul class="nav justify-content-between">
                            <div id="header-left">
                                <li class="nav-item">
                                    <h3 class="mt-3 fs-3 fw-bold" href="#">HỢP ĐỒNG</h3>
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

                <!-- content -->
                <div class="container">
                    <!-- filter -->
                    <div id="filter-contract">
                        <!-- header-filter -->
                        <div class="container-fluid bg-light py-3 border-bottom">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <button class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#addContractModal">
                                        <i class="bi bi-plus-circle me-2"></i>Thêm hợp đồng mới
                                    </button>
                                </div>

                                <div class="col-md-4 col-sm-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                            placeholder="Tìm kiếm theo tên hoặc mã hợp đồng">
                                        <button class="btn btn-outline-primary" type="submit">Tìm kiếm</button>
                                    </div>
                                </div>

                                <div class="col-auto ms-auto">
                                    <button class="btn btn-warning">
                                        <i class="bi bi-download me-2"></i>Xuất CSV
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Filter Panel -->
                        <div class="container-fluid py-3 bg-white">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-3 col-sm-6">
                                    <select class="form-select" aria-label="Lọc theo loại dịch vụ">
                                        <option selected>Chọn nhà cung cấp</option>
                                        <option>Supplier A</option>
                                        <option>Supplier B</option>
                                        <option>Supplier C</option>
                                    </select>
                                </div>
                                <div class="col-md-2 col-sm-6">
                                    <select class="form-select">
                                        <option selected disabled>Chọn trạng thái</option>
                                        <option>Đang hoạt động</option>
                                        <option>Sắp hết hạn</option>
                                        <option>Hết hạn</option>
                                        <option>Đã hủy</option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-calendar"></i>
                                        </span>
                                        <input type="text" class="form-control" id="fromDate" placeholder="Từ ngày">
                                        <input type="text" class="form-control" id="toDate" placeholder="Đến ngày">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <button class="btn btn-primary me-2 col-md-5 col-12">
                                        <i class="bi bi-funnel me-2 "></i>
                                        Áp dụng lọc
                                    </button>
                                    <button class="btn btn-outline-secondary col-md-5 col-12">
                                        <i class="bi bi-x-circle me-2 "></i>
                                        Xóa bộ lọc
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Modal: Add New Contract -->
                        <div class="modal fade" id="addContractModal" tabindex="-1"
                            aria-labelledby="addContractModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" action="?page=contract&action=add">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addContractModalLabel">Thêm hợp đồng mới</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Các trường nhập liệu, ví dụ: -->
                                            <div class="mb-3">
                                                <label for="provider_id" class="form-label">Nhà cung cấp</label>
                                                <input type="number" class="form-control" name="provider_id" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="service_id" class="form-label">Loại dịch vụ</label>
                                                <input type="number" class="form-control" name="service_id" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Tên hợp đồng</label>
                                                <input type="text" class="form-control" name="name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="price" class="form-label">Giá trị</label>
                                                <input type="number" class="form-control" name="price" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="unit" class="form-label">Đơn vị</label>
                                                <input type="text" class="form-control" name="unit" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="signed_date" class="form-label">Ngày bắt đầu</label>
                                                <input type="date" class="form-control" name="signed_date" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="expire_date" class="form-label">Ngày kết thúc</label>
                                                <input type="date" class="form-control" name="expire_date" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="name_supplier" class="form-label">Tên NCC</label>
                                                <input type="text" class="form-control" name="name_supplier" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="phone_supplier" class="form-label">SĐT NCC</label>
                                                <input type="text" class="form-control" name="phone_supplier" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                            <button type="submit" class="btn btn-primary">Lưu</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- list contract -->
                    <div id="list-contracts">
                        <div class="container table-container">
                            <h3 class="mt-4 mb-4">Danh Sách Hợp Đồng</h3>
                            <table class="mb-3 overflow-auto">
                                <thead>
                                    <tr>
                                        <th scope="col">Tên nhà cung cấp</th>
                                        <th scope="col">Tên hợp đồng</th>
                                        <th scope="col">Loại dịch vụ</th>
                                        <th scope="col">Ngày bắt đầu</th>
                                        <th scope="col">Ngày kết thúc</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="contract-list">
                                    <?php if (!empty($contracts)): ?>
                                        <?php foreach ($contracts as $contract): ?>
                                            <tr>
                                                <td><?= ($contract['name_supplier']) ?></td>
                                                <td><?= ($contract['name']) ?></td>
                                                <td><?= ($contract['service_id']) ?></td>
                                                <td><?= ($contract['signed_date']) ?></td>
                                                <td><?= ($contract['expire_date']) ?></td>
                                                <td>
                                                    <!-- Bạn có thể tùy chỉnh trạng thái theo logic của bạn -->
                                                    <span class="badge bg-success">Đang hoạt động</span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-info btn-sm view-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#viewContractModal"
                                                        data-id="<?= $contract['id'] ?>"
                                                        data-name="<?= ($contract['name']) ?>"
                                                        data-provider="<?= ($contract['provider_id']) ?>"   
                                                        data-service="<?= ($contract['service_id']) ?>"
                                                        data-supplier="<?= ($contract['name_supplier']) ?>"
                                                        data-phone="<?= ($contract['phone_supplier']) ?>"
                                                        data-price="<?= ($contract['price']) ?>"
                                                        data-unit="<?= ($contract['unit']) ?>"
                                                        data-signed="<?= ($contract['signed_date']) ?>"
                                                        data-expire="<?= ($contract['expire_date']) ?>"
                                                    >Xem</button>
                                                    <button class="btn btn-warning btn-sm edit-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#updateContractModal"
                                                        data-id="<?= $contract['id'] ?>"
                                                        data-name="<?= ($contract['name']) ?>"
                                                        data-provider="<?= ($contract['provider_id']) ?>" 
                                                        data-service="<?= ($contract['service_id']) ?>"
                                                        data-supplier="<?= ($contract['name_supplier']) ?>"
                                                        data-phone="<?= ($contract['phone_supplier']) ?>"
                                                        data-price="<?= ($contract['price']) ?>"
                                                        data-unit="<?= ($contract['unit']) ?>"
                                                        data-signed="<?= ($contract['signed_date']) ?>"
                                                        data-expire="<?= ($contract['expire_date']) ?>"
                                                    >Sửa</button>
                                                    <button class="btn btn-danger btn-sm delete-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteContractModal"
                                                        data-id="<?= $contract['id'] ?>"
                                                        data-name="<?= htmlspecialchars($contract['name']) ?>"
                                                    >Xóa</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Không có hợp đồng nào.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        <div id="paginate-contract">
                            <nav aria-label="pagination-area-button">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Trước</a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">...</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Sau</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <!-- Modal: View Contract Details -->
                        <div class="modal fade" id="viewContractModal" tabindex="-1"
                            aria-labelledby="viewContractModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewContractModalLabel">Chi tiết hợp đồng</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body " id="viewContractModalBody">
                                        <!-- Details will be populated dynamically -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal: Update Contract -->
                        <div class="modal fade" id="updateContractModal" tabindex="-1"
                            aria-labelledby="updateContractModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" action="?page=contract&action=edit">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateContractModalLabel">Chỉnh sửa hợp đồng</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                       <div class="modal-body">
                                            <!-- Các trường nhập liệu, ví dụ: -->
                                            <input type="hidden" name="id">
                                            <div class="mb-3">
                                                <input type="hidden" class="form-control" name="provider_id" required>
                                            </div>
                                            <div class="mb-3">
                                                <input type="hidden" class="form-control" name="service_id" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Tên hợp đồng</label>
                                                <input type="text" class="form-control" name="name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="price" class="form-label">Giá trị</label>
                                                <input type="number" class="form-control" name="price" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="unit" class="form-label">Đơn vị</label>
                                                <input type="text" class="form-control" name="unit" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="signed_date" class="form-label">Ngày bắt đầu</label>
                                                <input type="date" class="form-control" name="signed_date" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="expire_date" class="form-label">Ngày kết thúc</label>
                                                <input type="date" class="form-control" name="expire_date" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="name_supplier" class="form-label">Tên NCC</label>
                                                <input type="text" class="form-control" name="name_supplier" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="phone_supplier" class="form-label">SĐT NCC</label>
                                                <input type="text" class="form-control" name="phone_supplier" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal: Delete Confirmation -->
                        <div class="modal fade" id="deleteContractModal" tabindex="-1"
                            aria-labelledby="deleteContractModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" action="?page=contract&action=delete">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteContractModalLabel">Xác nhận xóa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" id="deleteId">
                                            <p>Bạn có chắc chắn muốn xóa hợp đồng <span id="deleteName"></span>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JS của Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../public/assets/js/main.js"></script>
    <!-- <script src="../../public/assets/js/contract.js"></script> -->
     <script>
        document.addEventListener('DOMContentLoaded', function () {
        // Đổ dữ liệu vào modal Sửa hợp đồng
        document.querySelectorAll('.edit-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                // Lấy modal
                const modal = document.getElementById('updateContractModal');
                modal.querySelector('input[name="id"]').value = btn.dataset.id;
                modal.querySelector('input[name="name"]').value = btn.dataset.name || '';
                modal.querySelector('input[name="service_id"]').value = btn.dataset.service || '';
                modal.querySelector('input[name="provider_id"]').value = btn.dataset.provider || '';
                modal.querySelector('input[name="price"]').value = btn.dataset.price || '';
                modal.querySelector('input[name="unit"]').value = btn.dataset.unit || '';
                modal.querySelector('input[name="signed_date"]').value = btn.dataset.signed || '';
                modal.querySelector('input[name="expire_date"]').value = btn.dataset.expire || '';
                modal.querySelector('input[name="name_supplier"]').value = btn.dataset.supplier || '';
                modal.querySelector('input[name="phone_supplier"]').value = btn.dataset.phone || '';
            });
        });

        // Đổ dữ liệu vào modal Xóa hợp đồng
        document.querySelectorAll('.delete-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                document.getElementById('deleteId').value = btn.dataset.id;
                document.getElementById('deleteName').textContent = btn.dataset.name;
            });
        });

        // Đổ dữ liệu vào modal Xem chi tiết hợp đồng
        document.querySelectorAll('.view-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                let html = `
                    <p><strong>Tên hợp đồng:</strong> ${btn.dataset.name || ''}</p>
                    <p><strong>Nhà cung cấp:</strong> ${btn.dataset.supplier || ''}</p>
                    <p><strong>Loại dịch vụ:</strong> ${btn.dataset.service || ''}</p>
                    <p><strong>Giá trị:</strong> ${btn.dataset.price || ''}</p>
                    <p><strong>Đơn vị:</strong> ${btn.dataset.unit || ''}</p>
                    <p><strong>Ngày bắt đầu:</strong> ${btn.dataset.signed || ''}</p>
                    <p><strong>Ngày kết thúc:</strong> ${btn.dataset.expire || ''}</p>
                    <p><strong>SĐT NCC:</strong> ${btn.dataset.phone || ''}</p>
                `;
                document.getElementById('viewContractModalBody').innerHTML = html;
            });
        });
    });
     </script>
    <script>
        flatpickr("#fromDate", {
            dateFormat: "d/m/Y", // Format ngày: dd/mm/yyyy
            allowInput: true
        });

        flatpickr("#toDate", {
            dateFormat: "d/m/Y",
            allowInput: true
        });
    </script>
</body>

</html>