<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Liên kết Font Awesome CSS từ CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/assets/css/main.css">
    <link rel="stylesheet" href="../../public/assets/css/navbar.css">
    <title>Lịch sử giao dịch</title>
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
            overflow-x: auto;
        }

        .table {
            min-width: 100%;
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
                                    <h3 class="mt-3 fs-3 fw-bold" href="#">LỊCH SỬ GIAO DỊCH</h3>
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

                <!-- Content -->
                <div class="container">
                    <!-- Search and Filter -->
                    <div class="container-fluid bg-light py-3 border-bottom">
                        <div id="search-filter">
                            <div class="row mt-4">

                                <!-- <div class="col-md-6 d-flex align-items-center">
                                    <div class="col-md-4 col-sm-6 w-100">
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                placeholder="Tìm kiếm giao dịch">
                                            <button class="btn btn-outline-primary" type="submit">Tìm kiếm</button>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="col-md-6 d-flex justify-content-between align-items-center">
                                    <div class="col-6 col-md-3 me-3">
                                        <button class="btn btn-md btn-success w-75" data-bs-toggle="modal"
                                            data-bs-target="#addTransactionModal">
                                            Thêm
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Transaction List -->
                    <div id="list-transactions">
                        <div class="container table-container">
                            <h3 class="mt-4 mb-4">Danh Sách Giao Dịch</h3>
                            <table class="mb-3">
                                <thead>
                                    <tr>
                                        <th scope="col">Ngày</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Tổng tiền</th>
                                        <th scope="col">Ghi chú</th>
                                        <th scope="col">Thuế VAT</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody id="transaction-list">
                                    <?php if (!empty($bills)): ?>
                                        <?php foreach ($bills as $bill): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($bill['paid_date']) ?></td>
                                                <td><?= htmlspecialchars($bill['name']) ?></td>
                                                <td><?= number_format($bill['amount'], 0, ',', '.') ?> đ</td>
                                                <td><?= htmlspecialchars($bill['description']) ?></td>
                                                <td><?= isset($bill['vat']) ? number_format($bill['vat'], 2) . '%' : '' ?></td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm delete-btn"
                                                        data-id="<?= $bill['id'] ?>"
                                                        data-name="<?= htmlspecialchars($bill['name']) ?>"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteTransactionModal">Xóa</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center">Không có giao dịch nào.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        <div id="paginate-transactions">
                            <nav aria-label="pagination-area-button">
                                <ul class="pagination justify-content-center" id="pagination">
                                    <!-- Pagination will be populated by JavaScript -->
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Modal: Add New Transaction -->
                    <div class="modal fade" id="addTransactionModal" tabindex="-1"
                        aria-labelledby="addTransactionModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="max-width: 60%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addTransactionModalLabel">Thêm Giao Dịch Mới</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="post" action="?page=transaction-history&action=add">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="contractId" class="form-label">Hợp đồng</label>
                                            <select class="form-select" id="contractId" name="contract_id" required>
                                                <option value="">Chọn hợp đồng</option>
                                                <?php if (!empty($contracts)): ?>
                                                    <?php foreach ($contracts as $contract): ?>
                                                        <option value="<?= $contract['id'] ?>">
                                                            <?= htmlspecialchars($contract['name']) ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="billName" class="form-label">Tên giao dịch</label>
                                            <input type="text" class="form-control" id="billName" name="name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="billDescription" class="form-label">Ghi chú</label>
                                            <textarea class="form-control" id="billDescription" name="description" rows="2"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="billQuantity" class="form-label">Số lượng</label>
                                            <input type="number" class="form-control" id="billQuantity" name="quantity" min="1" value="1" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="billAmount" class="form-label">Tổng tiền</label>
                                            <input type="number" class="form-control" id="billAmount" name="amount" min="0" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="billPaidDate" class="form-label">Ngày thanh toán</label>
                                            <input type="date" class="form-control" id="billPaidDate" name="paid_date" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="billVat" class="form-label">Thuế VAT (%)</label>
                                            <input type="number" class="form-control" id="billVat" name="vat" min="0" max="100" step="0.01">
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
                    <div class="modal fade" id="deleteTransactionModal" tabindex="-1"
                        aria-labelledby="deleteTransactionModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="?page=transaction-history&action=delete">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteTransactionModalLabel">Xác nhận xóa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc muốn xóa giao dịch <span id="deleteBillName"></span>? Hành động này không thể hoàn tác.
                                        <input type="hidden" name="id" id="deleteBillId">
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
        <script src="../../public/assets/js/main.js"></script>
        <!-- <script src="../../public/assets/js/transaction-history.js"></script> -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.delete-btn').forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        document.getElementById('deleteBillId').value = btn.dataset.id;
                        document.getElementById('deleteBillName').textContent = btn.dataset.name;
                    });
                });
            });
        </script>
</body>

</html>