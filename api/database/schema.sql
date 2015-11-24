

CREATE TABLE funcionarios (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome varchar(30) NOT NULL,
  sobrenome varchar(30) NOT NULL,
  cpf varchar(15) NOT NULL,
  rg varchar(10) NOT NULL,
  nacionalidade varchar(30) NOT NULL,
  email varchar(30) NOT NULL,
  nascimento date NOT NULL,
  idade int(3) NOT NULL,
  ddd int(3) NOT NULL,
  celular varchar(13) NOT NULL,
  sexo varchar(1) NOT NULL,
  PRIMARY KEY (id)
  )
  ENGINE=InnoDB;


INSERT INTO funcionarios (id, nome, sobrenome, cpf, rg, nacionalidade, email, nascimento, idade, ddd, celular, sexo) VALUES
(1, 'paulo','paschoal','12256685','12558','brasileiro','paulo@kaka','22/08/1994','15','35','3366854','M');