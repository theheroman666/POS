<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
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
                                <?= $producto->Precio ?>
                                <!-- <?= $precio ?> -->
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
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
                h3.innerText = `La Cantidad ingresada debe ser mayor al total`;

            }
        });
    </script>
</body>

</html>