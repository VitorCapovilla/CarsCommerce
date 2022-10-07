<?php 

    require_once("ModeloDTO.php");
    require_once("CategoriaDTO.php");
    require_once("MarcaDTO.php");
    require_once("../db/conexao.php");

    class ModeloDAO{
        private $con;

        public function __construct(){
            $this->con = GerenciadoraDeConexoes::obter_conexao();
        }

        public function inserir($objModelo){ 
            $sql = "INSERT INTO modelo(nome, marca, categoria) VALUES (
                '" . $objModelo->get_nome_modelo() . "',
                '" . $objModelo->get_marca()->get_codigo() . "',
                '" . $objModelo->get_categoria()->get_codigo() . "')";
    
            $meu_resultado = $this->con->query($sql);
        
            return ($meu_resultado->rowCount() > 0);

        }

        public function alterar($objModelo){
            $sql = "UPDATE modelo SET 
                nome = '" . $objModelo->get_nome_modelo() . "',
                marca = '" . $objModelo->get_marca()->get_codigo() . "',
                categoria = '" . $objModelo->get_categoria()->get_codigo() . "'
                WHERE (codigo = " . $objModelo->get_codigo() . ")";
            
            $result = $this->con->query($sql);

            return $result->rowCount() > 0;
        }

        public function excluir($codigo){
            $sql = $this->con->query("DELETE from modelo WHERE (codigo = '" . $codigo . "')");

            if($sql->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }

        private function obter_lista($cond = ""){
            $lista = [];
    
            $sql = "SELECT mo.codigo, mo.nome, ma.codigo as codigo_marca, ma.nome as nome_marca, ca.codigo as codigo_categoria, ca.categoria as nome_categoria 
                    FROM modelo as mo
                    LEFT JOIN marca as ma on mo.marca = ma.codigo 
                    LEFT JOIN categoria as ca on mo.categoria = ca.codigo";
            
            if ($cond != "") 
                $sql = $sql .  " WHERE (" . $cond . ") ";
    
            $sql = $sql . " ORDER BY mo.nome";
    
            $meu_comando = $this->con->query($sql);
    
            while ($linha = $meu_comando->fetch(PDO::FETCH_ASSOC)){
    
                $c = new modelo();
                $c->set_codigo($linha['codigo']);
                $c->set_nome_modelo($linha['nome']);
    
                $c->set_marca(new marca());
                $c->get_marca()->set_codigo($linha['codigo_marca']);
                $c->get_marca()->set_nome_marca($linha['nome_marca']);
    
                $c->set_categoria(new categoria());
                $c->get_categoria()->set_codigo($linha['codigo_categoria']);
                $c->get_categoria()->set_categoria($linha['nome_categoria']);
        
                array_push($lista, $c);
            }
            return $lista;
        }

        public function obter_todos(){
            return $this->obter_lista();
        }

        public function obter_codigo($codigo){
            $list = $this->obter_lista("(mo.codigo = '". $codigo ."')");

            if (count($list) == 0)
            throw new Exception("Modelo não localizado!");

        return $list[0];
        }
    }

?>