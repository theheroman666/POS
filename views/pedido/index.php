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
                            <th scope="col">Factura</th>
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
                                <td classs="col"><?= $items->Factura ?></td>
                                <td classs="col"><?= $items->Fecha ?></td>
                                <td classs="col">
                                <?php if (isset($_SESSION['auth']) || isset($_SESSION['admin'])) { ?>
                                        <a class="btn" style=" background-color: #ff5e00d7; border:0; width: 71px; font-size:15px;" href="<?= base_url . 'pedido/detalle&id=' . $items->Id ?>">Detalles</a>
                                        <a class="btn bi bi-trash3-fill" style="background-color: #fff; border:1px solid black; width: 95px; font-size:15px;" href="<?= base_url . 'pedido/eliminar&id=' . $items->Id ?>">Eliminar</a>

                                    <?php
                                        unset($_SESSION['auth']);
                                    } else { ?>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Detalles <i class="bi bi-bag-x-fill"></i>
                                        </button>
                                        <br>
                                        <br>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Eliminar <i class="bi bi-bag-x-fill"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url ?>usuario/loginroot" method="post">
                                                            <div class="mb-3 input-group">
                                                                Nombre
                                                                <input class="form-control text-center fs-4 " name="Name">
                                                            </div>
                                                            <div class="mb-3 input-group">
                                                                Contraseña
                                                                <input type="password" class="form-control rounded-start border-secondary" name="password">
                                                                <button type="submit" class="btn btn-outline-secondary"><i class="bi bi-arrow-right fs-5"></i></button>
                                                            </div>
                                                            <div class="mb-3 input-group">
                                                                <button type="submit" class="btn btn-outline-secondary"><i class="bi bi-arrow-right fs-5"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>