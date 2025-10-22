
<?php
require_once 'app/models/CategoryModel.php';
require_once 'app/views/CategoryView.php';
require_once 'helpers/AuthHelper.php';

class CategoryController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
        AuthHelper::checkLoggedIn(); 
    }

    public function showCategoriesAdmin() {
        $categories = $this->model->getAllCategories();
        $this->view->renderCategoriesAdmin($categories);
    }

    public function showAddCategoryForm() {
        $this->view->renderAddCategoryForm();
    }

    public function addCategory() {
        $nombre = $_POST['nombre'];
        $this->model->insertCategory($nombre);
        header('Location: ' . BASE_URL . 'admin/categorias');
    }

    public function deleteCategory($id) {
        $this->model->deleteCategoryById($id);
        header('Location: ' . BASE_URL . 'admin/categorias');
    }

    public function showEditCategoryForm($id) {
        $category = $this->model->getCategoryById($id);
        if ($category) {
            $this->view->renderEditCategoryForm($category); 
        } else {
            echo "Error: Categoría no encontrada.";
            echo '<a href="' . BASE_URL . 'admin/categorias">Volver</a>';
        }
    }

    public function processEditCategory($id) {
        $nombre = $_POST['nombre'];
        $this->model->updateCategory($id, $nombre);
        header('Location: ' . BASE_URL . 'admin/categorias');
    }
}