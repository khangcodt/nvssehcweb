
#test sql for module online & top players
#================================
#sql at home PC
SELECT a.username, p.userid, p.coin, r.ratingpoint
FROM joomla25.sehcnvs_users as a
LEFT JOIN joomla25.sehcnvs_player AS p ON p.userid = a.id
LEFT JOIN joomla25.sehcnvs_rating AS r ON r.playerid = p.playerid
WHERE r.chesstype = 1 AND r.ratingtype = 'standard'
GROUP BY a.id;

#sql at office PC
SELECT a.username, p.userid, p.coin, r.ratingpoint
 FROM joomla25.cvn_users AS a 
LEFT JOIN joomla25.cvn_player AS p ON p.userid = a.id
LEFT JOIN joomla25.cvn_rating AS r ON r.playerid = p.playerid 
WHERE r.chesstype = 1 AND r.ratingtype = "standard" GROUP BY a.id;

SELECT a.username, a.time, a.userid, a.usertype, a.client_id, p.coin, r.ratingpoint
 FROM joomla25.cvn_session AS a 
LEFT JOIN joomla25.cvn_player AS p ON p.userid = a.userid
LEFT JOIN joomla25.cvn_rating AS r ON r.playerid = p.playerid 
WHERE a.userid != 0 AND a.client_id = 0 AND r.chesstype = 1 AND r.ratingtype = "standard" GROUP BY a.userid;
#================================

#test sql  show all chellenges
#================================
#sql at home PC
SELECT g.userid,a.gameid, a.status, a.completionstatus, p.gametitle, p.chesstype, p.initiator, p.gamecoin, p.elowhite, p.eloblack, p.israting, p.timemode, p.maintime, p.incrementtime, p.createdtime
FROM joomla25.sehcnvs_users AS u 
 JOIN joomla25.sehcnvs_player AS g ON g.userid = u.id
LEFT JOIN joomla25.sehcnvs_gameoption AS p ON p.initiator = g.playerid 
 JOIN joomla25.sehcnvs_game AS a ON a.gameid = p.gameid
WHERE p.chesstype = 1 AND u.id = 630;

#sql at office PC
SELECT p.userid,g.gameid, g.status, g.completionstatus, o.gametitle, o.wplayerid, o.bplayerid, o.chesstype, o.initiator, o.gamecoin, o.elowhite, o.eloblack, o.elomin, o.elomax, o.israting, o.timemode, o.maintime, o.incrementtime, o.createdtime, o.starttime, o.endtime
FROM joomla25.cvn_users AS u 
 JOIN joomla25.cvn_player AS p ON p.userid = u.id
LEFT JOIN joomla25.cvn_gameoption AS o ON o.initiator = p.playerid 
 JOIN joomla25.cvn_game AS g ON g.gameid = o.gameid
WHERE o.chesstype = 1 AND u.id = 630;

-- sql test for top player in week
select p.playerid, elosum, coin, avatar from (SELECT playerid, sum(elochange) as elosum
FROM `cvn_gameresultplayer` group by playerid order by elosum desc) as se left join cvn_player as p on se.playerid = p.playerid
--===================================================