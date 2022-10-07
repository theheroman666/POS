var num1 = document.getElementById("total").value;
var num2 = document.getElementById("dinero");
var h3 = document.getElementById("h3");
num2.addEventListener("focusout", function () {
    let a = num2.value;
    let b = a - num1;
    if (b >= 0) {
        h3.innerText = `Cambio: $${b}`;
    } else {
        h3.innerText = `La Cantidad ingresada debe ser mayor al total`;

    }
});
