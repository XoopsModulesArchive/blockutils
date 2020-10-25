<?php

// ------------------------------------------------------------------------- //
//                XOOPS - PHP Content Management System                      //
//                       <http://xoopscube.org>                             //
// ------------------------------------------------------------------------- //
// Based on:             								     //
// myPHPNUKE Web Portal System - http://myphpnuke.com/         		     //
// PHP-NUKE Web Portal System - http://phpnuke.org/          		     //
// Thatware - http://thatware.org/      						     //
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

//My PM block//
function b_mypm_show()
{
    global $xoopsDB, $xoopsUser;

    $block = [];

    $block['title'] = _MB_MYPM_TITLE;

    $block['read'] = _MB_MYPM_R;

    $block['unread'] = _MB_MYPM_U;

    $block['total'] = _MB_WHATSNEW_ALL;

    if (is_object($xoopsUser)) {
        $user_uid = $xoopsUser->getVar('uid');

        $user_uname = $xoopsUser->getVar('uname');

        $block['info'] = _MB_MYPM_BOXOF . (string)$user_uname;

        $block['user'] = (string)$user_uname;

        $result = $xoopsDB->query('SELECT from_userid, to_userid,uid, uname, SUM(read_msg = 1) as readpm, SUM(read_msg = 0) as unreadpm, COUNT(*) as count
FROM ' . $xoopsDB->prefix('users') . ', ' . $xoopsDB->prefix('priv_msgs') . " 
WHERE to_userid = uid AND from_userid = $user_uid
GROUP BY uid
ORDER BY unreadpm DESC", 0, 0);

        while ($row = $xoopsDB->fetchArray($result)) {
            $mypm['uid'] = $row['uid'];

            $mypm['uname'] = $row['uname'];

            $mypm['total'] = $row['count'];

            $read = $row['readpm'];

            $unread = $row['unreadpm'];
        }

        if (0 != $read) {
            $mypm['read'] = "<font color=#009900><b>$read</b></font>";
        } else {
            $mypm['read'] = (string)$read;
        }

        if (0 != $unread) {
            $mypm['unread'] = "<font color=#990000><b>$unread</b></font>";
        } else {
            $mypm['unread'] = (string)$unread;
        }

        $block['contents'][] = $mypm;
    } else {
        $user_uid = 0;

        $user_uname = '';
    }

    return $block;
}



