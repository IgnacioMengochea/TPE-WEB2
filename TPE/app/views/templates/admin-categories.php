<a href="<?= BASE_URL ?>admin/agregar-categoria-form" class="btn-agregar">
    + Agregar Nueva Categoría
</a>

<table class="admin-table">
    <thead>
        <tr>
            <th>Nombre Categoría</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= $category->nombre ?></td>
                <td>
                    <a href="<?= BASE_URL ?>admin/editar-categoria/<?= $category->id_categoria ?>" class="btn-editar">Editar</a>
                    <a href="<?= BASE_URL ?>admin/borrar-categoria/<?= $category->id_categoria ?>" class="btn-borrar">Borrar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="<?= BASE_URL ?>admin/dashboard" class="back-link">← Volver al Panel Principal</a>