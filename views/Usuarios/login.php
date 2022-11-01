<?php if (!isset($_SESSION['identity'])) { ?>
    <div class="container overflow-hidden g-4 text-center pt-3">
        <h1 class="titulo">¿Quién va a usar el sistema?</h1>
        <hr>
        <div class="row g-5 justify-content-center">
            <?php while ($items = $user->fetch_object()) { ?>
                <form action="<?= htmlspecialchars(base_url . 'usuario/login') ?>" method="POST" class="btn col-3 bg-light titulo rounded-5" id="hola123">
                    <div class="pt-2"></div>
                    <label readonly disabled class="form-control text-center fs-4" id="input1" style="background-color: rgba(240, 248, 255, 0); border: 0;"><?= $items->nombre ?></label>
                    <input value="<?= $items->nombre ?>" name="Name" class="visually-hidden">
                    <div class="mb-3 pt-2">
                        <img src="<?= base_url ?>wwwroot/imgs/flautas.jpg" class="rounded-circle imagen">
                    </div>
                    <div class="mb-3 input-group" id="contraseñas">
                        <input type="password" class="form-control rounded-start border-secondary" name="password">
                        <button type="submit" class="btn btn-outline-secondary"><i class="bi bi-arrow-right fs-5"></i></button>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>

<?php
} else {
    header('Location:' . base_url);
?>


<?php }
