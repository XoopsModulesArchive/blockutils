<?php

function count_entries($dbtable, $datefield)
{
    // init variables

    $countres = [0, 0, 0, 0];

    // count for today

    $newDB = mktime(0, 0, 0, date('m'), date('d'), date('Y'));

    $result = $GLOBALS['xoopsDB']->queryF("select count(*) as count FROM $dbtable WHERE $datefield > $newDB");

    $countres[1] = mysql_result($result, 0, 'count');

    // count for yesterday
//    $newDayRaw = (time()-(86400 * 1));

    $newDayRaw = mktime(0, 0, 0, date('m'), date('d') - 1, date('Y'));

    $newDB1 = $newDayRaw;

    $result = $GLOBALS['xoopsDB']->queryF("select count(*) as count FROM $dbtable WHERE $datefield < $newDB and $datefield > $newDB1");

    $countres[2] = mysql_result($result, 0, 'count');

    // count for last 7 days (this week)

    $counter = 2;

    $countres[3] = $countres[1] + $countres[2];

    while ($counter <= 7 - 1) {
//        $newDayRaw = (time()-(86400 * $counter));

        $newDayRaw = mktime(0, 0, 0, date('m'), date('d') - 7, date('Y'));

        $newDB = $newDB1;

        $newDB1 = $newDayRaw;

        $result = $GLOBALS['xoopsDB']->queryF("select count(*) as count FROM $dbtable WHERE $datefield < $newDB and $datefield > $newDB1");

        $x = mysql_result($result, 0, 'count');

        $countres[3] += mysql_result($result, 0, 'count');

        $counter++;
    }

    // total count

    $newDB = mktime(0, 0, 0, date('m'), date('d'), date('Y'));

    $result = $GLOBALS['xoopsDB']->queryF("select count(*) as count FROM $dbtable");

    $countres[4] = mysql_result($result, 0, 'count');

    // here comes something bad. If res is zero, stay as number, otherwise become a string.
    $countres[5] = $countres[3];        // remember all sum
    $counter = 1;

    while ($counter <= 3) {
        if ($countres[$counter] > 0) {
            $countres[$counter] = '<b>' . $countres[$counter] . '</b>';
        }

        $counter++;
    }

    return $countres;
}

