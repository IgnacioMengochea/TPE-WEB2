<ul>
    <?php foreach ($pizzas as $pizza): ?>
        <li>
            <a href="<?= BASE_URL ?>pizzas/detalle/<?= $pizza->id_item ?>">
                <?= $pizza->nombre ?>
            </a>
            
            (<span><?= $pizza->nombre_categoria ?></span>)
            <p>$<?= $pizza->precio ?></p>
        </li>
    <?php endforeach; ?>
</ul>