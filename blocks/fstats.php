<?php

// ------------------------------------------------------------------------- //
//                XOOPS - PHP Content Management System                      //
//                       <http://xoopscube.org>                             //
// ------------------------------------------------------------------------- //
// Based on:             //
// myPHPNUKE Web Portal System - http://myphpnuke.com/          //
// PHP-NUKE Web Portal System - http://phpnuke.org/          //
// Thatware - http://thatware.org/          //
// ------------------------------------------------------------------------- //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
// ------------------------------------------------------------------------- //

//My Forum stats block//
function b_fstats_show($options)
{
    global $xoopsDB, $xoopsUser;

    $myts = MyTextSanitizer::getInstance();

    $block = [];

    $block['title'] = _MB_FSTATS_TITLE;

    $block['direction'] = (string)$options[1];

    $block['info'] = '';

    $block['user'] = _MB_FSTATS_FORUMS;

    $block['total'] = _MB_FSTATS_POSTS;

    $block['lastpost'] = _MB_FSTATS_LASTPOSTS;

    if (is_object($xoopsUser)) {
        $user_uid = $xoopsUser->getVar('uid');
    } else {
        $user_uid = 0;
    }

    $result = $xoopsDB->query('SELECT t.uid, t.forum_id, t.post_time, t.subject, f.forum_id, f.forum_name, COUNT(*) as count 
FROM ' . $xoopsDB->prefix('bb_posts') . ' t, ' . $xoopsDB->prefix('bb_forums') . " f 
WHERE t.uid = $user_uid AND t.forum_id = f.forum_id
GROUP BY t.forum_id
ORDER BY count $options[3]
", $options[0], 0);

    while ($row = $xoopsDB->fetchArray($result)) {
        $fstats['forum_id'] = $row['forum_id'];

        $fstats['forum_name'] = htmlspecialchars($row['forum_name'], ENT_QUOTES | ENT_HTML5);

        $fstats['posts'] = $row['count'];

        $block['contents'][] = $fstats;
    }

    return $block;
}

function b_fstats_edit($options)
{
    require XOOPS_ROOT_PATH . '/modules/blockutils/include/pref_block.php';

    return $form;
}
