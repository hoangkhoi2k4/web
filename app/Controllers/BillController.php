<?php

require_once MODELS_PATH . 'Bill.php';
require_once MODELS_PATH . 'Contract.php';

class BillController {
    public function index() {
        $billModel = new Bill();
        $bills = $billModel->getAll();
        $contractModel = new Contract();
        $contracts = $contractModel->getAll();
        require_once VIEWS_PATH . 'transaction-history.php';
    }

    public function add() {
        $billModel = new Bill();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contract_id = $_POST['contract_id'] ?? 0;
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $quantity = $_POST['quantity'] ?? 1;
            $amount = $_POST['amount'] ?? 0.0;
            $paid_date = $_POST['paid_date'] ?? '';
            $vat = $_POST['vat'] ?? '';

            if ($billModel->add($contract_id, $name, $description, $quantity, $amount, $paid_date, $vat)) {
                header('Location: ?page=transaction-history');
                exit;
            } else {
                echo "Error adding bill.";
            }
        }
    }

    public function delete() {
        $billModel = new Bill();
        $id = $_POST['id'] ?? 0;

        if ($billModel->delete($id)) {
            header('Location: ?page=transaction-history');
            exit;
        } else {
            echo "Error deleting bill.";
        }
    }
}