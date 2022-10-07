<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="wwwroot/lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="wwwroot/css/site.css?v=<?php echo (rand()); ?>" />
    <title>Cobrar</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="wwwroot/js/site.js"></script>
    <script>
        $(document).ready(function() {
            $('#comida').click(function() {
                $('#tablaCarrito').load("../Carrito/indexInventario.php")
            })
        })
    </script>
</head>

<body>
	<nav class="navbar navbar-expand-lg bg-light">
		<div class="container-fluid">
			<a class="btn btn-outline-dark rounded-pill" href="<?= base_url . 'inventario/index.php' ?>">Inventario y proveedores</a>	
		</div>
	</nav>
    <div class="container-fluid text-center">
        <h1 class="display-5">Productos a cobrar</h1>
        
        <a class="btn btn-primary" href="<?=base_url.'Inventario/index'?>">Inventario</a>
        <hr />
        <?php if (isset($_SESSION['producto']) == 'complete') { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Producto Creado con exito</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php unset($_SESSION['producto']); }?>

        <?php if (isset($_SESSION['pedido']) == 'complete') { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Compra realizada con exito</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php unset($_SESSION['pedido']); }?>

        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="row row-cols-3">
                    <?php
                    while ($items = $producto->fetch_object()) { ?>
                        <div class="col contenedores">
                            <?php if ($items->Stock != 0) { ?>

                                <!--                                 <a id="comida" href="<?= base_url . 'carrito/add&id=' . $items->Id ?>" target="_self"> -->

                                <a href="<?= base_url . 'carrito/add&id=' . $items->Id ?>">
                                    <button id="gorditas" class="botones">
                                        <img class="platillos" src="<?=base_url.'uploads/images/'.$items->Imagen?>">
                                    </button>
                                </a>
                            <?php } else { ?>
                                <div id="gorditas" class="botones">
                                    <img class="platillos" src="<?=base_url.'uploads/images/'.$items->Imagen?>">
                                    NO Disponible
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                </div>
            </div>
            <div class="col-md-4" id="tablaCarrito">
                <h5>Lista</h5>
                <?php
                $carrito = new carritoController();
                $carrito->indexMenu();
                ?>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="wwwroot/js/site.js"></script>

</html>