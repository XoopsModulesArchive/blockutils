<?php

// ------------------------------------------------------------------------- //
//                XOOPS - PHP Content Management System                      //
//                       <http://xoopscube.org>                             //
// ------------------------------------------------------------------------- //
// Based on:                                                                 //
// myPHPNUKE Web Portal System - http://myphpnuke.com/                       //
// PHP-NUKE Web Portal System - http://phpnuke.org/                          //
// Thatware - http://thatware.org/                                           //
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
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
// ------------------------------------------------------------------------- //
function b_stats_show()
{
    global $xoopsDB, $xoopsConfig;

    $block = [];

    $block['title'] = _MB_STATS_BNAME;

    $result = $xoopsDB->query('select uid, uname, level from ' . $xoopsDB->prefix('users') . "  where level='1' order by uid DESC", 1);

    [$uid, $lastuser] = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('SELECT uid from ' . $xoopsDB->prefix('users') . "  where level='1' order by uid   DESC", 1);

    [$numbers] = $xoopsDB->fetchRow($result);

    //$result = $xoopsDB->query("SELECT YEAR(time_str),MONTH(time_str),COUNT(*) from ".$xoopsDB->prefix("stats")." GROUP BY 1,2 ORDER BY 1,2  ");

    //list($totalc) = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('SELECT count(*) from ' . $xoopsDB->prefix('mydownloads_downloads') . '');

    [$numrows2] = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('SELECT count(*) from ' . $xoopsDB->prefix('bb_forums') . '');

    [$bbforum] = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('SELECT count(*) from ' . $xoopsDB->prefix('mylinks_links') . '');

    [$links] = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('SELECT count(com_id) from ' . $xoopsDB->prefix('xoopscomments') . '');

    [$comment] = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('SELECT count(*) from ' . $xoopsDB->prefix('stories') . '');

    [$news] = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('select sum(hits) from ' . $xoopsDB->prefix('mylinks_links') . '');

    [$hitsliens] = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('SELECT count(*) from ' . $xoopsDB->prefix('bb_posts') . '');

    [$bbpost] = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('SELECT count(*) from ' . $xoopsDB->prefix('bb_topics') . '');

    [$bbtopîcs] = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('select sum(hits) from ' . $xoopsDB->prefix('mydownloads_downloads') . '');

    [$hits] = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('select sum(topic_views) from ' . $xoopsDB->prefix('bb_topics') . '');

    [$postviews] = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('select sum(counter) from ' . $xoopsDB->prefix('stories') . '');

    [$storiesviews] = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('select count(tid) from ' . $xoopsDB->prefix('tutorials') . '');

    [$tutoriaux] = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('SELECT sum(hits) from ' . $xoopsDB->prefix('tutorials') . '');

    [$hitstutos] = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('SELECT sum(size) from ' . $xoopsDB->prefix('mydownloads_downloads') . '');

    [$kodownloads] = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('SELECT count(artid) from ' . $xoopsDB->prefix('seccont') . '');

    [$section] = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('SELECT sum(counter) from ' . $xoopsDB->prefix('seccont') . '');

    [$hitsection] = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('SELECT sum(isactive) from ' . $xoopsDB->prefix('modules') . '');

    [$modules] = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('SELECT count(bid) from ' . $xoopsDB->prefix('newblocks') . '');

    [$blocks] = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('SELECT count(msg_id) from ' . $xoopsDB->prefix('priv_msgs') . '');

    [$pm] = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('SELECT sum(read_msg=0) from ' . $xoopsDB->prefix('priv_msgs') . '');

    [$read_pm] = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('SELECT count(poll_id) from ' . $xoopsDB->prefix('xoopspoll_desc') . '');

    [$polls] = $xoopsDB->fetchRow($result);

    $result = $xoopsDB->query('SELECT sum(voters) from ' . $xoopsDB->prefix('xoopspoll_desc') . '');

    [$voters] = $xoopsDB->fetchRow($result);

    $block['content'] = '
	<center><b> ' . _MB_STATS_WELCOME . "</b>
	<a href='" . XOOPS_URL . "/userinfo.php?uid=$uid'><EM>
	<b><FONT color=#FF0000>$lastuser</FONT></EM></b></a><br>
	<br>

	<b>$numbers " . _MB_STATS_REGISTREDUSERS . "</b><br>
	(<a href='" . XOOPS_URL . "/modules/xoopsmembers/index.php'>
	" . _MB_STATS_LIST . '</a>)<br>
	<br>';

    if ($news > 0) {
        $block['content'] .= "<a href='" . XOOPS_URL . "/modules/news/index.php'>
	<b>$news</a> " . _MB_STATS_NEWS . "</b><br>
	(<b>$storiesviews</b> " . _MB_STATS_VIEW . ')<br>
	<br>';
    }

    if ($comment > 0) {
        $block['content'] .= "
	<b>$comment " . _MB_STATS_COMMENTS . '</b><br>
	<br>';
    }

    if ($numrows2 > 0) {
        $block['content'] .= "
	<a href='" . XOOPS_URL . "/modules/mydownloads/index.php'>
	<b>$numrows2</a> " . _MB_STATS_DOWNLOADSFILE . "</b><br>
	(<b>$hits</b> " . _MB_STATS_DOWNLOADS . ",<br>
	<b>$kodownloads</b> " . _MB_STATS_KO . ')<br>
	<br>';
    }

    if ($links > 0) {
        $block['content'] .= "
	<a href='" . XOOPS_URL . "/modules/mylinks/index.php'>
	<b>$links</a> " . _MB_STATS_LINKS . "</b><br>
	(<b>$hitsliens</b> " . _MB_STATS_HITS . ')<br>
	<br>';
    }

    if ($bbforum > 0) {
        $block['content'] .= "
	<a href='" . XOOPS_URL . "/modules/newbb/index.php'>
	<b>$bbforum</a> " . _MB_STATS_FORUMS . "</b><br>
	(<b>$bbpost</b> " . _MB_STATS_POSTS . ",<br>
	<b>$bbtopîcs</b> " . _MB_STATS_TOPICS . ",<br>
	<b>$postviews</b> " . _MB_STATS_VIEW . ')<br>
	<br>';
    }

    if ($section > 0) {
        $block['content'] .= "
	<a href='" . XOOPS_URL . "/modules/sections/index.php'>
	<b>$section</a> " . _MB_STATS_SECTIONS . "</b><br>
	(<b>$hitsection</b> " . _MB_STATS_VIEW . ')<br>
	<br>';
    }

    if ($polls > 0) {
        $block['content'] .= "
	<a href='" . XOOPS_URL . "/modules/xoopspolls/index.php'>
	<b>$polls</a> " . _MB_STATS_POLL . "</b><br>
	(<b>$voters</b> " . _MB_STATS_VOTERS . ')<br>
	<br>';
    }

    if ($tutoriaux > 0) {
        $block['content'] .= "
	<a href='" . XOOPS_URL . "/modules/tutorials/index.php'>
	<b>$tutoriaux</a> " . _MB_STATS_TUTORIALS . "</b><br>
	(<b>$hitstutos</b> " . _MB_STATS_VIEW . ')<br>
	<br>';
    }

    if ($pm > 0) {
        $block['content'] .= "
	<a href='" . XOOPS_URL . "/viewpmsg.php'>
	<b>$pm</a> " . _MB_STATS_PM . "</b><br>
	(<b>$read_pm</b> " . _MB_STATS_UNREADPM . ')<br>
	<br>';
    }

    $block['content'] .= "
	<b>$modules " . _MB_STATS_MODULES . "</b><br>
	(<b>$blocks</b> " . _MB_STATS_BLOCKS . ')
	</center>';

    return $block;
}
