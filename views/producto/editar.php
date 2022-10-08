<?php
if (isset($pro->Id)) { ?>


    <form action="<?= base_url ?>producto/save&id=<?= $pro->Id ?>" method="POST" enctype="multipart/form-data" class="col-6 m-auto">

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" value="<?= isset($pro) && is_object($pro) ? $pro->Nombre : ''; ?>" name="nombre">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Stock</label>
            <input type="number" class="form-control" name="stock" value="<?= isset($pro) && is_object($pro) ? $pro->Stock : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Imagen</label>
            <input type="file" class="form-control" name="imagen" value="<?= base_url . 'uploads/images/' . $pro->Imagen ?>">
            <input type="image" disabled src="<?= base_url . 'uploads/images/' . $pro->Imagen ?>" width="150px" height="150px">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Precio</label>
            <input type="number" class="form-control" name="precio" value="<?= isset($pro) && is_object($pro) ? $pro->Precio : ''; ?>">
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-outline-success form-control">
        </div>

    </form>
<?php
} else {
    header('Location:' . base_url . 'Inventario/index');
}
?>