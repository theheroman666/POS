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
            <form action="<?= base_url . 'pedido/hacerInv'?>" method="post">
                <?php $stats = Utils::statsCarrito(); ?>
                <?php foreach ($carrito as $indice => $elemento) :
                    $producto = $elemento['producto']; ?>

                    <tr class="row row-cols-4 parrafo">
                        <td class="col"><?= $producto->Nombre ?></td>
                        <td class="col d-flex">
                            <input type="number" class="form-control" value="<?= $elemento['unidades'] ?>" name="cantidad[]">
                            <select class="form-control form-select" name="cont[]" style="font-size:15px" id="slct1">
                                <option value="kg">kg</option>
                                <option value="pzs">pzs</option>
                            </select>
                        </td>
                        <td class="col">
                            <input type="number" class="form-control" name="costo[]">
                        </td>
                        <td class="col">
                            <a href="<?= base_url ?>carritoInv/delete&index=<?= $indice ?>" class="btn btn-outline-danger rounded-pill"><i class="bi bi-trash3-fill"></i></a>

                        </td>
                    </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>
        <button type="submit" class="btn" style="background-color: #fff; border:1px solid black; color:#004000;">Terminar</button>
    </form>


<?php else : ?>
    <p class="titulo">No Hay Articulos</p>
<?php endif; ?>
<!-- Bootstrap JavaScript Libraries -->