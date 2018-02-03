
CREATE TABLE `property` (
  `proprtyID` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `prooertyName` varchar(250) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zipcode` varchar(15) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `type` varchar(15) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `bedroom` int(11) DEFAULT NULL,
  `bathroom` int(11) DEFAULT NULL,
  `extra` text,
  `lease` varchar(15) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `availability` date DEFAULT NULL,
  `contraction` year(4) DEFAULT NULL,
  `problem` text,
  `note` text
) 