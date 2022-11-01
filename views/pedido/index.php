<div class="container-fluid text-center">
    <div class="container titulo pt-3">
        <h1 class="display-5">Pedidos</h1>
        <hr>
    </div>

    <div class="text-center container">
        <div class="row justify-content-center">
            <div class="col-10">
                <table class="table table-striped">
                    <thead class="table table-dark titulo">
                        <tr class="row-cols-6">
                            <th scope="col">Nombre</th>
                            <th scope="col">Total</th>
                            <th scope="col">DineroRecibido</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($items = $pedidos->fetch_object()) { ?>
                            <tr class="row-cols-6 parrafo">
                                <td classs="col"><?= $items->Nombre ?></td>
                                <td classs="col"><?= $items->Total ?></td>
                                <td classs="col"><?= $items->DineroRecibido ?></td>
                                <td classs="col"><?= $items->Fecha ?></td>
                                <td classs="col">
                                    <a class="btn border-success text-dark" style="width: 71px; font-size:15px;" href="<?= base_url . 'pedido/detalle&id=' . $items->Id ?>">Detalles</a>
                                    <a class="btn btn-outline-danger bi bi-trash3-fill" style="width: 95px; font-size:15px;" href="<?= base_url . 'pedido/eliminar&id=' . $items->Id ?>">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>