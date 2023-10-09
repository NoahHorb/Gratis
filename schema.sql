CREATE TABLE `login` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
CREATE TABLE `vehicles` (
  `vehicleid` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `vehiclename` varchar(100) NOT NULL,
  `citympg` smallint(6) NOT NULL,
  `hwympg` smallint(6) NOT NULL,
  `mileage` int(11) NOT NULL,
  `vin` varchar(100) NOT NULL,
  `dealerdescription` text NOT NULL,
  `stocknum` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `year` smallint(6) NOT NULL,
  PRIMARY KEY (`vehicleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
CREATE TABLE `features` (
  `vehicleid` int(11) NOT NULL,
  `option` varchar(100) DEFAULT NULL,
  KEY `newtable_fk` (`vehicleid`),
  CONSTRAINT `newtable_fk` FOREIGN KEY (`vehicleid`) REFERENCES `vehicles` (`vehicleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
CREATE TABLE `images` (
  `vehicleid` int(11) NOT NULL,
  `imagelink` varchar(100) DEFAULT NULL,
  KEY `images_fk` (`vehicleid`),
  CONSTRAINT `images_fk` FOREIGN KEY (`vehicleid`) REFERENCES `vehicles` (`vehicleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4