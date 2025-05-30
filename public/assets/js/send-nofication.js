 // Tải mẫu email dựa trên loại cảnh báo
 function loadTemplate() {
    const warningType = document.getElementById('warning-type').value;
    const content = document.getElementById('content');
    if (warningType === 'delay') {
        content.value = 'Kính gửi [Nhà cung cấp],\n\nCông việc hiện tại đang chậm tiến độ. Vui lòng hoàn thành trước [Ngày].\n\nTrân trọng,\n[Your Company]';
    } else if (warningType === 'expire') {
        content.value = 'Kính gửi [Nhà cung cấp],\n\nHợp đồng của quý công ty sẽ hết hạn vào [Ngày]. Vui lòng liên hệ để gia hạn.\n\nTrân trọng,\n[Your Company]';
    } else if (warningType === 'other') {
        content.value = 'Kính gửi [Nhà cung cấp],\n\n[Nhập nội dung tùy chỉnh].\n\nTrân trọng,\n[Your Company]';
    } else {
        content.value = '';
    }
}

// Lưu nháp (lưu vào localStorage để demo)
function saveDraft() {
    const content = document.getElementById('content').value;
    localStorage.setItem('draft', content);
    alert('Đã lưu nháp!');
}

// Gửi email (giả lập)
document.getElementById('notification-form').addEventListener('submit', function (e) {
    e.preventDefault();
    alert('Email đã được gửi thành công! (Giả lập)');
    this.reset();
});

// Tìm kiếm và lọc danh sách email
function filterTable() {
    const searchInput = document.getElementById('search-input').value.toLowerCase();
    const filterType = document.getElementById('filter-type').value;
    const rows = document.querySelectorAll('#email-table tbody tr');

    rows.forEach(row => {
        const supplier = row.cells[0].textContent.toLowerCase();
        const type = row.cells[2].textContent.toLowerCase();
        const showRow = (supplier.includes(searchInput) || searchInput === '') &&
            (filterType === '' || type === filterType.toLowerCase());
        row.style.display = showRow ? '' : 'none';
    });
}

document.getElementById('search-input').addEventListener('input', filterTable);
document.getElementById('filter-type').addEventListener('change', filterTable);

// Hiển thị chi tiết email
function showDetails(supplier, date, type, content) {
    document.getElementById('popup-supplier').textContent = supplier;
    document.getElementById('popup-date').textContent = date;
    document.getElementById('popup-type').textContent = type;
    document.getElementById('popup-content').textContent = content;
    document.getElementById('detail-popup').style.display = 'block';
}

// Đóng popup
function closePopup() {
    document.getElementById('detail-popup').style.display = 'none';
}