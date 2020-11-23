let boton = document.getElementById("botonResponsive")

let menu = document.getElementById("listBarMenu")


    window.addEventListener("resize",function(){
        if(menu.style.display == "none" && screen.width > 700 ){
            menu.style.display = "flex"
        }

        if(screen.width < 700 ){
            menu.style.display = "none"
        }

    })


    boton.addEventListener("click",function(evento){


        if(menu.style.display == "flex"){
            menu.style.display="none"
        }
        else{
            menu.style.display="flex"
        }
    } )
 

