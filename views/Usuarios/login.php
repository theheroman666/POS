<?php if (isset($_SESSION['identity'])) 
{?>



<form action="<?= base_url?>usuario/login" method="post" class="m-auto">
    <div class="mb-3">
        <label for="Name" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="Name" id="">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Contraseña</label>
        <input type="password" class="form-control" name="password"">
    </div>
    <button type="submit" class="btn btn-success">Enviar</button>
</form>
<?php 
}