CREATE TABLE cvn_gameresultplayer
(
  gameresultplayerid INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  gameid VARCHAR(50) NOT NULL,
  playerid INT(11) NOT NULL,
  iswhite TINYINT(1) NOT NULL,
  gamestatus ENUM('W','B','D') NOT NULL,
  elochange INT(11),
  coinchange BIGINT(20),
  createdtime DATETIME
);
