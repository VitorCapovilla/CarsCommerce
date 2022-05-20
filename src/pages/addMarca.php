<?php 
require_once("../includes/links.html");
require_once("../includes/functions.php");
require_once("../includes/sessions.php");
require_once("../services/produtoDTO.php");
require_once("../services/produtoDAO.php"); 
?>

<!-- Refazer o esquema de puxar a categoria (marca) -->

<!-- Incluindo o header -->
<?php require_once ("../includes/header.php"); ?>

<!-- Inicio-Main -->
<script>
        $(document).ready(function () {
            $('#Preco').maskMoney({prefix: "R$ ", decimal: ",", thousands: "."});
        });
    </script>

    <br>
<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <?php 

            echo ErrorMessage(); 
            echo SuccessMessage(); 
            
            ?>
                <form action="addMarca.php" method="POST">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h1><b>Adicionar Novo Carro</b></h1>
                        </div>
                        <div class="card-body">
                            <!-- Titulo do produto -->
                            <div class="form-group">
                                <label for="image"><span class="InfoCampo"> Selecione uma Imagem:</span></label>
                                <input class="form-control" type="file" name="image" id="image" accept="image/*">
                            </div>
                            <br>
                            <!-- Botões -->
                            <div class="row">
                                <div class="d-grid gap-2 col-6 mx-auto mb-2">
                                    <a href="../PainelADM/PainelADM.html" class="col btn btn-warning btn-block" style="margin: 1rem 0px 0px 0px;">Voltar</a>
                                </div>
                                <div class="d-grid gap-2 col-6 mx-auto mb-2">
                                    <button type="submit" name="Enviar" class="btn btn-success btn-block" style="margin: 1rem 0px 0px 0px;">
                                        Adicionar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<br>

<!-- Fim-Main -->

<!-- Incluindo o footer -->
<?php require_once("../includes/footer.php"); ?>