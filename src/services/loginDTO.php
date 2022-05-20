<?php 

class loginDTO{
    private $codigo;
    private $nome;
    private $sobrenome;
    private $telefone;
    private $email;
    private $cpf;
    private $senha;


    function set_codigo($x){
        $this->codigo = $x;
    }

    function get_codigo($x){
        return $this->codigo = $x;
    }

    function set_nome($x){
        $this->nome = $x;
    }
    
    function get_nome($x){
        return $this->nome = $x;
    }

    function set_sobrenome($x){
        $this->sobrenome = $x;
    }

    function get_sobrenome($x){
        return $this->sobrenome = $x;
    }

    function set_telefone($x){
        $this->telefone = $x;
    }

    function get_telefone($x){
        return $this->telefone = $x;
    }

    function set_email($x){
        $this->email = $x;
    }

    function get_email($x){
        return $this->email = $x;
    }

    function set_cpf($x){
        $this->cpf = $x;
    }

    function get_cpf($x){
        return $this->cpf = $x;
    }

    function set_senha($x){
        $this->senha = $x;
    }

    function get_senha($x){
        return $this->senha = $x;
    }
    
}

?>