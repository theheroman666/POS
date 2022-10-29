/* -----Login: mostrar inut de contraseñas------ */
var psw = document.getElementById('contraseñas'),
asd = document.getElementById('hola123'),
contador = 0;

function holaa() {
    if (contador == 0) {
        setTimeout (() => {
            console.log('1');
            psw.style.visibility = "visible";
            contador = 1;
        }, 100)
    } else {
        console.log('0');
        psw.style.visibility = "hidden";
        contador = 0;
    }
}

asd.addEventListener('click', holaa, true );

