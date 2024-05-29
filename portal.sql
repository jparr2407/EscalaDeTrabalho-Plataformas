SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `escala_teste`
--
-- Estrutura da tabela `escala`
--

CREATE TABLE IF NOT EXISTS `escala` (
`id` bigint(20) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `cel` varchar(50) NOT NULL,
  `dt_plantao` date NOT NULL,
  `hora_ent` varchar(8) NOT NULL,
  `hora_sai` varchar(8) NOT NULL,
  `setor` varchar(100) NOT NULL,
  `funcao` varchar(50) NOT NULL
);

--
-- Estrutura da Tabela Admins, para controle de usuários.
--
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
);

--
-- Estrutura da Tabela de Logs, para controle de comandos executados como: INSERT, UPDATE ou DELETE.
--
CREATE TABLE `escala_log` (
  `log_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `operation` varchar(10) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `operation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_name` varchar(50) DEFAULT NULL,
  `old_data` varchar(200) DEFAULT NULL,
  `new_data` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
);

--
-- Estrutura das Triggers que são importantes para realizar a inserção dos logs.
--

-- Trigger para executar após o INSERT, para armazenar os dados que foram inseridos na tabela de Escala. 
CREATE TRIGGER escala_insert_trigger
AFTER INSERT ON escala_teste.escala
FOR EACH ROW
BEGIN
    INSERT INTO escala_log (operation, table_name, user_name, new_data)
    VALUES ('INSERT', 'escala', USER(), CONCAT('ID: ', NEW.id, ', Nome: ', NEW.nome, ', Celular: ', NEW.cel, ', Data do Plantão: ', NEW.dt_plantao, ', Hora de Entrada: ', NEW.hora_ent, ', Hora de Saída: ', NEW.hora_sai, ', Setor: ', NEW.setor, ', Função: ', NEW.funcao));
END

-- Trigger para executar após o UPDATE, para armazenar os dados novos e antigos daquele update.
CREATE TRIGGER escala_update_trigger
AFTER UPDATE ON escala
FOR EACH ROW
BEGIN
    INSERT INTO escala_log (operation, table_name, user_name, old_data, new_data)
    VALUES ('UPDATE', 'escala', USER(), CONCAT('ID: ', OLD.id, ', Nome: ', OLD.nome, ', Celular: ', OLD.cel, ', Data do Plantão: ', OLD.dt_plantao, ', Hora de Entrada: ', OLD.hora_ent, ', Hora de Saída: ', OLD.hora_sai, ', Setor: ', OLD.setor, ', Função: ', OLD.funcao), CONCAT('ID: ', NEW.id, ', Nome: ', NEW.nome, ', Celular: ', NEW.cel, ', Data do Plantão: ', NEW.dt_plantao, ', Hora de Entrada: ', NEW.hora_ent, ', Hora de Saída: ', NEW.hora_sai, ', Setor: ', NEW.setor, ', Função: ', NEW.funcao));
END

-- Trigger para executar após o DELETE, para armazenar os dados do registro que foi deletado
CREATE TRIGGER escala_delete_trigger
AFTER DELETE ON escala
FOR EACH ROW
BEGIN
    INSERT INTO escala_log (operation, table_name, user_name, old_data)
    VALUES ('DELETE', 'escala', USER(), CONCAT('ID: ', OLD.id, ', Nome: ', OLD.nome, ', Celular: ', OLD.cel, ', Data do Plantão: ', OLD.dt_plantao, ', Hora de Entrada: ', OLD.hora_ent, ', Hora de Saída: ', OLD.hora_sai, ', Setor: ', OLD.setor, ', Função: ', OLD.funcao));
END