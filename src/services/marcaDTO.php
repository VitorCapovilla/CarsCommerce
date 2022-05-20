<?php 

class marcaDTO{
    private $codigo;
    private $marca;

    function set_codigo($x){
        $this->codigo = $x;
    }

    function get_codigo(){
        return $this->codigo;
    }

    function set_marca($x){
        $this->marca = $x;
    }

    function get_marca(){
        return $this->marca;
    }
}

?>