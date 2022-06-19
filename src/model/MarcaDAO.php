<?php 

    require_once("MarcaDTO.php");
    require_once("../db/conexao.php");

    class MarcaDAO{
        private $con;

        public function __construct(){
            $this->con = GerenciadoraDeConexoes::obter_conexao();
        }

        public function inserir($obj){ 
            $sql = $this->con->query("INSERT INTO marca (nome) VALUES (
            '" . $obj->get_nome_marca() . "')");

            return ($sql->rowCount() > 0);
        }

        public function alterar($obj){
            $sql = "UPDATE marca SET 
                nome = '" . $obj->get_nome_marca() . "'
                WHERE (codigo = " . $obj->get_codigo() . ")";
            
            $result = $this->con->query($sql);

            return $result->rowCount() > 0;
        }

        public function excluir($codigo){
            $sql = $this->con->query("DELETE FROM marca WHERE (codigo = '" . $codigo . "')");

            if($sql->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }

        private function obter_lista($cond = ""){
            $lista = [];
    
            $sql = "SELECT codigo, nome FROM marca";
            
            if ($cond != "")
                $sql = $sql . " WHERE (" . $cond . ")";
    
            $sql = $sql . " ORDER BY codigo";
    
            $meu_comando = $this->con->query($sql);
    
            while ($linha = $meu_comando->fetch(PDO::FETCH_ASSOC)){
                $obj = new marca();
                $obj->set_codigo($linha['codigo']);
                $obj->set_nome_marca($linha['nome']);
                
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