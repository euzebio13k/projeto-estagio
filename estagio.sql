create table vagas(
    id int auto_increment primary key,
    titulo varchar(100),
    descricao text,
    quantidade int,
    remuneracao decimal(7,2),
    data_abertura date,
    data_fechamento date,
    data_criacao timestamp
);

create table alunos(
    id int auto_increment primary key,
    nome varchar(255),
    cpf varchar(255) unique, 
    telefone varchar(255),
    email_institucional varchar(255) unique,
    email_pessoal varchar(255),
    matricula varchar(255) unique,
    curso varchar(255),
    periodo varchar(2),
    dtn date,
    nivel int
);

insert into alunos (nome, cpf, telefone, email_institucional, email_pessoal, matricula, curso, periodo, dtn, nivel)
values ('Admin','00000000000','0000','admin@ifto.edu.br','admin@gmail.com','000','Tecnologia da Informação','8','2001-01-01',2);

create table inscricao(
    id int auto_increment primary key,
    id_vaga int,
    id_aluno int,
    data_inscricao timestamp,
    status varchar(50),
    foreign key (id_vaga) references vagas (id),
    foreign key (id_aluno) references alunos (id)
);