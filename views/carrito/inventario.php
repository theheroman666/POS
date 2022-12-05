
<?php if (isset($_SESSION['carritoInv']) && count($_SESSION['carritoInv']) >= 1) : ?>
    <table class="table mt-4">
        <thead class="table-dark">

            <tr class="row row-cols-4">
                <th class="col">Nombre</th>
                <th class="col">Cantidad</th>
                <th class="col">Precio</th>
                <th class="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <form action="<?= base_url . 'pedido/hacer' ?>" method="post">
                <?php $stats = Utils::statsCarrito(); ?>
                <?php foreach ($carrito as $indice => $elemento) :
                    $producto = $elemento['producto']; ?>

                    <tr class="row row-cols-4 parrafo">
                        <td class="col"><?=$producto->Nombre?></td>
                        <td class="col d-flex">
                <input type="number" class="form-control" value="<?= $elemento['unidades'] ?>" name="cantidad">

                            <input type="number" class="form-control" name="Cantidad" style="width: 50px;">
                            <select class="form-control form-select" style="font-size:15px" id="slct1">
                                <option value="kg">kg</option>
                                <option value="kg">pzs</option>
                            </select>
                        </td>
                        <td class="col">
                            <input type="number" class="form-control" value="" style="width: 100px;">
                        </td>
                        <td class="col"><a href="<?= base_url ?>carritoInv/delete&index=<?= $indice ?>" class="btn btn-outline-danger rounded-pill"><i class="bi bi-trash3-fill"></i></a>

                        </td>
                    </tr>
        </tbody>
    </table>

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
        </td>
        <td class="col parrafo pt-2">
            <?= $elemento['unidades'] ?>
            <div class="updown-unidades">
                <input type="text" hidden value="<?= $producto->Id ?>" name="Id">
                <input type="number" hidden value="<?= $elemento['unidades'] ?>" name="cantidad">
                <!-- Validar Stock -->
                <?php if ($elemento['unidades'] <  $producto->Stock) { ?>
                    <a href="<?= base_url ?>carritoInv/up&index=<?= $indice ?>" class="btn border-success" style="height: 37px; width: 35px;">+</a>
                    <a href="<?= base_url ?>carritoInv/down&index=<?= $indice ?>" class="btn border-danger" style="height: 37px; width: 35px;">-</a>
                <?php } else { ?>
                    <a href="<?= base_url ?>carritoInv/down&index=<?= $indice ?>" class="btn" style="height: 37px; width: 37px;">-</a>

                <?php } ?>
            </div>
        </td>
        <td class="col parrafo pt-3">

        </td>
        </div>
    </tr>

<?php endforeach; ?>

</table>
</form>


<?php else : ?>
    <p class="titulo">El carrito está vacio, añade algún producto</p>
<?php endif; ?>
<!-- Bootstrap JavaScript Libraries -->