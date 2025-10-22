<?php
class CategoryModel {

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

    public function getAllCategories() {
        $query = $this->db->prepare("SELECT * FROM categorias");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCategoryById($id) {
        $query = $this->db->prepare("SELECT * FROM categorias WHERE id_categoria = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insertCategory($nombre) {
        $query = $this->db->prepare("INSERT INTO categorias (nombre) VALUES (?)");
        $query->execute([$nombre]);
    }

    public function deleteCategoryById($id) {
        $query = $this->db->prepare("DELETE FROM categorias WHERE id_categoria = ?");
        $query->execute([$id]);
    }

    public function updateCategory($id, $nombre) {
        $query = $this->db->prepare("UPDATE categorias SET nombre = ? WHERE id_categoria = ?");
        $query->execute([$nombre, $id]);
    }
}