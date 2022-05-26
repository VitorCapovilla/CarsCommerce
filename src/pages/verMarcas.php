<?php 

    require_once ("../model/MarcaDAO.php");
    require_once ("../model/MarcaDTO.php");
    require_once ("../includes/header.php");

    $objMarcaDAO = new MarcaDAO();
    $lstMarcas = $objMarcaDAO->obter_todos();


?>

<script src="../js/datatable.js"></script>

<div class="container">
    <div class="row">
        <div class="table-responsive">
            <table id="table" class="table table-striped">
                <thead style="justify-items:center;">
                    <tr class="text-center">
                        <th>Código</th>
                        <th>Marca</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($lstMarcas as $objMarca){
                            echo "<tr>
                                    <td class=\"text-center\"> " . $objMarca->get_codigo() . "</td>
                                    <td class=\"text-center\"> " . $objMarca->get_marca() . "</td>
                                    <td class=\"text-center\">
                                        <a href='addMarca.php?codigo=" . $objMarca->get_codigo() . "' class='btn btn-primary' style=\"margin:4px; margin-top:5px\"><span>Editar</span></a>
                                        <a href='excluirMarcas.php?codigo=". $objMarca->get_codigo() . "' class=\" btn btn-danger\"  style=\"margin:4px; margin-top:5px\"><span>Delete</span></a>
                                    </td>
                                </tr>";
                            }
                    ?>
                </tbody>
            </table>
            <a class="btn btn-success float-end" href="addMarca.php"><i class="fa-solid fa-circle-plus"></i> &nbsp;Adicionar Marca</a>
        </div>
    </div>
</div>