<?php
    require_once('../model/CategoriaDAO.php');
    require_once('../includes/functions.php');

    $objCategoriaDAO = new CategoriaDAO();

    $codigo = $_GET["codigo"];

    $objCategoriaDAO->excluir($codigo);

    Redirect_to('verCategorias.php');
?>