<div class="container-fluid float-left titulo">
    <nav class="navbar">
        <div class="container">
            <a class="btn rounded-pill boton-back fs-5" href="<?= base_url ?>producto/gestion"><i class="bi bi-arrow-left-circle-fill"></i> Regresar</a>
        </div>
    </nav>
</div>
<h1 class="text-center display-5 titulo ">Agregar producto</h1>
<div class="container-fluid titulo">
    <form action="<?= base_url ?>producto/save" method="POST" enctype="multipart/form-data" class="col-6 m-auto">
        <div class="row justify-content-center">
            <div class="mb-2 col-10">
                <label for="name" class="form-label fs-4">Nombre:</label>
                <input type="text" class="form-control parrafo" name="nombre">
            </div>
            <div class="mb-2 col-5">
                <label for="name" class="form-label fs-4">Stock:</label>
                <input type="number" class="form-control parrafo" name="stock">
            </div>
            <div class="mb-2 col-5">
                <label for="name" class="form-label fs-4">Precio al público:</label>
                <input type="number" class="form-control parrafo" name="precio">
            </div>
            <div class="mb-3 col-10">
                <label for="name" class="form-label fs-4">Imagen:</label>
                <input type="file" class="form-control parrafo" name="imagen">
            </div>
            <div class="col-3 m-auto pt-3">
                <input type="submit" class="btn col-6 m-auto btn-outline-success form-control fs-5" value="Crear">
            </div>
        </div>
    </form>
</div>