<?php

class AuthHelper {

    /**
     * Verifica que el usuario esté logueado.
     * Si no está logueado, lo redirige al login.
     */
    public static function checkLoggedIn() {
        // session_start() se ejecuta en el index.php,
        // así que podemos usar $_SESSION directamente.
        
        if (!isset($_SESSION['IS_LOGGED'])) {
            // ¡No está logueado! Lo mandamos al login
            header('Location: ' . BASE_URL . 'login');
            die(); // Detenemos la ejecución
        }
    }
}