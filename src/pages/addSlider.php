<?php 

require_once ("../includes/header.php");
require_once ("../includes/links.html");

?>

<br>

<div class="container">
    <form action="addslider.php" method="POST">
        <div class="form-group row">
            <label for="nome">Nome</label>
            <input class="form-control" type="text" id="nome" placeholder="Digite o nome do slider">
        </div>

        <div class="form-group row">
            <label for="arquivo">Slider</label>
            <input class="form-control" type="file" id="arquivo">
        </div>

        <div class="form-group row">
            <input class="btn btn-success col-12" type="submit">
        </div>
    </form>
</div>