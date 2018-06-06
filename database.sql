DROP TABLE IF EXISTS `produto`;

/* Categoria */
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/* Categoria */

/* Produto */
CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` tinytext NOT NULL,
  `preco` float NOT NULL,
  `descricao` text,
  `imagem` tinytext,
  `categoria_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria_id` (`categoria_id`),
  FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/* Produto */

/* Usuário */
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `login` varchar(255) NOT NULL,
  `senha` varchar(1024) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/* Usuário */