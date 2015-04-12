# ===================================================================
# IMPORTANT: nhớ thay tiền tố tương ứng với db local khi update sql
# ===================================================================

# 4:01 PM 4/11/2015
# table lấy top player, jetset theo tuần, tháng
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
# thêm trường oponentid
ALTER TABLE cvn_gameoption
ADD COLUMN `oponentid` INT(11) NULL COMMENT 'đối thủ trong game, null nếu là open game' AFTER `initiator`;

# update viewchallenges, thêm oponentid, oponentname
CREATE OR REPLACE VIEW cvn_viewchallenges AS
  SELECT
    g.userid AS userid,
    a.gameid AS gameid,
    a.status AS status,
    a.completionstatus AS completionstatus,
    p.gametitle AS gametitle,
    p.chesstype AS chesstype,
    p.initiator AS initiator,
    p.oponentid AS oponentid,
    u.username AS initiatorname,
    uo.username AS oponentname,
    p.gamecoin AS gamecoin,
    p.elowhite AS elowhite,
    p.eloblack AS eloblack,
    p.israting AS israting,
    p.timemode AS timemode,
    p.maintime AS maintime,
    p.incrementtime AS incrementtime,
    p.createdtime AS createdtime
  FROM
    (((((cvn_users u JOIN cvn_player g ON ((g.userid = u.id)))
  LEFT JOIN cvn_gameoption p ON ((p.initiator = g.playerid)))
  JOIN cvn_game a ON ((a.gameid = p.gameid)))
  LEFT JOIN cvn_player po ON ((p.oponentid = po.playerid)))
  LEFT JOIN cvn_users uo ON ((po.userid = uo.id)));
# ===============================================================
