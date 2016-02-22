
function conMayusculas(field) {
    field.value = field.value.toUpperCase()
}


    function validar_letras(e)
    {
        tecla=(document.all)?e.keyCode:e.which;
        patron=/[A-Z a-z áéíóú]/;
        te=String.fromCharCode(tecla);
        return patron.test(te);
    } 

function soloNumeros(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789";
    especiales = "8-37-39-46";

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function nobackbutton(){
 window.location.hash="no-back-button";
 window.location.hash="Again-No-back-button" //chrome
 window.onhashchange=function(){window.location.hash="no-back-button";}
}