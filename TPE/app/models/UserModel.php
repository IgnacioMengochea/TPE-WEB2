<?php
class UserModel {

    private $db;

    public function __construct() {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
        try {
            $this->db = new PDO($dsn, DB_USER, DB_PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Error de Conexión: ' . $e->getMessage());
        }
    }

    public function getUserByEmail($email) {
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $query->execute([$email]); 
        return $query->fetch(PDO::FETCH_OBJ); 
    }
}