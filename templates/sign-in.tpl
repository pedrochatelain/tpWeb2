{include file="header.tpl"}

<div class="container d-flex justify-content-center">
    <form action="registrar_usuario" method="POST" class="formPlatos p-5 mb-2 formLogin" autocomplete="off">
        <h1> Registrarse </h1>
        <label class="titulo_sign-in">Usuario</label>
        <input name="user" class="form-control">
        <label class="titulo_sign-in">Contraseña</label>
        <input name="password" class="form-control key">
        <label class="titulo_sign-in">Repetir contraseña</label>
        <input name="repeated_password" class="form-control key">
        <div class="div_boton d-flex justify-content-center">
            <button type="submit" class="btn btn-submit btn-lg">Registrarse</button>
        </div>
        {if $error}
        <div class="msj_error">
            <div class="alert alert-danger" role="alert">
                {$error}
            </div>
        </div>
        {/if}
    </form>
</div>

{include file="footer.tpl"}