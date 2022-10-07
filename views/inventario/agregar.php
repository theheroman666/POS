<!doctype html>
<html lang="en">

<head>
    <title>Agregar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body>
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>