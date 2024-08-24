<?php

include_once("../model/gostosfilmes.php");

$gostos = new GostosFilmes;

if (isset($_REQUEST["acao"])){
    switch ($_REQUEST["acao"]) {

        case 'cadastrar':
        $gostos->filmeFavorito = $_POST['filmefavorito'];
        $gostos->generoFavorito = $_POST['generofavorito'];
        $gostos->filmeOdiado = $_POST['filmeodiado'];
        $gostos->generoOdiado = $_POST['generoodiado'];
        $gostos->atorFavorito = $_POST['atorfavorito'];
        $gostos->filmeSequencia = $_POST['filmesequencia'];
        $gostos->codCliente = $_POST['codCliente'];
        $gostos->cadastrar();
                        
        echo "ok";
        break;

        case 'atualizar':            
        $gostos->filmeFavorito = $_POST['filmefavorito'];
        $gostos->generoFavorito = $_POST['generofavorito'];
        $gostos->filmeOdiado = $_POST['filmeodiado'];
        $gostos->generoOdiado = $_POST['generoodiado'];
        $gostos->atorFavorito = $_POST['atorfavorito'];
        $gostos->filmeSequencia = $_POST['filmesequencia'];
        $gostos->codCliente = $_POST['codCliente'];
        $gostos->codGostos = $_POST['codigo'];
        $gostos->atualizar();
            
        echo "ok";
        break;

        case 'excluir':
        $gostos->codGostos = $_POST['codigo'];
        $gostos->excluir();    
        echo "ok";
        break;

        case 'consultar_json':
            echo json_encode($gostos->consultar());
        break;

        case 'retorna_cod':
            $gostos->codGostos = $_POST['codigo'];
            echo json_encode($gostos->retornarDados());
        break;
    }
}

?>