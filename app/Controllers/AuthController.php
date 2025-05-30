<?php

require_once MODELS_PATH . 'User.php';

class AuthController {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new User();
            $user = $userModel->getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $email;
                header('Location: index.php?page=dashboard');
                exit;
            } else {
                $error = 'Invalid email or password';
                require_once VIEWS_PATH . 'login.php';
            }
        } else {
            require_once VIEWS_PATH . 'login.php';
        }
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?page=login');
        exit;
    }
}