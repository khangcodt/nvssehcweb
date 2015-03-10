#DROP TABLE IF EXISTS `#__autoplayer`;
CREATE TABLE IF NOT EXISTS `#__autoplayer` (
  `autoplayerid` int(11) NOT NULL AUTO_INCREMENT,
  `playerid` int(11) NOT NULL,
  `isonline` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'maybe not need',
  `isactive` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'set active by supper admin',
  `isplayopengame` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'is play open challenges',
  `acceptstart` smallint(6) DEFAULT NULL COMMENT 'acceptstart, acceptend: khoảng thời gian (randomly) autoplayer accept game mời bởi người khác (từ lúc bắt đầu mời đến lúc accept), tính theo giây',
  `acceptend` smallint(6) DEFAULT NULL,
  `elostart` smallint(6) NOT NULL DEFAULT '0' COMMENT 'elostart, eloend: khoảng ELO của autoplayer',
  `eloend` smallint(6) NOT NULL DEFAULT '0',
  `resttimestart` smallint(6) DEFAULT '0' COMMENT 'resttimestart, resttimeend: khoảng thời gian nghỉ giữa các game, tính theo giây',
  `resttimeend` smallint(6) DEFAULT '0',
  `chesstype` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'chess = 1, chinese chess = 2, chessvn = 3',
  PRIMARY KEY (`autoplayerid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='table lưu thông tin người chơi tự động';

#DROP TABLE IF EXISTS `#__autosetting`;
CREATE TABLE IF NOT EXISTS `#__autosetting` (
  `autosettingid` int(11) NOT NULL AUTO_INCREMENT,
  `autoplayerid` int(11) NOT NULL,
  `livetimestart` varchar(8) DEFAULT NULL COMMENT 'thời gian bắt đầu online',
  `livetimeend` varchar(8) DEFAULT NULL COMMENT 'thời gian kết thúc online, eg: 10h30',
  PRIMARY KEY (`autosettingid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='table lưu thông tin cài đặt cho auto player, first mai';

#DROP TABLE IF EXISTS `#__buddyblacklist`;
CREATE TABLE IF NOT EXISTS `#__buddyblacklist` (
  `bblid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id record',
  `playerid` int(11) NOT NULL COMMENT 'id người request bạn',
  `buddyid` int(11) DEFAULT NULL COMMENT 'id người accept request',
  `blackid` int(11) DEFAULT NULL COMMENT 'id player bị đưa vào blacklist',
  `chesstype` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'chess = 1, chinese chess = 2, chessvn = 3',
  `reqstate` varchar(10) DEFAULT NULL COMMENT 'trạng thái request (requested, approved, cancelled)',
  `createdtime` datetime DEFAULT NULL,
  PRIMARY KEY (`bblid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='table lưu thông tin danh sách bạn bè hoặc người k';

#DROP TABLE IF EXISTS `#__game`;
CREATE TABLE IF NOT EXISTS `#__game` (
  `gameid` varchar(50) NOT NULL COMMENT 'có thể lấy dạng random string (giống phpchess)',
  `status` enum('I','A','T','P','C','W') DEFAULT 'W' COMMENT 'Trạng thái game',
  `completionstatus` enum('W','B','D','A','I') NOT NULL DEFAULT 'I' COMMENT 'trạng thái hoàn thành game: ',
  `nextmove` enum('w','b') DEFAULT NULL COMMENT 'move tiếp theo (white side or black side)',
  `iscastlewl` tinyint(1) DEFAULT NULL COMMENT 'white nhập thành xa (long castle)',
  `iscastlews` tinyint(1) DEFAULT NULL COMMENT 'white nhập thành gần (short castle)',
  `iscastlebl` tinyint(1) DEFAULT NULL COMMENT 'black nhập thành xa (long castle)',
  `iscastlebs` tinyint(1) DEFAULT NULL COMMENT 'black nhập thành gần (short castle)',
  `drawrequest` enum('white','black','both') DEFAULT NULL COMMENT 'Xin hòa',
  `wtimeused` int(11) DEFAULT NULL COMMENT 'time used by white',
  `btimeused` int(11) DEFAULT NULL COMMENT 'time used by black',
  PRIMARY KEY (`gameid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='table lưu thông tin về các game';

#DROP TABLE IF EXISTS `#__gamechat`;
CREATE TABLE IF NOT EXISTS `#__gamechat` (
  `gamechatid` int(11) NOT NULL AUTO_INCREMENT,
  `gameid` varchar(50) NOT NULL COMMENT 'Game chứa nội dung các chat',
  `playerid` int(11) NOT NULL DEFAULT '0' COMMENT 'người chat',
  `chatmsg` text COMMENT 'nội dung chat',
  `createddate` datetime DEFAULT NULL,
  PRIMARY KEY (`gamechatid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='table lưu thông tin chat của 1 game, mỗi record là 1 chat';

#DROP TABLE IF EXISTS `#__gameoption`;
CREATE TABLE IF NOT EXISTS `#__gameoption` (
  `gameoptionid` int(11) NOT NULL AUTO_INCREMENT,
  `gameid` varchar(50) NOT NULL COMMENT 'gameid của table sehcnvs_game',
  `gametitle` varchar(300) DEFAULT NULL COMMENT 'Text mô tả game, khích tướng các đối thủ',
  `initiator` int(11) NOT NULL COMMENT 'người tạo game',
  `wplayerid` int(11) NOT NULL COMMENT 'playerid of white',
  `bplayerid` int(11) NOT NULL COMMENT 'playerid of black',
  `chesstype` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'chess = 1, chinese chess = 2, chessvn = 3',
  `gamecoin` bigint(20) DEFAULT NULL COMMENT 'Số tiền cược của game',
  `elowhite` smallint(6) NOT NULL COMMENT 'ELO white player',
  `eloblack` smallint(6) NOT NULL COMMENT 'ELO black player',
  `elomin` smallint(6) DEFAULT NULL COMMENT 'ELO nhỏ nhất có thể thấy và chơi game',
  `elomax` smallint(6) DEFAULT NULL COMMENT 'ELO lớn nhất có thể thấy và chơi game',
  `israting` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'rating game or not',
  `timemode` varchar(10) DEFAULT NULL COMMENT 'Chế độ thời gian (blitz, bullet, ...)',
  `maintime` smallint(6) DEFAULT NULL COMMENT 'thời gian của mỗi player',
  `incrementtime` smallint(6) DEFAULT NULL COMMENT 'thời gian cộng của mỗi nước đi',
  `starttime` datetime DEFAULT NULL COMMENT 'Thời gian game bắt đầu',
  `endtime` datetime DEFAULT NULL COMMENT 'Thời gian game kết thúc',
  `createdtime` datetime DEFAULT NULL COMMENT 'Thời gian tạo game',
  PRIMARY KEY (`gameoptionid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='table lưu thông tin các thông số thiết lập của g';

#DROP TABLE IF EXISTS `#__movehistory`;
CREATE TABLE IF NOT EXISTS `#__movehistory` (
  `moveid` bigint(20) NOT NULL AUTO_INCREMENT,
  `movetime` datetime NOT NULL COMMENT 'Thời gian tạo move',
  `playerid` int(11) NOT NULL COMMENT 'playerid tạo move',
  `move` varchar(10) NOT NULL COMMENT 'Description string for move (eg: Bd3 or d2d4 like that)',
  `gameid` varchar(50) NOT NULL COMMENT 'gameid of move',
  PRIMARY KEY (`moveid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='table lưu thông tin các move của game';

#DROP TABLE IF EXISTS `#__player`;
CREATE TABLE IF NOT EXISTS `#__player` (
  `playerid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL COMMENT 'userid of joomla system',
  `chesstitle` varchar(5) DEFAULT NULL COMMENT 'eg: GM, IM, ... (consider because other chess type',
  `coin` bigint(30) unsigned DEFAULT '0' COMMENT 'Số tiền của người chơi, sử dụng để cược vào các game',
  `favplayer` varchar(60) DEFAULT NULL COMMENT 'Tên kỳ thủ thần tượng (ưa thích)',
  `avatar` varchar(300) DEFAULT NULL COMMENT 'ảnh đại diện',
  PRIMARY KEY (`playerid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='table chứa các thông tin chung của player';

#DROP TABLE IF EXISTS `#__rating`;
CREATE TABLE IF NOT EXISTS `#__rating` (
  `ratingid` int(11) NOT NULL AUTO_INCREMENT,
  `playerid` int(11) NOT NULL,
  `chesstype` tinyint(4) NOT NULL COMMENT 'chess = 1, chinese chess = 2, chessvn = 3',
  `ratingtype` varchar(10) DEFAULT NULL COMMENT 'bullet, blitz, standard, ...',
  `ratingpoint` smallint(6) NOT NULL COMMENT 'ELO point of rating of player',
  `selfrating` smallint(6) DEFAULT NULL COMMENT 'elo tự đánh giá',
  PRIMARY KEY (`ratingid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='table lưu thông tin rating của player';

#DROP TABLE IF EXISTS `#__trophy`;
CREATE TABLE IF NOT EXISTS `#__trophy` (
  `trophyid` int(11) NOT NULL AUTO_INCREMENT,
  `playerid` int(11) NOT NULL COMMENT 'player đạt được danh hiệu',
  `trophytime` datetime DEFAULT NULL COMMENT 'thời gian đạt được giải',
  `name` varchar(500) DEFAULT NULL COMMENT 'tên giải thưởng đạt được',
  `chesstype` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'chess = 1, chinese chess = 2, chessvn = 3',
  `trophytype` varchar(5) DEFAULT NULL COMMENT 'Loại giải thưởng',
  `imageurl` varchar(300) DEFAULT NULL COMMENT 'ảnh đại diện của giải thưởng',
  PRIMARY KEY (`trophyid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='table lưu thông tin các danh hiệu, giải thưởng,';

-- #DROP VIEW IF EXISTS `#__challenges`;
-- CREATE OR REPLACE VIEW `#__Alltestchallenges` AS
--     select
--         `p`.`userid` AS `userid`,
--         `g`.`gameid` AS `gameid`,
--         `g`.`status` AS `status`,
--         `g`.`completionstatus` AS `completionstatus`,
--         `o`.`gametitle` AS `gametitle`,
--         `o`.`wplayerid` AS `wplayerid`,
--         `o`.`bplayerid` AS `bplayerid`,
--         `o`.`chesstype` AS `chesstype`,
--         `o`.`initiator` AS `initiator`,
--         `o`.`gamecoin` AS `gamecoin`,
--         `o`.`elowhite` AS `elowhite`,
--         `o`.`eloblack` AS `eloblack`,
--         `o`.`elomin` AS `elomin`,
--         `o`.`elomax` AS `elomax`,
--         `o`.`israting` AS `israting`,
--         `o`.`timemode` AS `timemode`,
--         `o`.`maintime` AS `maintime`,
--         `o`.`incrementtime` AS `incrementtime`,
--         `o`.`createdtime` AS `createdtime`,
--         `o`.`starttime` AS `starttime`,
--         `o`.`endtime` AS `endtime`
--     from
--         (((`#__users` `u`
--         join `#__player` `p` ON ((`p`.`userid` = `u`.`id`)))
--         left join `#__gameoption` `o` ON ((`o`.`initiator` = `p`.`playerid`)))
--         join `#__game` `g` ON ((`g`.`gameid` = `o`.`gameid`)));