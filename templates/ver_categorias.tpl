{include file="header.tpl"}

    <div class="container">

        <h1 class="nuestros_platos">Categorias</h1>
        <table>
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Detalle</th>
                    {if $userAdmin == 1}
                    <th>Borrar</th>
                    {/if}
                </tr>
            </thead>
            <tbody id="tabla">
                {foreach from=$lista_categorias item=categoria}
                <tr class='tabla_categorias'>
                    <td>
                        <div class="categoria_info"> {$categoria->tipo} </div>
                        <input class="input_editar d-none" name='tipo' size='4px'>
                    </td>
                    <td>
                        <a href="categorias/{$categoria->id_categoria}"><input class="btn btn-outline-light"
                                value="Detalle" type="button">
                    </td>
                    {if $userAdmin == 1}
                    <td>
                        <a class="btn_borrar btn btn-outline-light" role="button"
                            href='categorias/borrar/{$categoria->id_categoria}'>Borrar</a>
                    </td>
                    {/if}
                </tr>
                {/foreach}
            </tbody>
        </table>

        {if $userAdmin == 1}
        <div class="form_agregar">
            <div class="formPlatos">
                <h1 class="agregar_plato">Agregar categoria</h1>
                <form action="categorias/insertar" method="post" autocomplete="off">
                    <h2>Tipo</h2>
                    <input type="text" name="tipo">
                    <h2>Descripcion</h2>
                    <input type="text" name="descripcion">
                    <input class="btn_agregar" value="Agregar" type="submit">
                </form>
            </div>
        </div>
        {/if}


        <div class="imgplatos">
            <img class="dishpice" src="images/ewal.jpg" alt="Ensalada Waldorf">
            <img class="dishpicpp" src="images/mave.jpg" alt="Mayonesa de Ave">
            <img class="dishpicpo" src="images/pfru.jpg" alt="Postre de Frutas">
        </div>

    </div>

    {include file="footer.tpl"}