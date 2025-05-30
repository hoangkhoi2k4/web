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
}