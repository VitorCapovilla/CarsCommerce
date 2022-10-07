<?php 

require_once ("../model/MarcaDAO.php");
require_once ("../model/MarcaDTO.php");

require_once ("../model/CategoriaDAO.php");
require_once ("../model/CategoriaDTO.php");

require_once ("../model/ModeloDTO.php");
require_once ("../model/ModeloDAO.php");

require_once ("../includes/sessions.php");
require_once ("../includes/functions.php");
require_once ("../includes/header.php");

$modeloDAO = new ModeloDAO();
$modelo = new modelo();

$marcaDAO = new MarcaDAO();
$lstMarcas = $marcaDAO->obter_todos();

$categoriaDAO = new CategoriaDAO();
$lstCategoria = $categoriaDAO->obter_todos();


if(isset($_GET["codigo"])){
  $modelo = $modeloDAO->obter_codigo($_GET["codigo"]);
  $title_str = "Alterar";
  $url = "Modelo.php?codigo=".$_GET["codigo"]."";
}else{
  $title_str = "Adicionar";
  $url = "Modelo.php";
}

if(isset($_POST["SalvarModelo"])){
  $codigo = $_POST["codigo"];

  $nome_modelo = $_POST["Modelo"];
  var_dump($nome_modelo);
  $nome_marca = $_POST["marca"];
  $categoria = $_POST["Categoria"];

  if(empty($nome_modelo) || $nome_modelo == ""){
    // echo "ta passando por aqui";
    $_SESSION["ErrorMessage"]= "O campo Nome da Empresa não pode ser maior do que 40 caracteres!";
    Redirect_to($url);
  }

  // if(empty($nome_marca) || $nome_marca == null){
  //   $_SESSION["ErrorMessage"] = "É preciso selecionar uma marca!";
  //   ErrorMessage();
  //   // Redirect_to("Modelo.php");
  // }


  // if(empty($categoria) || $categoria == null){
  //   $_SESSION["ErrorMessage"] = "É preciso selecionar uma categoria";
  //   ErrorMessage();
  //   // Redirect_to("Modelo.php");
  // }

  $modelo->set_codigo($codigo);
  $modelo->set_nome_modelo($nome_modelo);

  $modelo->set_marca(new Marca());
  $modelo->get_marca()->set_codigo($nome_marca);

  $modelo->set_categoria(new categoria());
  $modelo->get_categoria()->set_codigo($categoria);

  if(($modelo->get_codigo() == null) || ($modelo->get_codigo() == "")){
    if($modeloDAO->inserir($modelo)){
      $_SESSION["SuccessMessage"] = "Marca adicionado com sucesso!";
      SuccessMessage();
    }else{
      $_SESSION["ErrorMessage"] = "Erro ao adiconar a marca!";
      ErrorMessage();
    }

    $modelo = new modelo();
  }else{
    if($modeloDAO->alterar($modelo)){
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

          <?php 

            echo SuccessMessage();
            echo ErrorMessage();
          
          ?>

        <input id="Codigo" name="codigo" value=<?php echo "'" . $modelo->get_codigo() . "'"; ?> hidden>

        <br>

        <div class="col-8 d-flex">
          <div class="col-4">
            <a href="Marca.php" class="btn btn-primary">Adicionar nova marca</a>
          </div>
          <div class="col-4">
            <a href="Categoria.php" class="btn btn-primary">Adicionar nova categoria</a>
          </div>
        </div>

        <div class="form-group mb-2 col-md-12 col-sm-12">
          <label for="Modelo" class="form-label">Título da Modelo</label>
          <input class="form-control" type="text" id="Modelo" name="Modelo" value=<?php echo "'" . $modelo->get_nome_modelo() .
          "'"; ?>>
        </div>

        <div class="form-group mb-2 col-md-12 col-sm-12">
          <label for="Marca" class="form-label">Atribua uma marca à esse modelo</label>
          <select id = "Marca" name = "marca" class="form-control selectpicker" data-live-search="true">
                  <option disabled selected value>-- Selecione uma Marca--</option>
                  <?php
                    foreach($lstMarcas as $objMarca){
                      echo "<option value = '" . $objMarca->get_codigo() . "'";
                      if ($objMarca->get_codigo() == $modelo->get_marca()->get_codigo()) echo "selected";
                      echo ">" . $objMarca->get_nome_marca() . "</option>"; 
                    }
                  ?>
                </select>
        </div>

        <div class="form-group mb-2 col-md-12 col-sm-12">
          <label for="Categoria" class="form-label">Atribua uma categoria à esse modelo</label>
          <select class="selectpicker form-control" data-live-search="true" id="Categoria" name="Categoria" required>
                  <option disabled selected value>-- Selecione uma Categoria--</option>
                  <?php
                    foreach($lstCategoria as $objCategoria){
                      echo "<option value = '" . $objCategoria->get_codigo() . "'";
                      if ($objCategoria->get_codigo() == $modelo->get_categoria()->get_codigo()) echo "selected";
                      echo ">" . $objCategoria->get_categoria() . "</option>"; 
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
<br />

<!-- Fim-Main -->

<!-- Incluindo o footer -->
<div class="fixed-bottom">
<?php require_once("../includes/footer.php"); ?>
</div>
