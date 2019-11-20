{include file="header.tpl"}

<div class="container d-flex justify-content-center">
    <form action="verify" method="POST" class="formPlatos p-5 mb-2 formLogin" autocomplete="off">
        <h1> {$titulo} </h1>
        <label class="titulo_login">Usuario</label>
        <input name="username" class="form-control" placeholder="Enter user">
        <label class="titulo_login">Contraseña</label>
        <input name="password" type="password" class="form-control" placeholder="Password">
        <div class="div_boton d-flex justify-content-center">
            <button type="submit" class="btn btn-submit btn-lg">Login</button>
        </div>
        <form method="POST">
            <div class="div_boton d-flex justify-content-center">
                <button formaction="guest" type="submit" class="btn btn-submit btn-lg">Invitado</button>
                <input class="d-none" name="invitado" value="guest">
            </div>
            {if $error}
            <div class="msj_error">
                <div class="alert alert-danger" role="alert">
                    {$error}
                </div>
            </div>
            {/if}
        </form>
    </form>
</div>

{include file="footer.tpl"}