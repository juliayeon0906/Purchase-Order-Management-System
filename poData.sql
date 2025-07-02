SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `yeon`;

CREATE SCHEMA IF NOT EXISTS `yeon` DEFAULT CHARACTER SET utf8;

use `yeon`;

CREATE TABLE IF NOT EXISTS `yeon`.`Clients274` (
  `clientId274` int NOT NULL AUTO_INCREMENT,
  `clientName` varchar(45) NOT NULL,
  `clientPhone` varchar(45) NOT NULL,
  `moneyOwed` decimal(8,2) NOT NULL,
  PRIMARY KEY (`clientId274`),
  UNIQUE INDEX `clientId274_UNIQUE` (`clientId274` ASC)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `yeon`.`Parts274` (
  `partNo274` int NOT NULL AUTO_INCREMENT,
  `descPart` varchar(45) NULL,
  `pricePart` decimal(8,2) NOT NULL,
  `qoh` int NULL,
  PRIMARY KEY (`partNo274`),
  UNIQUE INDEX `partNo274_UNIQUE` (`partNo274` ASC)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `yeon`.`POs274` (
  `poNo274` int NOT NULL,
  `poClientCompId` int NOT NULL,
  `dateOfPO` date NOT NULL,
  `statusPO` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`poNo274`),
  KEY `fk_POs274_Clients274_idx` (`poClientCompId` ASC),
  UNIQUE INDEX `poNo274_UNIQUE` (`poNo274` ASC),
  CONSTRAINT `fk_clientId2741` FOREIGN KEY (`poClientCompId`) REFERENCES `yeon`.`Clients274` (`clientId274`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `yeon`.`Lines274` (
  `lineNo274` int NOT NULL AUTO_INCREMENT,
  `linePoNo274` int NOT NULL,
  `linePartNo` int NOT NULL,
  `qtyOrdered` int NOT NULL,
  `priceOrdered` decimal(8,2) NOT NULL,
  PRIMARY KEY (`lineNo274`,`linePoNo274`),
  KEY `fk_Lines274_POs2741_idx` (`linePoNo274` ASC),
  KEY `fk_Lines274_Parts2741_idx` (`linePartNo` ASC),
  CONSTRAINT `fk_Lines274_Parts2741` FOREIGN KEY (`linePartNo`) REFERENCES `Parts274` (`partNo274`),
  CONSTRAINT `fk_Lines274_POs2741` FOREIGN KEY (`linePoNo274`) REFERENCES `POs274` (`poNo274`)
) ENGINE=InnoDB;

delimiter $$
CREATE TRIGGER updateMoneyOwed
AFTER INSERT ON `Lines274`
FOR EACH ROW
BEGIN
    UPDATE `Client s274`
    SET moneyOwed = moneyOwed + (NEW.qtyOrdered * NEW.priceOrdered)
    WHERE clientId274 = (
        SELECT poClientCompId
        FROM `POs274`
        WHERE poNo274 = NEW.linePoNo274
    );
END$$
delimiter ;

INSERT INTO `Parts274` (`partNo274`, `descPart`, `pricePart`, `qoh`) VALUES ('100', 'Part1', '10.00', '6');
INSERT INTO `Parts274` (`partNo274`, `descPart`, `pricePart`, `qoh`) VALUES ('101', 'Part2', '20.00', '5');
INSERT INTO `Parts274` (`partNo274`, `descPart`, `pricePart`, `qoh`) VALUES ('102', 'Part3', '15.00', '8');

INSERT INTO `Clients274` (`clientId274`, `clientName`, `clientPhone`, `moneyOwed`) VALUES ('100', 'Julia', '9020010001', '100.00');
INSERT INTO `Clients274` (`clientId274`, `clientName`, `clientPhone`, `moneyOwed`) VALUES ('101', 'James', '9020020002', '200.00');
INSERT INTO `Clients274` (`clientId274`, `clientName`, `clientPhone`, `moneyOwed`) VALUES ('102', 'Sarah', '9020030003', '300.00');

INSERT INTO `POs274` (`poNo274`, `poClientCompId`, `dateOfPO`, `statusPO`) VALUES ('1000', '100', '2024-09-23 10:30:00', 'Shipped');
INSERT INTO `POs274` (`poNo274`, `poClientCompId`, `dateOfPO`, `statusPO`) VALUES ('1001', '100', '2024-09-24 10:30:00', 'Active');
INSERT INTO `POs274` (`poNo274`, `poClientCompId`, `dateOfPO`, `statusPO`) VALUES ('1002', '101', '2024-10-01 10:30:00', 'Active');

INSERT INTO `Lines274` (`lineNo274`, `linePoNo274`, `linePartNo`, `qtyOrdered`, `priceOrdered`) VALUES ('001', '1000', '100', '2', '20.00');
INSERT INTO `Lines274` (`lineNo274`, `linePoNo274`, `linePartNo`, `qtyOrdered`, `priceOrdered`) VALUES ('002', '1000', '101', '1', '20.00');

