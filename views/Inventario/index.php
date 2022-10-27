<div class="container-fluid text-center">
  <div class="d-flex">
    <nav class="container-fluid cabecera">
      <div class="container float-start">
        <a class="btn rounded-pill boton-back titulo"><i class="bi bi-arrow-left-circle-fill"></i>Regresar</a>
      </div>
    </nav>
  </div>





  <div class="container">
    <h1 class="display-5 titulo">Inventario proveedores</h1>
    <hr>
  </div>



  <div class="container-fluid text-center">
    <div class="row pt-3">
      <div class="col-7">
        <!-- ELIMINAR PARA Comprobar Datos linea 52 hasta linea 73-->
        <div class="pt-2">
          <div class="text-center container">
            <div class="row justify-content-center">
              <div class="col-11">
                <table class="table">
                  <thead class="table-secondary">
                    <tr class="row-cols-2 titulo">
                      <th scope="col ">Producto</th>
                      <th scope="col ">Cantidad comprada (pesos)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="row-cols-2 parrafo">
                      <td class="col">masa</td>
                      <td class="col"><a class="btn btn-outline-dark rounded-pill">Agregar</a>
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
        <h5>Lista</h5>
        <table class="table">
          <thead class="table-light">
            <tr class="row row-cols-4">
              <th class="col">Nombre</th>
              <th class="col">Cantidad</th>
              <th class="col">Precio</th>
              <th class="col">Borrar</th>
            </tr>
          </thead>
          <tbody>
            <tr class="row row-cols-4 parrafo">
              <td class="col">masa</td>
              <td class="col d-flex">
                <input type="text" class="form-control" value="12" style="width: 70px;">
                <div class="dropdown" style="width: 5px;">
                  <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
                  <ul class="dropdown-menu menuMedidas text-center">
                    <li><a class="dropdown-item" href="#">Kg</a></li>
                    <li><a class="dropdown-item" href="#">Pzs</a></li>
                  </ul>
                </div>
              </td>
              <td class="col">
                <input type="text" class="form-control" value="asd" style="width: 100px;">
              </td>
              <td class="col"><a class="btn btn-outline-danger rounded-pill"><i class="bi bi-trash3-fill"></i></a></td>
            </tr>
          </tbody>
        </table>
        <button type="submit" class="btn btn-outline-success rounded-pill">Teminar</button>
      </div>
    </div>
  </div>
</div>