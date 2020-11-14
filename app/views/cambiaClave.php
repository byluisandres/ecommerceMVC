<?php include "includes/encabezado.php"; ?>
<div class="container">
    <!-- Default form login -->
    <form class="text-center border border-light p-5 mt-5" action="<?php print RUTA;?>login/cambiaClave" method="POST">
        <p class="h4 mb-4">Cambia tu clave de acceso</p>
        <input type="hidden" name="id" value="<?php print $datos['data']; ?>">
        <!-- Password -->
        <input type="password" id="password1" name="password1" class="form-control mb-4" placeholder="Escribe tu nueva contraseña">
        <!-- Password -->
        <input type="password" id="password2" name="password2" class="form-control mb-4" placeholder="Repite tu nueva contraseña ">
        <!-- Sign in button -->
        <button class="btn btn-info btn-block my-4" type="submit">Cambiar</button>
        <a href="<?php print RUTA . 'login/' ?>" class="btn btn-primary">Regresar</a>
    </form>
    <!-- Default form login -->
</div>
<?php include "includes/footer.php"; ?>