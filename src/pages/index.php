<?php 

require_once("../includes/links.html");
require_once("../includes/header.php");
require_once("../services/produtoDAO.php");
require_once("../services/produtoDTO.php");
require_once("../services/sliderDAO.php");
require_once("../services/sliderDTO.php");
require_once("../services/loginDTO.php");
require_once("../services/loginDAO.php");

?>

<!-- Slider -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="//https://www.italac.com.br/wp-content/uploads/2018/12/Banner-Site-Rotativo-2-b-V2.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
 <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div>

<hr>

<session class="produtos">
  <h1 class="title">Carros</h1>
  
</session>


<?php
    require_once("../includes/footer.php");
?>