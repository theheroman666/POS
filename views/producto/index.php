
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
                                    <a class="btn" style="background-color: #ff5e00d7; border: 0;" href="<?= base_url . 'producto/editar&id=' . $items->Id ?>">Editar</a>
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