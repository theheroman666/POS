
    <div class="col-6 m-auto">
        <form action="<?= base_url ?>usuario/save" method="post" class="m-auto">
            <div class="mb-3">
                <label for="Name" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="Name" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password"">
        </div>
        <div class=" mb-3">
                <label for="" class="form-label">Rol</label>
                <select name="rol" class="form-select">
                    <?php while ($items = $rol->fetch_object()) { ?>
                        <option value="<?= $items->Id ?>"><?= $items->Nombre ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3 m-auto text-center">
                <button type=" submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
    </div>
