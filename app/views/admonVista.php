<?php include "includes/encabezado.php"; ?>
<div class="container">
    <!-- Default form login -->
    <form class="text-center border border-light p-5 mt-5" action="<?php print RUTA; ?>admon/verifica" method="POST">
        <p class="h4 mb-4">Administrador</p>
        <!-- Email -->
        <input type="email" id="email" name="email" class="form-control mb-4" placeholder="E-mail" value="<?php isset($datos["data"]["usuario"]) ? print $datos["data"]["usuario"] : "" ?>">
        <!-- Password -->
        <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Contraseña" value="<?php isset($datos["data"]["clave"]) ? print $datos["data"]["clave"] : "" ?>">
        <?php include "includes/errores.php" ?>
        <div class="d-flex justify-content-around">
            <div>
                <!-- Forgot password -->
                <a href="<?php print RUTA; ?>login/olvido">¿Recuperar contraseña?</a>
            </div>
        </div>
        <!-- Sign in button -->

        <button class="btn btn-info btn-block my-4" type="submit">Entrar</button>
        <!-- Register -->
        <p>Not a member?
            <a href="<?php print RUTA; ?>login/registro">Registrarse</a>
        </p>
    </form>
    <!-- Default form login -->
</div>
<?php include "includes/footer.php"; ?>