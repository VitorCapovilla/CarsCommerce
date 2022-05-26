CREATE TABLE produtos (
    codigo int(6) PRIMARY KEY not null AUTO_INCREMENT,
    modelo varchar(25),
    marca varchar(25),
    ano varchar(10),
    vendido int(1),
    descricao varchar(500),
    placa varchar(10),
    preco varchar(10),
    km varchar(10),
    cambio varchar(25),
    garantia_fabrica varchar(5)
);

create table marca(
    codigo int(6) PRIMARY KEY not null AUTO_INCREMENT,
    marca varchar(25)
);

create table modelo(
    codigo int(6) PRIMARY KEY not null AUTO_INCREMENT,
    modelo varchar(25)
);

create table administrador(
    codigo int(6) PRIMARY KEY not null AUTO_INCREMENT,
    nome varchar(25),
    cargo varchar(20),
    cpf varchar(14),
    telefone varchar(20),
    senha varchar(20)
);

create table cargo(
    codigo int(6) PRIMARY KEY not null AUTO_INCREMENT,
    cargo varchar(20)
);