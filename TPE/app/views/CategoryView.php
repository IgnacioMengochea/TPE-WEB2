<?php

class CategoryView {

    public function renderCategoriesAdmin($categories) {
        echo "<h1>Administrar Categorías</h1>";
        require 'templates/admin-categories.php';
    }

    public function renderAddCategoryForm() {
        echo "<h2>Agregar Nueva Categoría</h2>";
        require 'templates/add-category-form.php';
    }

    public function renderEditCategoryForm($category) {
        echo "<h2>Editar Categoría: " . $category->nombre . "</h2>";
        require 'templates/edit-category-form.php';
    }

}
