<?php 

    require_once ("../model/categoriaDAO.php");
    require_once ("../model/CategoriaDTO.php");
    require_once ("../includes/header.php");

    $objCategoriaDAO = new CategoriaDAO();
    $lstCategoria = $objCategoriaDAO->obter_todos();


?>

<script src="../js/datatable.js"></script>

<div class="container">
    <div class="row">
        <div class="table-responsive">
            <table id="table" class="table table-striped">
                <thead style="justify-items:center;">
                    <tr class="text-center">
                        <th>Código</th>
                        <th>Categoria</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($lstCategoria as $objCategoria){
                            echo "<tr>
                                    <td class=\"text-center\"> " . $objCategoria->get_codigo() . "</td>
                                    <td class=\"text-center\"> " . $objCategoria->get_categoria() . "</td>
                                    <td class=\"text-center\">
                                        <a href='Categoria.php?codigo=" . $objCategoria->get_codigo() . "' class='btn btn-primary' style=\"margin:4px; margin-top:5px\"><span>Editar</span></a>
                                        <a href='excluirCategoria.php?codigo=". $objCategoria->get_codigo() . "' class=\" btn btn-danger\"  style=\"margin:4px; margin-top:5px\"><span>Delete</span></a>
                                    </td>
                                </tr>";
                            }
                    ?>
                </tbody>
            </table>
            <a class="btn btn-success float-end" href="Categoria.php"><i class="fa-solid fa-circle-plus"></i> &nbsp;Adicionar Categoria</a>
        </div>
    </div>
</div>