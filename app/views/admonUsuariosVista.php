<?php include "includes/encabezado.php"; ?>
<div class="container">
    <!-- Default form login -->
    <form class="text-center border border-light p-5 mt-5" method="<?php print RUTA; ?>admonUsuarios/alta/" method="POST">
        <p class="h4 mb-4">Alta de usuarios administrativos</p>
        <!-- nombre -->
        <input type="text" id="nombre" name="nombre" class="form-control mb-4" placeholder="Nombre" value="<?php isset($datos["data"]["nombre"]) ? print $datos["data"]["nombre"] : "" ?>">
        <!-- E-mail -->
        <input type="email" id="email" name="email" class="form-control mb-4" placeholder="email" value="<?php isset($datos["data"]["nombre"]) ? print $datos["data"]["email"] : "" ?>">

        <!-- Contraseña-->
        <input type="password" id="password1" name="password1" class="form-control mb-4" placeholder="contraseña" value="<?php isset($datos["data"]["nombre"]) ? print $datos["data"]["password1"] : "" ?>">
        <!-- Contraseña-->
        <input type="password" id="password2" name="password2" class="form-control mb-4" placeholder="Repita su contraseña" value="<?php isset($datos["data"]["nombre"]) ? print $datos["data"]["password2"] : "" ?>">

        <?php include "includes/errores.php" ?>
        <button class="btn btn-info btn-block my-4" type="submit">Registrarse</button>

        <a href="<?php print RUTA; ?>admonUsuarios" class="btn btn-info">Regresar</a>
    </form>
    <!-- Default form login -->
</div>
<?php include "includes/footer.php"; ?>