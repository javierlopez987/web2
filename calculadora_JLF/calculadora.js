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
        
        let b = parseFloat(document.querySelector("#num1").value);
        if((b < 0) || (b >= 0)) {
            if(e.srcElement.id == "btnSumar") {
                a = await sumar(a, b);
            }else if (e.srcElement.id == "btnRestar"){
                a = await restar(a, b);
            } else if (e.srcElement.id == "btnMultiplicar") {
                a = await multiplicar(a, b);
            } else if (e.srcElement.id == "btnDividir") {
                a = await dividir(a, b);
            }
            console.log(a);
            mostrarResultado(a); // Duda si el mostrarResultado debe ser esperar (await), por si el servidor tarda y no devuelve respuesta inmediatamente
        } else {
            mostrarResultado("Ingrese un número");
        }
    }


    let URL = "http://localhost/web2/tp/tp1-5_calculadora/";
    async function sumar(a, b) {
        try {
            console.log(URL + "calculadoraSuma.php?a=" + a + "&b=" + b);
            let response = await fetch (URL + "calculadoraSuma.php?a=" + a + "&b=" + b);
            console.log(response);
            if(response.ok) {
                let texto = await response.text();
                return parseFloat(texto);
            } else {
                console.log("<h1>Error - Failed URL!</h1>");
                return -1;
            }
        } catch (error) {
            console.log(error);
        }
    }

    async function restar(a, b) {
        try {
            console.log(URL + "calculadoraResta.php?a=" + a + "&b=" + b);
            let response = await fetch (URL + "calculadoraResta.php?a=" + a + "&b=" + b);
            console.log(response);
            if(response.ok) {
                let texto = await response.text();
                return parseFloat(texto);
            } else {
                console.log("<h1>Error - Failed URL!</h1>");
                return -1;
            }
        } catch (error) {
            console.log(error);
        }
    }
    
    async function multiplicar(a, b) {
        try {
            console.log(URL + "calculadoraProducto.php?a=" + a + "&b=" + b);
            let response = await fetch (URL + "calculadoraProducto.php?a=" + a + "&b=" + b);
            console.log(response);
            if(response.ok) {
                let texto = await response.text();
                return parseFloat(texto);
            } else {
                console.log("<h1>Error - Failed URL!</h1>");
                return -1;
            }
        } catch (error) {
            console.log(error);
        }
    }

    let phpDivision = "calculadoraDivision.php";
    async function dividir(a, b) {
        try {
            console.log(URL + phpDivision + "?a=" + a + "&b=" + b);
            let response = await fetch (URL + phpDivision + "?a=" + a + "&b=" + b);
            console.log(response);
            if(response.ok) {
                let texto = await response.text();
                return parseFloat(texto);
            } else {
                console.log("<h1>Error - Failed URL!</h1>");
                return -1;
            }
        } catch (error) {
            console.log(error);
        }
    }

})