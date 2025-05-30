<?php 

require_once MODELS_PATH . 'Provider.php';

class ProviderController {

    public function index() {
        $providerModel = new Provider();
        $providers = $providerModel->getAll(10);
        require_once VIEWS_PATH . 'supplier.php';
    }

    public function add() {
        $providerModel = new Provider();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $taxcode = $_POST['taxcode'] ?? '';
            $description = $_POST['description'] ?? '';
            $status = $_POST['status'] ?? 'active';
            $address = $_POST['address'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $email = $_POST['email'] ?? '';

            if ($providerModel->add($name, $taxcode, $description, $status, $address, $phone, $email)) {
                header('Location: ?page=supplier');
                exit;
            } else {
                echo "Error adding supplier.";
            }
        }
    }

    public function edit() {
        $providerModel = new Provider();
        $id = $_POST['id'] ?? 0;
        $name = $_POST['name'] ?? '';
        $taxcode = $_POST['taxcode'] ?? '';
        $description = $_POST['description'] ?? '';
        $status = $_POST['status'] ?? 'active';
        $address = $_POST['address'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $email = $_POST['email'] ?? '';

        if ($providerModel->update($id, $name, $taxcode, $description, $status, $address, $phone, $email)) {
            header('Location: ?page=supplier');
            exit;
        } else {
            echo "Error updating supplier.";
        }
    }

    public function delete() {
        $providerModel = new Provider();
        $id = $_POST['id'] ?? 0; 
        if ($providerModel->delete($id)) {
            header('Location: ?page=supplier');
            exit;
        } else {
            echo "Error deleting supplier.";
        }
    }
}