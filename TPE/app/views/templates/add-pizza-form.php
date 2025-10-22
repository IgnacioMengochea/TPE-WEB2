<div class="form-container">
    
    <form action="<?= BASE_URL ?>admin/agregar" method="POST">
        
        <div class="form-group">
            <label for="nombre">Nombre de la Pizza:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>

        <div class="form-group">
            <label for="ingredientes">Ingredientes:</label>
            <textarea id="ingredientes" name="ingredientes" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="id_categoria">Categoría:</label>
            <select id="id_categoria" name="id_categoria" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category->id_categoria ?>">
                        <?= $category->nombre ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="form-button">Agregar Pizza</button>
        <a href="<?= BASE_URL ?>admin/dashboard" class="cancel-link">Cancelar</a>

    </form>
</div>