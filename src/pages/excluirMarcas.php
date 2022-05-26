<?php
    require_once('../model/MarcaDAO.php');
    require_once('../includes/functions.php');

    $objMarcaDAO = new MarcaDAO();

    $codigo = $_GET["codigo"];

    $objMarcaDAO->excluir($codigo);

    Redirect_to('verMarcas.php');
?>