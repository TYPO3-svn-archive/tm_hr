<?php

/* * *************************************************************
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
 * ************************************************************* */
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */
require_once(PATH_tslib . 'class.tslib_pibase.php');

class tx_tmhr_pi1 extends tslib_pibase {

    var $prefixId = "tx_tmhr_pi1";
    // Same as class name
    var $scriptRelPath = "pi1/class.tx_tmhr_pi1.php";
    // Path to this script relative to the extension dir.
    var $extKey = "tm_hr";

    // The extension key.

    public function main($content, $conf) {
        $this->conf = $conf;
        $this->pi_setPiVarDefaults();
        $this->pi_loadLL();
        // Check environment
        if (!isset($conf['usersPid'])) {
            return $this->pi_wrapInBaseClass(
                    $this->pi_getLL('no_ts_template'));
        }
        // Init
        $this->init();
        if (t3lib_div::testInt($this->piVars['showUid'])) {
            $content = $this->singleView();
        } else {
            $content = $this->listView();
        }
        $content = 'testing';
        return $this->pi_wrapInBaseClass($content);
    }

    /**
     * Fetches configuration value given its name.
     * Merges flexform and TS configuration values.
     *
     * @param string $param Configuration value name
     * @return string Parameter value
     */
    protected function fetchConfigurationValue($param) {
        $value = trim($this->pi_getFFvalue(
                                $this->cObj->data['pi_flexform'], $param));
        return $value ? $value : $this->conf[$param];
    }

    /**
     * Initializes plugin configuration.
     *
     * @return string Generated HTML
     */
    protected function init() {
        $this->pi_initPIflexForm();
// Get values
        $this->conf['usersPid'] =
                intval($this->fetchConfigurationValue('usersPid'));
        $this->conf['singlePid'] =
                intval($this->fetchConfigurationValue('singlePid'));
        $this->conf['listPid'] =
                intval($this->fetchConfigurationValue('listPid'));
        $this->conf['templateFile'] =
                $this->fetchConfigurationValue('templateFile');
// Set defaults if necessary
        if (!$this->conf['usersPid']) {
            $GLOBALS['TT']->setTSlogMessage(
                    'Warning: usersPid is not set in ' .
                    $this->prefixId .
                    ' plugin. No users will be shown!', 2);
        }
        if (!$this->conf['singlePid']) {
            $this->conf['singlePid'] = $GLOBALS['TSFE']->id;
        }
        if (!$this->conf['listPid']) {
            $this->conf['listPid'] = $GLOBALS['TSFE']->id;
        }
        if (!$this->conf['templateFile']) {
            $this->conf['templateFile'] =
                    'EXT:' . $this->extKey . '/res/pi1_template.html';
        }
// Load template code
        $this->templateCode =
                $this->cObj->fileResource(
                        $this->conf['templateFile']);
    }

    /**
     * Shows single position.
     *
     * @return string Generated HTML
     */
    protected function singlePositionView() {
        return '';
    }

    /**
     * Shows single applicant.
     *
     * @return string Generated HTML
     */
    protected function singleApplicantView() {
        return '';
    }

    /**
     * Shows positions list.
     *
     * @return string Generated HTML
     */
    protected function listPositionsView() {
        return '';
    }

    /**
     * Shows applicants list.
     *
     * @return string Generated HTML
     */
    protected function listApplicantsView() {
        return '';
    }

}

?>
