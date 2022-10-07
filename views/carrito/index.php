
    <div>
        <h1>Carrito de la compra</h1>
        <?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) : ?>
            <table>
                <tr class="">
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Unidades</th>
                    <th>Eliminar</th>
                </tr>
                <form action="<?= base_url . 'pedido/hacer' ?>" method="post">
                    <?php $stats = Utils::statsCarrito(); ?>
                    <?php
                    foreach ($carrito as $indice => $elemento) :
                        $producto = $elemento['producto'];
                    ?>

                        <tr>
                            <td class="col">

                                <?php if ($producto->Imagen != null) : ?>
                                    <img src="<?= base_url ?>uploads/images/<?= $producto->Imagen ?>" width="75px" height="55px" />
                                <?php endif; ?>
                            </td>
                            <td class="col">
                                <a class="nav-link text-dark" href="<?= base_url ?>producto/ver&id=<?= $producto->Id ?>"><?= $producto->Nombre ?></a>
                            </td>
                            <td class="col">
                                <!-- <?= $producto->Precio ?> -->
                                <?= $precio ?>
                            </td>
                            <td class="col">
                                <?= $elemento['unidades'] ?>
                                <div class="updown-unidades">
                                    <input type="text" hidden value="<?= $producto->Id ?>" name="Id">
                                    <input type="number" hidden value="<?= $elemento['unidades'] ?>" name="cantidad">

                                </div>
                            </td>
                            <td class="col">
                                <!-- Validar Stock -->
                                <?php if ($elemento['unidades'] <  $producto->Stock) { ?>
                                    <a href="<?= base_url ?>carrito/up&index=<?= $indice ?>" class="btn btn-outline-success">+</a>
                                    <a href="<?= base_url ?>carrito/down&index=<?= $indice ?>" class="btn btn-outline-danger">-</a>
                                <?php } else { ?>
                                    <a href="<?= base_url ?>carrito/down&index=<?= $indice ?>" class="btn btn-outline-danger">-</a>

                                <?php } ?>
                                <a href="<?= base_url ?>carrito/delete&index=<?= $indice ?>" class="btn btn-outline-danger bi bi-trash3-fill boton-borrar"></a>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                </form>
            </table>
            <br />
            <div class="total-carrito">
                <input type="number" value="<?= $stats['total'] ?>" hidden id="total">
                <h3>Precio total: <?= $stats['total'] ?> $</h3>
                <h3 id="h3"></h3>
            </div><br>
            <label>Dinero recibido</label><br>
            <input type="number" value="" name="Dinero" id="dinero" class="form-control w-50 m-auto border-5 border-danger" required><br><br>
            <button type="submit" class="btn col-4 btn-outline-success rounded">Continuar</button><br><br>
            <div class="delete-carrito ">
                <a href="<?= base_url ?>carrito/delete_all" class="col-4 button button-delete button-red btn btn-danger text-light">Eliminar</a>
            </div>
        <?php else : ?>
            <p>El carrito está vacio, añade algun producto</p>
        <?php endif; ?>
    </div>