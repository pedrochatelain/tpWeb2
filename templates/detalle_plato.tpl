{include file= "templates/header.tpl"}

<div class="container">
    <h1 class="nuestros_platos">{$plato->nombre}</h1>
    <input type="hidden" id="id_plato" name="id_plato" value="{$plato->id_plato}">
    {include file = "plato_editar.tpl"}
    <div class="container">
        <h2>Promedio de puntuaciones: {$prom_puntuacion}</h2>
    </div>
    <div class="container line"> </div>
    {if $userAdmin == 1}
    {include file = "plato_add_image.tpl"}
    {/if}
    <div class="container comment_div">
        <h2>Imágenes</h2>
    </div>
    <div class="container line"> </div>
    {include file= "plato_imagenes.tpl"}
    <div class="container comment_div">
        <h2>Commentarios</h2>
    </div>
    <div class="container line"> </div>
    {include file="plato_comentar.tpl"}
    <div class="comments container">
        {include file="vue/comentarios.tpl"}
    </div>
</div>

{include file= "templates/footer.tpl"}