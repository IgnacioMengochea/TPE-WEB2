<?php

class AuthHelper {

    public static function checkLoggedIn() {

        if (!isset($_SESSION['IS_LOGGED'])) {
            header('Location: ' . BASE_URL . 'login');
            die(); 
        }
    }

}
