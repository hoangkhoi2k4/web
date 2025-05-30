// Dữ liệu mẫu
const suppliers = [
    { name: 'Công ty X', avgScore: 8.5, onTime: 95, totalContracts: 20, delayedContracts: 2, notes: 'Uy tín cao', week: 'week1', month: 'month1' },
    { name: 'Công ty Y', avgScore: 8.0, onTime: 90, totalContracts: 15, delayedContracts: 3, notes: 'Cần cải thiện', week: 'week1', month: 'month1' },
    { name: 'Công ty Z', avgScore: 7.5, onTime: 85, totalContracts: 18, delayedContracts: 5, notes: 'Chậm tiến độ', week: 'week2', month: 'month1' },
    { name: 'Công ty A', avgScore: 8.8, onTime: 92, totalContracts: 22, delayedContracts: 1, notes: 'Tốt', week: 'week2', month: 'month2' },
    { name: 'Công ty B', avgScore: 7.8, onTime: 88, totalContracts: 17, delayedContracts: 4, notes: 'Cần kiểm tra', week: 'week1', month: 'month2' }
];

let filteredData = suppliers;
let currentPage = 1;
const itemsPerPage = 3; // Số bản ghi mỗi trang
let avgScoreChart, delayedContractsChart;

// Hàm hiển thị bảng
function renderTable(data, page = 1) {
    const tableBody = document.getElementById('tableBody');
    tableBody.innerHTML = '';

    // Tính toán chỉ số bắt đầu và kết thúc của dữ liệu trên trang hiện tại
    const start = (page - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const paginatedData = data.slice(start, end);

    paginatedData.forEach(supplier => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td data-label="Tên nhà cung cấp">${supplier.name}</td>
            <td data-label="Điểm trung bình">${supplier.avgScore}</td>
            <td data-label="Giao hàng đúng hạn (%)">${supplier.onTime}</td>
            <td data-label="Số hợp đồng">${supplier.totalContracts}</td>
            <td data-label="Số hợp đồng chậm tiến độ">${supplier.delayedContracts}</td>
            <td data-label="Ghi chú">${supplier.notes || 'Chưa có'}</td>
        `;
        tableBody.appendChild(row);
    });

    // Cập nhật thông tin phân trang
    updatePagination(data);
}

// Hàm cập nhật giao diện phân trang
function updatePagination(data) {
    const totalPages = Math.ceil(data.length / itemsPerPage);
    const pageInfo = document.getElementById('pageInfo');
    const prevPageBtn = document.getElementById('prevPage');
    const nextPageBtn = document.getElementById('nextPage');

    pageInfo.textContent = `Page ${currentPage} of ${totalPages}`;
    prevPageBtn.disabled = currentPage === 1;
    nextPageBtn.disabled = currentPage === totalPages || totalPages === 0;
}

// Hàm vẽ biểu đồ
function renderCharts(data) {
    const ctx1 = document.getElementById('avgScoreChart').getContext('2d');
    const ctx2 = document.getElementById('delayedContractsChart').getContext('2d');

    // Hủy biểu đồ cũ nếu tồn tại
    if (avgScoreChart) avgScoreChart.destroy();
    if (delayedContractsChart) delayedContractsChart.destroy();

    // Biểu đồ điểm trung bình
    avgScoreChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: data.map(s => s.name),
            datasets: [{
                label: 'Điểm trung bình',
                data: data.map(s => s.avgScore),
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true, max: 10 }
            },
            plugins: {
                title: { display: true, text: 'So sánh điểm trung bình' }
            }
        }
    });

    // Biểu đồ hợp đồng chậm tiến độ
    delayedContractsChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: data.map(s => s.name),
            datasets: [{
                label: 'Số hợp đồng chậm tiến độ',
                data: data.map(s => s.delayedContracts),
                backgroundColor: 'rgba(255, 99, 132, 0.6)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            },
            plugins: {
                title: { display: true, text: 'So sánh hợp đồng chậm tiến độ' }
            }
        }
    });
}

// Hàm lọc dữ liệu
function filterData() {
    const filterValue = document.getElementById('timeFilter').value;
    if (filterValue === 'all') {
        filteredData = suppliers;
    } else if (filterValue.startsWith('week')) {
        filteredData = suppliers.filter(s => s.week === filterValue);
    } else {
        filteredData = suppliers.filter(s => s.month === filterValue);
    }
    currentPage = 1; // Reset về trang đầu khi lọc
    renderTable(filteredData, currentPage);
    renderCharts(filteredData);
}

// Hàm xuất CSV
function exportCSV() {
    const headers = ['Tên nhà cung cấp', 'Điểm trung bình', 'Giao hàng đúng hạn (%)', 'Số hợp đồng', 'Số hợp đồng chậm tiến độ', 'Ghi chú'];
    const rows = filteredData.map(s => [
        s.name,
        s.avgScore,
        s.onTime,
        s.totalContracts,
        s.delayedContracts,
        s.notes || 'Chưa có'
    ]);

    let csvContent = 'data:text/csv;charset=utf-8,' + headers.join(',') + '\n' + rows.map(row => row.join(',')).join('\n');
    const encodedUri = encodeURI(csvContent);
    const link = document.createElement('a');
    link.setAttribute('href', encodedUri);
    link.setAttribute('download', 'report.csv');
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

// Hàm xuất PDF
function exportPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    doc.text('Báo Cáo và Xếp Hạng Nhà Cung Cấp', 10, 10);
    doc.text(`Ngày: ${new Date().toLocaleDateString()}`, 10, 20);

    const headers = [['Tên nhà cung cấp', 'Điểm trung bình', 'Giao hàng đúng hạn (%)', 'Số hợp đồng', 'Số hợp đồng chậm', 'Ghi chú']];
    const data = filteredData.map(s => [s.name, s.avgScore, s.onTime, s.totalContracts, s.delayedContracts, s.notes || 'Chưa có']);

    doc.autoTable({
        startY: 30,
        head: headers,
        body: data
    });

    doc.save('report.pdf');
}

// Sự kiện điều hướng phân trang
document.getElementById('prevPage').addEventListener('click', () => {
    if (currentPage > 1) {
        currentPage--;
        renderTable(filteredData, currentPage);
    }
});

document.getElementById('nextPage').addEventListener('click', () => {
    const totalPages = Math.ceil(filteredData.length / itemsPerPage);
    if (currentPage < totalPages) {
        currentPage++;
        renderTable(filteredData, currentPage);
    }
});

// Sự kiện lọc dữ liệu
document.getElementById('timeFilter').addEventListener('change', filterData);

// Khởi tạo
renderTable(filteredData, currentPage);
renderCharts(filteredData);