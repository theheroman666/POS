<!doctype html>
<html lang="en">

<head>
    <title>Inventario Quesadillas el Comal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="btn btn-outline-dark rounded-pill" href="<?= base_url . 'Home/index.php' ?>">Regresar</a>
        </div>
    </nav>
    <div class="container-fluid text-center">
        <div class="container">
            <h1 class="display-5">Inventario proveedores</h1>
            <hr>
            <div>
                <a type="submit" class="btn btn-outline-success rounded-pill" href="<?= base_url . 'inventario/agregar' ?>">Agregar</a>
            </div>
        </div>

        <div class="text-center container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <table class="table table-striped">
                        <thead class="table table-dark">
                            <tr class="row-cols-6">
                                <th scope="col">Imgen</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Costo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($items = $producto->fetch_object()) { ?>
                                <tr class="row-cols-6">
                                    <td classs="col"><img width="75px" height="55px" src="<?= base_url . 'uploads/images/' . $items->Imagen ?>"></td>
                                    <td classs="col"><?= $items->Nombre ?></td>
                                    <td classs="col"><?= $items->Stock ?></td>
                                    <td classs="col"><?= $items->Precio ?></td>
                                    <td classs="col"><?= $items->Costo ?></td>
                                    <td classs="col"><a href="<?= base_url . 'Inventario/editar&id=' . $items->Id ?>">Editar</a>
                                        <a href="<?= base_url . 'Inventario/eliminar&id=' . $items->Id ?>">Eliminar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>