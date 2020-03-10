use teste;

select * from alunos;
drop table alunos;

create table ALUNOS(
	id_aluno int not null primary key auto_increment,
	nome_aluno varchar(30),
	rfid_aluno varchar(20),
	matricula_aluno varchar(30),
    orgao_expedidor_rg char(2),
	rg_aluno varchar(30),
	cep_aluno varchar(10),
    endereco_aluno varchar(50),
	numero_aluno varchar(30),
	bairro_aluno varchar(30),
	cidade_aluno varchar(30),
	uf_aluno varchar(2),
	telefone_aluno varchar(20),
	celular_aluno varchar(16),
	email_aluno varchar(50),
    status_ativo boolean
);
	
truncate table alunos;

insert into ALUNOS (nome_aluno, rfid_aluno, matricula_aluno, orgao_expedidor_rg, rg_aluno, cep_aluno, endereco_aluno, numero_aluno, bairro_aluno, cidade_aluno, uf_aluno, telefone_aluno, celular_aluno, email_aluno) values
('Rafael G. Palmeira', '1234', '055678', 'SP','50.413.264-7', '18730-000', 'rua dos bobos', '342', 'centro', 'itai', 'sp', '(14) 3769-9200', '(14) 99631-3828', 'teste@dominio');
