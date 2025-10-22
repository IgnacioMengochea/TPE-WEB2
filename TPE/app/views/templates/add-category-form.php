<div class="form-container">
    <form action="<?= BASE_URL ?>admin/agregar-categoria" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre de la Categoría:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <button type="submit" class="form-button">Agregar Categoría</button>
        <a href="<?= BASE_URL ?>admin/categorias" class="cancel-link">Cancelar</a>
    </form>
</div>