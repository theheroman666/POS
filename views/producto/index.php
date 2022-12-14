<div class="container-fluid text-center">
    <div class="container titulo">
        <h1 class="display-5">Inventario de productos</h1>
        <hr>
        <div>
            <a type="submit" class="btn" style="color: #005000; border:1px solid black;" href="<?= base_url . 'producto/crear' ?>">Agregar</a>
        </div>
    </div>

    <div class="text-center container pt-2">
        <div class="row justify-content-center">
            <div class="col-10">
                <table class="table table-striped">
                    <thead class="table table-dark">
                        <tr class="row-cols-6 titulo">
                            <th scope="col">Imagen</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Costo</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($items = $productos->fetch_object()) { ?>
                            <tr class="row-cols-6 parrafo">
                                <td classs="col"><img width="75px" height="55px" class="rounded" src="<?= base_url . 'uploads/images/' . $items->Imagen ?>"></td>
                                <td classs="col" style="padding-top: 20px;"><?= $items->Nombre ?></td>
                                <td classs="col" style="padding-top: 20px;"><?= $items->Stock ?></td>
                                <td classs="col" style="padding-top: 20px;"><?= $items->Precio ?></td>
                                <td classs="col" style="padding-top: 15px;">

                                    <?php if (isset($_SESSION['auth']) || isset($_SESSION['admin'])) { ?>
                                        <a class="btn" style="background-color: #ff5e00d7; border: 0;" href="<?= base_url . 'producto/editar&id=' . $items->Id ?>">Editar</a>

                                    <?php
                                        unset($_SESSION['auth']);
                                    } else { ?>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Editar
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
                                                                Contrase??a
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
                                    <a class="btn bi bi-trash3-fill" style="background-color: #fff; border:1px solid black;" href="<?= base_url . 'producto/eliminar&id=' . $items->Id ?>">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>