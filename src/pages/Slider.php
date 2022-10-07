<?php 

  require_once ("../model/ModeloDAO.php");
  require_once ("../model/ModeloDTO.php");
  require_once ("../model/MarcaDAO.php");
  require_once ("../model/MarcaDTO.php");
  require_once ("../includes/functions.php");
  require_once ("../includes/sessions.php");
  require_once ("../includes/header.php");

$marcaDAO = new MarcaDAO();
$marca = new marca();
$modeloDAO = new ModeloDAO();
$modelo = new modelo();

if(isset($_GET["codigo"])){
  $modelo = $modeloDAO->obter_codigo($_GET["codigo"]);
  $title_str = "Alterar";
}else{
  $title_str = "Adicionar";
}

if(isset($_POST["SalvarModelo"])){
  $codigo = $_POST["codigo"];
  $modelo->set_codigo($codigo);

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
    <h3 class="text-center"><?php echo $title_str;?> Modelo</h3>

    <div class="form-group mb-2 col-md-12">
      
    </div>

    <input id="Codigo" name="codigo" value=<?php echo "'" . $modeloDTO->get_codigo() . "'"; ?> hidden>

    <div class="form-group mb-2 col-md-12 col-sm-12">
      <label for="Modelo" class="form-label">Título da Modelo</label>
      <input class="form-control" type="text" id="Modelo" name="Modelo" value=<?php echo "'" . $modeloDTO->get_nome() .
      "'"; ?>>
    </div>

    <div class="form-group mb-2 col-md-12 col-sm-12">
      <label for="Marca" class="form-label">Atribua uma marca à esse modelo</label>
      <select id = "Marca" name = "Marca" class = "form-control">
              <option disabled selected value>-- Selecione uma Marca--</option>
              <?php
                foreach($marca as $objMarcas){
                  echo "<option value = '" . $objMarcas->get_codigo() . "'";
                  if ($objMarcas->get_codigo() == $modeloDTO->get_nome()) echo "selected";
                  echo ">" . $objMarcas->get_nome_marca() . "</option>"; 
                }
              ?>
            </select>
    </div>

    <div class="form-group mt-3">
      <button type="submit" name="SalvarModelo" class="btn btn-primary text-light col-md-12">
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
