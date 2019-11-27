{include file="header.tpl"}

<div class="container">
    <h1 class="nuestros_platos"> </h1>
    <form action="usuarios/editar/{$user->id_usuario}" method="post">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Usuario</th>
                    <th>Administrador</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                <tr class='tabla_usuarios'>
                    <td>
                        <div class="id_usuario"> {$user->id_usuario} </div>
                    </td>
                    <td>
                        <div> {$user->username} </div>
                    </td>
                    <td>
                        <div class="admin user_info">
                        {if $user->administrador == 1}
                            SI
                        {else}
                            NO
                        {/if}
                        </div>
                        <select class="input_editar d-none" name='admin'>
                            <option value="1">SI</option>
                            <option value="0">NO</option>
                        </select>
                    </td>
                    <td>
                        <input class="btn_editar btn btn-outline-light" value="Editar" type="button">
                        <input class="btn_finalizado btn btn-outline-light d-none" value="Finalizado" type="submit">
                    </td>
                    <td>
                        <a class="btn_borrar btn btn-outline-light" role="button"
                            href='usuarios/borrar/{$user->id_usuario}'>Borrar
                        </a>
                        <input class="btn_cancelar btn btn-outline-light d-none" value="Cancelar" type="button">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

{include file="footer.tpl"}