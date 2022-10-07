<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body>
    <?php if (isset($pro->Id)) { ?>
        <form action="<?= base_url ?>Inventario/save&id=<?= $pro->Id ?>" method="POST" enctype="multipart/form-data" class="col-6 m-auto">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" value="<?= isset($pro) && is_object($pro) ? $pro->Nombre : ''; ?>" name="nombre">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Precio</label>
                <input type="number" class="form-control" name="precio" value="<?= isset($pro) && is_object($pro) ? $pro->Precio : ''; ?>">
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
                <label for="name" class="form-label">Costo de materia prima </label>
                <input type="number" class="form-control" name="CostoM" value="<?= isset($pro) && is_object($pro) ? $pro->Costo : ''; ?>">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-outline-success form-control" >
            </div>
        </form>
    <?php } else {
        header('Location:' . base_url . 'inventario/index');
    } ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>