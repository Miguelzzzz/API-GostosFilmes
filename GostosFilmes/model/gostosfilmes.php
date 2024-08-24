<?php

class GostosFilmes implements JsonSerializable{

    private $filmeFavorito;
    private $generoFavorito;
    private $filmeOdiado;
    private $generoOdiado;
    private $atorFavorito;
    private $filmeSequencia;
    private $codCliente;
    private $codGostos;

    function jsonSerialize(): mixed{
        return array(
            'filmeFavorito' => $this->filmeFavorito,
            'generoFavorito' => $this->generoFavorito,
            'filmeOdiado' => $this->filmeOdiado,
            'generoOdiado' => $this->generoOdiado,
            'atorFavorito' => $this->atorFavorito,
            'filmeSequencia' => $this->filmeSequencia,
            'codCliente' => $this->codCliente,
            'codGostos' => $this->codGostos,
        );
    }

    function __get($atributo){
        return $this->$atributo;
    }

    function __set($atributo, $value){
        $this->$atributo = $value;
    }
    
    private $con;

    function __construct(){
        include_once("conexao.php");
        $classe_con = new Conexao();
        $this->con = $classe_con->Conectar();
    }

    function cadastrar(){
        $comandoSql = "insert into tbgostosfilmes (filmeFavorito, generoFavorito, filmeOdiado, generoOdiado, atorFavorito, filmeSequencia, codCliente) values (?,?,?,?,?,?,?)";
        $valores = array($this->filmeFavorito, $this->generoFavorito, $this->filmeOdiado, $this->generoOdiado, $this->atorFavorito, $this->filmeSequencia, $this->codCliente);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
    }

    function atualizar(){
        $comandoSql = "update tbgostosfilmes set filmeFavorito = ?, generoFavorito = ?, filmeOdiado = ?, generoOdiado = ?, atorFavorito = ?, filmeSequencia = ?, codCliente = ? where codGostos = ?";
        $valores = array($this->filmeFavorito, $this->generoFavorito, $this->filmeOdiado, $this->generoOdiado, $this->atorFavorito, $this->filmeSequencia, $this->codCliente, $this->codGostos);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
    }

    function excluir(){
        $comandoSql = "delete from tbgostosfilmes where codGostos = ?";
        $valores = array($this->codGostos);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
    }

    function consultar(){
        $comandoSql = "select * from tbgostosfilmes";
        $exec = $this->con->prepare($comandoSql);
        $exec->execute(); 
        $dados = array();
    
        foreach ($exec->fetchAll() as $value) {
            $gostos = new GostosFilmes;
            $gostos->filmeFavorito = $value["filmeFavorito"];
            $gostos->generoFavorito = $value["generoFavorito"];
            $gostos->filmeOdiado = $value["filmeOdiado"];
            $gostos->generoOdiado = $value["generoOdiado"];
            $gostos->atorFavorito = $value["atorFavorito"];
            $gostos->filmeSequencia = $value["filmeSequencia"];
            $gostos->codCliente = $value["codCliente"];
            $gostos->codGostos = $value["codGostos"];
            $dados[] = $gostos;
        }
        return $dados;
    }

    function retornarDados(){
        $comandoSql = "select * from tbgostosfilmes where codGostos = ?";
        $valores = array($this->codGostos);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
        $value = $exec->fetch();
        $gostos = new GostosFilmes;
        $gostos->filmeFavorito = $value["filmeFavorito"];
        $gostos->generoFavorito = $value["generoFavorito"];
        $gostos->filmeOdiado = $value["filmeOdiado"];
        $gostos->generoOdiado = $value["generoOdiado"];
        $gostos->atorFavorito = $value["atorFavorito"];
        $gostos->filmeSequencia = $value["filmeSequencia"];
        $gostos->codCliente = $value["codCliente"];
        $gostos->codGostos = $value["codGostos"];
        return $gostos;
    }

    function retornarDadosNome(){
        $comandoSql = "select * from tbgostosfilmes where nome = ?";
        $valores = array($this->nome);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
        $value = $exec->fetch();
        $gostos = new GostosFilmes;
        $gostos->filmeFavorito = $value["filmeFavorito"];
        $gostos->generoFavorito = $value["generoFavorito"];
        $gostos->filmeOdiado = $value["filmeOdiado"];
        $gostos->generoOdiado = $value["generoOdiado"];
        $gostos->atorFavorito = $value["atorFavorito"];
        $gostos->filmeSequencia = $value["filmeSequencia"];
        $gostos->codCliente = $value["codCliente"];
        $gostos->codGostos = $value["codGostos"];
        return $gostos;
        }   
    }
?>