<script>
$(document).ready(function() {
    $('#comida').click(function() {
        $('#tablaCarrito').load("../Carrito/indexInventario.php")
    })
})
</script>
<div class="container-fluid text-center">
    <h1 class="titulo display-4">¿Qué vas a cobrar?</h1>
    <hr />

    <!-- LO -->
    <?php if (isset($_SESSION['identity']) == 'complete') { ?>
    <div class="alert  alert-success titulo alert-dismissible fade show containers hideMe" role="alert">
        <strong>Hola <?= $_SESSION['identity']->Nombre ?> </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>
    <?php if (isset($_SESSION['error_login'])) { ?>
    <div class="alert alert-danger titulo alert-dismissible fade show containers hideMe" role="alert">
        <strong>Hubo un erro al crear el producto</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
        unset($_SESSION['error_login']);
    } ?>
    <!-- LO -->

    <!-- PO -->
    <?php if (isset($_SESSION['producto']) == 'complete') { ?>
    <div class="alert alert-success titulo alert-dismissible fade show containers hideMe" role="alert">
        <strong>Producto Creado con exito</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['producto']);
    } ?>
    <?php if (isset($_SESSION['producto']) == 'failed') { ?>
    <div class="alert alert-danger titulo alert-dismissible fade show containers hideMe" role="alert">
        <strong>Hubo un erro al crear el producto</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['producto']);
    } ?>
    <!-- PO -->

    <!-- PD -->
    <?php if (isset($_SESSION['pedido']) == 'complete') { ?>
    <div class="alert alert-success alert-dismissible fade show titulo containers hideMe" role="alert">
        <strong>Compra realizada con exito</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['pedido']);
    } elseif (isset($_SESSION['pedido']) == 'failed') { ?>
    <div class="alert alert-danger alert-dismissible fade show titulo containers hideMe" role="alert">
        <strong>No se pudo realizar la Compra</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>
    <!-- PD -->
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="row row-cols-3">
                
                <!-- ELIMINAR PARA Comprobar Datos linea 52 hasta linea 73-->
                <?php
                while ($items = $producto->fetch_object()) { ?>
                <div class="col contenedores m-auto">
                    <?php if ($items->Stock != 0) { ?>
                    <div class="card">
                        <a class="nav-link titulo ajax" onclick="ajax(<?= $items->Id ?>)">
                            <!-- <a class="nav-link titulo" href="<?= base_url . 'carrito/add&id=' . $items->Id ?>"> -->
                            <img src="<?= base_url . 'uploads/images/' . $items->Imagen ?>" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <p class="card-text"><?= $items->Nombre ?></p>
                            </div>
                        </a>
                    </div>

                    <?php } else { ?>
                    <div id="gorditas" class="botones titulo">
                        <img class="platillos" src="<?= base_url . 'uploads/images/' . $items->Imagen ?>">
                        NO Disponible
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
                <!-- ELIMINAR PARA Comprobar Datos  -->
            </div>
        </div>
        <div class="col-md-4" id="tablaCarrito">
            <?php
            $carrito = new carritoController();
            $carrito->indexMenu();
            ?>

        </div>
    </div>
</div>

<script>
function ajax(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "http://localhost/POS/carrito/add&id=" + id);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
    xhttp.onload = function() {
        if (xhttp.status == 200) {
            console.log(xhttp.status);
            let carrito = document.querySelector("#tablaCarrito");
            // carrito.innerHTML = xhttp.responseText;
            // console.log(xhttp.responseText);
            location.reload();
        }
    };
}
</script>