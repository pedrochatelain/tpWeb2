{foreach from=$comentarios item=comentario}
<div class="container comment">
    <div class="head_comment">
        <div class="usuario_comment">
            <h6>Usuario: {$comentario->usuario}</h6>
        </div>
        {if $userAdmin == 1}
        <div class="borrar_comentario">
            <input type="submit" value="Borrar" class="btn_borrar_comment btn btn-danger"></input>
        </div>
        {/if}
    </div>
    <p class="container"> {$comentario->mensaje}</p>
</div>
{/foreach}