use teste;

create schema teste;
drop schema teste;

create table if not exists pessoas(
	id_pessoa int not null primary key auto_increment,
    matricula_pessoa varchar(30),
	nome_pessoa varchar(30),
	rfid_pessoa varchar(20),
    nivel_acesso_id int(2) NOT NULL,
    senha_pessoa varchar(50) default '202cb962ac59075b964b07152d234b70',
    orgao_expedidor_rg char(2),
	rg_pessoa varchar(30),
	cep_pessoa varchar(10),
    endereco_pessoa varchar(50),
	numero_pessoa varchar(30),
	bairro_pessoa varchar(30),
	cidade_pessoa varchar(30),
	uf_pessoa varchar(2),
	telefone_pessoa varchar(20),
	celular_pessoa varchar(16),
	email_pessoa varchar(50),
    status_ativo boolean default '1'
);

select * from pessoas;

drop table pessoas;

truncate table pessoas;

insert into PESSOAS (nome_pessoa, rfid_pessoa, matricula_pessoa, nivel_acesso_id, orgao_expedidor_rg, rg_pessoa, cep_pessoa, endereco_pessoa, numero_pessoa, bairro_pessoa, cidade_pessoa, uf_pessoa, telefone_pessoa, celular_pessoa, email_pessoa) values
('Rafael G. Palmeira', '1234', '055678', '1', 'SP','50.413.264-7', '18730-000', 'rua dos bobos', '342', 'centro', 'itai', 'sp', '(14) 3769-9200', '(14) 99631-3828', '123@teste');

insert into PESSOAS (nome_pessoa, rfid_pessoa, matricula_pessoa, nivel_acesso_id, orgao_expedidor_rg, rg_pessoa, cep_pessoa, endereco_pessoa, numero_pessoa, bairro_pessoa, cidade_pessoa, uf_pessoa, telefone_pessoa, celular_pessoa, email_pessoa) values
('Bonnie Feia', '1111', '055679', '2', 'SP','50.999.264-7', '18739-899', 'rua dos bobos', '342', 'Rural', 'itai', 'sp', '(14) 3769-9200', '(14) 99631-3828', '1@qwe');



CREATE TABLE IF NOT EXISTS niveis_acessos (
	id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome varchar(50) NOT NULL,
	created datetime NOT NULL,
	modified datetime DEFAULT NULL
);

select * from niveis_acessos;

CREATE VIEW vw_login AS SELECT p.id_pessoa, p.nome_pessoa, p.matricula_pessoa, p.nivel_acesso_id, p.email_pessoa, p.senha_pessoa, p.status_ativo FROM pessoas p INNER JOIN niveis_acessos n ON p.nivel_acesso_id = n.id;

select * from vw_login;

select p.id_pessoa, p.nome_pessoa, p.matricula_pessoa, p.nivel_acesso_id, p.email_pessoa, p.senha_pessoa, p.status_ativo FROM pessoas p INNER JOIN niveis_acessos n ON p.nivel_acesso_id = n.id where p.status_ativo=1;

CREATE TABLE IF NOT EXISTS `tabela_imagens` (
`codigo` int(10) PRIMARY KEY auto_increment,
`nome_imagem` varchar(25) NOT NULL,
`tamanho_imagem` varchar(25) NOT NULL,
`tipo_imagem` varchar(25) NOT NULL,
`imagem` longblob NOT NULL
);

select * from tabela_imagens;
drop table tabela_imagens;

select * from imagem;
drop table imagem;

CREATE TABLE imagem ( 
PES_ID int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
PES_IMG BLOB 
);

-- ----------------------------------