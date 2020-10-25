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

//Active member block//
function a_mymembers_show($options)
{
    global $xoopsDB;

    $block = [];

    $block['title'] = _MB_MYMEMBERS_BNAME_01;

    $block['direction'] = (string)$options[1];

    $a = 01;

    if ('0' == $options[5]) {
        $last_week_from = mktime(0, 0, 0, date('m'), date('d') - $options[5] + 1, date('Y'));
    } else {
        $last_week_from = mktime(0, 0, 0, date('m'), date('d') - $options[5], date('Y'));
    }

    $last_week_to = mktime(0, 0, 0, date('m'), date('d') - $options[6], date('Y'));

    require XOOPS_ROOT_PATH . '/modules/blockutils/include/mymembers.php';

    return $block;
}

function a_mymembers_edit($options)
{
    require XOOPS_ROOT_PATH . '/modules/blockutils/include/pref_block.php';

    require XOOPS_ROOT_PATH . '/modules/blockutils/include/edit_block.php';

    return $form;
}

//Inactive members block
function b_mymembers_show($options)
{
    global $xoopsDB;

    $block = [];

    $block['title'] = _MB_MYMEMBERS_BNAME_02;

    $block['direction'] = (string)$options[1];

    $a = 01;

    if ('0' == $options[5]) {
        $last_week_from = mktime(0, 0, 0, date('m'), date('d') - $options[5] + 1, date('Y'));
    } else {
        $last_week_from = mktime(0, 0, 0, date('m'), date('d') - $options[5], date('Y'));
    }

    $last_week_to = mktime(0, 0, 0, date('m'), date('d') - $options[6], date('Y'));

    require XOOPS_ROOT_PATH . '/modules/blockutils/include/mymembers.php';

    return $block;
}

function b_mymembers_edit($options)
{
    require XOOPS_ROOT_PATH . '/modules/blockutils/include/pref_block.php';

    require XOOPS_ROOT_PATH . '/modules/blockutils/include/edit_block.php';

    return $form;
}

//Lost members block 2
function c_mymembers_show($options)
{
    global $xoopsDB;

    $block = [];

    $block['title'] = _MB_MYMEMBERS_BNAME_03;

    $block['direction'] = (string)$options[1];

    $a = 01;

    if ('0' == $options[5]) {
        $last_week_from = mktime(0, 0, 0, date('m'), date('d') - $options[5] + 1, date('Y'));
    } else {
        $last_week_from = mktime(0, 0, 0, date('m'), date('d') - $options[5], date('Y'));
    }

    $last_week_to = mktime(0, 0, 0, date('m'), date('d') - $options[6], date('Y'));

    require XOOPS_ROOT_PATH . '/modules/blockutils/include/mymembers.php';

    return $block;
}

function c_mymembers_edit($options)
{
    require XOOPS_ROOT_PATH . '/modules/blockutils/include/pref_block.php';

    require XOOPS_ROOT_PATH . '/modules/blockutils/include/edit_block.php';

    return $form;
}
