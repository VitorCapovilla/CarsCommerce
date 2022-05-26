<?php 

    require_once("MarcaDTO.php");
    require_once("../db/conexao.php");

    class MarcaDAO{
        private $con;

        public function __construct(){
            $this->con = GerenciadoraDeConexoes::obter_conexao();
        }

        public function inserir($obj){ 
            $sql = $this->con->query("INSERT INTO marca (marca) VALUES (
            '" . $obj->get_marca() . "')");

            return ($sql->rowCount() > 0);
        }

        public function alterar($obj){
            $sql = "UPDATE marca SET 
                marca = '" . $obj->get_marca() . "'
                WHERE (codigo = " . $obj->get_codigo() . ")";
            
            $result = $this->con->query($sql);

            return $result->rowCount() > 0;
        }

        public function excluir($codigo){
            $sql = $this->con->query("DELETE from marca WHERE (codigo = '" . $codigo . "')");

            if($sql->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }

        private function obter_lista($cond = ""){
            $lista = [];
    
            $sql = "SELECT codigo, marca FROM marca";
            
            if ($cond != "")
                $sql = $sql . " WHERE (" . $cond . ")";
    
            $sql = $sql . " ORDER BY codigo";
    
            $meu_comando = $this->con->query($sql);
    
            while ($linha = $meu_comando->fetch(PDO::FETCH_ASSOC)){
                $obj = new MarcaDTO();
                $obj->set_codigo($linha['codigo']);
                $obj->set_marca($linha['marca']);
                
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
            throw new Exception("Marca não localizada!");

        return $list[0];
        }
    }


?>