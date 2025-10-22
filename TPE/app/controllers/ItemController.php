<?php

require_once 'app/models/ItemModel.php';
require_once 'app/views/ItemView.php';
require_once 'helpers/AuthHelper.php';

class ItemController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new ItemModel();
        $this->view = new ItemView();
    }

    public function showAllPizzas() {
        $pizzas = $this->model->getAllPizzas();
        $this->view->renderAllPizzas($pizzas);
    }

    public function showPizzaDetail($id) {
        $pizza = $this->model->getPizzaById($id);
        if ($pizza) {
            $this->view->renderPizzaDetail($pizza);
        } else {
            echo "<h1>Error: Pizza no encontrada</h1>";
            echo '<a href="' . BASE_URL . 'pizzas">← Volver al Menú</a>';
        }
    }

    public function showAdminDashboard() {
        $pizzas = $this->model->getAllPizzas();
        $this->view->renderAdminDashboard($pizzas);
    }

    public function showAddPizzaForm() {
        $categories = $this->model->getAllCategories();
        $this->view->renderAddPizzaForm($categories);
    }

    public function addNewPizza() {
        $nombre = $_POST['nombre'];
        $ingredientes = $_POST['ingredientes'];
        $precio = $_POST['precio'];
        $id_categoria = $_POST['id_categoria'];
        $this->model->insertPizza($nombre, $ingredientes, $precio, $id_categoria);
        header('Location: ' . BASE_URL . 'admin/dashboard');
    }

    public function deletePizza($id) {
        $this->model->deletePizzaById($id);
        header('Location: ' . BASE_URL . 'admin/dashboard');
    }

    public function showEditPizzaForm($id) {
        $pizza = $this->model->getPizzaById($id);
        if ($pizza) {
            $categories = $this->model->getAllCategories();
            $this->view->renderEditPizzaForm($pizza, $categories);
        } else {
            echo "<h1>Error: Pizza no encontrada para editar</h1>";
            echo '<a href="' . BASE_URL . 'admin/dashboard">← Volver al Panel</a>';
        }
    }
    
    public function processEditPizza($id) {
        $nombre = $_POST['nombre'];
        $ingredientes = $_POST['ingredientes'];
        $precio = $_POST['precio'];
        $id_categoria = $_POST['id_categoria'];
        $this->model->updatePizza($id, $nombre, $ingredientes, $precio, $id_categoria);
        header('Location: ' . BASE_URL . 'admin/dashboard');
    }
}