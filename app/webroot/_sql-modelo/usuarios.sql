create table usuarios(
	id int primary key auto_increment,
	created datetime not null,
	modified datetime not null,
	nome varchar(250) not null,
	email varchar(250) not null,
	senha text not null,
	parceiro_id int not null default 0,
	tipo_usuario int not null default 0
);

create table parceiros(
	id int primary key auto_increment,
	created datetime not null,
	modified datetime not null,
	razaosocial text not null,
	tabela_id int not null default 0
);

create table tabelas(
	id int primary key auto_increment,
	created datetime not null,
	modified datetime not null,
	nome text not null
);

create table produtos(
	id int primary key auto_increment,
	created datetime not null,
	modified datetime not null,
	nome text not null
);

create table produto_tabelas(
	id int primary key auto_increment,
	created datetime not null,
	modified datetime not null,
	produto_id int not null default 0,
	tabela_id int not null default 0,
	preco float not null default 0
);

create table vendas(
	id int primary key auto_increment,
	created datetime not null,
	modified datetime not null,
	cliente_id int not null default 0,
	produto_venda_id int not null default 0,
	usuario_id int not null default 0,
	parceiro_id int not null default 0
);

create table produto_vendas(
	id int primary key auto_increment,
	created datetime not null,
	modified datetime not null,
	produto_id int not null default 0,
	preco float not null default 0
);

create table clientes(
	id int primary key auto_increment,
	created datetime not null,
	modified datetime not null,
	nome text not null,
	cnpj_cpf varchar(14) not null,
	parceiro_id int not null default 0,
	usuario_id int not null default 0
);