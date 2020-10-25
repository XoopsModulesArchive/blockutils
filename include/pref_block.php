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

// Nombre de lignes à afficher -> 0
    $form = '' . _MB_BLOCKUTILS_DISP . '&nbsp;';
    $form .= "<input type='text' name='options[]' size='3' value='" . $options[0] . "'>&nbsp;" . _MB_BLOCKUTILS_NBR . '<br>';

// Sens du défilement -> 1

            $selfix = '';
        $selup = '';
        $seldown = '';
        $selleft = '';
        $selright = '';

    switch ($options[1]) {
        case 'fixed':
        $selfix = 'selected';
        break;
        case 'up':
        $selup = 'selected';
        break;
        case 'down':
        $seldown = 'selected';
        break;
        case 'left':
        $selleft = 'selected';
        break;
        case 'right':
        $selright = 'selected';
        break;
    }

    $form .= '' . _MB_BLOCKUTILS_DIRSCROLL . "&nbsp;
	<select name='options[]'>
		<option $selfix value='fixed'>" . _MB_BLOCKUTILS_FIX . "</option>
		<option $selup value='up'>" . _MB_BLOCKUTILS_UP . "</option>
		<option $seldown value='down'>" . _MB_BLOCKUTILS_DOWN . "</option>
		<option $selleft value='left'>" . _MB_BLOCKUTILS_LEFT . "</option>
		<option $selright value='right'>" . _MB_BLOCKUTILS_RIGHT . '</option></select><br>';

// Taille du texte -> 2

    $form .= '' . _MB_BLOCKUTILS_SIZE . '&nbsp;';
    $form .= "<input type='text' name='options[]' size='3' value='" . $options[2] . "'>&nbsp;" . _MB_BLOCKUTILS_CHAR . '<br><br>';

// Sens du tri -> 3
      $form .= _MB_BLOCKUTILS_ORDER . '&nbsp;<select name="options[3]">';

      $form .= '<option value="asc"';
        if ('asc' == $options[3]) {
            $form .= 'selected="selected"';
        }
      $form .= '>' . _MB_BLOCKUTILS_ASC . '</option>';

      $form .= '<option value="desc"';
        if ('desc' == $options[3]) {
            $form .= 'selected="selected"';
        }
      $form .= '>' . _MB_BLOCKUTILS_DESC . '</option>';
      $form .= '</select><br>';
