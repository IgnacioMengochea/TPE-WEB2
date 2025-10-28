<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


session_start();


require_once 'config.php';
require_once 'helpers/AuthHelper.php';


define('DEFAULT_ACTION', 'home');


if (empty($_GET['action'])) {
    $action = DEFAULT_ACTION;
} else {
    $action = $_GET['action'];
}


$params = explode('/', $action);


switch ($params[0]) {

    case 'home':
        echo "<h1>¡Bienvenido a Es Tu Pizza!</h1>";
        echo '<a href="' . BASE_URL . 'login">Ir al Login de Admin</a>';
        break;

    case 'pizzas':
        require_once 'app/controllers/ItemController.php';
        $controller = new ItemController();
        if (isset($params[1])) {
            switch ($params[1]) {
                case 'detalle':
                    if (isset($params[2])) { $id = $params[2]; $controller->showPizzaDetail($id); }
                    else { echo "Error: Falta ID."; }
                    break;
                default: echo "Error 404"; break;
            }
        } else { $controller->showAllPizzas(); }
        break;

    case 'login':
        require_once 'app/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->showLogin();
        break;

    case 'verify':
        require_once 'app/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->verifyLogin();
        break;

    case 'logout':
        require_once 'app/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->logout();
        break;

    case 'admin':
        AuthHelper::checkLoggedIn(); 

        if (isset($params[1])) {
            // Rutas de Items (Pizzas)
            if (in_array($params[1], ['dashboard', 'agregar-form', 'agregar', 'borrar-pizza', 'editar-pizza', 'guardar-edicion'])) {
                require_once 'app/controllers/ItemController.php';
                $controller = new ItemController();
                switch ($params[1]) {
                    case 'dashboard': $controller->showAdminDashboard(); break;
                    case 'agregar-form': $controller->showAddPizzaForm(); break;
                    case 'agregar': $controller->addNewPizza(); break;
                    case 'borrar-pizza': if (isset($params[2])) { $id = $params[2]; $controller->deletePizza($id); } else { echo "Error: Falta ID."; } break;
                    case 'editar-pizza': if (isset($params[2])) { $id = $params[2]; $controller->showEditPizzaForm($id); } else { echo "Error: Falta ID."; } break;
                    case 'guardar-edicion': if (isset($params[2])) { $id = $params[2]; $controller->processEditPizza($id); } else { echo "Error: Falta ID."; } break;
                }
            }

            elseif (in_array($params[1], ['categorias', 'agregar-categoria-form', 'agregar-categoria', 'borrar-categoria', 'editar-categoria', 'guardar-categoria'])) {
                require_once 'app/controllers/CategoryController.php';
                $controller = new CategoryController();
                switch ($params[1]) {
                    case 'categorias': $controller->showCategoriesAdmin(); break;
                    case 'agregar-categoria-form': $controller->showAddCategoryForm(); break;
                    case 'agregar-categoria': $controller->addCategory(); break;
                    case 'borrar-categoria': if (isset($params[2])) { $id = $params[2]; $controller->deleteCategory($id); } else { echo "Error: Falta ID."; } break;
                    case 'editar-categoria': if (isset($params[2])) { $id = $params[2]; $controller->showEditCategoryForm($id); } else { echo "Error: Falta ID."; } break;
                    case 'guardar-categoria': if (isset($params[2])) { $id = $params[2]; $controller->processEditCategory($id); } else { echo "Error: Falta ID."; } break;
                }
            }

            else {
                echo "Error 404 - Página no encontrada (Admin)";
            }
        } else {

            require_once 'app/controllers/ItemController.php';
            $controller = new ItemController();
            $controller->showAdminDashboard();
        }
        break; 

    default:
        echo "Error 404 - Página no encontrada";
        break;
} 

?> 
