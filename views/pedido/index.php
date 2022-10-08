<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="btn btn-outline-dark rounded-pill" href="<?= base_url . 'Home/index.php' ?>">Regresar</a>
    </div>
</nav>
<div class="container-fluid text-center">
    <div class="container">
        <h1 class="display-5">Pedidos</h1>
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
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Total</th>
                            <th scope="col">DineroRecibido</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($items = $pedidos->fetch_object()) { ?>
                            <tr class="row-cols-6">
                                <td classs="col"><?= $items->Id ?></td>
                                <td classs="col"><?= $items->Nombre ?></td>
                                <td classs="col"><?= $items->Total ?></td>
                                <td classs="col"><?= $items->DineroRecibido ?></td>
                                <td classs="col"><?= $items->Fecha ?></td>
                                <td classs="col"><a href="<?= base_url . 'pedido/detalle&id=' . $items->Id ?>">Detalles</a>
                                    <a href="<?= base_url . 'pedido/eliminar&id=' . $items->Id ?>">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>