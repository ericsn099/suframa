CREATE TABLE IF NOT EXISTS `andamento` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `porcentagem` INT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB; -- -----------------------------------------------------
-- Table `area_atuacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `area_atuacao` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(120) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB; -- -----------------------------------------------------
-- Table `cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cargo` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(120) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB; -- -----------------------------------------------------
-- Table `funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `funcionario` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `avatar` VARCHAR(100) NOT NULL,
    `path` VARCHAR(100) NOT NULL,
    `nome` VARCHAR(45) NOT NULL,
    `cpf` VARCHAR(15) NOT NULL,
    `login` VARCHAR(45) UNIQUE NOT NULL,
    `senha` VARCHAR(45) NOT NULL,
    `cargo_id` INT NOT NULL,
    `area_atuacao_id` INT NOT NULL,
    `tipouser` INT NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`area_atuacao_id`) REFERENCES `area_atuacao` (`id`),
    FOREIGN KEY (`cargo_id`) REFERENCES `cargo` (`id`)
) ENGINE = InnoDB; -- -----------------------------------------------------
-- Table `prioridade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prioridade` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB; -- -----------------------------------------------------
-- Table `tipo_demanda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tipo_demanda` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(120) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB; -- -----------------------------------------------------
-- Table `demanda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `demanda` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `descricao` VARCHAR(160) NOT NULL,
    `data_inicio` DATE NOT NULL,
    `data_termino` DATE NOT NULL,
    `observacao` VARCHAR(160) NOT NULL,
    `prioridade_id` INT NOT NULL,
    `tipo_demanda_id` INT NOT NULL,
    `andamento_id` INT NOT NULL,
    `funcionario_id` INT NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`andamento_id`) REFERENCES `andamento` (`id`),
    FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`),
    FOREIGN KEY (`prioridade_id`) REFERENCES `prioridade` (`id`),
    FOREIGN KEY (`tipo_demanda_id`) REFERENCES `tipo_demanda` (`id`)
) ENGINE = InnoDB;

INSERT INTO `andamento`(`porcentagem`) VALUES ('10'),('20'),('30'),('40'),('50'),('60'),('70'),('80'),('90'),('100');
INSERT INTO `area_atuacao`(`nome`) VALUES ('CGMOI'),('COSIS'),('DITIC');
INSERT INTO `cargo`(`nome`) VALUES ('Assessoria'),('Coordenador'),('Coordenador-Geral'),('Equipe Técnica'),('Estagiário'),('Secretária');
INSERT INTO `prioridade`(`nome`) VALUES ('Baixa'),('Média'),('Alta');
INSERT INTO `tipo_demanda`(`nome`) VALUES ('Desenvolvimento de Sistemas'),('Gestão de Pessoas'),('Gestão e Fiscalização de Contrato'),('Governança e Gestão TIC'),('Manutenção de Sistemas'),('Planejamento da Contratação'),('Segurança da Informação'),('Apoio à Gestão da CGMOI'),('Orgãos de Controle'),('Treinamento');
INSERT INTO `funcionario`(`avatar`, `path`, `nome`, `cpf`, `login`, `senha`, `cargo_id`, `area_atuacao_id`, `tipouser`) VALUES ('a','a','a','123','login','123','1','1','1');