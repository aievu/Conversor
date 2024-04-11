let valoresConversao = {
    Real: {
        Dolar: 0.27,
        Euro: 0.18
    },
    Dolar: {
        Real: 5.03,
        Euro: 1.09
    },
    Euro: {
        Real: 5.27,
        Dolar: 0.92
    }
}

function converter() {
let valorUsuario = document.getElementById("ValorUsuario").value;

let moeda1 = document.getElementById("moeda1").value;
let moeda2 = document.getElementById("moeda2").value;

let conversao = valorUsuario * valoresConversao[moeda1][moeda2];

let resultado = document.getElementById("resultado");
resultado.textContent = "Resultado: " + (conversao).toFixed(2);

console.log(conversao);
};