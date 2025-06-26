-- Base de Dados: `banco`
--
create database banco;
use banco;
-- --------------------------------------------------------

--
-- Estrutura da tabela `tabelaimg`
--

CREATE TABLE IF NOT EXISTS `tabelaimg` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `prefixo` varchar(10) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `tripulacao` int(11) NOT NULL,
  `datafab` datetime NOT NULL,
  `imagem` varchar(30) NOT NULL
);

--
-- Extraindo dados da tabela `tabelaimg`
--

INSERT INTO `tabelaimg` (`prefixo`, `modelo`, `tripulacao`, `datafab`, `imagem`) VALUES
('F‑GZCP', 'Airbus A330‑203', 12, '2005-02-25','franca.jpeg'),
('VQ‑BJI', 'Boeing 737‑8AS', 6 , '2002-05-01', 'utau.jpeg'),
('HL‑8088','Boeing 737‑8AS', 6 , '2010-04-30', 'jeju.jpeg'),
('5A‑DIA', 'Boeing 727‑2L5',  9 ,'1975-02-09', 'arab.jpeg'),
('OE‑LAV', 'Boeing 767‑3Z9ER', 10 ,'2017-05-01', 'lauda.jpeg');