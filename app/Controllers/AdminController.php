<?php 

require_once MODELS_PATH . 'Provider.php'; 
// require_once MODELS_PATH . 'Transaction.php';
require_once MODELS_PATH . 'Contract.php';

class AdminController {

    public function index() {
        $providerModel = new Provider();
        $contractModel = new Contract();
        $providers = $providerModel->getAll();
        $expiredContracts = $contractModel->countExpiringInOneMonth();
        foreach ($providers as &$provider) {
            $provider['total_contracts'] = $contractModel->countByProvider($provider['id']);
        }
        require_once VIEWS_PATH . 'dashboard.php';
    }

    public function detailTransaction() {
        require_once VIEWS_PATH . 'detail-transaction.php';
    }

    public function report() {
        $contractModel = new Contract();
        $topProviders = $contractModel->getTopProvidersByAvg(3);
        foreach ($topProviders as &$provider) {
            $provider['expired_contracts'] = $contractModel->countByProvider($provider['provider_id']);
        }
        unset($provider);
        require_once VIEWS_PATH . 'report.php';
    }

    public function sendNotification() {
        require_once VIEWS_PATH . 'send-notification.php';
    }

    public function transactionHistory() {
        require_once VIEWS_PATH . 'transaction-history.php';
    }
}