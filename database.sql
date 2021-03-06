﻿DROP TABLE IF EXISTS `Produto`;

/* Categoria */
DROP TABLE IF EXISTS `Categoria`;
CREATE TABLE `Categoria` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/* Categoria */

/* Produto */
CREATE TABLE `Produto` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  `preco` float NOT NULL,
  `descricao` text,
  `imagem` tinytext,
  `Categoria_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`Categoria_id`) REFERENCES `Categoria` (`id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/* Produto */

/* Usuário */
DROP TABLE IF EXISTS `Usuario`;
CREATE TABLE `Usuario` (
  `login` varchar(255) NOT NULL,
  `senha` varchar(1024) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/* Usuário */
