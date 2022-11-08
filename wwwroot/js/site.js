

function mostrar(id){
    let mostrarId = document.getElementById("user"+id);
    let mostrar = document.getElementById("users"+id);
    console.log(mostrar+mostrarId);
    if (mostrarId != id) {
        mostrarId.classList.remove("d-none");
        mostrar.classList.remove("d-none");
        console.error();
    }
    console.error();

}

function ocultar(id){
    let mostrarId = document.getElementById("user"+id);
    let mostrar = document.getElementById("users"+id);
    if (mostrarId != id) {
        mostrarId.classList.add("d-none");
        mostrar.classList.add("d-none");
    }

}