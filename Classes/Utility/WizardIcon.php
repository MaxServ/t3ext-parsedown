<?php
namespace MaxServ\Parsedown\Utility;

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

/**
 * Class that adds the wizard icon.
 *
 * @package     TYPO3
 */
class WizardIcon
{
    /**
     * Processing the wizard items array
     *
     * @param array $wizardItems The wizard items
     *
     * @return array Modified array with wizard items
     */
    public function proc($wizardItems)
    {
        $wizardItems['plugins_tx_examples_pierror'] = array(
            'icon' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('parsedown') .
                      'Resources/Public/Images/ContentElementWizard.png',
            'title' => $GLOBALS['LANG']->sL('LLL:EXT:parsedown/Resources/Private/Language/Tca.xlf:plugin.markdown'),
            'description' => $GLOBALS['LANG']->sL('LLL:EXT:parsedown/Resources/Private/Language/Tca.xlf:wizard.description'),
            'params' => '&defVals[tt_content][CType]=parsedown_markdown'
        );

        return $wizardItems;
    }
}
