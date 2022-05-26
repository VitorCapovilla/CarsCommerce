<?php 

    require_once("CarroDTO.php");
    require_once("../db/conexao.php");

    class CarroDAO{
        private $con;

        public function __construct(){
            $this->con = GerenciadoraDeConexoes::obter_conexao();
        }

        public function inserir($obj){
            $sql = "INSERT INTO carros (codigo, modelo, marca, ano, vendido, descricao, placa, preco, km, cambio, garantia_fabrica) VALUES (
                '" . $obj->get_codigo() . "',
                '" . $obj->get_modelo() . "',
                '" . $obj->get_marca()  . "',
                '" . $obj->get_ano()    . "',
                '" . $obj->get_vendido() . "',
                '" . $obj->get_descricao() ."',
                '" . $obj->get_placa() . "',
                '" . $obj->get_preco() ."',
                '" . $obj->get_km() ."',
                '" . $obj->get_cambio() ."',
                '" . $obj->get_garantia_fabrica() ."')";

                return ($sql->rowCount() > 0);
        }
    }





?>