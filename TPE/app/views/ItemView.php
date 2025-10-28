<?php

class ItemView {


    public function renderAllPizzas($pizzas) {
        echo "<h1>Nuestro Menú - Es Tu Pizza</h1>";
        require 'templates/pizza-list.php';
    }

    public function renderPizzaDetail($pizza) {
        echo "<h1>Detalle de: " . $pizza->nombre . "</h1>";
        require 'templates/pizza-detail.php';
    }


    public function renderAdminDashboard($pizzas) {
        require 'templates/admin-dashboard.php';
    }

    public function renderAddPizzaForm($categories) {
        echo "<h2>Agregar Nueva Pizza</h2>";
        require 'templates/add-pizza-form.php';
    }


    public function renderEditPizzaForm($pizza, $categories) {
        echo "<h2>Editar Pizza: " . $pizza->nombre . "</h2>";
        require 'templates/edit-pizza-form.php';
    }
}

?>
