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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand">
                <img class="logomob" src="images/logomob.png" alt="Logo NP">
                <img class="logodsk" src="images/logomob.png" alt="Logo NP">          
        </a>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
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
                {if isset($userName) and ($userAdmin == 1)}
                    <a href="logout" class="text-dark nounderline" >
                        <li class="nav-item">
                            <li class="item rounded-pill">Logout</li>
                        </li>
                    </a>
                {else}
                    <a href="logout" class="text-dark nounderline" >
                        <li class="nav-item">
                            <li class="item rounded-pill">Login</li>
                        </li>
                    </a> 
                {/if}
          </ul>


        </div>
      </nav>