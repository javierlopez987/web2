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
    async function calcular(e) {
        e.preventDefault();
        
        let b = parseInt(document.querySelector("#num1").value);
        if(e.srcElement.id == "btnSumar") {
            console.log(a + b);
            a = await sumar(a, b);
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
        console.log("Muestro: " + a);
        mostrarResultado(a);
    }


    let URL = "http://localhost/web2/tp/tp1-5_calculadora/";
    async function sumar(a, b) {
        try {
            console.log(URL + "calculadoraSuma.php?a=" + a + "&b=" + b);
            let response = await fetch (URL + "calculadoraSuma.php?a=" + a + "&b=" + b);
            console.log(response);
            if(response.ok) {
                let texto = await response.text();
                console.log(parseInt(texto));
                return parseInt(texto);
            } else {
                console.log("<h1>Error - Failed URL!</h1>");
                return -1;
            }
        } catch (error) {
            console.log(error);
        }
    }

    async function restar(a, b) {
        return a - b;
    }
    
    async function multiplicar(a, b) {
        return a * b;
    }

    async function dividir(a, b) {
        return a / b;
    }

})