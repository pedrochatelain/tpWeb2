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
            <p class="inner_input"> <input type="radio" name="vegetariano" value="Apto" checked> APTO </p>
            <p class="inner_input"> <input type="radio" name="vegetariano" value="No apto"> NO APTO </p>
            <h2>TACC</h2>
            <p class="inner_input"> <input type="radio" name="tacc" value="Contiene" checked> TIENE </p>
            <p class="inner_input"> <input type="radio" name="tacc" value="No contiene"> NO TIENE </p>
            <h2>Vegano</h2>
            <p class="inner_input"> <input type="radio" name="vegano" value="Apto" checked> APTO </p>
            <p class="inner_input"> <input type="radio" name="vegano" value="No apto"> NO APTO </p>
            <h2>Precio</h2>
            <input type="number" name="precio">

            <div class="div_btn_agregar">
                <input class="btn btn_agregar" value="Agregar" type="submit">
            </div>
        </form>
    </div>
</div>