
CREATE TABLE `property` (
  `proprtyID` int(11) NOT NULL,
  `email` text,
  `prooertyName` varchar(250) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `address` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `bedroom` int(11) DEFAULT NULL,
  `bathroom` int(11) DEFAULT NULL,
  `extra` varchar(50) NOT NULL,
  `lease` int(25) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `availability` date DEFAULT NULL,
  `contraction` year(4) DEFAULT NULL,
  `problem` int(11) DEFAULT NULL,
  `note` longtext
) 