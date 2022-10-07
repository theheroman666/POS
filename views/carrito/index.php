<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <h1>Carrito de la compra</h1>
    <?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) : ?>
        <table>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades</th>
                <th>Eliminar</th>
            </tr>
            <?php
            foreach ($carrito as $indice => $elemento) :
                $producto = $elemento['producto']; ?>
                <tr>
                    <td>
                        <?php if ($producto->Imagen != null) : ?>
                            <img src="<?= base_url ?>uploads/images/<?= $producto->Imagen ?>" width="75px" height="55px" />
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= base_url ?>producto/ver&id=<?= $producto->Id ?>"><?= $producto->Nombre ?></a>
                    </td>
                    <td>
                        <?= $producto->Precio ?>
                    </td>
                    <td>
                        <?= $elemento['unidades'] ?>
                        <div>
                            <a href="<?= base_url ?>carrito/up&index=<?= $indice ?>" class="btn nav-link text-dark">+</a>
                            <a href="<?= base_url ?>carrito/down&index=<?= $indice ?>" class="btn nav-link text-dark">-</a>
                        </div>
                    </td>
                    <td>
                        <a href="<?= base_url ?>carrito/delete&index=<?= $indice ?>" class="btn btn-warning text-light">Quitar producto</a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </table>
        <br />
        <div>
            <a href="<?= base_url ?>carrito/delete_all" class="button button-delete button-red btn btn-danger text-dark">Vaciar carrito</a>
        </div>
        <div>
            <?php $stats = Utils::statsCarrito(); ?>
            <h3>Precio total: <?= $stats['total'] ?> $</h3>
            <a href="<?= base_url ?>pedido/hacer" class="button button-pedido">Hacer pedido</a>
        </div>

    <?php else : ?>
        <p>El carrito está vacio, añade algun producto</p>
    <?php endif; ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>