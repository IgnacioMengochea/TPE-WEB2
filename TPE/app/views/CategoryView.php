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

    // --- ¡¡NUEVA FUNCIÓN DE EDITAR!! ---
    /**
     * Muestra el formulario para editar una categoría existente.
     */
    public function renderEditCategoryForm($category) {
        echo "<h2>Editar Categoría: " . $category->nombre . "</h2>";
        // Llama a la plantilla del form de edición (la crearemos ahora)
        require 'templates/edit-category-form.php';
    }
}