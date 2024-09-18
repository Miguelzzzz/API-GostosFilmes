create database bancofilme;
use bancofilme;

create table tbCliente (
    nomeCliente varchar(60) not null,
    email varchar(200) not null,
    cidade varchar(60) not null,
    telefone varchar(18) not null,
    cinemaFrequentado varchar(100) not null,
    precoIngresso decimal(5, 2) not null,
    codCliente int primary key auto_increment not null
) default charset = utf8;

create table tbgostosfilmes (
    filmeFavorito varchar(60) not null,
    generoFavorito varchar(60) not null,
    filmeOdiado varchar(60) not null,
    generoOdiado varchar(60) not null,
    atorFavorito varchar(100) not null,
    filmeSequencia varchar(60) not null,
    codCliente int not null,
    codGostos int primary key auto_increment not null,
    constraint FKcodCliente foreign key (codCliente) references tbCliente (codCliente) on delete cascade
) default charset = utf8;

-- select * from tbCliente;
-- select * from tbgostosfilmes;

-- drop database bancofilme;
