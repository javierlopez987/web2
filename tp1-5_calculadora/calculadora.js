document.addEventListener("DOMContentLoaded", function() {

    document.querySelector("#btnSumar").addEventListener("click", calcular);
    document.querySelector("#btnRestar").addEventListener("click", calcular);
    document.querySelector("#btnMultiplicar").addEventListener("click", calcular);
    document.querySelector("#btnDividir").addEventListener("click", calcular);

    let resultado = document.querySelector("#resultado");
    console.log(resultado);
    function mostrarResultado(a) {
        resultado.innerHTML = a;
    }

    let a = 0;
    function calcular(e) {
        e.preventDefault();
        
        let b = parseInt(document.querySelector("#num1").value);
        if(e.srcElement.id == "btnSumar") {
            console.log(a + b);
            a = sumar(a, b);
        }else if (e.srcElement.id == "btnRestar"){
            console.log(a - b);
            a = restar(a, b);
        } else if (e.srcElement.id == "btnMultiplicar") {
            console.log(a * b);
            a = multiplicar(a, b);
        } else if (e.srcElement.id == "btnDividir") {
            console.log(a / b);
            a = dividir(a, b);
        }
        mostrarResultado(a);
    }

    function sumar(a, b) {
        return a + b;
    }

    function restar(a, b) {
        return a - b;
    }
    
    function multiplicar(a, b) {
        return a * b;
    }

    function dividir(a, b) {
        return a / b;
    }

})