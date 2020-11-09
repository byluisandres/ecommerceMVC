<?php if (isset($datos['errores'])) : ?>
    <?php if (count($datos['errores']) > 0) : ?>
        <div class="alert alert-danger" role="alert">
            <?php foreach ($datos['errores'] as $key => $valor) : ?>
                <p><?php print $valor; ?> </p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
<?php endif ?>