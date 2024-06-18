create database proj;
create table tarefas_dia(
id int auto_increment primary key not null,
descricao varchar(100)not null,
dia varchar(100) not null,
quantidade int not null
);

create table tarefas_mes(
id int auto_increment primary key not null,
descricao varchar(100) not null,
data_entrega date not null
);

INSERT INTO tarefas_dia (descricao, dia, quantidade) 
VALUES ('Ir para academia', 'Segunda', '1'),
		('Cozinhar', 'Segunda', '3'),  
        ('Cozinhar', 'Quarta', '3'),
        ('Cozinhar', 'Sexta', '3'),
        ('Trabalhar', 'Segunda', '1');
        
INSERT INTO tarefas_mes (descricao, data_entrega) 
VALUES ('Trabalho de Node', '2024-06-04');

SELECT * FROM proj.tarefas;

ALTER TABLE tarefas_mes ADD COLUMN completo BOOLEAN NOT NULL DEFAULT 0;
ALTER TABLE tarefas_dia ADD COLUMN completo BOOLEAN NOT NULL DEFAULT 0;


