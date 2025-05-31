<?php 

require_once MODELS_PATH . 'Contract.php';

class ContractController {
    public function index() {
        $contractModel = new Contract();
        $contracts = $contractModel->getAll(10);
        require_once VIEWS_PATH . 'contract.php';
    }

    public function add() {
        $contractModel = new Contract();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $provider_id = $_POST['provider_id'] ?? 0;
            $service_id = $_POST['service_id'] ?? 0;
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? 0;
            $unit = $_POST['unit'] ?? '';
            $signed_date = $_POST['signed_date'] ?? '';
            $expire_date = $_POST['expire_date'] ?? '';
            $name_supplier = $_POST['name_supplier'] ?? '';
            $phone_supplier = $_POST['phone_supplier'] ?? '';

            if ($contractModel->add($provider_id, $service_id, $name, $price, $unit, $signed_date, $expire_date, $name_supplier, $phone_supplier)) {
                header('Location: ?page=contract');
                exit;
            } else {
                echo "Error adding contract.";
            }
        }
    }

    public function edit() {
        $contractModel = new Contract();
        $id = $_POST['id'] ?? 0;
        $provider_id = $_POST['provider_id'] ?? 0;
        $service_id = $_POST['service_id'] ?? 0;
        $name = $_POST['name'] ?? '';
        $price = $_POST['price'] ?? 0;
        $unit = $_POST['unit'] ?? '';
        $signed_date = $_POST['signed_date'] ?? '';
        $expire_date = $_POST['expire_date'] ?? '';
        $name_supplier = $_POST['name_supplier'] ?? '';
        $phone_supplier = $_POST['phone_supplier'] ?? '';

        if ($contractModel->update($id, $provider_id, $service_id, $name, $price, $unit, $signed_date, $expire_date, $name_supplier, $phone_supplier)) {
            header('Location: ?page=contract');
            exit;
        } else {
            echo "Error updating contract.";
        }
    }

    public function delete() {
        $contractModel = new Contract();
        $id = $_POST['id'] ?? 0;
        if ($contractModel->delete($id)) {
            header('Location: ?page=contract');
            exit;
        } else {
            echo "Error deleting contract.";
        }
    }

    public function searchAjax() {
        $keyword = $_POST['q'] ?? '';
        $contractModel = new Contract();
        $contracts = $contractModel->searchByName($keyword);

        // Trả về HTML cho tbody
        if (!empty($contracts)) {
            foreach ($contracts as $contract) {
                echo '<tr>
                    <td>' . htmlspecialchars($contract['name_supplier']) . '</td>
                    <td>' . htmlspecialchars($contract['name']) . '</td>
                    <td>' . htmlspecialchars($contract['service_id']) . '</td>
                    <td>' . htmlspecialchars($contract['signed_date']) . '</td>
                    <td>' . htmlspecialchars($contract['expire_date']) . '</td>
                    <td><span class="badge bg-success">Đang hoạt động</span></td>
                    <td>
                        <button class="btn btn-info btn-sm view-btn"
                            data-bs-toggle="modal"
                            data-bs-target="#viewContractModal"
                            data-id="' . $contract['id'] . '"
                            data-name="' . htmlspecialchars($contract['name']) . '"
                            data-provider="' . $contract['provider_id'] . '"
                            data-service="' . $contract['service_id'] . '"
                            data-supplier="' . htmlspecialchars($contract['name_supplier']) . '"
                            data-phone="' . htmlspecialchars($contract['phone_supplier']) . '"
                            data-price="' . $contract['price'] . '"
                            data-unit="' . htmlspecialchars($contract['unit']) . '"
                            data-signed="' . $contract['signed_date'] . '"
                            data-expire="' . $contract['expire_date'] . '"
                        >Xem</button>
                        <button class="btn btn-warning btn-sm edit-btn"
                            data-bs-toggle="modal"
                            data-bs-target="#updateContractModal"
                            data-id="' . $contract['id'] . '"
                            data-name="' . htmlspecialchars($contract['name']) . '"
                            data-provider="' . $contract['provider_id'] . '"
                            data-service="' . $contract['service_id'] . '"
                            data-supplier="' . htmlspecialchars($contract['name_supplier']) . '"
                            data-phone="' . htmlspecialchars($contract['phone_supplier']) . '"
                            data-price="' . $contract['price'] . '"
                            data-unit="' . htmlspecialchars($contract['unit']) . '"
                            data-signed="' . $contract['signed_date'] . '"
                            data-expire="' . $contract['expire_date'] . '"
                        >Sửa</button>
                        <button class="btn btn-danger btn-sm delete-btn"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteContractModal"
                            data-id="' . $contract['id'] . '"
                            data-name="' . htmlspecialchars($contract['name']) . '"
                        >Xóa</button>
                    </td>
                </tr>';
            }
        } else {
            echo '<tr><td colspan="7" class="text-center">Không có hợp đồng nào.</td></tr>';
        }
        exit;
    }
}