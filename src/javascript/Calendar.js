var elDate = document.getElementById('infechaini');
var elForm = document.getElementById('elForm');
var elSubmit = document.getElementById('elSubmit');

function sinDomingos() {
    var day = new Date(elDate.value).getUTCDay();
    // Días 0-6, 0 es Domingo 6 es Sábado
    elDate.setCustomValidity(''); // limpiarlo para evitar pisar el fecha inválida
    if (day == 0) {
        elDate.setCustomValidity('Domingos no disponibles, por favor seleccione otro día');
    } else {
        elDate.setCustomValidity('');
    }
    if (!elForm.checkValidity()) { elSubmit.click() };
}

function obtenerfechafinf1() {
    sinDomingos();
}