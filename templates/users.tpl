{include file="header.tpl"}

<div class="container">
    <h1 class="nuestros_platos"> </h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Usuario</th>
                <th>Detalles</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$usuarios item=user}
            <tr class='tabla_usuarios'>
                <td>
                    <div class="id_usuario"> {$user->id_usuario} </div>
                </td>
                <td>
                    <div class="usuario"> {$user->username} </div>
                </td>
                <td>
                    <a href="usuarios/{$user->id_usuario}">
                        <input class="btn btn-outline-light" value="Detalle" type="button">
                    </a>
                </td>
            </tr>
            {/foreach}
        </tbody>
    </table>
</div>

{include file="footer.tpl"}