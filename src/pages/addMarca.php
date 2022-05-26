<?php

    require_once ("../model/MarcaDTO.php");
    require_once ("../model/MarcaDAO.php");
    require_once ("../includes/functions.php");
    require_once ("../includes/sessions.php");
    require_once ("../includes/header.php");


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

<br />
<div class="container">
  <div class="row">
    <form action="" method="POST">
      <div class="row">
        <h3 class="text-center">Adicionar Marca</h3>

        <div class="form-group mb-2 col-md-12">
          <?php
              if ($msgSuccess)
                echo "<div class = 'alert alert-success' role='alert'>" . $msgSuccess . "</div>";
              
              if ($msgError)
                echo "<div class = 'alert alert-danger' role='alert'>" . $msgError . "</div>";

            ?>
        </div>

        <input id="Codigo" name="codigo" value=<?php echo "'" . $obj->get_codigo() . "'"; ?> hidden>

        <div class="form-group mb-2 col-md-12 col-sm-12">
          <label for="marca" class="form-label">Título da Marca</label>
          <input class="form-control" type="text" id="marca" name="marca" value=<?php echo "'" . $obj->get_marca() .
          "'"; ?>>
        </div>

        <div class="form-group mt-3">
          <button type="submit" name="Cadastrar" class="btn btn-primary text-light col-md-12">
            <i class="fa fa-check"> </i> &nbsp; Salvar</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<br />

<!-- Fim-Main -->

<!-- Incluindo o footer -->
<div class="fixed-bottom">
  <?php require_once("../includes/footer.php"); ?>
</div>