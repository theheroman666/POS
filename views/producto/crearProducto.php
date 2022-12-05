<div class="container-fluid float-left titulo">
    <nav class="navbar">
        <div class="container">
            <a class="btn rounded-pill boton-back fs-5" href="<?= base_url ?>producto/gestion"><i class="bi bi-arrow-left-circle-fill"></i> Regresar</a>
        </div>
    </nav>
</div>
<h1 class="text-center display-5 titulo ">Producto</h1>
<div class="container-fluid titulo">
    <form action="<?= base_url ?>producto/save" method="POST" enctype="multipart/form-data" class="col-6 m-auto">
        <div class="row justify-content-center">
            <div class="mb-2 col-10">
                <label for="name" class="form-label fs-4">Nombre:</label>
                <input type="text" class="form-control parrafo" list="nombre" id="name" name="nombre">
            </div>
            <div class="col-3 m-auto pt-3">
                <input type="submit" class="btn col-6 m-auto btn-outline-success form-control fs-5" value="Crear">
            </div>
        </div>
    </form>
</div>