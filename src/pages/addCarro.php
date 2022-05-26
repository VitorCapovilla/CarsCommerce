<?php 

    require_once("../model/CarroDAO.php");
    require_once("../model/CarroDTO.php");
    require_once("../includes/sessions.php");

    $dao = new MarcaDAO();
    $obj = new MarcaDTO();
  
    $url = "verMarcas.php";
    $msgSuccess = null;
    $msgError = null;
  
    $novo = true;
    
    if (isset($_GET["redirect"])){
      $url = $_GET["redirect"];
    }
  
    if(isset($_GET["codigo"])){
      $obj = $dao->obter_codigo($_GET["codigo"]);
      $novo = false;
    }
  
    if(isset($_POST["Cadastrar"])){
      $obj = to_object();
  
      if ($novo){
        if($dao->inserir($obj)){
          $msgSuccess = "Marca incluída com sucesso!";
        }else{
          $msgError = "Erro ao incluir a marca, contate um administrador!";
        }
  
        $obj = new MarcaDTO();
      }
      else{
        if($dao->alterar($obj))
          header('Location: ' . $url);
        else
          $msgError = "Algo deu errado, contate um administrador!";
      }
    }

    function to_object(){
        $obj = new MarcaDTO();
    
        $obj->set_codigo($_POST["codigo"]);
        $obj->set_marca($_POST["marca"]);
    
        return $obj;
    }
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