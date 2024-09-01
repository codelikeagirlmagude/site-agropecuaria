// Definindo a data da feira de carne
var feiraData = new Date("Nov 2, 2024 00:00:00").getTime();

// Atualizando a contagem regressiva a cada segundo
var countdownFunction = setInterval(function() {
    var now = new Date().getTime();
    var distancia = feiraData - now;

    // Calculando os dias, horas, minutos e segundos restantes
    var dias = Math.floor(distancia / (1000 * 60 * 60 * 24));
    var horas = Math.floor((distancia % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutos = Math.floor((distancia % (1000 * 60 * 60)) / (1000 * 60));
    var segundos = Math.floor((distancia % (1000 * 60)) / 1000);

    // Exibindo o resultado no elemento com id="countdown"
    document.getElementById("countdown").innerHTML = dias + "d " + horas + "h " + minutos + "m " + segundos + "s ";

    // Se a contagem terminar, exibe uma mensagem
    if (distancia < 0) {
        clearInterval(countdownFunction);
        document.getElementById("countdown").innerHTML = "Feira já começou!";
    }
}, 1000);
