<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Giao Dịch</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .section-header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 5px 5px 0 0;
        }
        .btn-action {
            margin-right: 10px;
        }
        .document-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 0;
        }
        .edit-mode {
            display: none;
        }
    </style>
</head>
<body>


    <!-- Main Content -->
    <div class="container mt-4">
        <div class="card">
            <div class="card-header section-header">
                <h4 class="mb-0">Chi Tiết Giao Dịch</h4>
            </div>
            <div class="card-body">
                <!-- Transaction Info -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label"><strong>Nhà cung cấp:</strong></label>
                        <p id="supplier" class="view-mode">ABC Cleaning Co.</p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><strong>Mã hợp đồng:</strong></label>
                        <p id="contractId" class="view-mode">CON-2025-001</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label"><strong>Ngày:</strong></label>
                        <p id="date" class="view-mode">15/04/2025</p>
                        <input type="date" id="dateInput" class="form-control edit-mode" value="2025-04-15">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><strong>Dịch vụ:</strong></label>
                        <p id="service" class="view-mode">Vệ sinh</p>
                        <select id="serviceInput" class="form-select edit-mode">
                            <option value="Vệ sinh" selected>Vệ sinh</option>
                            <option value="Điện">Điện</option>
                            <option value="Cơ khí">Cơ khí</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label"><strong>Trạng thái:</strong></label>
                        <p id="status" class="view-mode">Hoàn thành</p>
                        <select id="statusInput" class="form-select edit-mode">
                            <option value="Hoàn thành" selected>Hoàn thành</option>
                            <option value="Trễ">Trễ</option>
                            <option value="Đang tiến hành">Đang tiến hành</option>
                            <option value="Hủy">Hủy</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><strong>Đánh giá:</strong></label>
                        <p id="evaluation" class="view-mode">9/10</p>
                        <input type="number" id="evaluationInput" class="form-control edit-mode" min="1" max="10" value="9">
                    </div>
                </div>

                <!-- Notes -->
                <div class="mb-3">
                    <label class="form-label"><strong>Ghi chú:</strong></label>
                    <p id="notes" class="view-mode">Dịch vụ hoàn thành đúng hạn, không có vấn đề.</p>
                    <textarea id="notesInput" class="form-control edit-mode" rows="4">Dịch vụ hoàn thành đúng hạn, không có vấn đề.</textarea>
                    <button id="addNoteBtn" class="btn btn-outline-primary btn-sm mt-2"><i class="fas fa-plus"></i> Thêm ghi chú</button>
                </div>

                <!-- Documents -->
                <div class="mb-3">
                    <label class="form-label"><strong>Tài liệu:</strong></label>
                    <div id="documents" class="view-mode">
                        <div class="document-item">
                            <span>invoice_15042025.pdf</span>
                            <div>
                                <a href="#" class="text-primary"><i class="fas fa-eye"></i> Xem</a> |
                                <a href="#" class="text-danger"><i class="fas fa-trash"></i> Xóa</a>
                            </div>
                        </div>
                    </div>
                    <input type="file" id="documentInput" class="form-control edit-mode" accept=".pdf,.jpg,.png">
                    <button id="uploadDocumentBtn" class="btn btn-outline-primary btn-sm mt-2"><i class="fas fa-upload"></i> Tải lên tài liệu</button>
                </div>

                <!-- Delay Details (if applicable) -->
                <div class="mb-3">
                    <label class="form-label"><strong>Chi tiết trễ (nếu có):</strong></label>
                    <p id="delayDetails" class="view-mode">Không có</p>
                    <textarea id="delayDetailsInput" class="form-control edit-mode" rows="2">Không có</textarea>
                </div>

                <!-- Actions -->
                <div class="d-flex justify-content-end">
                    <button id="editBtn" class="btn btn-primary btn-action view-mode"><i class="fas fa-edit"></i> Sửa</button>
                    <button id="saveBtn" class="btn btn-success btn-action edit-mode"><i class="fas fa-save"></i> Lưu</button>
                    <button id="cancelBtn" class="btn btn-secondary btn-action edit-mode"><i class="fas fa-times"></i> Hủy</button>
                    <button id="deleteBtn" class="btn btn-danger btn-action"><i class="fas fa-trash"></i> Xóa</button>
                    <a href="http://127.0.0.1:5500/transaction-history.html" class="btn btn-outline-secondary btn-action"><i class="fas fa-arrow-left"></i> Quay lại</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <!-- Custom JS -->
    <script>
        const editBtn = document.getElementById('editBtn');
        const saveBtn = document.getElementById('saveBtn');
        const cancelBtn = document.getElementById('cancelBtn');
        const viewElements = document.querySelectorAll('.view-mode');
        const editElements = document.querySelectorAll('.edit-mode');

        // Switch to edit mode
        editBtn.addEventListener('click', () => {
            viewElements.forEach(el => el.style.display = 'none');
            editElements.forEach(el => el.style.display = 'block');
        });

        // Save changes (for demo, just switch back to view mode)
        saveBtn.addEventListener('click', () => {
            // Update view elements with input values (for demo)
            document.getElementById('date').textContent = document.getElementById('dateInput').value.split('-').reverse().join('/');
            document.getElementById('service').textContent = document.getElementById('serviceInput').value;
            document.getElementById('status').textContent = document.getElementById('statusInput').value;
            document.getElementById('evaluation').textContent = document.getElementById('evaluationInput').value + '/10';
            document.getElementById('notes').textContent = document.getElementById('notesInput').value;
            document.getElementById('delayDetails').textContent = document.getElementById('delayDetailsInput').value;

            // Switch back to view mode
            viewElements.forEach(el => el.style.display = 'block');
            editElements.forEach(el => el.style.display = 'none');
            alert('Đã lưu thay đổi (Demo)!');
        });

        // Cancel changes
        cancelBtn.addEventListener('click', () => {
            viewElements.forEach(el => el.style.display = 'block');
            editElements.forEach(el => el.style.display = 'none');
        });

        // Delete confirmation
        document.getElementById('deleteBtn').addEventListener('click', () => {
            if (confirm('Bạn có chắc muốn xóa giao dịch này?')) {
                alert('Đã xóa giao dịch (Demo)!');
            }
        });

        // Add note (for demo)
        document.getElementById('addNoteBtn').addEventListener('click', () => {
            const newNote = prompt('Nhập ghi chú mới:');
            if (newNote) {
                document.getElementById('notes').textContent += '\n' + newNote;
                document.getElementById('notesInput').value += '\n' + newNote;
                alert('Đã thêm ghi chú (Demo)!');
            }
        });

        // Upload document (for demo)
        document.getElementById('uploadDocumentBtn').addEventListener('click', () => {
            const fileInput = document.getElementById('documentInput');
            if (fileInput.files.length > 0) {
                alert('Đã tải lên tài liệu: ' + fileInput.files[0].name + ' (Demo)!');
            } else {
                alert('Vui lòng chọn file để tải lên!');
            }
        });
    </script>
</body>
</html>