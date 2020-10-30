<?php include "encabezado.php"; ?>
<div class="container">
    <!-- Default form login -->
    <form class="text-center border border-light p-5 mt-5" action="login/registro/" method="POST">
        <p class="h4 mb-4">Registro</p>
        <!-- nombre -->
        <input type="text" id="nombre" class="form-control mb-4" placeholder="Nombre">
        <!-- apellido paterno -->
        <input type="text" id="apellidoPaterno" class="form-control mb-4" placeholder="apellido Patero">
        <!-- apellido Materno -->
        <input type="text" id="apellidoMaterno" class="form-control mb-4" placeholder="apellido materno">
        <!-- E-mail -->
        <input type="email" id="email" class="form-control mb-4" placeholder="email">
        <!-- Dirección -->
        <input type="text" id="direccion" class="form-control mb-4" placeholder="Direccion">
        <!-- ciudad-->
        <input type="text" id="ciudad" class="form-control mb-4" placeholder="ciudad">
        <!-- colonia-->
        <input type="text" id="colonia" class="form-control mb-4" placeholder="Colonia">
        <!--estado -->
        <input type="text" id="estado" class="form-control mb-4" placeholder="Estado">
        <!--Código Postal -->
        <input type="text" id="codigoPostal" class="form-control mb-4" placeholder="Código Postal">
        <!-- Pais-->
        <input type="text" id="pais" class="form-control mb-4" placeholder="Pais">
        <!-- Contraseña-->
        <input type="text" id="password" class="form-control mb-4" placeholder="contraseña">
        <!-- Contraseña-->
        <input type="text" id="password2" class="form-control mb-4" placeholder="Repita su contraseña">
        
        <button class="btn btn-info btn-block my-4" type="submit">Entrar</button>

    </form>
    <!-- Default form login -->
</div>
<?php include "footer.php"; ?>