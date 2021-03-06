<?php
////////////////////////////////////////////////////////////////////////
//Configuration file for the chessvn site
////////////////////////////////////////////////////////////////////////

$conf['default_email_prefix'] = "defaultemail"; //will be added with random string
$conf['default_email_domain'] = "@chessvn.org";
$conf['highlight_new_challenge_rate'] = 300; // time (in second) for highlight new challenge by icon
$conf['coin_new_member'] = 5000; // coin for new member
$conf['coin_out_add'] = 500; // coin add when out of
$conf['coin_out_add_limit'] = 3; // limit times of adding coin out for a player in one day
$conf['initelo'] = 1200; // default ELO point for new players
$conf['chesstype_chess'] = 1; //chess = 1;
$conf['ratingtype_standard'] = 'standard';
$conf['default_avatar'] = '/images/no-avatar.jpg';// parent folder is media_chessvn, change this if want to change default avatar for new player
?>