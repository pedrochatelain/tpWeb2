    {include 'templates/header.tpl'}
    <div class="container">
        <h1 class="nuestros_platos">{$plato->nombre}</h1>
        <form action="editar" method="post" autocomplete="off">
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
                            <select class="input_editar d-none" name='editar_tipo[]'>
                                {foreach from=$lista_categorias item=categoria}
                                <option value="{$categoria->id_categoria}" selected="selected"> {$categoria->tipo|upper}
                                </option>
                                {/foreach}
                            </select>
                        </td>
                        <td>
                            <div class="plato_info nombre_plato"> {$plato->nombre} </div>
                            <input class="input_editar d-none" name='editar_nombre[]' size='4px'>
                        </td>
                        <td>
                            <div class="plato_info vegetariano"> {$plato->vegetariano} </div>
                            <select class="input_editar d-none" name='editar_vegetariano[]'>
                                <option value="APTO">APTO</option>
                                <option value="NO APTO">NO APTO</option>
                            </select>
                        </td>
                        <td>
                            <div class="plato_info tacc"> {$plato->tacc} </div>
                            <select class="input_editar d-none" name='editar_tacc[]'>
                                <option value="CONTIENE">CONTIENE</option>
                                <option value="NO CONTIENE">NO CONTIENE</option>
                            </select>
                        </td>
                        <td>
                            <div class="plato_info vegano"> {$plato->vegano} </div>
                             <select class="input_editar d-none" name='editar_vegano[]'>
                                <option value="APTO">APTO</option>
                                <option value="NO APTO">NO APTO</option>
                            </select>
                        </td>
                        <td>
                            <div class="plato_info precio"> {$plato->precio} </div>
                            <input class="input_editar d-none" name='editar_precio[]' type='number'>
                        </td>
                        {if $userAdmin == 1}
                            <td>
                                <input class="btn_editar btn btn-outline-light" value="Editar" type="button">
                                <input class="btn_finalizado btn btn-outline-light d-none" value="Finalizado" type="submit">
                            </td>
                            <td>
                                <a class="btn btn-outline-light btn_borrar" role="button"
                                    href='borrar/{$plato->id_plato}'>Borrar</a>
                            </td>
                        {/if}
                        <input type="number" class="d-none" name='id_plato[]' value='{$plato->id_plato}'>
                    </tr>
                    <input type="number" class="fila d-none" name='fila' value=''>
                </tbody>
            </table>
        </form>
    </div>
    {include 'templates/footer.tpl'}