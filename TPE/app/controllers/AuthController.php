<?php

require_once 'app/models/UserModel.php';
require_once 'app/views/AuthView.php';

class AuthController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin() {
        $this->view->renderLoginForm();
    }

    public function verifyLogin() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $this->model->getUserByEmail($email);

        if ($user && password_verify($password, $user->password)) {
            $_SESSION['USER_ID'] = $user->id_usuario;
            $_SESSION['USER_EMAIL'] = $user->email;
            $_SESSION['IS_LOGGED'] = true;
            header('Location: ' . BASE_URL . 'admin/dashboard');
        } else {
            $this->view->renderLoginForm("Usuario o contraseña incorrectos.");
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: ' . BASE_URL . 'login');
    }
}