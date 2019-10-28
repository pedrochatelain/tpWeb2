{include file="header.tpl"}

    <div class="container">

        <h1 class="nuestros_platos">{$categoria->tipo}</h1>
        <form id="form_editar" action="categorias/editar/{$categoria->id_categoria}" method="post" autocomplete="off">
            <table>
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Descripcion</th>
                        {if $userAdmin == 1}
                        <th>Editar</th>
                        <th>Borrar</th>
                        {/if}
                    </tr>
                </thead>
                <tbody id="tabla">
                    <tr class='tabla_categorias'>
                        <td>
                            <div class="categoria_info"> {$categoria->tipo} </div>
                            <input class="input_editar d-none" name='tipo' size='4px'>
                        </td>
                        <td>
                            <div class="categoria_info"> {$categoria->descripcion} </div>
                            <input class="input_editar d-none" name='descripcion' size='4px'>
                        </td>
                        {if $userAdmin == 1}
                        <td>
                            <input class="btn_editar btn btn-outline-light" value="Editar" type="button">
                            <input class="btn_finalizado btn btn-outline-light d-none" value="Finalizado" type="submit">
                        </td>
                        <td>
                            <a class="btn_borrar btn btn-outline-light" role="button"
                                href='categorias/borrar/{$categoria->id_categoria}'>Borrar
                            </a>
                        </td>
                        {/if}
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

    {include file="footer.tpl"}