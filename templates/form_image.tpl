<div class="comment_div container">
    <h2>Subir imagen</h2>
</div>
<div class="line container"> </div>
<form method="POST" action="upload_image/{$plato->id_plato}" enctype="multipart/form-data">
    <div class="form_image container">
        <div class="btn_choose_img">
            <input type="file" name="image">
        </div>
        <div class="btn_subir_img">
            <button type="submit">Subir imagen</button>
        </div>
    </div>
</form>