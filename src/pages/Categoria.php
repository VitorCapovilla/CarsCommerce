<?php

  require_once ("../model/CategoriaDTO.php");
  require_once ("../model/CategoriaDAO.php");
  require_once ("../includes/functions.php");
  require_once ("../includes/sessions.php");
  require_once ("../includes/header.php");

  $categoriaDAO = new CategoriaDAO();
  $categoria = new categoria();

  if(isset($_GET["codigo"])){

    $categoria = $categoriaDAO->obter_codigo($_GET["codigo"]);
    $title_str = "Alterar";
  }else{
    $title_str = "Adicionar";
  }

  if(isset($_POST["SalvarCategoria"])){
    $codigo = $_POST["codigo"];
    $categoria->set_codigo($codigo);
  
    $nome_categoria = $_POST["categoria"];
  
    if(empty($nome_categoria)){
      $_SESSION["ErrorMessage"] = "O nome da categoria não pode ser vazio!";
      ErrorMessage();
    }

    $categoria->set_categoria($nome_categoria);

    if(($categoria->get_codigo() == null) || ($categoria->get_codigo() == "")){
      if($categoriaDAO->inserir($categoria)){
        $_SESSION["SuccessMessage"] = "Categoria adicionado com sucesso!";
        SuccessMessage();
      }else{
        $_SESSION["ErrorMessage"] = "Erro ao adiconar a categoria!";
        ErrorMessage();
      }

      $categoria = new categoria();
    }else{
      if($categoriaDAO->alterar($categoria)){
        $_SESSION["SuccessMessage"] = "Categoria alterada com sucesso!";
        SuccessMessage();
      }else{
        $_SESSION["ErrorMessage"] = "Erro ao alterar o nome da categoria";
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
        <h3 class="text-center"><?php echo $title_str; ?> Categoria</h3>

        <div class="form-group mb-2 col-md-12">
          <?php 
          
          echo ErrorMessage();
          echo SuccessMessage();
          
          ?>
        </div>

        <input id="Codigo" name="codigo" value=<?php echo '"' . $categoria->get_codigo() . '"';?> hidden>

        <div class="form-group mb-2 col-md-12 col-sm-12">
          <label for="categoria" class="form-label">Título da Categoria</label>
          <input class="form-control" type="text" id="categoria" name="categoria" value=<?php echo '"' . $categoria->get_categoria() .
          '"'; ?>>
        </div>

        <div class="form-group mt-3">
          <button type="submit" name="SalvarCategoria" class="btn btn-primary text-light col-md-12">
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