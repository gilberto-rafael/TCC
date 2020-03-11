<?php
include_once ('../factory/connection.php');
include_once ('../domain/aluno.php');

class alunoDAO
{
    //inserir aluno
    public function insertAluno(Aluno $aluno)
    {
        $query = "INSERT INTO `teste`.`alunos`(`nome_aluno`,`rfid_aluno`,`matricula_aluno`,`orgao_expedidor_rg`,`rg_aluno`,`cep_aluno`,`endereco_aluno`,`numero_aluno`,`bairro_aluno`,`cidade_aluno`,`uf_aluno`,`telefone_aluno`,`celular_aluno`,`email_aluno`)VALUES (:nome,:rfid,:matricula,:orgao,:rg,:cep,:endereco,:numero,:bairro,:cidade,:uf,:telefone,:celular,:email);";
        $statement = Conexao::getConnection()->prepare($query);
        
        $statement->bindValue(":nome", $aluno->getNome());
        $statement->bindValue(":rfid", $aluno->getRfid());
        $statement->bindValue(":matricula", $aluno->getMatricula());
        $statement->bindValue(":orgao", $aluno->getOrgao());
        $statement->bindValue(":rg", $aluno->getRg());
        $statement->bindValue(":cep", $aluno->getCep());
        $statement->bindValue(":endereco", $aluno->getEndereco());
        $statement->bindValue(":numero", $aluno->getNumero());
        $statement->bindValue(":bairro", $aluno->getBairro());
        $statement->bindValue(":cidade", $aluno->getCidade());
        $statement->bindValue(":uf", $aluno->getUf());
        $statement->bindValue(":telefone", $aluno->getTelefone());
        $statement->bindValue(":celular", $aluno->getCelular());
        $statement->bindValue(":email", $aluno->getEmail());

        return $statement->execute();
    }

    //carregar todas as informações na tabela
    public function loadAll()
    {
        $query = "SELECT * FROM `teste`.`alunos`;";
        $statement = Conexao::getConnection()->prepare($query);
        
        if ($statement->execute()) {
            if ($statement->rowCount() > 0) {
                while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
                    $tabela[] = array(
                        'id_aluno' => $row->id_aluno,
                        'nome_aluno' => $row->nome_aluno,
                        'rfid_aluno' => $row->rfid_aluno,
                        'matricula_aluno' => $row->matricula_aluno,
                        'orgao_expedidor_rg' => $row->orgao_expedidor_rg,
                        'rg_aluno' => $row->rg_aluno,
                        'cep_aluno' => $row->cep_aluno,
                        'endereco_aluno' => $row->endereco_aluno,
                        'numero_aluno' => $row->numero_aluno,
                        'bairro_aluno' => $row->bairro_aluno,
                        'cidade_aluno' => $row->cidade_aluno,
                        'uf_aluno' => $row->uf_aluno,
                        'telefone_aluno' => $row->telefone_aluno,
                        'celular_aluno' => $row->celular_aluno,
                        'email_aluno' => $row->email_aluno

                    );
                }
            }
        }
        return json_encode($tabela);
    }

    //busca ao informar id
    public function buscaId($id)
    {
        $query = "SELECT * FROM `teste`.`alunos` WHERE id_aluno = :id;";
        $statement = Conexao::getConnection()->prepare($query);
        $statement->bindValue(":id", $id);
        
        if ($statement->execute()) {
            if ($statement->rowCount() > 0) {
                if ($row = $statement->fetch(PDO::FETCH_OBJ)) {
                    $tabela[] = array(
                        'id_aluno' => $row->id_aluno,
                        'nome_aluno' => $row->nome_aluno,
                        'rfid_aluno' => $row->rfid_aluno,
                        'matricula_aluno' => $row->matricula_aluno,
                        'orgao_expedidor_rg' => $row->orgao_expedidor_rg,
                        'rg_aluno' => $row->rg_aluno,
                        'cep_aluno' => $row->cep_aluno,
                        'endereco_aluno' => $row->endereco_aluno,
                        'numero_aluno' => $row->numero_aluno,
                        'bairro_aluno' => $row->bairro_aluno,
                        'cidade_aluno' => $row->cidade_aluno,
                        'uf_aluno' => $row->uf_aluno,
                        'telefone_aluno' => $row->telefone_aluno,
                        'celular_aluno' => $row->celular_aluno,
                        'email_aluno' => $row->email_aluno
                    );
                }
            }
        }    
        return json_encode($tabela);
    }

    //exclui
    public function deleteAluno($id)
    {
        $sql = "DELETE FROM `teste`.`alunos` WHERE" . " `teste`.`alunos`.`id_aluno` = :id_aluno";
        $statement = Conexao::getConnection()->prepare($sql);
        $statement->bindValue(":id_aluno", $id);
        
        return $statement->execute();
    }

    public function atualizarAluno($aluno)
    {
        $query = "UPDATE `teste`.`alunos` SET `nome_aluno`=:nome,`rfid_aluno`=:rfid,`matricula_aluno`=:matricula,`orgao_expedidor_rg`=:orgao,`rg_aluno`=:rg,`cep_aluno`=:cep,`endereco_aluno`=:endereco,`numero_aluno`=:numero,`bairro_aluno`=:bairro,`cidade_aluno`=:cidade,`uf_aluno`=:uf,`telefone_aluno`=:telefone,`celular_aluno`=:celular,`email_aluno`=:email WHERE `id_aluno`=:id_aluno";
     
        $statement = Conexao::getConnection()->prepare($query);
        $statement->bindValue(":id_aluno", $aluno->getId());
        $statement->bindValue(":nome", $aluno->getNome());
        $statement->bindValue(":rfid", $aluno->getRfid());
        $statement->bindValue(":matricula", $aluno->getMatricula());
        $statement->bindValue(":orgao", $aluno->getOrgao());
        $statement->bindValue(":rg", $aluno->getRg());
        $statement->bindValue(":cep", $aluno->getCep());
        $statement->bindValue(":endereco", $aluno->getEndereco());
        $statement->bindValue(":numero", $aluno->getNumero());
        $statement->bindValue(":bairro", $aluno->getBairro());
        $statement->bindValue(":cidade", $aluno->getCidade());
        $statement->bindValue(":uf", $aluno->getUf());
        $statement->bindValue(":telefone", $aluno->getTelefone());
        $statement->bindValue(":celular", $aluno->getCelular());
        $statement->bindValue(":email", $aluno->getEmail());

        return $statement->execute();
    }
}
?>