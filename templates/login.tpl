    {include file="header.tpl"}

    <div class="d-flex justify-content-center">
      <form action="verify" method="POST" class="formPlatos p-5 mb-2 formLogin">
              <h1> {$titulo} </h1>
              <label class="h1">Usuario</label>
              <input name="username" class="form-control" placeholder="Enter user">
              <label class="h1 contraseña">Contraseña</label>
              <input name="password" type="password" class="form-control" placeholder="Password">
              <div class="d-flex justify-content-center">
                <button type="submit" class="btn-submit btn btn-lg">Login</button>
              </div>
      {if $error}
        <div class="alert alert-danger" role="alert">
            {$error}
        </div>
      {/if}
      <form method="POST">
        <div class="d-flex justify-content-center">
          <button formaction="guest" type="submit" class="btn-submit btn btn-lg">Entrar como invitado</button>
          <input class = "d-none" name = "invitado" value="guest">
        </div>
      </form>
      </form>
    </div>

</body>
{include file="footer.tpl"}

</html>