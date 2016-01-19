<?php
namespace MaxServ\Parsedown\Hooks;

/**
 *  Copyright notice
 *
 *  ⓒ 2016 Michiel Roos <michiel@maxserv.com>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is free
 *  software; you can redistribute it and/or modify it under the terms of the
 *  GNU General Public License as published by the Free Software Foundation;
 *  either version 2 of the License, or (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful, but
 *  WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 *  or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for
 *  more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 */

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

if (!class_exists('Parsedown')) {
    require_once(ExtensionManagementUtility::extPath('parsedown') . 'Classes/Vendor/Erusev/Parsedown/Parsedown.php');
}

/**
 * class for TCE main hooks
 *
 */
class TceMain
{

    /**
     * Convert markdown to html on saving
     *
     * @param array $incommingFieldArray (reference) The field array of a
     *     record
     * @param string $table The table currently processing data for
     * @param string $id The record uid currently processing data for,
     *     [integer] or [string] (like 'NEW...')
     * @param \TYPO3\CMS\Core\DataHandling\DataHandler $parentObject
     *
     * @return void
     */
    public function processDatamap_preProcessFieldArray(
        &$incomingFieldArray,
        $table,
        $id,
        $parentObject
    ) {
        if ($incomingFieldArray['CType'] == 'parsedown_markdown') {
            $parseDown = new \Parsedown();
            $incomingFieldArray['bodytext'] = $parseDown->text((string)$incomingFieldArray['tx_parsedown_content']);
        }
    }
}
