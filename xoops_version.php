<?php

$modversion['name'] = _MI_BLOCKUTILS_NAME;
$modversion['version'] = 1.1;
$modversion['description'] = _MI_BLOCKUTILS_DESC;
$modversion['author'] = 'Solo<br>www.wolfpackclan.com';
$modversion['credits'] = 'The XOOPS Project';
$modversion['help'] = '';
$modversion['license'] = 'GPL see LICENSE';
$modversion['official'] = 0;
$modversion['image'] = 'images/blockutils_slogo.png';
$modversion['dirname'] = 'blockutils';

// Admin things
//$modversion['hasAdmin'] = 0;
//$modversion['adminmenu'] = "";

// Blocks
// What's new
$modversion['blocks'][1]['file'] = 'whatsnew.php';
$modversion['blocks'][1]['name'] = _MI_WHATSNEW_BNAME;
$modversion['blocks'][1]['description'] = _MI_WHATSNEW_DESC;
$modversion['blocks'][1]['show_func'] = 'b_whatsnew_show';

// Site Stats
$modversion['blocks'][2]['file'] = 'stats.php';
$modversion['blocks'][2]['name'] = _MI_STATS_BNAME;
$modversion['blocks'][2]['description'] = _MI_STATS_DESC;
$modversion['blocks'][2]['show_func'] = 'b_stats_show';
$modversion['blocks'][2]['template'] = 'stats_block.html';

//Last Referers
$modversion['blocks'][3]['file'] = 'referers.php';
$modversion['blocks'][3]['name'] = _MI_LASTREFERER_BNAME;
$modversion['blocks'][3]['description'] = _MI_LASTREFERER_DESC;
$modversion['blocks'][3]['show_func'] = 'b_referers_show';
$modversion['blocks'][3]['edit_func'] = 'b_referers_edit';
$modversion['blocks'][3]['options'] = '10|up|36|desc';

//Top Referers
$modversion['blocks'][4]['file'] = 'referers.php';
$modversion['blocks'][4]['name'] = _MI_TOPREFERER_BNAME;
$modversion['blocks'][4]['description'] = _MI_TOPREFERER_DESC;
$modversion['blocks'][4]['show_func'] = 'b_topreferers_show';
$modversion['blocks'][4]['edit_func'] = 'b_topreferers_edit';
$modversion['blocks'][4]['options'] = '10|up|36|desc';

// Site PM Stats
$modversion['blocks'][5]['file'] = 'pm.php';
$modversion['blocks'][5]['name'] = _MI_PM_BNAME;
$modversion['blocks'][5]['description'] = _MI_PM_DESC;
$modversion['blocks'][5]['show_func'] = 'b_pm_show';
$modversion['blocks'][5]['edit_func'] = 'b_pm_edit';
$modversion['blocks'][5]['options'] = '100';
$modversion['blocks'][5]['template'] = 'mypm_block.html';

// my PM Stats
$modversion['blocks'][6]['file'] = 'mypm.php';
$modversion['blocks'][6]['name'] = _MI_MYPM_BNAME;
$modversion['blocks'][6]['description'] = _MI_MYPM_DESC;
$modversion['blocks'][6]['show_func'] = 'b_mypm_show';
$modversion['blocks'][6]['options'] = '100|fixed|100|desc';
$modversion['blocks'][6]['template'] = 'mypm_block.html';

// My Members
// Active
$modversion['blocks'][7]['file'] = 'mymembers.php';
$modversion['blocks'][7]['name'] = _MI_MYMEMBERS_BNAME_01;
$modversion['blocks'][7]['show_func'] = 'a_mymembers_show';
$modversion['blocks'][7]['edit_func'] = 'a_mymembers_edit';
$modversion['blocks'][7]['description'] = 'Active Members of the site';
$modversion['blocks'][7]['options'] = '100|up|10|desc|level|0|7|yes|7|6|5|4|3|2|1|0|0|0';
$modversion['blocks'][7]['template'] = 'mymembers_block.html';

// Inactive
$modversion['blocks'][8]['file'] = 'mymembers.php';
$modversion['blocks'][8]['name'] = _MI_MYMEMBERS_BNAME_02;
$modversion['blocks'][8]['show_func'] = 'b_mymembers_show';
$modversion['blocks'][8]['edit_func'] = 'b_mymembers_edit';
$modversion['blocks'][8]['description'] = 'Inactive Members of the site';
$modversion['blocks'][8]['options'] = '100|up|10|desc|level|7|31|yes|7|6|5|4|3|2|1|0|0|0';
$modversion['blocks'][8]['template'] = 'mymembers_block.html';

// Lost
$modversion['blocks'][9]['file'] = 'mymembers.php';
$modversion['blocks'][9]['name'] = _MI_MYMEMBERS_BNAME_03;
$modversion['blocks'][9]['show_func'] = 'c_mymembers_show';
$modversion['blocks'][9]['edit_func'] = 'c_mymembers_edit';
$modversion['blocks'][9]['description'] = 'Inactive Members of the site';
$modversion['blocks'][9]['options'] = '100|up|10|desc|level|32|64|yes|7|6|5|4|3|2|1|0|0|0';
$modversion['blocks'][9]['template'] = 'mymembers_block.html';

//Forum Blocks
// my Forum Stats
$modversion['blocks'][10]['file'] = 'fstats.php';
$modversion['blocks'][10]['name'] = _MI_FSTATS_BNAME;
$modversion['blocks'][10]['description'] = _MI_FSTATS_DESC;
$modversion['blocks'][10]['show_func'] = 'b_fstats_show';
$modversion['blocks'][10]['edit_func'] = 'b_fstats_edit';
$modversion['blocks'][10]['options'] = '100|fixed|N/A|desc';
$modversion['blocks'][10]['template'] = 'fstats_block.html';

// Menu
$modversion['hasMain'] = 0;
