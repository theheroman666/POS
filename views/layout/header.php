<!DOCTYPE html>
<html lang="en">

<head>
    <title>El Comal </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url ?>wwwroot/css/site.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg titulo" style="background-color: #eeeeee;">
        <div class="container-fluid d-flex">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse container overflow-hidden text-center" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto row g-5 fs-5">
                    <li class="nav-item col">
                        <a class="nav-link active btn border-0" aria-current="page" href="<?= base_url ?>">Inicio</a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link active btn border-0" href="<?= base_url ?>pedido/index">Pedidos</a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link active btn border-0" href="<?= base_url ?>Inventario/index">Inventario</a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link active btn border-0" href="<?= base_url ?>producto/gestion">Producto</a>
                    </li>
                </ul>
            </div>
            <div class="float-end">
                <div class="btn-group dropstart">
                    <button type="button" class="btn rounded" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle" style="font-size: 40px;"></i>
                    </button>
                    <ul class="dropdown-menu fs-5 titulo" style="margin-top: 73px;">
                        <?php if (isset($_SESSION['identity'])) { ?>
                        <li>
                            <a class="dropdown-item" href="<?= base_url ?>usuario/cambiarSesion">Cambiar usuarios</a>
                        </li>
                        <hr>
                        <?php } ?>
                        <?php if (isset($_SESSION['identity'])) { ?>
                            <li>
                                <a class="dropdown-item" href="<?= base_url ?>usuario/logout">Cerrar sesión</a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a class="dropdown-item" href="<?= base_url ?>usuario/index">Iniciar sesion</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>