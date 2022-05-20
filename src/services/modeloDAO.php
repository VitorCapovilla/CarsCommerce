<?php
    require_once('modeloDTO.php');
    require_once('../db/conexao.php');

    class modeloDAO{
        private $con;

        public function __construct(){
            $this->con = GerenciadoraDeConexoes::obter_conexao();
        }

        // Inserir Produto
        public function inserir($obj){
            $meu_resultado = $this->con->query("INSERT INTO modelo(modelo) VALUES ('" . $obj->get_modelo() . "')");
            
            return ($meu_resultado->rowCount() > 0);  
        }

        //Altera Categoria
        function alterar($objProdutos){
            $meu_comando = $this->con->query("UPDATE produtos SET titulo = '" . $objProdutos->get_titulo() . "', categoria = '" . $objProdutos->get_categoria() ."', imagem = '". $objProdutos->get_imagem() . "', descricao = '". $objProdutos->get_descricao() . "', peso = '" . $objProdutos->get_peso() . "', preco= '". $objProdutos->get_preco() . "' WHERE (codigo = " . $objProdutos->get_codigo(). ")");
    
            if ($meu_comando->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        //Excluir Categora
        function excluir($codigo){
            $meu_comando = $this->con->query("DELETE FROM produtos WHERE (codigo = '" . $codigo . "')");
    
            if ($meu_comando->rowCount() > 0){
                   return true;
               }
               else{
                   return false;
               }
        }

        // Obter Todos os Produtos
        public function obter_todos(){
            $meu_resultado = $this->con->query("SELECT codigo, titulo, categoria, imagem, descricao, peso, preco, autor, datahora FROM produtos");
            $produtos = [];

            while($linha = $meu_resultado->fetch(PDO::FETCH_ASSOC)){
                $objProduto = new Produto();
                $objProduto->set_codigo($linha['codigo']);
                $objProduto->set_titulo($linha['titulo']);
                $objProduto->set_categoria($linha['categoria']);
                $objProduto->set_imagem($linha['imagem']);
                $objProduto->set_descricao($linha['descricao']);
                $objProduto->set_peso($linha['peso']);
                $objProduto->set_preco($linha['preco']);
                $objProduto->set_autor($linha['autor']);
                $objProduto->set_datahora($linha['datahora']);

                array_push($produtos, $objProduto);
            }

            return $produtos;
        }

        // Obter Código
        function obter($codigo){
            $meu_comando =$this->con->query("SELECT codigo, titulo, categoria, imagem, descricao, peso, preco, autor, datahora FROM produtos WHERE (codigo = " . $codigo . ");");
            $linha = $meu_comando->fetch(PDO::FETCH_ASSOC);
    
            $c = new Produto();
            $c->set_codigo($linha['codigo']);
            $c->set_titulo($linha['titulo']);
            $c->set_categoria($linha['categoria']);
            $c->set_imagem($linha['imagem']);
            $c->set_descricao($linha['descricao']);
            $c->set_peso($linha['peso']);
            $c->set_preco($linha['preco']);
            $c->set_autor($linha['autor']);
            $c->set_datahora($linha['datahora']);
    
            return $c;
        }

        function obter_por_nome($nome){
            $lista = [];
            $meu_comando = $this->con->query("SELECT codigo, titulo, categoria, imagem, descricao, peso, preco, autor, datahora FROM produtos WHERE (titulo like '%" . $nome . "%');");
     
            while ($linha = $meu_comando->fetch(PDO::FETCH_ASSOC)) {
                $c = new Produto();
                $c->set_codigo($linha['codigo']);
                $c->set_titulo($linha['titulo']);
                $c->set_categoria($linha['categoria']);
                $c->set_imagem($linha['imagem']);
                $c->set_descricao($linha['descricao']);
                $c->set_peso($linha['peso']);
                $c->set_preco($linha['preco']);
                $c->set_autor($linha['autor']);
                $c->set_datahora($linha['datahora']);
        
                return $c;
            }
    
            return $lista;
        }
    }
?>