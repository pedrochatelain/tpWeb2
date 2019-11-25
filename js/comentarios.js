"use strict";
async function CargarPagina() {
  // event listeners

  if (document.querySelector("#template-vue-comentarios")) {
    getComentarios();
  }
  if (document.querySelector("#form_comment")) {
    document
      .querySelector("#form_comment")
      .addEventListener("submit", addComentario);
  }

  // define la app Vue
  let app = new Vue({
    el: "#template-vue-comentarios",
    data: {
      comentarios: [],
      user: []
    }
  });

  function getUsuarios() {
    fetch("api/usuario")
      .then(response => response.json())
      .then(usuario => {
        app.user = usuario;
        console.log(usuario);
      })
      .catch(error => console.log(error));
  }

  /**
   * Obtiene la lista de tareas de la API y las renderiza con Vue.
   */
  function getComentarios() {
    let id_plato = document.querySelector("#id_plato").value;
    fetch("api/comentarios/" + id_plato)
      .then(response => response.json())
      .then(comentarios => {
        app.comentarios = comentarios; // similar a $this->smarty->assign("tasks", $tasks)
      })
      .then(response => {
        asignarBorrar();
        getUsuarios();
      })
      .catch(error => console.log(error));
  }

  /**
   * le asigno a todos los comentarios la posibilidad de borrarse
   */
  function asignarBorrar() {
    let borrar_comment = document.querySelectorAll("#borrar_comentario");
    // cuento la cantidad de veces que se encuentra el id "borrar_comentario"
    let cant_comentarios = $("a[id^=borrar_comentario]").length;
    /**
     * Para prevenir que al clickear "Borrar" se redirija
     * al href: 'api/comentario/borrar/' + comentario.id_comentario',
     * uso event.preventDefault() en cada uno de los botones.
     */
    for (let fila = 0; fila < cant_comentarios; fila++) {
      borrar_comment[fila].addEventListener("click", event => {
        event.preventDefault();
        deleteComentario(fila);
      });
    }
  }

  function deleteComentario(fila) {
    let url = document.querySelectorAll("a[id=borrar_comentario]")[fila].href;
    fetch(url, {
      method: "DELETE"
    })
      .then(response => {
        getComentarios();
      })
      .catch(error => console.log(error));
  }

  /**
   * Inserta una tarea usando la API REST.
   */
  function addComentario(e) {
    e.preventDefault();
    let mensaje = document.querySelector("textarea[name=mensaje]");
    let puntuacion = document.querySelector("select[name=puntuacion]");
    let data = {
      usuario: document.querySelector("input[name=username]").value,
      mensaje: mensaje.value,
      puntuacion: puntuacion.value,
      id_plato: document.querySelector("input[name=id_plato]").value
    };
    fetch("api/comentar/" + id_plato, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data)
    })
      .then(response => {
        mensaje.value = "";
        puntuacion.value = "Puntuación";
        getComentarios();
      })
      .catch(error => console.log(error));
  }


}
document.addEventListener("DOMContentLoaded", CargarPagina);
