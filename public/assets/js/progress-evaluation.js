let evaluations = [
    { stt: '1', contract: 'Hợp đồng vệ sinh A', supplier: 'Công ty X', onTime: 95, avgScore: 8.5, notes: '' },
    { stt: '2', contract: 'Hợp đồng điện B', supplier: 'Công ty Y', onTime: 90, avgScore: 8.0, notes: 'Cần cải thiện giao hàng' },
    { stt: '3', contract: 'Hợp đồng bảo trì C', supplier: 'Công ty Z', onTime: 85, avgScore: 7.5, notes: '' },
    { stt: '4', contract: 'Hợp đồng vệ sinh D', supplier: 'Công ty X', onTime: 92, avgScore: 8.2, notes: 'Tốt' },
    { stt: '5', contract: 'Hợp đồng điện E', supplier: 'Công ty Y', onTime: 88, avgScore: 7.8, notes: '' },
    { stt: '6', contract: 'Hợp đồng bảo trì F', supplier: 'Công ty Z', onTime: 80, avgScore: 7.0, notes: 'Trễ tiến độ' },
    { stt: '7', contract: 'Hợp đồng vệ sinh G', supplier: 'Công ty X', onTime: 97, avgScore: 9.0, notes: 'Xuất sắc' },
    { stt: '8', contract: 'Hợp đồng điện H', supplier: 'Công ty Y', onTime: 91, avgScore: 8.3, notes: '' },
    { stt: '9', contract: 'Hợp đồng bảo trì I', supplier: 'Công ty Z', onTime: 87, avgScore: 7.6, notes: 'Cần kiểm tra lại' },
    { stt: '10', contract: 'Hợp đồng vệ sinh J', supplier: 'Công ty X', onTime: 94, avgScore: 8.7, notes: '' }
];

const itemsPerPage = 5;
let currentPage = 1;
const totalPages = Math.ceil(evaluations.length / itemsPerPage);

let editIndex = null;
let noteIndex = null;

// Hàm hiển thị bảng
function renderTable(page) {
    const startIndex = (page - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    const currentEvaluations = evaluations.slice(startIndex, endIndex);

    const tableBody = document.getElementById('tableBody');
    tableBody.innerHTML = '';

    currentEvaluations.forEach((eval, index) => {
        const row = document.createElement('tr');

        if (editIndex === index) {
            row.innerHTML = `
              <td data-label="STT">${eval.stt}</td>
            <td data-label="Tên hợp đồng"><input type="text" id="editContract" value="${eval.contract}"></td>
            <td data-label="Tên nhà cung cấp"><input type="text" id="editSupplier" value="${eval.supplier}"></td>
            <td data-label="Giao hàng đúng hạn (%)"><input type="number" id="editOnTime" value="${eval.onTime}"></td>
            <td data-label="Điểm trung bình"><input type="number" step="0.1" id="editAvgScore" value="${eval.avgScore}"></td>
            <td data-label="Ghi chú"><input type="text" id="editNotes" value="${eval.notes}"></td>
            <td data-label="Hành động" class = "row">
                <button class="save-btn col-md-5" onclick="saveEdit(${index},${page})">Lưu</button>
                <button class="note-btn col-md-6" onclick="openNoteModal(${index})">Thêm</button>
            </td>
            `;
        } else {
            row.innerHTML = `
                <td data-label="STT">${eval.stt}</td>
                <td data-label="Tên hợp đồng">${eval.contract}</td>
                <td data-label="Tên nhà cung cấp">${eval.supplier}</td>
                <td data-label="Giao hàng đúng hạn (%)">${eval.onTime}</td>
                <td data-label="Điểm trung bình">${eval.avgScore}</td>
                <td data-label="Ghi chú">${eval.notes || 'Chưa có ghi chú'}</td>
                <td data-label="Hành động">
                    <button class="edit-btn col-md-4 fs-7 pe-4" onclick="editRow(${index},${page})">Sửa</button>
                    <button class="note-btn col-md-6 fs=7" onclick="openNoteModal(${index})">Thêm</button>
                </td>
            `;
        }

        tableBody.appendChild(row);
    });
}


function updatePagination(page) {
    if (page > 0 && page <= totalPages) {
        const button_paginate = document.querySelectorAll("#paginate-contract .pagination .page-item");
        button_paginate.forEach(item => item.classList.remove("active"));
        button_paginate[page].classList.add("active"); 
        currentPage = page;
        renderTable(page);

        button_paginate[0].classList.toggle("disabled", page === 1); 
        button_paginate[button_paginate.length - 1].classList.toggle("disabled", page === totalPages); 
    }
}

function goToPage(page) {
    if (page >= 1 && page <= totalPages) {
        updatePagination(page);
    }
}


const button_paginate = document.querySelectorAll("#paginate-contract .pagination .page-item");
button_paginate.forEach((button, index) => {
    button.addEventListener("click", () => {
        const value = button.querySelector("a").innerHTML;
        if (value === "Trước") {
            goToPage(currentPage - 1);
        } else if (value === "Sau") {
            goToPage(currentPage + 1);
        } else {
            goToPage(parseInt(value));
        }
    });
});

// Hàm chỉnh sửa dòng
function editRow(index,page) {
    editIndex = index;
    renderTable(page);
}

// Hàm lưu chỉnh sửa
function saveEdit(index,page) {
    const onTime = document.getElementById('editOnTime').value;
    const avgScore = document.getElementById('editAvgScore').value;
    const notes = document.getElementById('editNotes').value;

    evaluations[index] = {
        ...evaluations[index],
        onTime: parseFloat(onTime),
        avgScore: parseFloat(avgScore),
        notes: notes
    };

    editIndex = null;
    renderTable(page);
}

// Hàm mở modal thêm ghi chú
function openNoteModal(index) {
    noteIndex = index;
    document.getElementById('noteModal').style.display = 'flex';
    document.getElementById('noteInput').value = evaluations[index].notes || '';
}

// Hàm đóng modal
function closeModal() {
    document.getElementById('noteModal').style.display = 'none';
    document.getElementById('noteInput').value = '';
    noteIndex = null;
}

// Hàm lưu ghi chú từ modal
function saveNote() {
    if (noteIndex !== null) {
        const note = document.getElementById('noteInput').value;
        evaluations[noteIndex].notes = note;
        renderTable();
        closeModal();
    }
}

// Khởi tạo bảng
renderTable(1);
updatePagination(1);