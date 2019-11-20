{include file= "templates/header.tpl"}

<div class="container">
    <h1 class="nuestros_platos">{$plato->nombre}</h1>
    <form action="editar/{$plato->id_plato}" method="post" autocomplete="off">
        <table>
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th>Vegetariano</th>
                    <th>TACC</th>
                    <th>Vegano</th>
                    <th>Precio</th>
                    {if $userAdmin == 1}
                    <th>Editar</th>
                    <th>Borrar</th>
                    {/if}
                </tr>
            </thead>
            <tbody id="tabla">
                <tr class='tabla_platos'>
                    <td>
                        <div class="plato_info tipo"> {$plato->tipo} </div>
                        <select class="input_editar d-none" name='id_categoria'>
                            {foreach from=$lista_categorias item=categoria}
                            <option value="{$categoria->id_categoria}">
                                {$categoria->tipo|upper}
                            </option>
                            {/foreach}
                        </select>
                    </td>
                    <td>
                        <div class="plato_info nombre_plato"> {$plato->nombre} </div>
                        <input class="input_editar d-none" name='nombre' type="text">
                    </td>
                    <td>
                        <div class="plato_info vegetariano"> {$plato->vegetariano} </div>
                        <select class="input_editar d-none" name='vegetariano'>
                            <option value="APTO">APTO</option>
                            <option value="NO APTO">NO APTO</option>
                        </select>
                    </td>
                    <td>
                        <div class="plato_info tacc"> {$plato->tacc} </div>
                        <select class="input_editar d-none" name='tacc'>
                            <option value="CONTIENE">CONTIENE</option>
                            <option value="NO CONTIENE">NO CONTIENE</option>
                        </select>
                    </td>
                    <td>
                        <div class="plato_info vegano"> {$plato->vegano} </div>
                        <select class="input_editar d-none" name='vegano'>
                            <option value="APTO">APTO</option>
                            <option value="NO APTO">NO APTO</option>
                        </select>
                    </td>
                    <td>
                        <div class="plato_info precio"> {$plato->precio} </div>
                        <input class="input_editar d-none" name='precio' type='number'>
                    </td>
                    {if $userAdmin == 1}
                    <td>
                        <input class="btn_editar btn btn-outline-light" value="Editar" type="button">
                        <input class="btn_finalizado btn btn-outline-light d-none" value="Finalizado" type="submit">
                    </td>
                    <td>
                        <a class="btn_borrar btn btn-outline-light" role="button"
                            href='borrar/{$plato->id_plato}'>Borrar
                        </a>
                        <input class="btn_cancelar btn btn-outline-light d-none" value="Cancelar" type="button">
                    </td>
                    {/if}
                </tr>


            </tbody>
        </table>
    </form>
    <div class="container">
        <h2>Promedio de puntuaciones: </h2>
    </div>
    <div class="container line"> </div>

    {if $userAdmin == 1}
    {include file = "form_image.tpl"}
    {/if}

    <div class="container comment_div">
        <h2>Imágenes</h2>
    </div>
    <div class="container line"> </div>
    {include file= "imagenes_plato.tpl"}

    <div class="container comment_div">
        <h2>Commentarios</h2>
    </div>
    <div class="container line"> </div>
    {include file="form_comment.tpl"}
    <div class="comments container">
        {include file="comentarios.tpl"}
    </div>
</div>

{include file= "templates/footer.tpl"}