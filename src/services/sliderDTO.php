<?php 

class sliderDTO{
    private $codigo;
    private $nome;
    private $slider;
    private $data_postagem;


    function set_codigo($x){
        $this->codigo = $x;
    }

    function get_codigo(){
        return $this->codigo;
    }

    function set_nome($x){
        $this->nome = $x;
    }

    function get_nome(){
        return $this->nome;
    }

    function set_slider($x){
        $this->slider = $x;
    }

    function get_slider(){
        return $this->slider;
    }

    function set_data_postagem($x){
        $this->data_postagem = $x;
    }

    function get_data_postagem(){
        return $this->data_postagem;
    }


}


?>