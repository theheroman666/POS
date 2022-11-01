<?php
if (isset($pro->Id)) { ?>
    <div class="container-fluid float-left titulo">
        <nav class="navbar">
            <div class="container">
                <a class="btn rounded-pill boton-back fs-5" href="<?= base_url ?>producto/gestion"><i class="bi bi-arrow-left-circle-fill"></i> Regresar</a>
            </div>
        </nav>
    </div>

    <h1 class="display-5 text-center titulo pb-3">Editar productos</h1>

    <form action="<?= base_url ?>producto/save&id=<?= $pro->Id ?>" method="POST" enctype="multipart/form-data" class="col-6 m-auto">
        <div class="row justify-content-center">
            <div class="mb-3 col-10">
                <label for="name" class="form-label fs-4 titulo">Nombre:</label>
                <input type="text" class="form-control parrafo" value="<?= isset($pro) && is_object($pro) ? $pro->Nombre : ''; ?>" name="nombre">
            </div>
            <div class="mb-3 col-5">
                <label for="name" class="form-label fs-4 titulo">Stock:</label>
                <input type="number" class="form-control parrafo" name="stock" value="<?= isset($pro) && is_object($pro) ? $pro->Stock : ''; ?>">
            </div>
            <div class="mb-3 col-5">
                <label for="name" class="form-label fs-4 titulo">Precio:</label>
                <input type="number" class="form-control parrafo" name="precio" value="<?= isset($pro) && is_object($pro) ? $pro->Precio : ''; ?>">
            </div>
            <div class="mb-3 col-10">
                <label for="name" class="form-label fs-4 titulo">Imagen:</label>
                <input type="file" class="form-control parrafo" name="imagen" value="<?= base_url . 'uploads/images/' . $pro->Imagen ?>">
                <input type="image" disabled src="<?= base_url . 'uploads/images/' . $pro->Imagen ?>" width="100px" height="80px" class="">
            </div>
            <div class="mt-3 col-4">
                <input type="submit" class="btn btn-outline-success form-control">
            </div>
        </div>
    </form>
<?php
} else {
    header('Location:' . base_url . 'Inventario/index');
}
?>