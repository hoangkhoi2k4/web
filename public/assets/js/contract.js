const contracts = [
    { supplierName: "Mark", contractName: "HD001", service: "Vệ sinh", startDate: "01/01/2025", endDate: "20/04/2025" },
    { supplierName: "Jacob", contractName: "HD002", service: "Điện", startDate: "15/02/2025", endDate: "30/06/2025" },
    { supplierName: "Larry", contractName: "HD003", service: "Bảo trì", startDate: "10/03/2025", endDate: "01/04/2025" },
    { supplierName: "David", contractName: "HD004", service: "Vệ sinh", startDate: "05/02/2025", endDate: "15/05/2025" },
    { supplierName: "Sarah", contractName: "HD005", service: "Điện", startDate: "20/01/2025", endDate: "10/07/2025" },
    { supplierName: "John", contractName: "HD006", service: "Bảo trì", startDate: "01/03/2025", endDate: "25/06/2025" },
    { supplierName: "Alice", contractName: "HD007", service: "Vệ sinh", startDate: "12/02/2025", endDate: "30/04/2025" },
    { supplierName: "Bob", contractName: "HD008", service: "Điện", startDate: "18/01/2025", endDate: "15/08/2025" },
    { supplierName: "Emily", contractName: "HD009", service: "Bảo trì", startDate: "25/03/2025", endDate: "10/05/2025" },
    { supplierName: "Michael", contractName: "HD010", service: "Vệ sinh", startDate: "03/02/2025", endDate: "20/07/2025" },
    { supplierName: "Lisa", contractName: "HD011", service: "Điện", startDate: "08/03/2025", endDate: "30/06/2025" },
    { supplierName: "James", contractName: "HD012", service: "Bảo trì", startDate: "15/01/2025", endDate: "25/05/2025" },
    { supplierName: "Robert", contractName: "HD013", service: "Vệ sinh", startDate: "20/02/2025", endDate: "10/06/2025" },
    { supplierName: "David", contractName: "HD014", service: "Điện", startDate: "05/03/2025", endDate: "15/07/2025" },
    { supplierName: "Nancy", contractName: "HD015", service: "Bảo trì", startDate: "10/02/2025", endDate: "20/05/2025" },
    { supplierName: "George", contractName: "HD016", service: "Vệ sinh", startDate: "01/03/2025", endDate: "30/06/2025" },
    { supplierName: "William", contractName: "HD017", service: "Điện", startDate: "12/01/2025", endDate: "25/07/2025" },
    { supplierName: "Olivia", contractName: "HD018", service: "Bảo trì", startDate: "18/02/2025", endDate: "10/06/2025" },
    { supplierName: "Sophia", contractName: "HD019", service: "Vệ sinh", startDate: "25/03/2025", endDate: "15/05/2025" }
];

const itemsPerPage = 5;
let currentPage = 1;
const totalPages = Math.ceil(contracts.length / itemsPerPage);

