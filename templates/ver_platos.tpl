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
                </td>
                <td>
                    <div class="plato_info nombre_plato"> {$plato->nombre} </div>
                </td>
                <td>
                    <a href="platos/{$plato->id_plato}">
                        <input class="btn btn-outline-light" value="Detalle" type="button">
                    </a>
                </td>
                {if $userAdmin == 1}
                <td>
                    <a href='borrar/{$plato->id_plato}'>
                        <input class="btn btn-outline-light" value="Borrar" type="button">
                    </a>
                </td>
                {/if}
            </tr>
            {/foreach}
        </tbody>
    </table>
    {if $userAdmin == 1}
    {include file="add_plato.tpl"}
    {/if}
    <div class="imgplatos">
        <img class="dishpice" src="images/ewal.jpg" alt="Ensalada Waldorf">
        <img class="dishpicpp" src="images/mave.jpg" alt="Mayonesa de Ave">
        <img class="dishpicpo" src="images/pfru.jpg" alt="Postre de Frutas">
    </div>
</div>

{include file="footer.tpl"}