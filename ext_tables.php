<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011-2014 Tomita Militaru <tomita.militaru@gmail.com>
*  All rights reserved
*
*  This script is part of the Typo3 project. The Typo3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*  A copy is found in the textfile GPL.txt and important notices to the license
*  from the author is found in LICENSE.txt distributed with these scripts.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

if (!defined ('TYPO3_MODE')) {
die ('Access denied.');
}

t3lib_extMgm::addStaticFile($_EXTKEY, 'static/workforce_planning/', 'Workforce planning');
t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist']
[$_EXTKEY.'_pi1'] = 'layout,select_key';
t3lib_extMgm::addPlugin(
        array('LLL:EXT:tm_hr/locallang_db.xml:tt_content.list_type_pi1', $_EXTKEY . '_pi1'),
        'list_type');

?>
