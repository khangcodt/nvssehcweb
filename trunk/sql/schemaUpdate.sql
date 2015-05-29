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
# view for top all player
CREATE OR REPLACE VIEW cvn_viewtopplayerall AS
  select
    u.id AS userid,
    p.playerid AS playerid,
    s.userid AS onlineid,
    s.client_id AS client_id,
    u.username AS username,
    r.ratingpoint AS ratingpoint,
    p.coin AS coin,
    p.avatar AS avatar,
    p.mediaplayer AS mediaplayer,
    r.chesstype AS chesstype,
    r.ratingtype AS ratingtype
  from
    (((cvn_users u
    join cvn_player p ON ((p.userid = u.id)))
    left join cvn_rating r ON ((r.playerid = p.playerid)))
    left join cvn_session s ON ((s.userid = u.id)))
  where
    (s.client_id is null) or (s.client_id = 0)  /*--offline or not admin*/
  group by u.id                                 /*chú ý dòng này trong trường hợp có các ratingtype khác*/
  order by r.ratingpoint desc;
# ===============================================================

# 2:43 PM 4/15/2015
# view for playerid top week
CREATE OR REPLACE VIEW cvn_viewtopplayeridweek AS
  select
    g.playerid AS playerid,
    sum(g.elochange) AS elosum
  from cvn_gameresultplayer g
  where g.createdtime <= now() and g.createdtime > (now() - interval 1 week)
  group by g.playerid
  order by elosum desc;

# view for playerid top month
CREATE OR REPLACE VIEW cvn_viewtopplayeridmonth AS
  select
    g.playerid AS playerid,
    sum(g.elochange) AS elosum
  from cvn_gameresultplayer g
  where g.createdtime <= now() and g.createdtime > (now() - interval 1 month)
  group by g.playerid
  order by elosum desc;

# view for top player week
CREATE OR REPLACE VIEW cvn_viewtopplayerweek AS
select
  p.userid AS userid,
  p.playerid AS playerid,
  s.userid AS onlineid,
  s.client_id AS client_id,
  u.username AS username,
  se.elosum AS elochange,
  p.coin AS coin,
  p.avatar AS avatar,
  p.mediaplayer AS mediaplayer,
  r.chesstype AS chesstype,
  r.ratingtype AS ratingtype
from
  ((((cvn_viewtopplayeridweek se
  left join cvn_player p ON ((se.playerid = p.playerid)))
  left join cvn_rating r ON ((r.playerid = p.playerid)))
  left join cvn_users u ON ((p.userid = u.id)))
  left join cvn_session s ON ((s.userid = p.userid)))
where (s.client_id is null) or (s.client_id = 0);

# view for top player month
CREATE OR REPLACE VIEW cvn_viewtopplayermonth AS
  select
    p.userid AS userid,
    p.playerid AS playerid,
    s.userid AS onlineid,
    s.client_id AS client_id,
    u.username AS username,
    se.elosum AS elochange,
    p.coin AS coin,
    p.avatar AS avatar,
    p.mediaplayer AS mediaplayer,
    r.chesstype AS chesstype,
    r.ratingtype AS ratingtype
  from
    ((((cvn_viewtopplayeridmonth se
  left join cvn_player p ON ((se.playerid = p.playerid)))
  left join cvn_rating r ON ((r.playerid = p.playerid)))
  left join cvn_users u ON ((p.userid = u.id)))
  left join cvn_session s ON ((s.userid = p.userid)))
  where (s.client_id is null) or (s.client_id = 0);

