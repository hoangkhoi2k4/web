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
    <title>Đánh giá tiến độ</title>
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
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

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

        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
            margin-right: 5px;
        }

        .edit-btn {
            background-color: #2196F3;
        }

        .edit-btn:hover {
            background-color: #1976D2;
        }

        .save-btn {
            background-color: #4CAF50;
        }

        .save-btn:hover {
            background-color: #45a049;
        }

        .note-btn {
            background-color: #666;
        }

        .note-btn:hover {
            background-color: #555;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            width: 90%;
            max-width: 500px;
        }

        .modal-content input {
            margin-bottom: 10px;
        }

        .modal-content button {
            margin: 0 5px;
        }

        @media (max-width: 768px) {

            table,
            thead,
            tbody,
            th,
            td,
            tr {
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
                    <!-- Header -->
                    <div id="header">
                        <div class="container">
                            <ul class="nav justify-content-between">
                                <div id="header-left">
                                    <li class="nav-item">
                                        <h3 class="mt-3 fs-3 fw-bold" href="#">TIẾN ĐỘ HỢP ĐỒNG</h3>
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


                    <!-- data  -->
                    <table id="evaluationTable">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên hợp đồng</th>
                                <th>Tên nhà cung cấp</th>
                                <th> Đúng hạn (%)</th>
                                <th>Điểm trung bình</th>
                                <th>Ghi chú</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <?php if (!empty($progresses)): ?>
                                <?php foreach ($progresses as $index => $progress): ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $progress['contract'] ?></td>
                                        <td><?= $progress['provider'] ?></td>
                                        <td><?= $progress['progress'] ?></td>
                                        <td><?= $progress['avg'] ?></td>
                                        <td><?= $progress['description'] ?></td>
                                        <td>
                                            <button class="edit-btn btn btn-primary btn-sm"
                                                data-id="<?= $progress['id'] ?>"
                                                data-progress="<?= $progress['progress'] ?>"
                                                data-avg="<?= $progress['avg'] ?>"
                                                data-description="<?= ($progress['description']) ?>"
                                            >Sửa</button>
                                            <button class="note-btn btn btn-secondary btn-sm"
                                                data-id="<?= $progress['id'] ?>"
                                                data-description="<?= ($progress['description']) ?>"
                                            >Ghi chú</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">Không có dữ liệu tiến độ.</td>
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


                <!-- Modal để thêm ghi chú -->
                <div id="editModal" class="modal">
                    <div class="modal-content">
                        <h2>Sửa tiến độ</h2>
                        <form id="editForm" method="post" action="?page=progress-evaluation&action=edit">
                            <input type="hidden" name="id" id="editId">
                            <div class="mb-2">
                                <label>Đúng hạn (%)</label>
                                <input type="number" min="0" max="100" name="progress" id="editProgress" required>
                            </div>
                            <div class="mb-2">
                                <label>Điểm trung bình</label>
                                <input type="number" step="0.01" min="0" max="10" name="avg" id="editAvg" required>
                            </div>
                            <div class="mb-2">
                                <label>Ghi chú</label>
                                <input type="text" name="description" id="editDescription">
                            </div>
                            <button type="submit" class="save-btn">Lưu</button>
                            <button type="button" class="note-btn" onclick="closeEditModal()">Hủy</button>
                        </form>
                    </div>
                </div>

                <!-- Modal Ghi chú riêng -->
                <div id="noteModal" class="modal">
                    <div class="modal-content">
                        <h2>Thêm Ghi Chú</h2>
                        <form id="noteForm" method="post" action="?page=progress-evaluation&action=note">
                            <input type="hidden" name="id" id="noteId">
                            <input type="text" name="description" id="noteInput" placeholder="Nhập ghi chú..." required>
                            <button type="submit" class="save-btn">Lưu ghi chú</button>
                            <button type="button" class="note-btn" onclick="closeNoteModal()">Hủy</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../../public/assets/js/main.js"></script>
        <!-- <script src="../../public/assets/js/progress-evaluation.js"></script> -->
         <script>
            function openEditModal() {
                document.getElementById('editModal').style.display = 'flex';
            }
            function closeEditModal() {
                document.getElementById('editModal').style.display = 'none';
            }
            function openNoteModal() {
                document.getElementById('noteModal').style.display = 'flex';
            }
            function closeNoteModal() {
                document.getElementById('noteModal').style.display = 'none';
            }

            document.addEventListener('DOMContentLoaded', function () {
                // Sửa tiến độ
                document.querySelectorAll('.edit-btn').forEach(function (btn) {
                    btn.addEventListener('click', function () {
                        document.getElementById('editId').value = btn.dataset.id;
                        document.getElementById('editProgress').value = btn.dataset.progress;
                        document.getElementById('editAvg').value = btn.dataset.avg;
                        document.getElementById('editDescription').value = btn.dataset.description || '';
                        openEditModal();
                    });
                });

                // Ghi chú
                document.querySelectorAll('.note-btn').forEach(function (btn) {
                    btn.addEventListener('click', function () {
                        // Nếu là nút trong modal thì không mở lại modal
                        if (btn.closest('.modal')) return;
                        document.getElementById('noteId').value = btn.dataset.id;
                        document.getElementById('noteInput').value = btn.dataset.description || '';
                        openNoteModal();
                    });
                });

                // Đóng modal khi click ra ngoài
                window.onclick = function(event) {
                    if (event.target == document.getElementById('editModal')) closeEditModal();
                    if (event.target == document.getElementById('noteModal')) closeNoteModal();
                }
            });
        </script>
</body>

</html>