/*const formulario=document.getElementById('frmCliente');
const inputs=document.querySelectorAll('#frmCliente input');
const expresiones={
    texto: /^[a-zA-ZÀ-ÿ\s]{4,22}$/,
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	numero: /^[0-9]{8,14}$/    
}
const validarFormulario=(e)=>{
    switch (e.target.name){
        case "txtNombre":
            if(expresiones.texto.test(e.target.value)){
            }else{
                alert("Caracteres invalidos, debe agregar solo letras");
            }
        break;
        case "txtTelefono":
            if(expresiones.numero.test(e.target.value)){
                return true;
            }else{
                alert("Solo debe ingresar numeros");
                return false;
            }
        break;
    }
}
inputs.forEach((input)=>{
    input.addEventListener('keyup',validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit',(e)=>{
    e.preventDefault();
});*/
/*
function validarvacios(){
    var nombre=document.getElementById('nombre').value;
    var apellido=document.getElementById('apellido').value;
    var curp=document.getElementById('curp').value;
    var dir=document.getElementById('dir').value;
    var estado=document.getElementById('estado').value;
    var municipio=document.getElementById('muni').value;
    var telefono=document.getElementById('tel').value;
    var email=document.getElementById('email').value;
    var fecha=document.getElementById('fecha').value;
    var tipo=document.getElementById('tipo').value;
    if(nombre==="" || apellido==="" || curp==="" || dir==="" || estado==="" || municipio==="" || telefono==="" || email==="" || fecha==="" || tipo===""){
        alert ("Todos los campos son obligatorios");
        return false;
    }
                    }
*/