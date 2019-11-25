<div class="_carousel">
    <div id="carouselExampleControls" class="carousel slide" data-interval="false" data-ride="carousel">
        <div class="carousel-inner">
            {foreach from=$images item=image name="images"}
            <!--Si es el primer recorrido del foreach, pongo la imagen de esa iteracion
                porque el carrousel de bootstrap exige tener una imagen como 'active'-->
            {if $smarty.foreach.images.index == 0}
            <div class="carousel-item active">
                <img class="d-block w-100" src="images/platos/{$image->image}" alt="{$image->image}">
                {if $userAdmin == 1}
                <div>
                    <form method="POST" class="form_delete_image">
                        <input formaction="delete_image/{$image->id}" type="submit" value="Borrar imagen">
                    </form>
                </div>
                {/if}
            </div>
            {else}
            <div class="carousel-item">
                <img class="d-block w-100" src="images/platos/{$image->image}" alt="{$image->image}">
                {if $userAdmin == 1}
                <div>
                    <form method="POST" class="form_delete_image">
                        <input formaction="delete_image/{$image->id}" type="submit" value="Borrar imagen">
                    </form>
                </div>
                {/if}
            </div>
            {/if}

            {/foreach}
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>