<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{$basehref}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/tpe.css">
    <title>{$titulo}</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background: linear-gradient(#9ec65d, #8aa83f);">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand">
            <img class="logomob" src="images/logomob.png" alt="Logo NP">
            <img class="logodsk" src="images/logomob.png" alt="Logo NP">
        </a>
        <div class="username">
            {if isset($userName) && $userName != "guest"}
            {$userName}
            {/if}
        </div>
        <div class="nav_buttons">
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav">
                    <a href="platos" class="text-dark nounderline">
                        <li class="nav-item">
                        <li class="item rounded-pill">Platos</li>
                        </li>
                    </a>
                    <a href="categorias" class="text-dark nounderline">
                        <li class="nav-item">
                        <li class="item rounded-pill">Categorias</li>
                        </li>
                    </a>
                    {if isset($userName) && $userName != "guest"}
                    {if $userAdmin == 1}
                    <a href="usuarios" class="text-dark nounderline">
                        <li class="nav-item">
                        <li class="item rounded-pill">Usuarios</li>
                        </li>
                    </a>
                    {/if}
                    <a href="logout" class="text-dark nounderline">
                        <li class="nav-item">
                        <li class="item rounded-pill">Logout</li>
                        </li>
                    </a>
                    {else}
                    <a href="registrarse" class="text-dark nounderline">
                        <li class="nav-item">
                        <li class="item rounded-pill">Registrarse</li>
                        </li>
                    </a>
                    <a href="logout" class="text-dark nounderline">
                        <li class="nav-item">
                        <li class="item rounded-pill">Login</li>
                        </li>
                    </a>
                    {/if}
                </ul>
            </div>
        </div>
    </nav>