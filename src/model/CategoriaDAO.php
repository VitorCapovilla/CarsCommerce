<?php 

require_once ("CategoriaDTO.php");
require_once ("../db/conexao.php");


    class categoriaDAO{
        public function __construct(){
            $this->con = GerenciadoraDeConexoes::obter_conexao();
        }

        public function inserir($obj){ 
            $sql = $this->con->query("INSERT INTO categoria (categoria) VALUES (
            '" . $obj->get_categoria() . "')");

            return ($sql->rowCount() > 0);
        }

        public function alterar($obj){
            $sql = "UPDATE categoria SET 
                categoria = '" . $obj->get_categoria() . "'
                WHERE (codigo = " . $obj->get_codigo() . ")";

                $result = $this->con->query($sql);

            return ($result->rowCount() > 0);
        }

        private function obter_lista($cond = ""){
            $lista = [];
    
            $sql = "SELECT codigo, categoria FROM categoria";
            
            if ($cond != "")
                $sql = $sql . " WHERE (" . $cond . ")";
    
            $sql = $sql . " ORDER BY codigo";
    
            $meu_comando = $this->con->query($sql);
    
            while ($linha = $meu_comando->fetch(PDO::FETCH_ASSOC)){
                $obj = new categoria();
                $obj->set_codigo($linha['codigo']);
                $obj->set_categoria($linha['categoria']);
                
                array_push($lista, $obj);
            }
            return $lista;
        }

        public function obter_todos(){
            return $this->obter_lista();
        }

        public function obter_codigo($codigo){
            $list = $this->obter_lista("(codigo = '". $codigo ."')");

            if (count($list) == 0)
            throw new Exception("Categoria não localizada!");

        return $list[0];
        }

        public function excluir($codigo){
            $sql = $this->con->query("DELETE FROM categoria WHERE (codigo = '" . $codigo . "')");

            if($sql->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }
    }

?>