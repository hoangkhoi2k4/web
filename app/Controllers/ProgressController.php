<?php

require_once MODELS_PATH . 'Progress.php';
require_once MODELS_PATH . 'Contract.php';
require_once MODELS_PATH . 'Provider.php';

class ProgressController {
    public function index() {
        $progressModel = new Progress();
        $progresses = $progressModel->getAll(20);
        foreach ($progresses as &$progress) {
            $contractModel = new Contract();
            $contract = $contractModel->getById($progress['contract_id']);
            $providerModel = new Provider();
            $provider = $providerModel->getProviderById($contract['provider_id']);
            $progress['contract'] = $contract ? $contract['name'] : 'Unknown';
            $progress['provider'] = $provider ? $provider['name'] : 'Unknown';
        }
        require_once VIEWS_PATH . 'progress-evaluation.php';
    }

    public function add() {
        $progressModel = new Progress();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contract_id = $_POST['contract_id'] ?? 0;
            $progress = $_POST['progress'] ?? 0;
            $avg = $_POST['avg'] ?? 0;
            $description = $_POST['description'] ?? '';

            if ($progressModel->add($contract_id, $progress, $avg, $description)) {
                header('Location: ?page=progress');
                exit;
            } else {
                echo "Error adding progress.";
            }
        }
    }

    public function edit() {
        $progressModel = new Progress();
        $id = $_POST['id'] ?? 0;
        $progress = $_POST['progress'] ?? 0;
        $avg = $_POST['avg'] ?? 0;
        $description = $_POST['description'] ?? '';
        // Lấy lại contract_id cũ (hoặc truyền từ form nếu cần)
        $old = $progressModel->getById($id);
        $contract_id = $old ? $old['contract_id'] : 0;

        if ($progressModel->update($id, $contract_id, $progress, $avg, $description)) {
            header('Location: ?page=progress-evaluation');
            exit;
        } else {
            echo "Error updating progress.";
        }
    }

    public function note() {
        $progressModel = new Progress();
        $id = $_POST['id'] ?? 0;
        $description = $_POST['description'] ?? '';
        $old = $progressModel->getById($id);
        if ($old) {
            $progressModel->update($id, $old['contract_id'], $old['progress'], $old['avg'], $description);
        }
        header('Location: ?page=progress-evaluation');
        exit;
    }
}