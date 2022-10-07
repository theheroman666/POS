<form action="<?= base_url ?>Inventario/save" method="post" enctype="multipart/form-data" class="col-6 m-auto">
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Precio al publico</label>
        <input type="number" class="form-control" name="precio">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Stock</label>
        <input type="number" class="form-control" name="stock">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Imagen</label>
        <input type="file" class="form-control" name="imagen">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Costo de materia prima </label>
        <input type="number" class="form-control" name="CostoM">
    </div>
    <div class="mb-3 col-6 m-auto">
        <input type="submit" class="btn col-6 m-auto btn-outline-success form-control">
    </div>
</form>