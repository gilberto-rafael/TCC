<?php
    include_once(dirname(__DIR__) . "../dao/alunoDAO.php");
    
    $dao = new alunoDAO();
    
    $item = new Aluno();

    $dadosJSON = json_decode($_POST['dados']);

    //Verifica qual a operação que deve ser executada
    
    if($dadosJSON->operacao == "insert"){
        $item->setNome($dadosJSON->nome_aluno);
        $item->setRfid($dadosJSON->rfid_aluno);
        $item->setMatricula($dadosJSON->matricula_aluno);
        $item->setOrgao($dadosJSON->orgao_expedidor_rg);
        $item->setRg($dadosJSON->rg_aluno);
        $item->setCep($dadosJSON->cep_aluno);
        $item->setEndereco($dadosJSON->endereco_aluno);
        $item->setNumero($dadosJSON->numero_aluno);
        $item->setBairro($dadosJSON->bairro_aluno);
        $item->setCidade($dadosJSON->cidade_aluno);
        $item->setUf($dadosJSON->uf_aluno);
        $item->setTelefone($dadosJSON->telefone_aluno);
        $item->setCelular($dadosJSON->celular_aluno);

        if($dao->insertAluno($item)){
            echo "sucesso";
        }else{
            echo "erro";
        }
    }else if($dadosJSON->operacao == "load"){

        $dados = $dao->loadAll();
        if($dados == NULL)
            echo "";
        else
            echo '{"dados":' . $dados . '}';
        
    }else if($dadosJSON->operacao == "show"){
        $dados = $dao->buscaId($dadosJSON->id_aluno);
        echo '{"dados":' . $dados . '}';
    }else if($dadosJSON->operacao == "delete"){
        if($dados = $dao->deleteAluno($dadosJSON->id_aluno)){
            echo 'sucesso';
        }else{
            echo 'erro';
        }
		
    }else if($dadosJSON->operacao == "edit"){
        $item->setId($dadosJSON->id_aluno);
        $item->setNome($dadosJSON->nome_aluno);
        $item->setMatricula($dadosJSON->matricula_aluno);
        $item->setOrgao($dadosJSON->orgao_expedidor_rg);
        $item->setRg($dadosJSON->rg_aluno);
        $item->setCep($dadosJSON->cep_aluno);
        $item->setEndereco($dadosJSON->endereco_aluno);
        $item->setNumero($dadosJSON->numero_aluno);
        $item->setBairro($dadosJSON->bairro_aluno);
        $item->setCidade($dadosJSON->cidade_aluno);
        $item->setUf($dadosJSON->uf_aluno);
        $item->setTelefone($dadosJSON->telefone_aluno);
        $item->setCelular($dadosJSON->celular_aluno);
        
        if($dao->atualizarAluno($item)){
            echo "sucesso";
        }else{
            echo "erro";
        }
    }   
?>