<h1>Panel de Administración</h1>

<div class="admin-nav">
    <p>
        <a href="<?= BASE_URL ?>admin/categorias" class="nav-link">
            Administrar Categorías
        </a>
    </p>
    <p>
        <a href="<?= BASE_URL ?>logout" class="logout-link">
            Cerrar Sesión
        </a>
    </p>
</div>
<h2>Gestión de Pizzas</h2>

<a href="<?= BASE_URL ?>admin/agregar-form" class="btn-agregar">
    + Agregar Nueva Pizza
</a>

<table class="admin-table">
    <thead>
        <tr>
            <th>Pizza (Ítem)</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pizzas as $pizza): ?>
            <tr>
                <td><?= $pizza->nombre ?></td>
                <td><?= $pizza->nombre_categoria ?></td>
                <td>$<?= $pizza->precio ?></td>
                <td>
                    <a href="<?= BASE_URL ?>admin/editar-pizza/<?= $pizza->id_item ?>" class="btn-editar">Editar</a>
                    <a href="<?= BASE_URL ?>admin/borrar-pizza/<?= $pizza->id_item ?>" class="btn-borrar">Borrar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>