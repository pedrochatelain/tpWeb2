{literal}
<div id="template-vue-comentarios">
    <div v-for="comentario in comentarios" class="container comment">
        <div class="head_comment">
            <div class="usuario_comment">
                <h6>{{comentario.usuario}}</h6>
                <h6>Puntuación: {{comentario.puntuacion}}</h6>
            </div>
            <div v-show="user.administrador == 1" class="borrar_comentario">
                <a id="borrar_comentario" class="btn_borrar btn btn-danger"
                    :href="'api/comentario/borrar/' + comentario.id_comentario" role="button">
                    Borrar
                </a>
            </div>
        </div>
        <p class="container mensaje_comentario"> {{comentario.mensaje}}</p>
    </div>
</div>
{/literal}