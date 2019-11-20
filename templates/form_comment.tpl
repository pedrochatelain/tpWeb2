<form class="form_comment container" method="post" action="comentar/{$plato->id_plato}">
    <div class="text_area_form_comment">
        <textarea name="mensaje" class="form-control" id="exampleFormControlTextarea1" rows="3"
            placeholder="Agregar un comentario..."></textarea>
    </div>
    <div class="select_puntuacion_form_comment">
        <select name="puntuacion" class="btn btn-primary add_comment_button" name="" id="">
            <option selected="selected">Puntuación</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    {if isset($userName) && $userName != "guest"}
    <input type="hidden" name="username" value="{$userName}">
    {/if}
    <div class="btn_comentar_form_comment">
        <input type="submit" value="Post"class="btn btn-primary btn-lg btn-block add_comment_button"></input>
    </div>
    </div>
</form>