-- 11:06 AM 23/05/2015
-- # view for top jetset
CREATE OR REPLACE VIEW cvn_viewtopjetsetall AS
  select
    u.id AS userid,
    p.playerid AS playerid,
    s.userid AS onlineid,
    s.client_id AS client_id,
    u.username AS username,
    r.ratingpoint AS ratingpoint,
    p.coin AS coin,
    p.avatar AS avatar,
    p.mediaplayer AS mediaplayer,
    r.chesstype AS chesstype,
    r.ratingtype AS ratingtype
  from
    (((cvn_users u
    join cvn_player p ON ((p.userid = u.id)))
    left join cvn_rating r ON ((r.playerid = p.playerid)))
    left join cvn_session s ON ((s.userid = u.id)))
  where
    (s.client_id is null) or (s.client_id = 0)  /*--offline or not admin*/
  group by u.id
  order by p.coin desc;

--   8:51 PM 07/05/2015
# view for playerid top week jetset
CREATE OR REPLACE VIEW cvn_viewtopjetsetidweek AS
  select
    g.playerid AS playerid,
    sum(g.coinchange) AS coinsum
  from cvn_gameresultplayer g
  where g.createdtime <= now() and g.createdtime > (now() - interval 1 week)
  group by g.playerid
  order by coinsum desc;

# view for playerid top month jetset
CREATE OR REPLACE VIEW cvn_viewtopjetsetidmonth AS
  select
    g.playerid AS playerid,
    sum(g.coinchange) AS coinsum
  from cvn_gameresultplayer g
  where g.createdtime <= now() and g.createdtime > (now() - interval 1 month)
  group by g.playerid
  order by coinsum desc;

# view for top player week jetset
CREATE OR REPLACE VIEW cvn_viewtopjetsetweek AS
select
  p.userid AS userid,
  p.playerid AS playerid,
  s.userid AS onlineid,
  s.client_id AS client_id,
  u.username AS username,
  se.coinsum AS coinchange,
  r.ratingpoint AS ratingpoint,
  p.avatar AS avatar,
  p.mediaplayer AS mediaplayer,
  r.chesstype AS chesstype,
  r.ratingtype AS ratingtype
from
  ((((cvn_viewtopjetsetidweek se
  left join cvn_player p ON ((se.playerid = p.playerid)))
  left join cvn_rating r ON ((r.playerid = p.playerid)))
  left join cvn_users u ON ((p.userid = u.id)))
  left join cvn_session s ON ((s.userid = p.userid)))
where (s.client_id is null) or (s.client_id = 0);

# view for top jetset month
CREATE OR REPLACE VIEW cvn_viewtopjetsetmonth AS
  select
    p.userid AS userid,
    p.playerid AS playerid,
    s.userid AS onlineid,
    s.client_id AS client_id,
    u.username AS username,
    se.coinsum AS coinchange,
    r.ratingpoint AS ratingpoint,
    p.avatar AS avatar,
    p.mediaplayer AS mediaplayer,
    r.chesstype AS chesstype,
    r.ratingtype AS ratingtype
  from
    ((((cvn_viewtopjetsetidmonth se
  left join cvn_player p ON ((se.playerid = p.playerid)))
  left join cvn_rating r ON ((r.playerid = p.playerid)))
  left join cvn_users u ON ((p.userid = u.id)))
  left join cvn_session s ON ((s.userid = p.userid)))
  where (s.client_id is null) or (s.client_id = 0);

# 10:40 PM 26/05/2015
# view of requested friends
CREATE OR REPLACE VIEW cvn_viewrequestedfriends AS
    select
        bb.playerid AS playerid,
        p.userid AS userid,
        bb.buddyid AS friendid,
        s.userid AS onlineid,
        s.client_id AS client_id,
        u.username AS username,
        r.ratingpoint AS ratingpoint,
        p.coin AS coin,
        p.avatar AS avatar,
        p.mediaplayer AS mediaplayer,
        r.chesstype AS chesstype,
        r.ratingtype AS ratingtype
    from
        ((((cvn_buddyblacklist bb
        join cvn_player p ON ((p.playerid = bb.buddyid)))
        join cvn_users u ON ((p.userid = u.id)))
        left join cvn_rating r ON ((r.playerid = p.playerid)))
        left join cvn_session s ON ((s.userid = u.id)))
    where
        ((s.client_id is null) or (s.client_id = 0)) and (bb.reqstate = 'accepted');

