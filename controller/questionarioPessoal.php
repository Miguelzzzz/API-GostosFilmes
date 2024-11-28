<?php

include_once("../model/pessoal.php");

$pessoal = new Pessoal;

if (isset($_REQUEST["acao"])){
    switch ($_REQUEST["acao"]) {
    
        case 'cadastrar':
        $pessoal->nomeCliente = $_POST['nome'];
        $pessoal->email = $_POST['email'];
        $pessoal->cidade = $_POST['cidade'];
        $pessoal->telefone = $_POST['telefone'];
        $pessoal->cinemaFrequentado = $_POST['cinemafrequentado'];
        $pessoal->precoIngresso = $_POST['precoingresso'];
        $pessoal->cadastrar();
                        
        echo "ok";
        break;

        case 'atualizar':            
        $pessoal->nomeCliente = $_POST['nome'];
        $pessoal->email = $_POST['email'];
        $pessoal->cidade = $_POST['cidade'];
        $pessoal->telefone = $_POST['telefone'];
        $pessoal->cinemaFrequentado = $_POST['cinemafrequentado'];
        $pessoal->precoIngresso = $_POST['precoingresso'];
        $pessoal->codCliente = $_POST['codigo'];
        $pessoal->atualizar();
            
        echo "ok";
        break;

    case 'excluir':
        $pessoal->codCliente = $_POST['codigo'];
        $pessoal->excluir();
            
        echo "ok";
    break; 

    case 'consultar_json':
        echo json_encode($pessoal->consultar());
    break;

    case 'retorna_cod':
        $pessoal->codCliente = $_POST['codigo'];
        echo json_encode($pessoal->retornarDados());
    break;
        
    case 'retorna_nome':
        $pessoal->nomeCliente = $_POST['nome'];
        echo json_encode($pessoal->retornarDadosNome());
    break;

    case 'retorna_nome_din':
        $pessoal->nomeCliente = $_POST['nomeCliente'];
        echo json_encode($pessoal->retornarDadosNomeDinamico());
    break;
    }
}
?>