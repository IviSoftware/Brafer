let id = document.getElementById('empleadoID');
let nombre = document.getElementById('empleadoNombre');
let apellido = document.getElementById('empleadoApellido')

function soloLetras(e) {
    var key = e.keyCode || e.which,
      
    tecla = String.fromCharCode(key).toLowerCase(), /* obteniene el caracter presionado 
    por el usuario que añadiendo la sentencia toLowerCase() convertiríamos la letra a minúscula. 
    Con esto guardamos la letra presionada por el usuario en la variable tecla  */ 


    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz", //las letras permitidas por nosotros. 
      
    especiales = [8, 37, 39, 46],
    tecla_especial = false;

    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (letras.indexOf(tecla) == -1 ) {  //l condicional retorna falso si la tecla presionada no está en la lista de letras permitidas hecha por nosotros 
      return false;
    }
  }