<p class="fs-2 titulo">Carrito de la compra</p>

<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) : ?>
    <table class="table">
        <tr>
            <th class="titulo">Imagen</th>
            <th class="titulo">Nombre</th>
            <th class="titulo">Precio</th>
            <th class="titulo">Cantidad</th>
            <th class="titulo">Eliminar</th>
        </tr>
        <form action="<?= htmlspecialchars(base_url . 'pedido/hacer') ?>" method="post">
            <?php $stats = Utils::statsCarrito(); ?>
            <?php foreach ($carrito as $indice => $elemento) :
                $producto = $elemento['producto']; ?>

                <tr class="row-cols-7">
                    <td class="col">
                        <?php if ($producto->Imagen != null) : ?>
                            <img src="<?= base_url ?>uploads/images/<?= $producto->Imagen ?>" width="75px" height="55px" class="rounded" />
                        <?php endif; ?>
                    </td>
                    <td class="col parrafo pt-4">
                        <a class="nav-link text-dark" href="<?= base_url ?>producto/ver&id=<?= $producto->Id ?>"><?= $producto->Nombre ?></a>
                    </td>
                    <td class="col parrafo pt-4">
                        <?= $producto->Precio ?>
                        <!-- <?= $precio ?> -->
                    </td>
                    <td class="col parrafo pt-2">
                        <?= $elemento['unidades'] ?>
                        <div class="updown-unidades">
                            <input type="text" hidden value="<?= $producto->Id ?>" name="Id">
                            <input type="number" hidden value="<?= $elemento['unidades'] ?>" name="cantidad">
                            <!-- Validar Stock -->
                            <?php if ($elemento['unidades'] <  $producto->Stock) { ?>
                                <a href="<?= base_url ?>carrito/up&index=<?= $indice ?>" class="btn" style="height: 37px; width: 37px;">+</a>
                                <a href="<?= base_url ?>carrito/down&index=<?= $indice ?>" class="btn" style="height: 37px; width: 37px;">-</a>
                            <?php } else { ?>
                                <a href="<?= base_url ?>carrito/down&index=<?= $indice ?>" class="btn" style="height: 37px; width: 37px;">-</a>

                            <?php } ?>
                        </div>
                    </td>
                    <td class="col parrafo pt-3">

                        <a href="<?= base_url ?>carrito/delete&index=<?= $indice ?>" class="btn btn-outline-danger bi bi-trash3-fill boton-borrar"></a>
                    </td>
                    </div>
                </tr>

            <?php endforeach; ?>

    </table>
    <br />
    <label class="parrafo">Ingresar dinero recibido</label><br>
    <input type="number" name="Dinero" id="dinero" class="form-control parrafo w-50 m-auto border-5 border-danger" required>
    <br>
    <div class="titulo">
        <input type="number" value="<?= $stats['total'] ?>" hidden id="total">
        <h3>Precio total: <?= $stats['total'] ?> $</h3>
        <h3 id="h3"></h3>
        <!-- TERMINAR COMPRA -->

    </div>
    <br>
    <div class="titulo">
        <button type="submit" class="btn col-4 rounded-3" style="background-color: #ff5e00d7; border:0;">Enviar</button>
        <a href="<?= base_url ?>carrito/delete_all" class="col-4 btn" style="border: 1px solid black;">Eliminar</a>
    </div>
    </form>


<?php else : ?>
    <p class="titulo">El carrito está vacio, añade algun producto</p>
<?php endif; ?>
<!-- Bootstrap JavaScript Libraries -->
<script>
    var num1 = document.getElementById("total").value;
    var num2 = document.getElementById("dinero");
    var h3 = document.getElementById("h3");
    num2.addEventListener("focusout", function() {
        let a = num2.value;
        let b = a - num1;
        if (b >= 0) {
            h3.innerText = `Cambio: $${b}`;
        } else {
            h3.innerText = `La Cantidad ingresada debe ser mayor o igual al total`;

        }
    });
</script>