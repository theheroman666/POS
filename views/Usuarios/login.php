<?php if (!isset($_SESSION['identity'])) { ?>
    <div class="container overflow-hidden g-4 text-center pt-3">
        <h1 class="titulo">¿Quién va a usar el sistema?</h1>
        <hr>
        <br>

        <!-- <i class="bi bi-car-front "></i> -->
        <div class="row g-5 justify-content-center">
            <?php while ($items = $user->fetch_object()) { ?>

                
                <div class="pt-2 col-3 bg-light mx-2 titulo rounded-5 border-login users" ondblclick="(document.querySelector('#user<?=$items->id?>.d-none'))? mostrar(<?=$items->id?>) : ocultar(<?=$items->id?>)">

                    <input readonly disabled class="form-control text-center fs-4" id="Name" name="Name" style="background-color: rgba(240, 248, 255, 0); border: 0;" value="<?= $items->nombre ?>">
                    <div class="mb-3 pt-2">
                        <img src="<?= base_url ?>wwwroot/imgs/flautas.jpg" class="rounded-circle imagen">
                    </div>
                    <form class="d-none" id="user<?=$items->id?>" action="<?= htmlspecialchars(base_url . 'usuario/login') ?>" method="POST">
                        <div class="mb-3 input-group d-none" id="users<?=$items->id?>" >
                            <input readonly  class="form-control text-center fs-4 d-none" id="Name" name="Name" style="background-color: rgba(240, 248, 255, 0); border: 0;" value="<?= $items->nombre ?>">
                            <input type="password" class="form-control rounded-start border-secondary" name="password">
                            <button type="submit" class="btn btn-outline-secondary"><i class="bi bi-arrow-right fs-5"></i></button>
                        </div>
                    </form>
                </div>
            <?php } ?>
            <hr>
        </div>
    </div>

<?php
} else {
    header('Location:' . base_url);
?>


<?php }
