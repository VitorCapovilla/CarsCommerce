<?php 

/***************Redirecionar Para****************/
function Redirect_to($New_Location){
    header("Location:".$New_Location);
    exit;
}


/***************Gerador de token****************/
function token_gerador(){
    $token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
    return $token;
}

?>
