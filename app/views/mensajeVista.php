<?php include "includes/encabezado.php"; ?>
<div class="container">
    <h2 class="text-center"><?php print $datos['titulo'] ?></h2>
    <div class="alert <?php print $datos['color'] ?>" role="alert">
        <p><?php print $datos['texto']; ?> </p>
    </div>
    <a href="<?php print RUTA . $datos['url'] ?>" class="btn <?php print $datos['colorBoton'] ?>">
        <?php print $datos['textoBoton'] ?>
    </a>
</div>

<?php include "includes/footer.php"; ?>