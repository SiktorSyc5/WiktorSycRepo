function czerwony() {
    document.querySelector('#wynik').style.color = 'red';
    ustawRozmiar();
}

function zielony() {
    document.querySelector('#wynik').style.color = 'green';
    ustawRozmiar();
}

function niebieski() {
    document.querySelector('#wynik').style.color = 'blue';
    ustawRozmiar();
}

const rozmiar = document.querySelector('#rozmiar');
const lista = document.querySelector('#lista');

let przycisnietyKlawisz = document.querySelectorAll('button[type="submit"]');

Array.from(przycisnietyKlawisz).forEach(element => {
    element.addEventListener('click', ustawRozmiar);
});

function ustawRozmiar() {
    document.querySelector('#wynik').style.fontSize = `${rozmiar.value}%`;
    document.querySelector('#wynik').style.fontStyle = lista.value;
}