<?php 
    require_once("links.html");
?>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #202057">
    <a class="text-light navbar-brand" href="../index.php">{Logo}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link text-light" href="../pages/index.php">Produtos <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="../view/videos.php">Vídeos <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="../view/noticias.php">Notícias <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <!-- Lado direito -->
        <div class="my-2 my-lg-0 mr-2">
            <a href="../view/login.php"><i class="fa-solid fa-user text-light"></i></a>
        </div>
        <div class="my-2 my-lg-0 ml-2">
            <a href="../view/cart.php"><i class="fa-solid fa-cart-shopping text-light"></i></a>
        </div>
    </div>
</nav>