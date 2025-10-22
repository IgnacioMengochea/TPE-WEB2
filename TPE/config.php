<?php

// --- CONSTANTES DE CONFIGURACIÓN ---
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'tpe2');
define('DB_CHARSET', 'utf8');
define('BASE_URL', 'http://localhost/TPE/');

// --- FUNCIÓN DE AUTO-DEPLOY ---

/**
 * Verifica si las tablas están vacías y las rellena con datos iniciales si es necesario.
 */
function Deploy() {
    // 1. Conexión a la Base de Datos (usando las constantes)
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
    try {
        $pdo = new PDO($dsn, DB_USER, DB_PASS);
        // Silenciamos errores PDO para que no detenga el script si las tablas no existen aún
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    } catch (PDOException $e) {
        // Si la conexión falla (ej: DB_NAME incorrecta), no podemos hacer nada.
        // Podríamos mostrar un error más amigable aquí si quisiéramos.
        return; // Salimos de la función
    }

    // 2. Verificar y poblar la tabla 'categorias'
    $query = $pdo->query("SELECT COUNT(*) FROM categorias");
    if ($query) { // Verifica si la tabla existe
        $count = $query->fetchColumn();
        if ($count == 0) { // Si la tabla está vacía
            $pdo->exec("
                INSERT INTO `categorias` (`id_categoria`, `nombre`) VALUES
                (1, 'Pizzas Clásicas'),
                (2, 'Pizzas Especiales');
            ");
        }
    }

    // 3. Verificar y poblar la tabla 'items'
    $query = $pdo->query("SELECT COUNT(*) FROM items");
     if ($query) { // Verifica si la tabla existe
        $count = $query->fetchColumn();
        if ($count == 0) { // Si la tabla está vacía
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

    // 4. (Opcional) Verificar y asegurar el usuario admin
    $query = $pdo->query("SELECT COUNT(*) FROM usuarios WHERE email = 'webadmin'");
    if ($query) { // Verifica si la tabla existe
        $count = $query->fetchColumn();
        if ($count == 0) { // Si el usuario admin no existe
             $pdo->exec("
                INSERT IGNORE INTO `usuarios` (`email`, `password`) VALUES
                ('webadmin', '$2y$10$f/A.L.a2.t1.WN8.02nL3e.fR.R.s.y.j7.U/S.k.p.S.f.h.s.q');
             ");
        }
    }

    // Restauramos el modo de error por defecto (opcional)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

// --- EJECUTAR LA FUNCIÓN DE DEPLOY ---
Deploy(); // ¡Llamamos a la función para que se ejecute al incluir config.php!

?>