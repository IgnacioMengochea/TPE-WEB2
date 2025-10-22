<div class="pizza-detail">
    
    <h2><?= $pizza->nombre ?></h2>
    <p><?= $pizza->ingredientes ?></p>
    <div class="precio">$<?= $pizza->precio ?></div>
    <div class="categoria">Categoría: <?= $pizza->nombre_categoria ?></div>

    <a href="<?= BASE_URL ?>pizzas" class="volver-link">← Volver al Menú</a>
</div>