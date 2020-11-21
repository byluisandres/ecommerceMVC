<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php print $datos["titulo"] ?> </title>
    <!-- Font Awesome -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.2/css/all.css'>
    <!-- Bootstrap core CSS -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css' rel='stylesheet'>
    <!-- Material Design Bootstrap -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css' rel='stylesheet'>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a href="<?php print RUTA; ?>" class="navbar-brand">Tienda</a>
        <div class="collapse navbar-collapse" id="menu">
            <?php
            if ($datos["menu"]) {
                //menu
            }
            ?>
            <?php if (isset($datos['admon'])) : ?>
                <?php if ($datos['admon']) : ?>
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a href="<?php echo RUTA; ?>admonUsuarios" class="nav-link">Usuarios</a>
                        </li>
                    </ul>
                <?php endif; ?>
            <?php endif; ?>

        </div>
    </nav>