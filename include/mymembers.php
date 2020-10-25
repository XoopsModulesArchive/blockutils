<?php

//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://xoopscube.org>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //

$result = $xoopsDB->query('SELECT uid, uname, rank, posts, rank_id, rank_title, last_login 
FROM ' . $xoopsDB->prefix('users') . ', ' . $xoopsDB->prefix('ranks') . " 
WHERE ($options[8]='$options[9]' 
OR $options[8]='$options[10]' 
OR $options[8]='$options[11]' 
OR $options[8]='$options[12]' 
OR $options[8]='$options[13]' 
OR $options[8]='$options[14]' 
OR $options[8]='$options[15]'
OR $options[8]='$options[16]' 
OR $options[8]='$options[17]'
OR $options[8]='$options[18]'
) 
AND rank_id = $options[8]
AND (last_login < '$last_week_from' AND last_login > '$last_week_to') 
ORDER BY $options[4] $options[3]", $options[0], 0);

while ($row = $xoopsDB->fetchArray($result)) {
    $uid = $row['uid'];

    $posts = $row['posts'];

    $uname = $row['uname'];

    $rank_title = $row['rank_title'];

    $lastlogin = $row['last_login'];

    $rank_title_short = preg_replace("\[neWPC\]", '', $rank_title);

    $mymember['counter'] = "$a:";

    $mymember['uid'] = (string)$uid;

    $mymember['uname'] = (string)$uname;

    if ('yes' == $options[7]) {
        if ('0' == $lastlogin) {
            $mymember['last_login'] = '[<font color=#FF0000>M.I.A.</font>]';
        } else {
            $mymember['last_login'] = '[' . formatTimestamp($lastlogin, 'd.m.y') . ']';
        }

        if ('Lone Wolf' == $rank_title_short) {
            $mymember['rank_title'] = "<font color=#FF0000>$rank_title_short</font>";
        } else {
            $mymember['rank_title'] = (string)$rank_title_short;
        }

        $mymember['posts'] = "[$posts]";
    }

    $a++;

    $block['contents'][] = $mymember;
}
