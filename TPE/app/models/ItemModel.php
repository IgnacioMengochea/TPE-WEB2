<?php

class ItemModel {

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

    public function getAllPizzas() {
        $query = $this->db->prepare("
            SELECT items.*, categorias.nombre AS nombre_categoria
            FROM items
            JOIN categorias ON items.id_categoria_fk = categorias.id_categoria
        ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getPizzaById($id) {
        $query = $this->db->prepare("
            SELECT items.*, categorias.nombre AS nombre_categoria
            FROM items
            JOIN categorias ON items.id_categoria_fk = categorias.id_categoria
            WHERE items.id_item = ?
        ");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getAllCategories() {
        $query = $this->db->prepare("SELECT * FROM categorias");
        $query->execute();
        $categories = $query->fetchAll(PDO::FETCH_OBJ);
        return $categories;
    }

    public function insertPizza($nombre, $ingredientes, $precio, $id_categoria) {
        $query = $this->db->prepare("
            INSERT INTO items (nombre, ingredientes, precio, id_categoria_fk)
            VALUES (?, ?, ?, ?)
        ");
        $query->execute([$nombre, $ingredientes, $precio, $id_categoria]);
    }

    public function deletePizzaById($id) {
        $query = $this->db->prepare("DELETE FROM items WHERE id_item = ?");
        $query->execute([$id]);
    }

    public function updatePizza($id, $nombre, $ingredientes, $precio, $id_categoria) {

        $query = $this->db->prepare("
            UPDATE items
            SET nombre = ?, ingredientes = ?, precio = ?, id_categoria_fk = ?
            WHERE id_item = ?
        ");
        $query->execute([$nombre, $ingredientes, $precio, $id_categoria, $id]);
    }
}