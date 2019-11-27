"use strict";
async function CargarPagina() {

    if (document.body.contains(document.getElementsByClassName("tabla_categorias")[0])) {
        //si existe la clase "tabla_categorias"...
        categorias();
    } else if (document.body.contains(document.getElementsByClassName("tabla_platos")[0])) {
        //si existe la clase "tabla_platos"...
        platos();
    } else if (document.body.contains(document.getElementsByClassName("tabla_usuarios")[0])) {
        //si existe la clase "tabla_usuarios"...
        usuarios();
    }

    function platos() {
        let cantInputs = 6;
        let titulo_editar = document.getElementsByTagName("tr")[0].getElementsByTagName("th")[6];
        let titulo_borrar = document.getElementsByTagName("tr")[0].getElementsByTagName("th")[7];
        let claseTabla = "tabla_platos";
        let claseInfo = "plato_info";
        setFuncionesBoton(cantInputs, titulo_editar, titulo_borrar, claseTabla, claseInfo);
    }

    function categorias() {
        let cantInputs = 2;
        let titulo_editar = document.getElementsByTagName("tr")[0].getElementsByTagName("th")[2];
        let titulo_borrar = document.getElementsByTagName("tr")[0].getElementsByTagName("th")[3];
        let claseTabla = "tabla_categorias";
        let claseInfo = "categoria_info";
        setFuncionesBoton(cantInputs, titulo_editar, titulo_borrar, claseTabla, claseInfo);
    }

    function usuarios() {
        let cantInputs = 1;
        let titulo_editar = document.getElementsByTagName("tr")[0].getElementsByTagName("th")[3];
        let titulo_borrar = document.getElementsByTagName("tr")[0].getElementsByTagName("th")[4];
        let claseTabla = "tabla_usuarios";
        let claseInfo = "user_info";
        setFuncionesBoton(cantInputs, titulo_editar, titulo_borrar, claseTabla, claseInfo);
    }

    function setFuncionesBoton(cantInputs, titulo_editar, titulo_borrar, claseTabla, claseInfo) {
        //le asigno a todos los botones "editar" varias funcionalidades
        let btn_editar = document.getElementsByClassName("btn_editar")[0];
        let btn_borrar = document.getElementsByClassName("btn_borrar")[0];
        let btn_cancelar = document.getElementsByClassName("btn_cancelar")[0];

        if (btn_editar) {
            btn_editar.addEventListener("click", function () { showInputs(claseTabla, claseInfo, cantInputs) });
            btn_editar.addEventListener("click", function () { llenarInputs(claseInfo, claseTabla, cantInputs) });
            btn_editar.addEventListener("click", function () { showBotonFinalizado(claseTabla) });
            btn_editar.addEventListener("click", function () { cambiarTitulos(btn_cancelar, btn_borrar, titulo_editar, titulo_borrar) });
        }
        if (btn_cancelar) {
            btn_cancelar.addEventListener("click", function () { cancelarEdicion(claseTabla, claseInfo, cantInputs) });
            btn_cancelar.addEventListener("click", function () { volverTitulos(btn_cancelar, btn_borrar, titulo_editar, titulo_borrar) });

        }
    }

    function volverTitulos(btn_cancelar, btn_borrar, titulo_editar, titulo_borrar) {
        titulo_editar.innerHTML = "Editar";
        titulo_borrar.innerHTML = "Borrar";
        btn_borrar.classList.remove("d-none");
        btn_cancelar.classList.add("d-none");
    }

    // esta funcion esconde los inputs que se habian generado al clickear "Editar"
    function cancelarEdicion(claseTabla, claseInfo, cantInputs) {
        document.getElementsByClassName(claseTabla)[0].getElementsByClassName("btn_editar")[0].classList.remove("d-none");
        document.getElementsByClassName(claseTabla)[0].getElementsByClassName("btn_finalizado")[0].classList.add("d-none");
        hideInputs(claseTabla, claseInfo, cantInputs);
        document.getElementsByClassName(claseTabla)[0].getElementsByClassName("btn_borrar")[0].classList.add("d-none");
        document.getElementsByClassName(claseTabla)[0].getElementsByClassName("btn_cancelar")[0].classList.remove("d-none");

    }

    function showInputs(claseTabla, claseInfo, cantInputs) {
        //esta funcion se encarga de mostrar los inputs en la fila correspondiente
        //y ocultando la informacion del plato o categoria correspondiente a la fila clickeada.
        for (let columna = 0; columna < cantInputs; columna++) {
            document.getElementsByClassName(claseTabla)[0].getElementsByClassName("input_editar")[columna].classList.remove("d-none");
            document.getElementsByClassName(claseTabla)[0].getElementsByClassName(claseInfo)[columna].classList.add("d-none");
        }
    }

    function hideInputs(claseTabla, claseInfo, cantInputs) {
        for (let columna = 0; columna < cantInputs; columna++) {
            document.getElementsByClassName(claseTabla)[0].getElementsByClassName("input_editar")[columna].classList.add("d-none");
            document.getElementsByClassName(claseTabla)[0].getElementsByClassName(claseInfo)[columna].classList.remove("d-none");
        }
    }

    function showBotonFinalizado(claseTabla) {
        //esta funcion muestra el boton "Finalizado" ocultando el boton "Editar"
        document.getElementsByClassName(claseTabla)[0].getElementsByClassName("btn_editar")[0].classList.add("d-none");
        document.getElementsByClassName(claseTabla)[0].getElementsByClassName("btn_finalizado")[0].classList.remove("d-none");
    }



    function cambiarTitulos(btn_cancelar, btn_borrar, thEditar, thBorrar) {
        //esta funcion se encarga de cambiar los th y el nombre de los botones de borrar y editar
        thEditar.innerHTML = "Finalizado";
        thBorrar.innerHTML = "Cancelar";
        btn_borrar.classList.add("d-none");
        btn_cancelar.classList.remove("d-none");
    }

    function llenarInputs(claseInfo, claseTabla, cantInputs) {
        // recorro todos los inputs del item seleccionado
        for (let columna = 0; columna < cantInputs; columna++) {
            // info : es el valor de la celda en la "columna" actual
            let info = document.getElementsByClassName(claseTabla)[0].getElementsByClassName
            (claseInfo)[columna].innerHTML;
            // input : es el input de la celda la "columna" actual
            let input = 
            document.getElementsByClassName(claseTabla)[0].getElementsByClassName("input_editar")[columna];
            if (input.nodeName == "SELECT") {
                // options: es la cantidad de "options" que tiene el SELECT
                let options = input.options.length;
                // recorro las opciones y si info = texto de la opcion actual, lo defino como selected
                for (let i = 0; i<options; i++) {
                    if(info.trim() == (input.options[i].text).trim()) {
                        input.selectedIndex = i;
                    }
                }
            }
            if (input.nodeName == "INPUT") {
                input.value = info;
            }
        }
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////

    let idFacebook = "facebook";
    let idInstagram = "instagram";
    let idTwitter = "twitter";
    let fbMouseOut = "images/facebook50x50.png";
    let igMouseOut = "images/instagram50x50.png";
    let twMouseOut = "images/twitter50x50.png";
    let fbMouseOver = "images/facebook50x50(cambiado).png";
    let igMouseOver = "images/instagram50x50(cambiado).png";
    let twMouseOver = "images/twitter50x50(cambiado).png";
    let facebook = document.getElementById("facebook");
    let twitter = document.getElementById("twitter");
    let instagram = document.getElementById("instagram");


    function cambiarIcono(redSocial, ubicacion) {
        //cambia el icono de la red social
        document.getElementById(redSocial).src = ubicacion;
    }

    facebook.addEventListener("mouseover", function () { cambiarIcono(idFacebook, fbMouseOver) });
    facebook.addEventListener("mouseout", function () { cambiarIcono(idFacebook, fbMouseOut) });
    instagram.addEventListener("mouseover", function () { cambiarIcono(idInstagram, igMouseOver) });
    instagram.addEventListener("mouseout", function () { cambiarIcono(idInstagram, igMouseOut) });
    twitter.addEventListener("mouseover", function () { cambiarIcono(idTwitter, twMouseOver) });
    twitter.addEventListener("mouseout", function () { cambiarIcono(idTwitter, twMouseOut) });
}
document.addEventListener("DOMContentLoaded", CargarPagina);