# view of responded friends
CREATE OR REPLACE VIEW cvn_viewrespondedfriends AS
    select
        bb.buddyid AS buddyid,
        p.userid AS userid,
        bb.playerid AS friendid,
        s.userid AS onlineid,
        s.client_id AS client_id,
        u.username AS username,
        r.ratingpoint AS ratingpoint,
        p.coin AS coin,
        p.avatar AS avatar,
        p.mediaplayer AS mediaplayer,
        r.chesstype AS chesstype,
        r.ratingtype AS ratingtype
    from
        ((((cvn_buddyblacklist bb
        join cvn_player p ON ((p.playerid = bb.playerid)))
        join cvn_users u ON ((p.userid = u.id)))
        left join cvn_rating r ON ((r.playerid = p.playerid)))
        left join cvn_session s ON ((s.userid = u.id)))
    where
        ((s.client_id is null) or (s.client_id = 0)) and (bb.reqstate = 'accepted');
# ===============================================================

# thêm trường oponentid, bổ sung thông tin cho view challenges
ALTER TABLE cvn_gameoption
ADD COLUMN oponentid INT(11) NULL COMMENT 'đối thủ trong game, null nếu là open game' AFTER initiator;

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

# 4:54 PM 4/14/2015
# thêm cột mediaplayer vào bảng player đặt riêng thư mục media cho từng player
ALTER TABLE cvn_player ADD COLUMN mediaplayer VARCHAR(200) NULL COMMENT 'lưu thư mục media cho player, chứa các file ảnh, media'  AFTER avatar ;

# 2:49 PM 5/19/2015
# Thêm các thông tin bổ sung cho player profile
ALTER TABLE cvn_player ADD COLUMN birthday VARCHAR(20) NULL  AFTER mediaplayer , ADD COLUMN address VARCHAR(200) NULL  AFTER birthday , ADD COLUMN occupation VARCHAR(50) NULL  AFTER address , ADD COLUMN aboutme MEDIUMTEXT NULL  AFTER occupation ;

# 11:14 AM 5/22/2015
# thêm các thông tin thống kê game cho player trong bảng rating
ALTER TABLE cvn_rating ADD COLUMN gamewin INT NULL COMMENT 'number of win games'  AFTER selfrating , ADD COLUMN gamelost INT NULL COMMENT 'number of lost games'  AFTER gamewin , ADD COLUMN gamedraw INT NULL COMMENT 'number of draw games'  AFTER gamelost , COMMENT = 'table lưu thông tin thống kê của player' ;

# 9:54 PM 26/05/2015
# bỏ trường chesstype trong bảng buddyblacklist, kết bạn không có option là bạn ở loại cờ nào
ALTER TABLE cvn_buddyblacklist DROP COLUMN chesstype;

# 2:44 PM 5/29/2015
# thay đổi cấu trúc trophy, bảng trophy dùng để biên soạn các danh hiệu phía backend, thêm 1 bảng playertrophy lưu các danh hiệu mà player đạt được
ALTER TABLE cvn_trophy DROP COLUMN chesstype , DROP COLUMN trophytime , DROP COLUMN playerid , ADD COLUMN createdtime DATETIME NULL  AFTER imageurl;
CREATE  TABLE cvn_playertrophy (
  playertrophyid INT NOT NULL ,
  playerid INT NOT NULL ,
  trophyid INT NOT NULL ,
  chesstype TINYINT(4) NOT NULL DEFAULT '1' COMMENT 'chess = 1, chinese chess = 2, chessvn = 3' ,
  trophytime DATETIME NULL COMMENT 'thời điểm đạt được danh hiệu' ,
  PRIMARY KEY (playertrophyid) )
  COMMENT = 'bảng lưu thông tin các giải thưởng, danh hiệu (trophy) đạt được của player';
# ===============================================================