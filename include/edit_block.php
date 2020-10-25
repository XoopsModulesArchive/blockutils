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

// Classement par
      $form .= '<HR>' . _MB_MYMEMBERS_ORDER . '&nbsp;<select name="options[4]">';

      $form .= '<option value="uname"';
        if ('uname' == $options[4]) {
            $form .= 'selected="selected"';
        }
      $form .= '>' . _MB_MYMEMBERS_NAME . '</option>';

      $form .= '<option value="rank_title"';
        if ('rank_title' == $options[4]) {
            $form .= 'selected="selected"';
        }
      $form .= '>' . _MB_MYMEMBERS_RANKING . '</option>';

      $form .= '<option value="posts"';
        if ('posts' == $options[4]) {
            $form .= 'selected="selected"';
        }
      $form .= '>' . _MB_MYMEMBERS_POST . '</option>';

      $form .= '<option value="last_login"';
        if ('last_login' == $options[4]) {
            $form .= 'selected="selected"';
        }
      $form .= '>' . _MB_MYMEMBERS_LASTLOGIN . '</option>';

      $form .= '</select><br>';

// Période de validité
    $form .= _MB_MYMEMBERS_TIMELIMIT_FROM . '&nbsp;
<input type="text" size="2" name="options[5]" value="' . $options[5] . '">&nbsp;' . _MB_MYMEMBERS_TIMELIMIT_TO . '&nbsp;
<input type="text" size="2" name="options[6]" value="' . $options[6] . '">&nbsp;&nbsp;' . _MB_MYMEMBERS_DAYS . '<br>';

// Affichage étendu
$checked_yes = ('yes' == $options[7]) ? ' checked' : '';
$checked_no = ('no' == $options[7]) ? ' checked' : '';

    $form .= _MB_MYMEMBERS_EXTENDEDSHOW . '&nbsp;:&nbsp;
<input type="radio" name="options[7]" value="yes" ' . $checked_yes . '>&nbsp;' . _MB_MYMEMBERS_YES . '&nbsp;&nbsp;
<input type="radio" name="options[7]" value="no" ' . $checked_no . '>&nbsp;' . _MB_MYMEMBERS_NO . '<br>';

// Type de tri -> 8
      $form .= _MB_MYMEMBERS_TRIE . '&nbsp;<select name="options[8]">';

      $form .= '<option value="rank"';
        if ('rank' == $options[8]) {
            $form .= 'selected="selected"';
        }
      $form .= '>' . _MB_MYMEMBERS_RANK . '</option>';

      $form .= '<option value="level"';
        if ('level' == $options[8]) {
            $form .= 'selected="selected"';
        }
      $form .= '>' . _MB_MYMEMBERS_LEVEL . '</option>';
      $form .= '</select><br>';

// Sélection des catégories à afficher
$form .= '<br><b>' . _MB_MYMEMBERS_CATEGORIES . '</b><br>';

$form .= '<input type="text" size="2" name="options[9]" value="' . $options[9] . '">&nbsp;' . _MB_MYMEMBERS_GROUPE_01 . '<br>';
$form .= '<input type="text" size="2" name="options[10]" value="' . $options[10] . '">&nbsp;' . _MB_MYMEMBERS_GROUPE_02 . '<br>';
$form .= '<input type="text" size="2" name="options[11]" value="' . $options[11] . '">&nbsp;' . _MB_MYMEMBERS_GROUPE_03 . '<br>';
$form .= '<input type="text" size="2" name="options[12]" value="' . $options[12] . '">&nbsp;' . _MB_MYMEMBERS_GROUPE_04 . '<br>';
$form .= '<input type="text" size="2" name="options[13]" value="' . $options[13] . '">&nbsp;' . _MB_MYMEMBERS_GROUPE_04 . '<br>';
$form .= '<input type="text" size="2" name="options[14]" value="' . $options[14] . '">&nbsp;' . _MB_MYMEMBERS_GROUPE_04 . '<br>';
$form .= '<input type="text" size="2" name="options[15]" value="' . $options[15] . '">&nbsp;' . _MB_MYMEMBERS_GROUPE_04 . '<br>';
$form .= '<input type="text" size="2" name="options[16]" value="' . $options[16] . '">&nbsp;' . _MB_MYMEMBERS_GROUPE_04 . '<br>';
$form .= '<input type="text" size="2" name="options[17]" value="' . $options[17] . '">&nbsp;' . _MB_MYMEMBERS_GROUPE_04 . '<br>';
$form .= '<input type="text" size="2" name="options[18]" value="' . $options[18] . '">&nbsp;' . _MB_MYMEMBERS_GROUPE_04 . '<br>';
