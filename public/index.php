<?php
session_start();

define('ROOT_PATH', dirname(__DIR__));
define('CONTROLLERS_PATH', ROOT_PATH . '/app/Controllers/');
define('MODELS_PATH', ROOT_PATH . '/app/Models/');
define('VIEWS_PATH', ROOT_PATH . '/app/Views/');

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once ROOT_PATH . '/config/config.php';
require_once ROOT_PATH . '/app/Helpers/Function.php';

$page = $_GET['page'] ?? 'home';
if ($page !== 'home' && $page !== 'login' && empty($_SESSION['user'])) {
    header('Location: index.php?page=login');
    exit;
}

switch ($page) {
    case 'home':
        require_once CONTROLLERS_PATH . 'HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;
    case 'dashboard':
        require_once CONTROLLERS_PATH . 'AdminController.php';
        $controller = new AdminController();
        $controller->index();
        break;
    case 'supplier': 
        require_once CONTROLLERS_PATH . 'ProviderController.php';
        $controller = new ProviderController();
        $action = $_GET['action'] ?? 'index';
        switch ($action) {
            case 'add':
                $controller->add();
                break;
            case 'edit':
                $controller->edit();
                break;
            case 'delete':
                $controller->delete();
                break;
            default:
                $controller->index();
        }
        break;
    case 'contract':
        require_once CONTROLLERS_PATH . 'ContractController.php';
        $controller = new ContractController();
        $action = $_GET['action'] ?? 'index';
        switch ($action) {
            case 'add':
                $controller->add();
                break;
            case 'edit':
                $controller->edit();
                break;
            case 'delete':
                $controller->delete();
                break;
            case 'contract-search':
                $controller->searchAjax();
                break;
            default:
                $controller->index();
        }
        break;
    case 'detail-transaction':
        require_once CONTROLLERS_PATH . 'AdminController.php';
        $controller = new AdminController();
        $controller->detailTransaction();
        break;
    case 'progress-evaluation':
        require_once CONTROLLERS_PATH . 'ProgressController.php';
        $controller = new ProgressController();
        $action = $_GET['action'] ?? 'index';
        switch ($action) {
            case 'edit':
                $controller->edit();
                break;
            case 'note':
                $controller->note();
                break;
            default:
                $controller->index();
        }
        break;
    case 'report':
        require_once CONTROLLERS_PATH . 'AdminController.php';
        $controller = new AdminController();
        $controller->report();
        break;
    case 'send-notification':
        require_once CONTROLLERS_PATH . 'AdminController.php';
        $controller = new AdminController();
        $action = $_GET['action'] ?? '';
        if ($action === 'sendMail') {
            $controller->sendMail();
        } else {
            $controller->sendNotification();
        }
        break;
    case 'transaction-history':
        require_once CONTROLLERS_PATH . 'BillController.php';
        $controller = new BillController();
        $action = $_GET['action'] ?? 'index';
        switch ($action) {
            case 'add':
                $controller->add();
                break;
            case 'delete':
                $controller->delete();
                break;
            default:
                $controller->index();
        }
        break;
    case 'login':
        require_once CONTROLLERS_PATH . 'AuthController.php';
        $controller = new AuthController();
        $controller->login();
        break;
    default:
        require_once CONTROLLERS_PATH . 'HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;
}