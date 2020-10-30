<?php include "encabezado.php"; ?>
<div class="container">
    <!-- Default form login -->
    <form class="text-center border border-light p-5 mt-5" action="#!">
        <p class="h4 mb-4">Login</p>
        <!-- Email -->
        <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">
        <!-- Password -->
        <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Contraseña">
        <div class="d-flex justify-content-around">
            <div>
                <!-- Remember me -->
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                    <label class="custom-control-label" for="defaultLoginFormRemember">Recordar</label>
                </div>
            </div>
            <div>
                <!-- Forgot password -->
                <a href="login/olvido">¿Olvidaste tu contraseña?</a>
            </div>
        </div>
        <!-- Sign in button -->
        <button class="btn btn-info btn-block my-4" type="submit">Entrar</button>
        <!-- Register -->
        <p>Not a member?
            <a href="login/registro">Registrarse</a>
        </p>
    </form>
    <!-- Default form login -->
</div>
<?php include "footer.php"; ?>