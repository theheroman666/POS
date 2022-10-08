<!DOCTYPE html>
<html lang="en">

<head>
    <title>Inventario Quesadillas el Comal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url ?>pedido/index">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url ?>Inventario/index">Inventario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url ?>producto/gestion">Producto</a>
                    </li>
                    <?php if (isset($_SESSION['identity'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link btn btn-danger" href="<?= base_url ?>usuario/logout">Cerrar sesión</a>

                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url ?>usuario/index">Iniciar sesion</a>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </nav>