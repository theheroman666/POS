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
            <a type="submit" class="btn btn-outline-success rounded" href="<?= base_url . 'inventario/crear' ?>">Agregar</a>
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
                            <th scope="col">Costo</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($items = $productos->fetch_object()) { ?>
                            <tr class="row-cols-6">
                                <td classs="col"><img width="75px" height="55px" src="<?= base_url . 'uploads/images/' . $items->Imagen ?>"></td>
                                <td classs="col"><?= $items->Nombre ?></td>
                                <td classs="col"><?= $items->Stock ?></td>
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