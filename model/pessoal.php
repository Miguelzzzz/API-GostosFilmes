<?php

class Pessoal implements JsonSerializable {

    private $nomeCliente;
    private $email;
    private $cidade;
    private $telefone;
    private $cinemaFrequentado;
    private $precoIngresso;
    private $codCliente;

    function jsonSerialize(): mixed {
        return array(
            'nomeCliente' => $this->nomeCliente,
            'email' => $this->email,
            'cidade' => $this->cidade,
            'telefone' => $this->telefone,
            'cinemaFrequentado' => $this->cinemaFrequentado,
            'precoIngresso' => $this->precoIngresso,
            'codCliente' => $this->codCliente,
        );
    }

    function __get($atributo){
        return $this->$atributo;
    }

    function __set($atributo, $value){
        $this->$atributo = $value;
    }

    private $con;

    function __construct() {
        include_once("conexao.php");
        $classe_con = new Conexao();
        $this->con = $classe_con->Conectar();
    }

    function cadastrar() {
        $comandoSql = "insert into tbCliente (nomeCliente, email, cidade, telefone, cinemaFrequentado, precoIngresso) values (?, ?, ?, ?, ?, ?)";
        $valores = array($this->nomeCliente, $this->email, $this->cidade, $this->telefone, $this->cinemaFrequentado, $this->precoIngresso);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
    }

    function atualizar() {
        $comandoSql = "update tbCliente set nomeCliente = ?, email = ?, cidade = ?, telefone = ?, cinemaFrequentado = ?, precoIngresso = ? where codCliente = ?";
        $valores = array($this->nomeCliente, $this->email, $this->cidade, $this->telefone, $this->cinemaFrequentado, $this->precoIngresso, $this->codCliente);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
    }

    function excluir() {
        $comandoSql = "delete from tbCliente where codCliente = ?";
        $valores = array($this->codCliente);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
    }

    function consultar() {
        $comandoSql = "select * from tbCliente";
        $exec = $this->con->prepare($comandoSql);
        $exec->execute();
        $dados = array();
    
        foreach ($exec->fetchAll(PDO::FETCH_ASSOC) as $value) {
            $infos = new self();
            $infos->nomeCliente = $value["nomeCliente"];
            $infos->email = $value["email"];
            $infos->cidade = $value["cidade"];
            $infos->telefone = $value["telefone"];
            $infos->cinemaFrequentado = $value["cinemaFrequentado"];
            $infos->precoIngresso = $value["precoIngresso"];
            $infos->codCliente = $value["codCliente"];
            $dados[] = $infos;
        }
        return $dados;
    }

    function retornarDados() {
        $comandoSql = "select * from tbCliente where codCliente = ?";
        $valores = array($this->codCliente);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
        $value = $exec->fetch(PDO::FETCH_ASSOC);
    
        if ($value) {
            $this->nomeCliente = $value["nomeCliente"];
            $this->email = $value["email"];
            $this->cidade = $value["cidade"];
            $this->telefone = $value["telefone"];
            $this->cinemaFrequentado = $value["cinemaFrequentado"];
            $this->precoIngresso = $value["precoIngresso"];
            $this->codCliente = $value["codCliente"];
        }
        return $this;
    }

    function retornarDadosNome() {
        $comandoSql = "select * from tbCliente where nomeCliente = ?";
        $valores = array($this->nomeCliente);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
        $value = $exec->fetch(PDO::FETCH_ASSOC);
    
        if ($value) {
            $this->nomeCliente = $value["nomeCliente"];
            $this->email = $value["email"];
            $this->cidade = $value["cidade"];
            $this->telefone = $value["telefone"];
            $this->cinemaFrequentado = $value["cinemaFrequentado"];
            $this->precoIngresso = $value["precoIngresso"];
            $this->codCliente = $value["codCliente"];
        }
        return $this;
    }
    
    function retornarDadosNomeDinamico(){
        $comandoSql = "select * from tbCliente where nomeCliente like ?";
        $valores = array("%".$this->nomeCliente."%");
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);

        foreach ($exec->fetchAll(PDO::FETCH_ASSOC) as $value) {
            $infos = new self();
            $infos->nomeCliente = $value["nomeCliente"];
            $infos->email = $value["email"];
            $infos->cidade = $value["cidade"];
            $infos->telefone = $value["telefone"];
            $infos->cinemaFrequentado = $value["cinemaFrequentado"];
            $infos->precoIngresso = $value["precoIngresso"];
            $infos->codCliente = $value["codCliente"];
            $dados[] = $infos;
        }
        return $dados;
        }


    }
?>
