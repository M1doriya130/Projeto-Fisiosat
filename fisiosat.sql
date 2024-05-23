/*script dabatase fisiosat*/

/*criação database*/
create database fisiosat;

/*usar o banco de dados*/
use fisiosat;

/*criação de tabelas*/
create table cadastro (
id_cadastro INT NOT NULL PRIMARY KEY auto_increment,
nome_cadastro varchar(255),
email varchar(100),
senha varchar(100),
telefone varchar(15),
convenio varchar(100)
);

create table especialidade (
id_especialidade INT NOT NULL PRIMARY KEY auto_increment,
nome_especialidade varchar(100)
);

create table profissionais (
id_profissional INT NOT NULL PRIMARY KEY auto_increment,
nome_profissional varchar(200),
id_especialidade int,
foreign key (id_especialidade) references especialidade(id_especialidade)
);

create table agendamento (
id_agendamento INT NOT NULL PRIMARY KEY auto_increment,
horario time,
data_agendamento date,
fk_especialidade INT,
fk_profissional INT,
FOREIGN KEY (fk_especialidade) REFERENCES especialidade(id_especialidade),
FOREIGN KEY (fk_profissional) REFERENCES profissionais(id_profissional)
);

insert into especialidade (nome_especialidade) values ('Fisioterapia');
insert into especialidade (nome_especialidade) values ('Acupuntura');
insert into especialidade (nome_especialidade) values ('Psicologia');
insert into especialidade (nome_especialidade) values ('Quiropraxia');

insert into profissionais (nome_profissional, id_especialidade) values ('Dr.Felipe Alvares da Silva', 1);


