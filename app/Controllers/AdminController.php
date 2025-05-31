<?php 

require_once MODELS_PATH . 'Provider.php'; 
// require_once MODELS_PATH . 'Transaction.php';
require_once MODELS_PATH . 'Contract.php';
require_once ROOT_PATH . '/app/Core/Mailer.php';

class AdminController {

    public function index() {
        $providerModel = new Provider();
        $contractModel = new Contract();
        $providers = $providerModel->getAll();
        $expiredContracts = $contractModel->countExpiringInOneMonth();
        foreach ($providers as &$provider) {
            $provider['total_contracts'] = $contractModel->countByProvider($provider['id']);
        }
        unset($provider);
        require_once VIEWS_PATH . 'dashboard.php';
    }

    public function detailTransaction() {
        require_once VIEWS_PATH . 'detail-transaction.php';
    }

    public function report() {
        $contractModel = new Contract();
        $topProviders = $contractModel->getTopProvidersByAvg(3);
        foreach ($topProviders as &$topProvider) {
            $topProvider['expired_contracts'] = $contractModel->countByProvider($topProvider['provider_id']);
        }
        unset($topProvider);
        require_once VIEWS_PATH . 'report.php';
    }

    public function sendNotification() {
        $supplierModel = new Provider();
        $suppliers = $supplierModel->getAll();
        require_once VIEWS_PATH . 'send-notification.php';
    }

    public function sendMail(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $to = $_POST['to'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            $mailer = new Mailer();
            if ($mailer->send($to, $subject, $message)) {
                echo "<script>alert('Gửi email thành công!');window.location='index.php?page=send-notification';</script>";
            } else {
                echo "<script>alert('Gửi email thất bại!');window.location='index.php?page=send-notification';</script>";
            }
        }
    }

    public function transactionHistory() {
        require_once VIEWS_PATH . 'transaction-history.php';
    }
}