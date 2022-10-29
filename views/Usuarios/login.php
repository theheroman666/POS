<?php if (!isset($_SESSION['identity'])) { ?>
    <div class="container overflow-hidden g-4 text-center">
        <h1 class="titulo">¿Quién va a usar el sistema?</h1>
        <hr>

        <div class="row g-5 justify-content-center">
            <?php while ($items = $user->fetch_object()) { ?>
                <form action="<?= htmlspecialchars(base_url . 'usuario/login') ?>" method="POST" class="btn col-2  contenedores titulo rounded-5">
                    <hr>
                    <input readonly class="form-control visually-hidden" name="Name" value="<?= $items->nombre ?>">
                    <input readonly disabled class="form-control" name="Name" value="<?= $items->nombre ?>">
                    <div class="mb-3">
                        <img src="<?= base_url ?>wwwroot/imgs/flautas.jpg" class="rounded-circle imagen">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn">Enviar</button>
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
