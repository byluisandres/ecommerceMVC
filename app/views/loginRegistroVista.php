<?php include "includes/encabezado.php"; ?>
<div class="container">
    <!-- Default form login -->
    <form class="text-center border border-light p-5 mt-5" method="POST">
        <p class="h4 mb-4">Registro</p>
        <!-- nombre -->
        <input type="text" id="nombre" name="nombre" class="form-control mb-4" placeholder="Nombre"
         value="<?php isset($datos["data"]["nombre"]) ? print $datos["data"]["nombre"] : "" ?>">
        <!-- E-mail -->
        <input type="email" id="email" name="email" class="form-control mb-4" placeholder="email" 
        value="<?php isset($datos["data"]["nombre"]) ? print $datos["data"]["email"] : "" ?>">
        <!-- Dirección -->
        <input type="text" id="direccion" name="direccion" class="form-control mb-4" placeholder="Direccion"
         value="<?php isset($datos["data"]["nombre"]) ? print $datos["data"]["direccion"] : "" ?>">
        <!-- ciudad-->
        <input type="text" id="ciudad" name="ciudad" class="form-control mb-4" placeholder="ciudad"
         value="<?php isset($datos["data"]["nombre"]) ? print $datos["data"]["ciudad"] : "" ?>">
        <!--Código Postal -->
        <input type="text" id="codigoPostal" name="codigoPostal" class="form-control mb-4" placeholder="Código Postal"
         value="<?php isset($datos["data"]["nombre"]) ? print $datos["data"]["codigoPostal"] : "" ?>">
        <!-- Pais-->
        <input type="text" id="pais" name="pais" class="form-control mb-4" placeholder="Pais"
         value="<?php isset($datos["data"]["nombre"]) ? print $datos["data"]["pais"] : "" ?>">
        <!-- Contraseña-->
        <input type="password" id="password1" name="password1" class="form-control mb-4" placeholder="contraseña"
         value="<?php isset($datos["data"]["nombre"]) ? print $datos["data"]["password1"] : "" ?>">
        <!-- Contraseña-->
        <input type="password" id="password2" name="password2" class="form-control mb-4" placeholder="Repita su contraseña"
         value="<?php isset($datos["data"]["nombre"]) ? print $datos["data"]["password2"] : "" ?>">

        <?php if (isset($datos['errores'])) : ?>
            <?php if (count($datos['errores']) > 0) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($datos['errores'] as $key => $valor) : ?>
                        <p><?php print $valor; ?> </p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endif ?>
        <button class="btn btn-info btn-block my-4" type="submit">Entrar</button>

    </form>
    <!-- Default form login -->
</div>
<?php include "includes/footer.php"; ?>