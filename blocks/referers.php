<?php

// ------------------------------------------------------------------------- //
//                XOOPS - PHP Content Management System                      //
//                       <http://xoopscube.org>                             //
// ------------------------------------------------------------------------- //
// Based on:             									//
// myPHPNUKE Web Portal System - http://myphpnuke.com/         			//
// PHP-NUKE Web Portal System - http://phpnuke.org/          			//
// Thatware - http://thatware.org/          						//
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
function b_referers_show($options)
{
    global $xoopsDB;

    $block = [];

    $block['title'] = _MB_LASTREFERERS_BNAME;

    $a = 1;

    $result = $xoopsDB->query("select data, date, visits from php_stats_referer where data<>'' order by date $options[3]", $options[0], 0);

    $direction = $options[1];

    if ('fix' != $options[1]) {
        $block['content'] = "<marquee behavior='scroll' direction='$direction' height='80' scrollamount='1' scrolldelay='60' onmouseover='this.stop()' onmouseout='this.start()'>";
    }

    while ($row = $xoopsDB->fetchArray($result)) {
        $url2 = preg_replace('_', ' ', $row['data']);

        $url2 = preg_replace(XOOPS_URL, '.......-->', $url2);

        $url2 = preg_replace('modules/', '-/', $url2);

        $url2 = preg_replace('/xoops/', '/', $url2);

        $url2 = mb_substr($url2, 7);

        if (mb_strlen($url2) > $options[2]) {
            $url2 = mb_substr($url2, 0, $options[2]);

            $url2 .= '...';
        }

        $block['content'] .= '<li>[' . formatTimestamp($row['date'], 'D H\hi') . '][' . $row['visits'] . "]&nbsp;<a href='" . $row['data'] . "' target='_blank'>$url2</a></li><br>";

        $a++;
    }

    if ('fix' != $options[1]) {
        $block['content'] .= '</marquee>';
    }

    return $block;
}

function b_referers_edit($options)
{
    require XOOPS_ROOT_PATH . '/modules/blockutils/include/pref_block.php';

    return $form;
}

function b_topreferers_show($options)
{
    global $xoopsDB;

    $block = [];

    $block['title'] = _MB_LASTREFERERS_BNAME;

    $a = 1;

    $result = $xoopsDB->query("select data, date, visits from php_stats_referer where data<>'' order by visits $options[3]", $options[0], 0);

    $direction = $options[1];

    if ('fix' != $options[1]) {
        $block['content'] = "<marquee behavior='scroll' direction='$direction' height='80' scrollamount='1' scrolldelay='60' onmouseover='this.stop()' onmouseout='this.start()'>";
    }

    while ($row = $xoopsDB->fetchArray($result)) {
        $url2 = preg_replace('_', ' ', $row['data']);

        $url2 = preg_replace(XOOPS_URL, '.......-->', $url2);

        $url2 = preg_replace('modules/', '-/', $url2);

        $url2 = preg_replace('/xoops/', '/', $url2);

        $url2 = mb_substr($url2, 7);

        if (mb_strlen($url2) > $options[2]) {
            $url2 = mb_substr($url2, 0, $options[2]);

            $url2 .= '...';
        }

        $block['content'] .= '<li>[' . formatTimestamp($row['date'], 'D H\hi') . '][' . $row['visits'] . "]&nbsp;<a href='" . $row['data'] . "' target='_blank'>$url2</a></li><br>";

        $a++;
    }

    if ('fix' != $options[1]) {
        $block['content'] .= '</marquee>';
    }

    return $block;
}

function b_topreferers_edit($options)
{
    require XOOPS_ROOT_PATH . '/modules/blockutils/include/pref_block.php';

    return $form;
}
