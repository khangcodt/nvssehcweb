<?php
////////////////////////////////////////////////////////////////////////
//Configuration file for the phpChess
////////////////////////////////////////////////////////////////////////

$conf['database_host'] = "mysql.hostinger.vn";
$conf['database_name'] = "u614204036_vnchs";
$conf['database_login'] = "u614204036_vnchs";
$conf['database_pass'] = "booklg13";

$conf['site_name'] = "Cộng đồng chơi Cờ Việt Nam";
$conf['site_url'] = "http://chessvn.org/phpchess/";
$conf['registration_email'] = "khanglq2014@gmail.com";

$conf['session_timeout_sec'] = 3600;

$conf['password_salt'] = "56YF+7]F/o,}`cx";

$conf['new_user_requires_approval'] = true;

$conf['chat_refresh_rate'] = 10;

$conf['absolute_directory_location'] = "/home/u614204036/public_html/phpchess/";

$conf['avatar_absolute_directory_location'] = "/home/u614204036/public_html/phpchess/avatars/";
$conf['avatar_image_disk_size_in_bytes'] = 102400;
$conf['avatar_image_width'] = 100;
$conf['avatar_image_height'] = 100;

$conf['view_chess_games_refresh_rate'] = 30;		// Number of seconds between updates when viewing games available.
$conf['last_move_check_rate'] = 10;			// Number of seconds between new move checks in realtime games.

?>