// Transaction data
const transactions = [
    { id: 1, date: "15/04/2025", service: "Vệ sinh", status: "Hoàn thành", statusClass: "text-success", notes: "", document: "Tải lên", evaluation: "9/10" },
    { id: 2, date: "14/04/2025", service: "Điện", status: "Trễ 2 ngày", statusClass: "text-danger", notes: "Cần bảo trì", document: "Tải lên", evaluation: "7/10" },
    { id: 3, date: "13/04/2025", service: "Cơ khí", status: "Hoàn thành", statusClass: "text-success", notes: "", document: "Tải lên", evaluation: "8/10" },
    { id: 4, date: "12/04/2025", service: "Vệ sinh", status: "Hoàn thành", statusClass: "text-success", notes: "Tốt", document: "Tải lên", evaluation: "8/10" },
    { id: 5, date: "11/04/2025", service: "Điện", status: "Đang tiến hành", statusClass: "text-warning", notes: "", document: "Tải lên", evaluation: "6/10" },
    { id: 6, date: "10/04/2025", service: "Cơ khí", status: "Trễ 1 ngày", statusClass: "text-danger", notes: "Cần kiểm tra", document: "Tải lên", evaluation: "7/10" },
    { id: 7, date: "09/04/2025", service: "Vệ sinh", status: "Hoàn thành", statusClass: "text-success", notes: "", document: "Tải lên", evaluation: "9/10" },
    { id: 8, date: "08/04/2025", service: "Điện", status: "Hoàn thành", statusClass: "text-success", notes: "Hoàn thành sớm", document: "Tải lên", evaluation: "10/10" },
    { id: 9, date: "07/04/2025", service: "Cơ khí", status: "Đang tiến hành", statusClass: "text-warning", notes: "", document: "Tải lên", evaluation: "5/10" },
    { id: 10, date: "07/04/2025", service: "Cơ khí", status: "Đang tiến hành", statusClass: "text-warning", notes: "", document: "Tải lên", evaluation: "5/10" },
];

const itemsPerPage = 5;
let currentPage = 1;

// Function to render transactions for the current page
function renderTransactions(page) {
    const start = (page - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const paginatedTransactions = transactions.slice(start, end);

    const transactionList = document.getElementById('transaction-list');
    transactionList.innerHTML = '';

    paginatedTransactions.forEach(transaction => {

        //  <td><a href="#" class="text-primary">${transaction.document}</a></td>
        const row = `
            <tr>
                <td>${transaction.date}</td>
                <td>${transaction.service}</td>
                <td><span class="badge fs-6 p-2 ${transaction.statusClass}">${transaction.status}</span></td>
                <td>${transaction.notes}</td>
                <td>${transaction.evaluation}</td>
                <td>
                    <a href="http://127.0.0.1:5500/detail-transaction.html#" class="btn btn-sm btn-info me-1" title="Xem chi tiết">
                        <i class="fas fa-eye"></i> View
                    </a>
                    <button class="btn btn-sm btn-warning me-1" title="Sửa" data-bs-toggle="modal" data-bs-target="#editTransactionModal" onclick="populateEditModal(${transaction.id})">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-sm btn-danger" title="Xóa" data-bs-toggle="modal" data-bs-target="#deleteTransactionModal">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </td>
            </tr>
        `;
        transactionList.innerHTML += row;
    });

    renderPagination();
}

// Function to render pagination
function renderPagination() {
    const totalPages = Math.ceil(transactions.length / itemsPerPage);
    const pagination = document.getElementById('pagination');
    pagination.innerHTML = '';

    // Previous button
    pagination.innerHTML += `
        <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
            <a class="page-link" href="#" onclick="changePage(${currentPage - 1})">Trang trước</a>
        </li>
    `;

    // Page numbers
    for (let i = 1; i <= totalPages; i++) {
        pagination.innerHTML += `
            <li class="page-item ${currentPage === i ? 'active' : ''}">
                <a class="page-link" href="#" onclick="changePage(${i})">${i}</a>
            </li>
        `;
    }

    // Next button
    pagination.innerHTML += `
        <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
            <a class="page-link" href="#" onclick="changePage(${currentPage + 1})">Trang tiếp</a>
        </li>
    `;
}

// Function to change page
function changePage(page) {
    const totalPages = Math.ceil(transactions.length / itemsPerPage);
    if (page < 1 || page > totalPages) return;
    currentPage = page;
    renderTransactions(currentPage);
}

// Populate Edit Modal with transaction data
function populateEditModal(id) {
    const transaction = transactions.find(t => t.id === id);
    document.getElementById('editTransactionDate').value = `2025-04-${String(15 - (id - 1)).padStart(2, '0')}`;
    document.getElementById('editTransactionService').value = transaction.service;
    document.getElementById('editTransactionStatus').value = transaction.status.includes("Trễ") ? "Trễ" : transaction.status;
    document.getElementById('editTransactionNotes').value = transaction.notes === "-" ? "" : transaction.notes;
    document.getElementById('editTransactionEvaluation').value = parseInt(transaction.evaluation);
}

// Initial render
renderTransactions(currentPage);