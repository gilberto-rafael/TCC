<?php
include_once ('../factory/connection.php');
include_once ('../domain/pessoa.php');

class pessoaDAO
{
    //inserir pessoa
    public function insertPessoa(Pessoa $pessoa)
    {
        $query = "INSERT INTO `teste`.`pessoas`(`nome_pessoa`,`rfid_pessoa`,`matricula_pessoa`,`orgao_expedidor_rg`,`rg_pessoa`,`cep_pessoa`,`endereco_pessoa`,`numero_pessoa`,`bairro_pessoa`,`cidade_pessoa`,`uf_pessoa`,`telefone_pessoa`,`celular_pessoa`,`email_pessoa`)VALUES (:nome,:rfid,:matricula,:orgao,:rg,:cep,:endereco,:numero,:bairro,:cidade,:uf,:telefone,:celular,:email);";
        $statement = Conexao::getConnection()->prepare($query);
        
        $statement->bindValue(":nome", $pessoa->getNome());
        $statement->bindValue(":rfid", $pessoa->getRfid());
        $statement->bindValue(":matricula", $pessoa->getMatricula());
        $statement->bindValue(":orgao", $pessoa->getOrgao());
        $statement->bindValue(":rg", $pessoa->getRg());
        $statement->bindValue(":cep", $pessoa->getCep());
        $statement->bindValue(":endereco", $pessoa->getEndereco());
        $statement->bindValue(":numero", $pessoa->getNumero());
        $statement->bindValue(":bairro", $pessoa->getBairro());
        $statement->bindValue(":cidade", $pessoa->getCidade());
        $statement->bindValue(":uf", $pessoa->getUf());
        $statement->bindValue(":telefone", $pessoa->getTelefone());
        $statement->bindValue(":celular", $pessoa->getCelular());
        $statement->bindValue(":email", $pessoa->getEmail());

        return $statement->execute();
    }

    //carregar todas as informações na tabela
    public function loadAll()
    {
        $query = "SELECT * FROM `teste`.`pessoas`;";
        $statement = Conexao::getConnection()->prepare($query);
        
        if ($statement->execute()) {
            if ($statement->rowCount() > 0) {
                while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
                    $tabela[] = array(
                        'id_pessoa' => $row->id_pessoa,
                        'nome_pessoa' => $row->nome_pessoa,
                        'rfid_pessoa' => $row->rfid_pessoa,
                        'matricula_pessoa' => $row->matricula_pessoa,
                        'orgao_expedidor_rg' => $row->orgao_expedidor_rg,
                        'rg_pessoa' => $row->rg_pessoa,
                        'cep_pessoa' => $row->cep_pessoa,
                        'endereco_pessoa' => $row->endereco_pessoa,
                        'numero_pessoa' => $row->numero_pessoa,
                        'bairro_pessoa' => $row->bairro_pessoa,
                        'cidade_pessoa' => $row->cidade_pessoa,
                        'uf_pessoa' => $row->uf_pessoa,
                        'telefone_pessoa' => $row->telefone_pessoa,
                        'celular_pessoa' => $row->celular_pessoa,
                        'email_pessoa' => $row->email_pessoa

                    );
                }
            }
        }
        return json_encode($tabela);
    }

    //busca ao informar id
    public function buscaId($id)
    {
        $query = "SELECT * FROM `teste`.`pessoas` WHERE id_pessoa = :id;";
        $statement = Conexao::getConnection()->prepare($query);
        $statement->bindValue(":id", $id);
        
        if ($statement->execute()) {
            if ($statement->rowCount() > 0) {
                if ($row = $statement->fetch(PDO::FETCH_OBJ)) {
                    $tabela[] = array(
                        'id_pessoa' => $row->id_pessoa,
                        'nome_pessoa' => $row->nome_pessoa,
                        'rfid_pessoa' => $row->rfid_pessoa,
                        'matricula_pessoa' => $row->matricula_pessoa,
                        'orgao_expedidor_rg' => $row->orgao_expedidor_rg,
                        'rg_pessoa' => $row->rg_pessoa,
                        'cep_pessoa' => $row->cep_pessoa,
                        'endereco_pessoa' => $row->endereco_pessoa,
                        'numero_pessoa' => $row->numero_pessoa,
                        'bairro_pessoa' => $row->bairro_pessoa,
                        'cidade_pessoa' => $row->cidade_pessoa,
                        'uf_pessoa' => $row->uf_pessoa,
                        'telefone_pessoa' => $row->telefone_pessoa,
                        'celular_pessoa' => $row->celular_pessoa,
                        'email_pessoa' => $row->email_pessoa
                    );
                }
            }
        }    
        return json_encode($tabela);
    }

    //exclui
    public function deletePessoa($id)
    {
        $sql = "DELETE FROM `teste`.`pessoas` WHERE" . " `teste`.`pessoas`.`id_pessoa` = :id_pessoa";
        $statement = Conexao::getConnection()->prepare($sql);
        $statement->bindValue(":id_pessoa", $id);
        
        return $statement->execute();
    }

    public function atualizarPessoa($pessoa)
    {
        $query = "UPDATE `teste`.`pessoas` SET `nome_pessoa`=:nome,`rfid_pessoa`=:rfid,`matricula_pessoa`=:matricula,`orgao_expedidor_rg`=:orgao,`rg_pessoa`=:rg,`cep_pessoa`=:cep,`endereco_pessoa`=:endereco,`numero_pessoa`=:numero,`bairro_pessoa`=:bairro,`cidade_pessoa`=:cidade,`uf_pessoa`=:uf,`telefone_pessoa`=:telefone,`celular_pessoa`=:celular,`email_pessoa`=:email WHERE `id_pessoa`=:id_pessoa";
     
        $statement = Conexao::getConnection()->prepare($query);
        $statement->bindValue(":id_pessoa", $pessoa->getId());
        $statement->bindValue(":nome", $pessoa->getNome());
        $statement->bindValue(":rfid", $pessoa->getRfid());
        $statement->bindValue(":matricula", $pessoa->getMatricula());
        $statement->bindValue(":orgao", $pessoa->getOrgao());
        $statement->bindValue(":rg", $pessoa->getRg());
        $statement->bindValue(":cep", $pessoa->getCep());
        $statement->bindValue(":endereco", $pessoa->getEndereco());
        $statement->bindValue(":numero", $pessoa->getNumero());
        $statement->bindValue(":bairro", $pessoa->getBairro());
        $statement->bindValue(":cidade", $pessoa->getCidade());
        $statement->bindValue(":uf", $pessoa->getUf());
        $statement->bindValue(":telefone", $pessoa->getTelefone());
        $statement->bindValue(":celular", $pessoa->getCelular());
        $statement->bindValue(":email", $pessoa->getEmail());

        return $statement->execute();
    }
}
?>