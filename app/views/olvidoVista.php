<?php include "includes/encabezado.php"; ?>
<div class="container">
    <!-- Default form login -->
    <form class=" border border-light p-5 mt-5" action="<?php print RUTA; ?>login/olvido" method="POST">
        <p class="h4 mb-4 text-center"><?php print $datos['subtitulo'] ?> </p>

        <!-- Password -->
        <input type="email" id="email" name="email" class="form-control mb-4" placeholder="Escribe tu correo electrónico">

        <small id="emailHelp" class="form-text text-muted">Se enviara un correo para cambiar la contraseña.</small>
        <!-- Sign in button -->
        <?php include "includes/errores.php" ?> 
        <button class="btn btn-info btn-block my-4" type="submit">Recuperar contraseña</button>
    </form>
</div>
<?php include "includes/footer.php"; ?>