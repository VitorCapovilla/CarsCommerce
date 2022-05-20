<?php 
require_once("../includes/links.html");
require_once("../includes/functions.php");
require_once("../includes/sessions.php");
require_once("../services/marcaDAO.php");
require_once("../services/marcaDTO.php");
require_once("../services/modeloDAO.php");
require_once("../services/modeloDTO.php");
require_once("../services/produtoDTO.php");
require_once("../services/produtoDAO.php");


$marca 
?>

<?php require_once ("../includes/header.php"); ?>

<!-- Inicio-Main -->
<script>
    $(document).ready(function () {
        $("#Preco").maskMoney({ prefix: "R$ ", decimal: ",", thousands: "." });
    });
</script>

<br />
<div class = "container text-center centered">

    <div class = "row">
        <h4>Adicionar Novo Carro</h4>

        <form id = "ticket" class = "mt-3" action="" method="POST">

            <?php
                if (isset($_POST["email"])){
                    $email = $_POST["email"];
                    $telefone = $_POST["telefone"];
                    $posto = $_POST["posto"];
                    $nome = StringUtils::get_normal_case($_POST["nome"]);
                    $tipo = $_POST["tipo"];
                    $assunto = $_POST["assunto"];
                    $descricao = $_POST["descricao"];

                    try{
                        $service = new produtoDAO();
                        $objTicket = $service->abrir_ouvidoria($email, $nome, $telefone, $posto, $tipo, $assunto, $descricao);
                        ShowSuccessMessage("Agradecemos o envio do formulário!<br>Sua solicitação foi registrada e em breve retornaremos o contato!");
                    }
                    catch(Exception $ex){
                        ShowErrorMessage("Não foi possível abrir o ticket! Contate-nos pelos canais de suporte telefônicos!");
                    }
                }
            ?>

            <div class = "mt-2 row">

                <div class="form-group col-md-12">
                    <label for="Email" class="form-label">Digite o seu E-mail</label>
                    <input type = "email" class="form-control text-lowercase" id="Email" name="email" onblur="buscarPessoa()" value required>
                </div>

            </div>

            <div class = "mt-2 row">

                <input hidden type = "text" name = "codigo" id = "Codigo">

                <div class="form-group col-md-4">
                    <label for="Tipo" class="form-label">Selecione a sua Empresa</label>
                    <select id = "Posto" name = "posto" class = "form-control" required>
                        <option disabled selected value>--Selecione a Empresa--</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="Nome" class="form-label">Digite o seu Nome</label>
                    <input type = "text" class="form-control text-capitalize" id="Nome" name="nome" required>
                </div>

                <div class="form-group col-md-4">
                    <label for="Telefone" class="form-label">Digite o seu WhatsApp</label>
                    <input type = "text" class="form-control" id="Telefone" name="telefone" required>
                </div>

            </div>

            <div class = "mt-2 row">

                <div class = "form-group col-md-6">
                    <label for="Tipo" class="form-label">Tipo de Contato</label>
                    <select class = "form-control" name = "tipo" id = "Tipo">
                        <option disabled selected value>--Selecione um Tipo--</option>
                        <option>Elogio</option>
                        <option>Sugestão</option>
                        <option>Reclamação</option>
                        <option>Outros</option>
                    </select>
                </div>

                <div class = "form-group col-md-6">
                    <label for="Assunto" class="form-label">Assunto</label>
                    <input type = "text" class = "form-control" name = "assunto" id = "Assunto">
                </div>

            </div>

            <div class = "mt-2 row">

                <div class = "form-group col-md-12">
                    <label for="Tipo" class="form-label">Descrição</label>
                    <textarea rows = "4" resize type = "text" class="form-control" id="Descricao" name="descricao" required></textarea>
                </div>

            </div>

            <?php 
                $msg = ''; 
                
                if ($msg)
                    echo '<div class = "mt-5"><div>' . $msg;    
            ?>

            <div class = "mt-5 form-group col-12">
                <button type = "submit" style="height: 50px; background-color: #2ecc70;" name="Abrir" id="abrir"
                    class="form-control btn text-light" onclick="abrirTicket();"><i class = "fa fa-check"></i>&nbsp;Enviar</button>
            </div>
        </form>
    </div>
</div>
<br />

<!-- Fim-Main -->

<!-- Incluindo o footer -->
<?php require_once("../includes/footer.php"); ?>