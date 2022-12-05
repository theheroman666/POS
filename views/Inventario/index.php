<div class="container-fluid text-center">
    <div class="container">
        <h1 class="display-5 pt-3 titulo">Inventario</h1>
        <hr>
    </div>



    <div class="container-fluid text-center">
        <div class="row pt-3">
            <div class="col-5">

                <h5 class="titulo fs-3">Productos </h5>
                <!-- ELIMINAR PARA Comprobar Datos linea 52 hasta linea 73-->
                <div class="pt-3">
                    <div class="text-center container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr class="row-cols-2 titulo">
                                            <th scope="col ">Imagen</th>
                                            <th scope="col ">Nombre</th>
                                            <th scope="col ">Acccion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($items = $productos->fetch_object()) {
                                        ?>

                                            <tr class="row-cols-2 parrafo">
                                                <td><img src="<?= base_url . 'uploads/images/' . $items->Imagen ?>" class="img img-fluid" width="75" alt="..."></td>
                                                <td class="col"><?= $items->Nombre ?></td>
                                                <td class="col">
                                                    <a class="btn titulo ajax" style="background-color: #fff; border:1px solid black; color:#004000;" onclick="ajax(<?= $items->Id ?>)">
                                                        <!-- <a class="nav-link titulo" href="<?= base_url . 'carrito/add&id=' . $items->Id ?>"> -->
                                                        Agregar
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ELIMINAR PARA Comprobar Datos  -->
            </div>
            <div class="col-7 justify-content-center text-center" id="tablaCarrito">
                <h5 class="titulo fs-3">Lista</h5>
                <?php
                $carritoinv = new carritoInvController();
                $carritoinv->indexMenu();
                ?>
            </div>
        </div>
    </div>
</div>
</div>

<!-- <script>
let select = ["kg", "pzs"];

let slct1 = document.getElementById("slct1");

select.forEach(function addOption(item) {
    let option = document.createElement("option");
    option.text = item;
    option.value = item;
    slct1.appendChild(option);
});
</script> -->
<script>
    function ajax(id) {
        let xhttp = new XMLHttpRequest();
        xhttp.open("POST", "<?= base_url ?>carritoInv/add&id=" + id);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send();
        xhttp.onload = function() {
            if (xhttp.status == 200) {
                console.log(xhttp.status);
                let carrito = document.querySelector("#tablaCarrito");
                // carrito.innerHTML = xhttp.responseText;
                // console.log(xhttp.responseText);
                location.reload();
            }
        };
    }
</script>