<?php 

    require_once ("../model/ModeloDAO.php");
    require_once ("../model/ModeloDTO.php");
    require_once ("../includes/header.php");

    $objModeloDAO = new ModeloDAO();
    $lstModelos = $objModeloDAO->obter_todos();

?>

<script src="../js/datatable.js"></script>

<div class="container">
    <div class="row">
        <div class="table-responsive">
            <table id="table" class="table table-striped">
                <thead style="justify-items:center;">
                    <tr class="text-center">
                        <th>Código</th>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Categoria</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($lstModelos as $objModelos){
                            echo "<tr>
                                    <td class=\"text-center\"> " . $objModelos->get_codigo() . "</td>
                                    <td class=\"text-center\"> " . $objModelos->get_nome_modelo() . "</td>
                                    <td class=\"text-center\"> " . $objModelos->get_marca()->get_nome_marca() . "</td>
                                    <td class=\"text-center\"> " . $objModelos->get_categoria()->get_categoria() . "</td>
                                    <td class=\"text-center\">
                                        <a href='Modelo.php?codigo=" . $objModelos->get_codigo() . "' class='btn btn-primary' style=\"margin:4px; margin-top:5px\"><span>Editar</span></a>
                                        <a href='excluirModelo.php?codigo=". $objModelos->get_codigo() . "' class=\" btn btn-danger\"  style=\"margin:4px; margin-top:5px\"><span>Delete</span></a>
                                    </td>
                                </tr>";
                            }
                    ?>
                </tbody>
            </table>
            <a class="btn btn-success float-end" href="Modelo.php"><i class="fa-solid fa-circle-plus"></i> &nbsp;Adicionar Modelo</a>
        </div>
    </div>
</div>