<?php

  require_once ("../model/MarcaDTO.php");
  require_once ("../model/MarcaDAO.php");
  require_once ("../includes/functions.php");
  require_once ("../includes/sessions.php");
  require_once ("../includes/header.php");

  $marcaDAO = new MarcaDAO();
  $marca = new marca();

  if(isset($_GET["codigo"])){
    $marca = $marcaDAO->obter_codigo($_GET["codigo"]);
    $title_str = "Alterar";
  }else{
    $title_str = "Adicionar";
  }

  if(isset($_POST["SalvarMarca"])){
    $codigo = $_POST["codigo"];
    $marca->set_codigo($codigo);
  
    $nome_marca = $_POST["marca"];
  
    if(empty($nome_marca)){
      $_SESSION["ErrorMessage"] = "O nome da marca não pode ser vazio!";
      ErrorMessage();
    }

    $marca->set_nome_marca($nome_marca);

    if(($marca->get_codigo() == null) || ($marca->get_codigo() == "")){
      if($marcaDAO->inserir($marca)){
        $_SESSION["SuccessMessage"] = "Marca adicionado com sucesso!";
        SuccessMessage();
      }else{
        $_SESSION["ErrorMessage"] = "Erro ao adiconar a marca!";
        ErrorMessage();
      }

      $marca = new marca();
    }else{
      if($marcaDAO->alterar($marca)){
      $_SESSION["SuccessMessage"] = "Marca alterada com sucesso!";
      SuccessMessage();
      }else{
        $_SESSION["ErrorMessage"] = "Erro ao alterar o nome da marca";
        ErrorMessage();
      }
    }
  }

?>

<br />
<div class="container">
  <div class="row">
    <form action="" method="POST">
      <div class="row">
        <h3 class="text-center"><?php echo $title_str; ?> Marca</h3>

        <div class="form-group mb-2 col-md-12">
          <?php 
          
          echo ErrorMessage();
          echo SuccessMessage();
          
          ?>
        </div>

        <input id="Codigo" name="codigo" value=<?php echo '"' . $marca->get_codigo() . '"';?> hidden>

        <div class="form-group mb-2 col-md-12 col-sm-12">
          <label for="marca" class="form-label">Título da Marca</label>
          <input class="form-control" type="text" id="marca" name="marca" value=<?php echo '"' . $marca->get_nome_marca() .
          '"'; ?>>
        </div>

        <div class="form-group mt-3">
          <button type="submit" name="SalvarMarca" class="btn btn-primary text-light col-md-12">
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