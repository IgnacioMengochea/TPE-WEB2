<?php


define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'tpe2');
define('DB_CHARSET', 'utf8');
define('BASE_URL', 'http://localhost/TPE/');


function Deploy() {
    
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
    try {
        $pdo = new PDO($dsn, DB_USER, DB_PASS);
        
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    } catch (PDOException $e) {
        return;
    }

    $query = $pdo->query("SELECT COUNT(*) FROM categorias");
    if ($query) { 
        $count = $query->fetchColumn();
        if ($count == 0) { 
            $pdo->exec("
                INSERT INTO `categorias` (`id_categoria`, `nombre`) VALUES
                (1, 'Pizzas Clásicas'),
                (2, 'Pizzas Especiales');
            ");
        }
    }

    $query = $pdo->query("SELECT COUNT(*) FROM items");
     if ($query) { 
        $count = $query->fetchColumn();
        if ($count == 0) { 
            $pdo->exec("
                INSERT INTO `items` (`nombre`, `ingredientes`, `precio`, `id_categoria_fk`) VALUES
                ('Muzzarella', 'Salsa de tomate, queso muzzarella y aceitunas.', 10000.00, 1),
                ('Napolitana', 'Salsa de tomate, muzzarella, rodajas de tomate fresco y ajo.', 11000.00, 1),
                ('Fugazzeta', 'Muzzarella, cebolla blanca y aceitunas.', 11000.00, 1),
                ('Especial', 'Salsa de tomate, muzzarella, jamón cocido, morrones asados y aceitunas.', 11000.00, 2),
                ('Salchipapa', 'Muzzarella, papas fritas y salchichas tipo viena.', 12000.00, 2),
                ('Calabresa', 'Salsa de tomate, muzzarella y longaniza calabresa.', 11000.00, 2);
            ");
        }
    }

    
    $query = $pdo->query("SELECT COUNT(*) FROM usuarios WHERE email = 'webadmin'");
    if ($query) { 
        $count = $query->fetchColumn();
        if ($count == 0) { 
             $pdo->exec("
                INSERT IGNORE INTO `usuarios` (`email`, `password`) VALUES
                ('webadmin', '$2y$10$f/A.L.a2.t1.WN8.02nL3e.fR.R.s.y.j7.U/S.k.p.S.f.h.s.q');
             ");
        }
    }

    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
Deploy(); 
?>
