document.addEventListener("DOMContentLoaded", function() {
    let container = document.querySelector(".formContainer");
    let URL = "http://localhost/web2/dev/tp1-7_Inputs/main.php"
    
    document.querySelector("#btnNum").addEventListener("click", (e) => {
        e.preventDefault();
        
        let num = document.querySelector("#numInputs").value;
        for (let i = 0; i < num; i++) {
            let n = document.createElement("input");
            container.appendChild(n);
            n.name = "inputs[]";
        }   
        let btn = document.createElement("button");
        container.appendChild(btn);
        btn.innerHTML = "Enviar";
    })

})