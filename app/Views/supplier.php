<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Liên kết Font Awesome CSS từ CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/assets/css/main.css">
    <link rel="stylesheet" href="../../public/assets/css/navbar.css">
    <title>Quản lý nhà cung cấp</title>
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

        @media (max-width: 768px) {

            .modal-dialog {
                margin: auto;
            }

            .modal-backdrop {
                display: none;
            }

            .modal-dialog {
                position: absolute;
                right: 0;
                left: 0;
                top: 10%;
                transform: translateX(0);
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
                                <li class="nav-item">
                                    <h3 class="mt-3 fs-3 fw-bold" href="#">NHÀ CUNG CẤP</h3>
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
                    <!-- search and filter -->
                    <div class="container-fluid bg-light py-3 border-bottom">
                        <div id="search-filter">
                            <div class="row mt-4"> 
                                <div class="col-md-6 d-flex justify-content-between align-items-center">
                                    <div class="col-6 col-md-3 me-3">
                                        <button class="btn btn-md btn-success w-75" data-bs-toggle="modal"
                                            data-bs-target="#supplierModal">
                                            Thêm
                                        </button>
                                    </div>

                                    <div class="modal fade" id="supplierModal" tabindex="-1"
                                        aria-labelledby="supplierModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style="max-width: 60%;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="supplierModalLabel">Thêm nhà cung cấp
                                                        mới
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                   <form method="post" action="/public/index.php?page=supplier&action=add">
                                                        <!-- Tên nhà cung cấp -->
                                                        <div class="mb-3">
                                                            <label for="supplierName" class="form-label">Tên nhà cung cấp</label>
                                                            <input type="text" class="form-control" id="supplierName" name="name" placeholder="Nhập tên nhà cung cấp" required>
                                                        </div>

                                                        <!-- Mã số thuế -->
                                                        <div class="mb-3">
                                                            <label for="taxcode" class="form-label">Mã số thuế</label>
                                                            <input type="text" class="form-control" id="taxcode" name="taxcode" placeholder="Nhập mã số thuế" required>
                                                        </div>

                                                        <!-- Mô tả -->
                                                        <div class="mb-3">
                                                            <label for="description" class="form-label">Mô tả</label>
                                                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Mô tả về nhà cung cấp"></textarea>
                                                        </div>

                                                        <!-- Trạng thái -->
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Trạng thái</label>
                                                            <select class="form-select" id="status" name="status" required>
                                                                <option value="active">Đang hoạt động</option>
                                                                <option value="inactive">Tạm ngừng</option>
                                                                <option value="cancelled">Đã hủy hợp đồng</option>
                                                            </select>
                                                        </div>

                                                        <!-- Địa chỉ -->
                                                        <div class="mb-3">
                                                            <label for="address" class="form-label">Địa chỉ</label>
                                                            <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ" required>
                                                        </div>

                                                        <!-- Số điện thoại -->
                                                        <div class="mb-3">
                                                            <label for="phone" class="form-label">Số điện thoại</label>
                                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
                                                        </div>

                                                        <!-- Email -->
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Đóng</button>
                                                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
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
                    <!-- list supplier -->
                    <div id="list-supper">
                        <div class="container table-container">
                            <h3 class="mt-4 mb-4">Danh Sách Nhà Cung Cấp</h3>
                            <table class="mb-3">
                                <thead>
                                    <tr>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Mô tả</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Thông tin liên hệ</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                    <tbody id="supplier-list">
                                    <?php if (!empty($providers)): ?>
                                        <?php foreach ($providers as $provider): ?>
                                            <tr>
                                                <td><?= ($provider['name']) ?></td>
                                                <td><?= ($provider['description']) ?></td>
                                                <td>
                                                    <?php
                                                        if ($provider['status'] === 'active') echo '<span class="badge bg-success">Đang hoạt động</span>';
                                                        elseif ($provider['status'] === 'inactive') echo '<span class="badge bg-secondary">Tạm ngừng</span>';
                                                        else echo '<span class="badge bg-danger">Đã hủy</span>';
                                                    ?>
                                                </td>
                                                <td>
                                                    <div>Email: <?= ($provider['email']) ?></div>
                                                    <div>ĐT: <?= ($provider['phone']) ?></div>
                                                    <div>Đ/c: <?= ($provider['address']) ?></div>
                                                </td>
                                                <td>
                                                    <button 
                                                        class="btn btn-info btn-sm view-btn" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#viewSupplierModal"
                                                        data-id="<?= $provider['id'] ?>"
                                                        data-name="<?= htmlspecialchars($provider['name']) ?>"
                                                        data-taxcode="<?= htmlspecialchars($provider['taxcode']) ?>"
                                                        data-description="<?= htmlspecialchars($provider['description']) ?>"
                                                        data-status="<?= htmlspecialchars($provider['status']) ?>"
                                                        data-address="<?= htmlspecialchars($provider['address']) ?>"
                                                        data-phone="<?= htmlspecialchars($provider['phone']) ?>"
                                                        data-email="<?= htmlspecialchars($provider['email']) ?>"
                                                    >Xem</button>
                                                    <button 
                                                        class="btn btn-warning btn-sm edit-btn" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#updateSupplierModal"
                                                        data-id="<?= $provider['id'] ?>"
                                                        data-name="<?= htmlspecialchars($provider['name']) ?>"
                                                        data-taxcode="<?= htmlspecialchars($provider['taxcode']) ?>"
                                                        data-description="<?= htmlspecialchars($provider['description']) ?>"
                                                        data-status="<?= htmlspecialchars($provider['status']) ?>"
                                                        data-address="<?= htmlspecialchars($provider['address']) ?>"
                                                        data-phone="<?= htmlspecialchars($provider['phone']) ?>"
                                                        data-email="<?= htmlspecialchars($provider['email']) ?>"
                                                    >Sửa</button>
                                                    <button 
                                                        class="btn btn-danger btn-sm delete-btn" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#deleteSupplierModal"
                                                        data-id="<?= $provider['id'] ?>"
                                                        data-name="<?= htmlspecialchars($provider['name']) ?>"
                                                    >Xóa</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center">Không có dữ liệu nhà cung cấp.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        <div id="paginate-supplier">
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
                    </div>

                    <!-- Modal: View Supplier Details -->
                    <div class="modal fade" id="viewSupplierModal" tabindex="-1"
                    aria-labelledby="viewSupplierModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewSupplierModalLabel">Chi tiết nhà cung cấp</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="viewSupplierModalBody">
                                    <!-- Nội dung sẽ được JS đổ vào -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal: Update Supplier -->
                    <div class="modal fade" id="updateSupplierModal" tabindex="-1"
                    aria-labelledby="updateSupplierModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="/public/index.php?page=supplier&action=edit">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateSupplierModalLabel">Chỉnh sửa nhà cung cấp</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" id="editId" name="id">
                                        <div class="mb-3">
                                            <label for="editName" class="form-label">Tên</label>
                                            <input type="text" class="form-control" id="editName" name="name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editTaxcode" class="form-label">Mã số thuế</label>
                                            <input type="text" class="form-control" id="editTaxcode" name="taxcode" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editDescription" class="form-label">Mô tả</label>
                                            <textarea class="form-control" id="editDescription" name="description"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editStatus" class="form-label">Trạng thái</label>
                                            <select class="form-select" id="editStatus" name="status" required>
                                                <option value="active">Đang hoạt động</option>
                                                <option value="inactive">Tạm ngừng</option>
                                                <option value="cancelled">Đã hủy hợp đồng</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editAddress" class="form-label">Địa chỉ</label>
                                            <input type="text" class="form-control" id="editAddress" name="address" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editPhone" class="form-label">Số điện thoại</label>
                                            <input type="text" class="form-control" id="editPhone" name="phone" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="editEmail" name="email" required>
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

                    <!-- Modal: Delete Confirmation -->
                    <div class="modal fade" id="deleteSupplierModal" tabindex="-1"
                        aria-labelledby="deleteSupplierModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="/public/index.php?page=supplier&action=delete">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteSupplierModalLabel">Xác nhận xóa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body overflow-auto" id="deleteSupplierModalBody">
                                        <input type="hidden" id="deleteId" name="id">
                                        <p>Bạn có chắc chắn muốn xóa nhà cung cấp <span id="deleteName"></span>?</p>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?= asset('../../public/assets/js/main.js') ?>"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
            // Xem chi tiết
            document.querySelectorAll('.view-btn').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    let html = `
                        <p><strong>Tên:</strong> ${btn.dataset.name}</p>
                        <p><strong>Mã số thuế:</strong> ${btn.dataset.taxcode}</p>
                        <p><strong>Mô tả:</strong> ${btn.dataset.description}</p>
                        <p><strong>Trạng thái:</strong> ${btn.dataset.status}</p>
                        <p><strong>Địa chỉ:</strong> ${btn.dataset.address}</p>
                        <p><strong>Số điện thoại:</strong> ${btn.dataset.phone}</p>
                        <p><strong>Email:</strong> ${btn.dataset.email}</p>
                    `;
                    document.getElementById('viewSupplierModalBody').innerHTML = html;
                });
            });

            // Sửa
            document.querySelectorAll('.edit-btn').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    document.getElementById('editId').value = btn.dataset.id;
                    document.getElementById('editName').value = btn.dataset.name;
                    document.getElementById('editTaxcode').value = btn.dataset.taxcode;
                    document.getElementById('editDescription').value = btn.dataset.description;
                    document.getElementById('editStatus').value = btn.dataset.status;
                    document.getElementById('editAddress').value = btn.dataset.address;
                    document.getElementById('editPhone').value = btn.dataset.phone;
                    document.getElementById('editEmail').value = btn.dataset.email;
                });
            });

            // Xóa
            document.querySelectorAll('.delete-btn').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    document.getElementById('deleteId').value = btn.dataset.id;
                    document.getElementById('deleteName').textContent = btn.dataset.name;
                });
            });
        });
        </script>
</html>