function renderTable(page) {
    const startIndex = (page - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    const currentContracts = contracts.slice(startIndex, endIndex);

    const tableBody = document.getElementById("contract-list");
    tableBody.innerHTML = "";

    const today = new Date('2025-04-15'); // Current date as per context

    currentContracts.forEach((contract, index) => {
        const globalIndex = startIndex + index;
        const [endDay, endMonth, endYear] = contract.endDate.split('/').map(Number);
        const endDate = new Date(endYear, endMonth - 1, endDay);
        const timeDiff = endDate - today;
        const daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
        let dueSoonClass = '';
        let dueSoon = '';
        if(daysDiff < 14 && daysDiff >= 0){
            dueSoon = "Sắp đến hạn"
            dueSoonClass = "text-secondary fw-bold"
        }else if(daysDiff >= 14 && daysDiff <= 30) {
            dueSoon = "Chưa đến hạn"
            dueSoonClass = "text-primary fw-bold"
        }else if(daysDiff > 30){
            dueSoon = "Còn dài hạn"
            dueSoonClass = "text-success fw-bold"
        }else{
            dueSoon = "Hết hạn";
             dueSoonClass = "text-danger fw-bold"
        }

        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${contract.supplierName}</td>
            <td>${contract.contractName}</td>
            <td>${contract.service}</td>
            <td>${contract.startDate}</td>
            <td>${contract.endDate}</td>
            <td class="${dueSoonClass}">${dueSoon}</td>
            <td>
                <button class="btn btn-info btn-sm me-1" onclick="viewContract(${globalIndex})" data-bs-toggle="modal" data-bs-target="#viewContractModal"><i class="bi bi-eye"></i> Detail</button>
                <button class="btn btn-warning btn-sm me-1" onclick="editContract(${globalIndex})" data-bs-toggle="modal" data-bs-target="#updateContractModal"><i class="bi bi-pencil"></i> Update</button>
                <button class="btn btn-danger btn-sm" onclick="deleteContract(${globalIndex})" data-bs-toggle="modal" data-bs-target="#deleteContractModal"><i class="bi bi-trash"></i> Delete</button>
            </td>
        `;
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


function viewContract(index) {
    const contract = contracts[index];
    const modalBody = document.getElementById("viewContractModalBody");
    modalBody.innerHTML = `
        <p><strong>Tên nhà cung cấp:</strong> ${contract.supplierName}</p>
        <p><strong>Tên hợp đồng:</strong> ${contract.contractName}</p>
        <p><strong>Loại dịch vụ:</strong> ${contract.service}</p>
        <p><strong>Ngày bắt đầu:</strong> ${contract.startDate}</p>
        <p><strong>Ngày kết thúc:</strong> ${contract.endDate}</p>
    `;
}


let currentEditIndex = -1;
function editContract(index) {
    currentEditIndex = index;
    const contract = contracts[index];
    document.getElementById("updateSupplierName").value = contract.supplierName;
    document.getElementById("updateContractName").value = contract.contractName;
    document.getElementById("updateService").value = contract.service;
    document.getElementById("updateStartDate").value = contract.startDate.split('/').reverse().join('-'); // Convert DD/MM/YYYY to YYYY-MM-DD for input
    document.getElementById("updateEndDate").value = contract.endDate.split('/').reverse().join('-');
}

document.getElementById("saveUpdate").addEventListener("click", () => {
    if (currentEditIndex !== -1) {
        const updatedStartDate = new Date(document.getElementById("updateStartDate").value);
        const updatedEndDate = new Date(document.getElementById("updateEndDate").value);
        contracts[currentEditIndex] = {
            supplierName: document.getElementById("updateSupplierName").value,
            contractName: document.getElementById("updateContractName").value,
            service: document.getElementById("updateService").value,
            startDate: updatedStartDate.toLocaleDateString('en-GB'), // Convert back to DD/MM/YYYY
            endDate: updatedEndDate.toLocaleDateString('en-GB')
        };
        renderTable(currentPage);
        const updateModal = bootstrap.Modal.getInstance(document.getElementById("updateContractModal"));
        updateModal.hide();
    }
});

let currentDeleteIndex = -1;
function deleteContract(index) {
    currentDeleteIndex = index;
    const contract = contracts[index];
    const modalBody = document.getElementById("deleteContractModalBody");
    modalBody.innerHTML = `Bạn có chắc muốn xóa hợp đồng ${contract.contractName} của nhà cung cấp ${contract.supplierName}?`;
}

document.getElementById("confirmDelete").addEventListener("click", () => {
    if (currentDeleteIndex !== -1) {
        contracts.splice(currentDeleteIndex, 1);
        const newTotalPages = Math.ceil(contracts.length / itemsPerPage);
        if (currentPage > newTotalPages && currentPage > 1) {
            currentPage--;
        }
        renderTable(currentPage);
        updatePagination(currentPage);
        const deleteModal = bootstrap.Modal.getInstance(document.getElementById("deleteContractModal"));
        deleteModal.hide();
    }
});

// Initial render
renderTable(1);
updatePagination(1);


// sort cac kieu : 