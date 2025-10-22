<div class="form-container">
    <form action="<?= BASE_URL ?>admin/guardar-categoria/<?= $category->id_categoria ?>" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre de la Categoría:</label>
            <input type="text" id="nombre" name="nombre" value="<?= $category->nombre ?>" required>
        </div>
        <button type="submit" class="form-button">Guardar Cambios</button>
        <a href="<?= BASE_URL ?>admin/categorias" class="cancel-link">Cancelar</a>
    </form>
</div>