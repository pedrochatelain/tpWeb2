{include file="header.tpl"}

    <div class="container">

        <h1 class="nuestros_platos">Nuestros Platos</h1>
        <table>
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th>Detalle</th>
                    {if $userAdmin == 1}
                        <th>Borrar</th>
                    {/if}
                </tr>
            </thead>
            <tbody id="tabla">
                {foreach from=$lista_platos item=plato}
                <tr class='tabla_platos'>
                    <td>
                        <div class="plato_info tipo"> {$plato->tipo} </div>
                        <select class="input_editar d-none">
                            {foreach from=$lista_categorias item=categoria}
                            <option value="{$categoria->id_categoria}" selected="selected"> {$categoria->tipo|upper}
                            </option>
                            {/foreach}
                        </select>
                    </td>
                    <td>
                        <div class="plato_info nombre_plato"> {$plato->nombre} </div>
                        <input class="input_editar d-none" size='4px'>
                    </td>

                    <td>
                        <a href="platos/{$plato->id_plato}"><input class="btn btn-outline-light" value="Detalle"
                                type="button"></a>
                    </td>
                    {if $userAdmin == 1}
                        <td>
                            <a class="btn btn-outline-light btn_borrar" role="button"
                                href='borrar/{$plato->id_plato}'>Borrar</a>
                        </td>
                    {/if}
                    <input type="number" class="d-none" name='id_plato[]' value='{$plato->id_plato}'>
                </tr>
                {/foreach}
                <input type="number" class="fila d-none" name='fila' value=''>
            </tbody>
        </table>

        {if $userAdmin == 1}
            <div class="form_agregar">
                <div class="formPlatos">
                    <h1 class="agregar_plato">Agregar Plato</h1>
                    <form action="insertar" method="post" autocomplete="off">
                        <h2>Tipo</h2>
                        <select id="categorias" name="id_categoria">
                            {foreach from=$lista_categorias item=categoria}
                            <option value="{$categoria->id_categoria}"> {$categoria->tipo|upper} </option>
                            {/foreach}
                        </select>
                        <h2>Nombre</h2>
                        <input type="text" name="nombre">
                        <h2>Vegetariano</h2>
                        <input type="radio" name="vegetariano" value="Apto" checked> APTO
                        <input type="radio" name="vegetariano" value="No apto"> NO APTO
                        <h2>TACC</h2>
                        <input type="radio" name="tacc" value="Contiene" checked> CONTIENE
                        <input type="radio" name="tacc" value="No contiene"> NO CONTIENE
                        <h2>Vegano</h2>
                        <input type="radio" name="vegano" value="Apto" checked> APTO
                        <input type="radio" name="vegano" value="No apto"> NO APTO
                        <h2>Precio</h2>
                        <input type="number" name="precio">

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
