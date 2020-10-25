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

//PM block//
function b_pm_show($options)
{
    global $xoopsDB,$xoopsUser;

    $block = [];

    $block['title'] = _MB_PM_TITLE;

    $block['info'] = _MB_PM_LIMIT . " <font color=#FF0000><b>$options[0]</b></font> " . _MB_PM_NBR;

    $block['user'] = _MB_MYPM_USER;

    $block['read'] = _MB_MYPM_R;

    $block['unread'] = _MB_MYPM_U;

    $block['total'] = _MB_WHATSNEW_ALL;

    $result = $xoopsDB->query('SELECT from_userid, to_userid, msg_time, uid, uname, SUM(read_msg = 1) as readpm, SUM(read_msg = 0) as unreadpm , COUNT(*) as count
FROM ' . $xoopsDB->prefix('users') . ', ' . $xoopsDB->prefix('priv_msgs') . ' 
WHERE to_userid = uid 
GROUP BY to_userid
ORDER BY unreadpm DESC', 0, 0);

    while ($row = $xoopsDB->fetchArray($result)) {
        $uid = $row['uid'];

        $uname = $row['uname'];

        $read = $row['readpm'];

        $unread = $row['unreadpm'];

        $count = $row['count'];

        $mypm['uid'] = (string)$uid;

        if ($count >= $options[0]) {
            $mypm['uname'] = "<font color=#FF0000><b>$uname</b></font>";

            $mypm['total'] = "<font color=#FF0000><b>$count</b></font>";
        } else {
            $mypm['uname'] = (string)$uname;

            $mypm['total'] = (string)$count;
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
    }

    return $block;
}

function b_pm_edit($options)
{
    // Nombre de PM avant alerte -> 0

    $form = '' . _MB_PM_DISP . '&nbsp;';

    $form .= "<input type='text' name='options[]' size='3' value='" . $options[0] . "'>&nbsp;" . _MB_PM_NBR . '<br>';

    return $form;
}