function b_whatsnew_show()
{
    global $xoopsDB, $xoopsUser;

    $xoopsDB = XoopsDatabaseFactory::getDatabaseConnection();

    $moduleHandler = xoops_getHandler('module');

    $block = [];

    $block['title'] = _MB_WHATSNEW_NEWS;

    $aline = "<tr><td class='bg2' colspan='4'></td></tr>";

    $entry = 0;

    // title

    $block['content'] = '';

    $block['content'] .= "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";

    $block['content'] .= "<tr><td><font class='pn-normal'>&nbsp;</font></td>";

    $block['content'] .= "<td align='center'><font class='pn-menu'>&nbsp;<b>" . _MB_WHATSNEW_T . '</b>&nbsp;</font></td>';

    $block['content'] .= "<td align='center'><font class='pn-menu'>&nbsp;<b>" . _MB_WHATSNEW_Y . '</b>&nbsp;</font></td>';

    $block['content'] .= "<td align='center'><font class='pn-menu'>&nbsp;<b>" . _MB_WHATSNEW_W . '</b>&nbsp;</font></td>';

    $block['content'] .= "<td align='center'><font class='pn-menu'>&nbsp;<b>" . _MB_WHATSNEW_ALL . "</b>&nbsp;</font></td></tr>\n";

    $block['content'] .= "$aline\n";

    // stories

    if ($moduleHandler->getCount(new Criteria('dirname', 'news'))) {
        $stores = count_entries($xoopsDB->prefix('stories'), 'published');

        if ($stores[5] > 0) {
            $block['content'] .= "<tr><td><li><a class='pn-menu' href='" . XOOPS_URL . "/modules/news/index.php'>" . _MB_WHATSNEW_ARTICLES . '</a></li></td>';

            $block['content'] .= "<td align='center'><font class='pn-menu'>$stores[1]</font></td>";

            $block['content'] .= "<td align='center'><font class='pn-menu'>$stores[2]</font></td>";

            $block['content'] .= "<td align='center'><font class='pn-menu'>$stores[3]</font></td>";

            $block['content'] .= "<td align='center'><font class='pn-menu'>$stores[4]</font></td></tr>\n";

            $block['content'] .= "$aline\n";

            $entry = 1;
        }
    }

    // downloads

    if ($moduleHandler->getCount(new Criteria('dirname', 'mydownloads'))) {
        $downres = count_entries($xoopsDB->prefix('mydownloads_downloads'), 'date');

        if ($downres[5] > 0) {
            $block['content'] .= "<tr><td><li><a class='pn-menu' href='" . XOOPS_URL . "/modules/mydownloads/index.php'>" . _MB_WHATSNEW_DOWNLOADS . '</a></li></td>';

            $block['content'] .= "<td align='center'><font class='pn-menu'>$downres[1]</font></td>";

            $block['content'] .= "<td align='center'><font class='pn-menu'>$downres[2]</font></td>";

            $block['content'] .= "<td align='center'><font class='pn-menu'>$downres[3]</font></td>";

            $block['content'] .= "<td align='center'><font class='pn-menu'>$downres[4]</font></td></tr>\n";

            $block['content'] .= "$aline\n";

            $entry = 1;
        }
    }

    // web links

    if ($moduleHandler->getCount(new Criteria('dirname', 'mylinks'))) {
        $linkres = count_entries($xoopsDB->prefix('mylinks_links'), 'date');

        if ($linkres[5] > 0) {
            $block['content'] .= "<tr><td><li><a class='pn-menu' href='" . XOOPS_URL . "/modules/mylinks/index.php'>" . _MB_WHATSNEW_LINKS . '</a></li></td>';

            $block['content'] .= "<td align='center'><font class='pn-menu'>$linkres[1]</font></td>";

            $block['content'] .= "<td align='center'><font class='pn-menu'>$linkres[2]</font></td>";

            $block['content'] .= "<td align='center'><font class='pn-menu'>$linkres[3]</font></td>";

            $block['content'] .= "<td align='center'><font class='pn-menu'>$linkres[4]</font></td></tr>\n";

            $block['content'] .= "$aline\n";

            $entry = 1;
        }
    }

    // comments

    $comments = count_entries($xoopsDB->prefix('xoopscomments'), 'com_modified');

    if ($comments[5] > 0) {
        $block['content'] .= "<tr><td><li><a class='pn-menu' href='" . XOOPS_URL . "/index.php'>" . _MB_WHATSNEW_COMMENTS . '</a></li></td>';

        $block['content'] .= "<td align='center'><font class='pn-menu'>$comments[1]</font></td>";

        $block['content'] .= "<td align='center'><font class='pn-menu'>$comments[2]</font></td>";

        $block['content'] .= "<td align='center'><font class='pn-menu'>$comments[3]</font></td>";

        $block['content'] .= "<td align='center'><font class='pn-menu'>$comments[4]</font></td></tr>\n";

        $block['content'] .= "$aline\n";

        $entry = 1;
    }

    // forums posts newBB

    if ($moduleHandler->getCount(new Criteria('dirname', 'newbb'))) {
        $postbb = count_entries($xoopsDB->prefix('bb_posts'), 'post_time');

        if ($postbb[5] > 0) {
            $block['content'] .= "<tr><td><li><a class='pn-menu' href='" . XOOPS_URL . "/modules/newbb/index.php'>" . _MB_WHATSNEW_POSTFORUMS . '</a></li></td>';

            $block['content'] .= "<td align='center'><font class='pn-menu'>$postbb[1]</font></td>";

            $block['content'] .= "<td align='center'><font class='pn-menu'>$postbb[2]</font></td>";

            $block['content'] .= "<td align='center'><font class='pn-menu'>$postbb[3]</font></td>";

            $block['content'] .= "<td align='center'><font class='pn-menu'>$postbb[4]</font></td></tr>\n";

            $block['content'] .= "$aline\n";

            $entry = 1;
        }

        // forums topics newBB

        if ($moduleHandler->getCount(new Criteria('dirname', 'newbb'))) {
            $sujets = count_entries($xoopsDB->prefix('bb_topics'), 'topic_time');

            if ($sujets[5] > 0) {
                $block['content'] .= "<tr><td><li><a class='pn-menu' href='" . XOOPS_URL . "/modules/newbb/index.php'>" . _MB_WHATSNEW_POSTSUJETS . '</a></li></td>';

                $block['content'] .= "<td align='center'><font class='pn-menu'>$sujets[1]</font></td>";

                $block['content'] .= "<td align='center'><font class='pn-menu'>$sujets[2]</font></td>";

                $block['content'] .= "<td align='center'><font class='pn-menu'>$sujets[3]</font></td>";

                $block['content'] .= "<td align='center'><font class='pn-menu'>$sujets[4]</font></td></tr>\n";

                $block['content'] .= "$aline\n";

                $entry = 1;
            }
        }

        // forums posts IPB

        if ($moduleHandler->getCount(new Criteria('dirname', 'ipb'))) {
            $sujets = count_entries($xoopsDB->prefix('ipb_posts'), 'start_date');

            if ($sujets[5] > 0) {
                $block['content'] .= "<tr><td><li><a class='pn-menu' href='" . XOOPS_URL . "/modules/newbb/index.php'>" . _MB_WHATSNEW_POSTSUJETS . '</a></li></td>';

                $block['content'] .= "<td align='center'><font class='pn-menu'>$sujets[1]</font></td>";

                $block['content'] .= "<td align='center'><font class='pn-menu'>$sujets[2]</font></td>";

                $block['content'] .= "<td align='center'><font class='pn-menu'>$sujets[3]</font></td>";

                $block['content'] .= "<td align='center'><font class='pn-menu'>$sujets[4]</font></td></tr>\n";

                $block['content'] .= "$aline\n";

                $entry = 1;
            }
        }

        // forums topics IPB

        if ($moduleHandler->getCount(new Criteria('dirname', 'ipb'))) {
            $postbb = count_entries($xoopsDB->prefix('ipb_topics'), 'post_date');

            if ($postbb[5] > 0) {
                $block['content'] .= "<tr><td><li><a class='pn-menu' href='" . XOOPS_URL . "/modules/newbb/index.php'>" . _MB_WHATSNEW_POSTFORUMS . '</a></li></td>';

                $block['content'] .= "<td align='center'><font class='pn-menu'>$postbb[1]</font></td>";

                $block['content'] .= "<td align='center'><font class='pn-menu'>$postbb[2]</font></td>";

                $block['content'] .= "<td align='center'><font class='pn-menu'>$postbb[3]</font></td>";

                $block['content'] .= "<td align='center'><font class='pn-menu'>$postbb[4]</font></td></tr>\n";

                $block['content'] .= "$aline\n";

                $entry = 1;
            }
        }

        // PM

        $pm = count_entries($xoopsDB->prefix('priv_msgs'), 'msg_time');

        if ($pm[5] > 0) {
            $block['content'] .= "<tr><td><li><a class='pn-menu' href='" . XOOPS_URL . "/viewpmsg.php'>" . _MB_WHATSNEW_PM . '</a></li></td>';

            $block['content'] .= "<td align='center'><font class='pn-menu'>$pm[1]</font></td>";

            $block['content'] .= "<td align='center'><font class='pn-menu'>$pm[2]</font></td>";

            $block['content'] .= "<td align='center'><font class='pn-menu'>$pm[3]</font></td>";

            $block['content'] .= "<td align='center'><font class='pn-menu'>$pm[4]</font></td></tr>\n";

            $block['content'] .= "$aline\n";

            $entry = 1;
        }
    }

    // Nouveaux Membres

    $newuser = count_entries($xoopsDB->prefix('users'), 'user_regdate');

    if ($newuser[5] > 0) {
        $block['content'] .= "<tr><td><li><a class='pn-menu' href='" . XOOPS_URL . "/modules/xoopsmembers/index.php'>" . _MB_WHATSNEW_NEWUSER . '</a></li></td>';

        $block['content'] .= "<td align='center'><font class='pn-menu'>$newuser[1]</font></td>";

        $block['content'] .= "<td align='center'><font class='pn-menu'>$newuser[2]</font></td>";

        $block['content'] .= "<td align='center'><font class='pn-menu'>$newuser[3]</font></td>";

        $block['content'] .= "<td align='center'><font class='pn-menu'>$newuser[4]</font></td></tr>\n";

        $block['content'] .= "$aline\n";

        $entry = 1;
    }

    // Visiteurs

    $stores1 = count_entries($xoopsDB->prefix('users'), 'last_login');

    if ($stores1[5] > 0) {
        $block['content'] .= "<tr><td><li><a class='pn-menu' href='" . XOOPS_URL . "/modules/xoopsmembers/index.php'>" . _MB_WHATSNEW_VISIT . '</a></li></td>';

        $block['content'] .= "<td align='center'><font class='pn-menu'>$stores1[1]</font></td>";

        $block['content'] .= "<td align='center'><font class='pn-menu'>$stores1[2]</font></td>";

        $block['content'] .= "<td align='center'><font class='pn-menu'>$stores1[3]</font></td>";

        $block['content'] .= "<td align='center'><font class='pn-menu'>$stores1[4]</font></td></tr>\n";

        $block['content'] .= "$aline\n";

        $entry = 1;
    }

    $block['content'] .= '</table>';

    if (0 == $entry) {  // don't we have any entries ?
        $block['content'] .= "<center><font class='pn-sub'><br>" . _MB_WHATSNEW_ENTRIES . '<br></font></center>';
    } else {
        $block['content'] .= "<center><font class='pn-sub'><b>" . _MB_WHATSNEW_T . '</b>' . _MB_WHATSNEW_TODAY . ' &middot; <b>' . _MB_WHATSNEW_Y . '</b>' . _MB_WHATSNEW_YESTERDAY . ' &middot; <b>' . _MB_WHATSNEW_W . '</b>' . _MB_WHATSNEW_WEEK . '&middot; <b>' . _MB_WHATSNEW_ALL . '</b>' . _MB_WHATSNEW_TOTAL . '</font></center>';
    }

    return $block;
}
