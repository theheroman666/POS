
<div class="container-fluid text-center">
    <div class="container">
        <h1 class="display-5">Detalles de la orden</h1>
        <hr>
    </div>

    <div class="text-center container">
        <div class="row justify-content-center">
            <div class="col-10">
                <table class="table table-striped">
                    <thead class="table table-dark">
                        <tr class="row-cols-6">
                            <th scope="col">Id</th>
                            <th scope="col">Cajero</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Unidades</th>
                            <th scope="col">Total</th>
                            <th scope="col">DineroRecibido</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($items = $productos->fetch_object()) { ?>

                            <tr class="row-cols-6">
                                <td classs="col"><?= $items->Id ?></td>
                                <td classs="col"><?= $items->Nombre ?></td>
                                <td classs="col"><?= $items->Nombre ?></td>
                                <td classs="col"><?= $items->Precio ?></td>
                                <td classs="col"><?= $items->Unidades ?></td>
                                <td classs="col"><?= $items->Total ?></td>
                                <td classs="col"><?= $items->DineroRecibido ?></td>
                                <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>