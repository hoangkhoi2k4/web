// Simulated supplier data
const suppliers = [
  { name: "Mark", service: "Vệ sinh", contract: "3", status: "Active", email: "mark@example.com" },
  { name: "Jacob", service: "Điện", contract: "1", status: "Inactive", email: "jacob@example.com" },
  { name: "Larry", service: "Bảo trì", contract: "5", status: "Active", email: "larry@example.com" },
  { name: "David", service: "Vệ sinh", contract: "2", status: "Active", email: "david@example.com" },
  { name: "Sarah", service: "Điện", contract: "4", status: "Inactive", email: "sarah@example.com" },
  { name: "John", service: "Bảo trì", contract: "1", status: "Active", email: "john@example.com" },
  { name: "Alice", service: "Vệ sinh", contract: "3", status: "Inactive", email: "alice@example.com" },
  { name: "Bob", service: "Điện", contract: "2", status: "Active", email: "bob@example.com" },
  { name: "Emily", service: "Bảo trì", contract: "6", status: "Inactive", email: "emily@example.com" },
  { name: "Michael", service: "Vệ sinh", contract: "3", status: "Active", email: "michael@example.com" },
  { name: "Lisa", service: "Điện", contract: "2", status: "Inactive", email: "lisa@example.com" },
  { name: "James", service: "Bảo trì", contract: "4", status: "Active", email: "james@example.com" },
  { name: "Robert", service: "Vệ sinh", contract: "5", status: "Inactive", email: "robert@example.com" },
  { name: "David", service: "Điện", contract: "1", status: "Active", email: "david@example.com" },
  { name: "Nancy", service: "Bảo trì", contract: "2", status: "Inactive", email: "nancy@example.com" },
  { name: "George", service: "Vệ sinh", contract: "3", status: "Active", email: "george@example.com" },
  { name: "William", service: "Điện", contract: "4", status: "Inactive", email: "william@example.com" },
  { name: "Olivia", service: "Bảo trì", contract: "5", status: "Active", email: "olivia@example.com" },
  { name: "Sophia", service: "Vệ sinh", contract: "2", status: "Inactive", email: "sophia@example.com" }
];

const itemsPerPage = 5;
let currentPage = 1;
const totalPages = Math.ceil(suppliers.length / itemsPerPage);

function renderTable(page) {

  const startIndex = (page - 1) * itemsPerPage;
  const endIndex = startIndex + itemsPerPage;

  const currentSuppliers = suppliers.slice(startIndex, endIndex);

  const tableBody = document.getElementById("supplier-list");
  tableBody.innerHTML = "";

  currentSuppliers.forEach((supplier, index) => {
      const globalIndex = startIndex + index;

      const row = document.createElement("tr");

      row.innerHTML = `
          <td scope="row">${supplier.name}</th>
          <td>${supplier.service}</td>
          <td>${supplier.contract}</td>
          <td><span  class="badge btn fs-6 ${supplier.status === 'Active' ? 'text-primary px-3' : 'text-danger '}">${supplier.status}</span></td>
          <td>${supplier.email}</td>
          <td>
              <button class="btn btn-info btn-sm me-1" onclick="viewSupplier(${globalIndex})" data-bs-toggle="modal" data-bs-target="#viewSupplierModal"><i class="bi bi-eye"></i> Xem</button>
              <button class="btn btn-warning btn-sm me-1" onclick="editSupplier(${globalIndex})" data-bs-toggle="modal" data-bs-target="#updateSupplierModal"><i class="bi bi-pencil"></i> Sửa</button>
              <button class="btn btn-danger btn-sm" onclick="deleteSupplier(${globalIndex})" data-bs-toggle="modal" data-bs-target="#deleteSupplierModal"><i class="bi bi-trash"></i> Xóa</button>
          </td>
      `;
      tableBody.appendChild(row);
  });
}

function updatePagination(page) {
  if (page > 0 && page <= totalPages) {

      const button_paginate = document.querySelectorAll("#paginate-supplier .pagination .page-item");

      button_paginate.forEach(item => item.classList.remove("active"));

      button_paginate[page].classList.add("active"); 
      currentPage = page;
      renderTable(page);

    
      button_paginate[0].classList.toggle("disabled", page === 1); // Previous
      button_paginate[button_paginate.length - 1].classList.toggle("disabled", page === totalPages); // Next
  }
}

function goToPage(page) {
  if (page >= 1 && page <= totalPages) {
      updatePagination(page);
  }
}

const button_paginate = document.querySelectorAll("#paginate-supplier .pagination .page-item");
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




function viewSupplier(index) {
  const supplier = suppliers[index];
  const modalBody = document.getElementById("viewSupplierModalBody");
  modalBody.innerHTML = `
      <p><strong>Tên:</strong> ${supplier.name}</p>
      <p><strong>Loại dịch vụ:</strong> ${supplier.service}</p>
      <p><strong>Hợp đồng:</strong> ${supplier.contract}</p>
      <p><strong>Trạng thái:</strong> ${supplier.status}</p>
      <p><strong>Email:</strong> ${supplier.email}</p>
  `;
}

let currentEditIndex = -1;
function editSupplier(index) {
  currentEditIndex = index;
  const supplier = suppliers[index];
  document.getElementById("updateName").value = supplier.name;
  document.getElementById("updateService").value = supplier.service;
  document.getElementById("updateContract").value = supplier.contract;
  document.getElementById("updateStatus").value = supplier.status;
  document.getElementById("updateEmail").value = supplier.email;
}

document.getElementById("saveUpdate").addEventListener("click", () => {
  if (currentEditIndex !== -1) {
      suppliers[currentEditIndex] = {
          name: document.getElementById("updateName").value,
          service: document.getElementById("updateService").value,
          contract: document.getElementById("updateContract").value,
          status: document.getElementById("updateStatus").value,
          email: document.getElementById("updateEmail").value
      };
      renderTable(currentPage);
      const updateModal = bootstrap.Modal.getInstance(document.getElementById("updateSupplierModal"));
      updateModal.hide();
  }
});

let currentDeleteIndex = -1;
function deleteSupplier(index) {
  currentDeleteIndex = index;
  const supplier = suppliers[index];
  const modalBody = document.getElementById("deleteSupplierModalBody");
  modalBody.innerHTML = `Bạn có chắc muốn xóa nhà cung cấp ${supplier.name}?`;
}

document.getElementById("confirmDelete").addEventListener("click", () => {
  if (currentDeleteIndex !== -1) {
      suppliers.splice(currentDeleteIndex, 1);
      const newTotalPages = Math.ceil(suppliers.length / itemsPerPage);
      if (currentPage > newTotalPages && currentPage > 1) {
          currentPage--;
      }
      renderTable(currentPage);
      updatePagination(currentPage);
      const deleteModal = bootstrap.Modal.getInstance(document.getElementById("deleteSupplierModal"));
      deleteModal.hide();
  }
});

renderTable(1);
updatePagination(1);