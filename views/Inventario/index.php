<div class="container-fluid text-center">
    <div class="container">
        <h1 class="display-5 pt-3 titulo">Inventario</h1>
        <hr>
    </div>



    <div class="container-fluid text-center">
        <div class="row pt-3">
            <div class="col-7">

                <h5 class="titulo fs-3">Productos </h5>
                <!-- ELIMINAR PARA Comprobar Datos linea 52 hasta linea 73-->
                <div class="pt-3">
                    <div class="text-center container">
                        <div class="row justify-content-center">
                            <div class="col-11">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr class="row-cols-2 titulo">
                                            <th scope="col ">Producto</th>
                                            <th scope="col ">Comprar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="row-cols-2 parrafo">
                                            <td class="col">masa</td>
                                            <td class="col"><a class="btn"
                                                    style="background-color: #fff; border:1px solid black; color:#004000;">Agregar</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ELIMINAR PARA Comprobar Datos  -->
            </div>
            <div class="col-5 justify-content-center text-center" id="tablaCarrito">
                <h5 class="titulo fs-3">Lista</h5>
                <table class="table">
                    <div class="pt-3">
                        <thead class="table-dark">
                            <tr class="row row-cols-4">
                                <th class="col">Nombre</th>
                                <th class="col">Cantidad</th>
                                <th class="col">Precio</th>
                                <th class="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="row row-cols-4 parrafo">
                                <td class="col">masa</td>
                                <td class="col d-flex">
                                    <input class="form-control" value="12" style="width: 50px;">
                                    <select class="form-control form-select" style="font-size:15px" id="slct1"></select>
                                </td>
                                <td class="col">
                                    <input type="text" class="form-control" value="asd" style="width: 100px;">
                                </td>
                                <td class="col"><a class="btn btn-outline-danger rounded-pill"><i
                                            class="bi bi-trash3-fill"></i></a></td>
                            </tr>
                        </tbody>
                </table>
                <button type="submit" class="btn "
                    style="background-color: #fff; border:1px solid black; color:#004000;">Teminar</button>
            </div>
        </div>
    </div>
</div>
</div>

<script>
let select = ["kg", "pzs"];

let slct1 = document.getElementById("slct1");

select.forEach(function addOption(item) {
    let option = document.createElement("option");
    option.text = item;
    option.value = item;
    slct1.appendChild(option);
});
</script>