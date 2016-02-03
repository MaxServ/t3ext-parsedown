<?php
defined('TYPO3_MODE') or die();

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

if (TYPO3_MODE == 'BE') {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerAjaxHandler(
        'ParsedownAjaxController::renderPreview',
        'MaxServ\\Parsedown\\Controller\\AjaxController->renderPreview'
    );

    /*
     * add TSConfig for tt_content wizardItem for content type: parsedown_markdown
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
    mod.wizards.newContentElement.wizardItems.common {
        elements.parsedown_markdown {
            title = LLL:EXT:parsedown/Resources/Private/Language/Tca.xlf:plugin.markdown
            icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('parsedown') .
                      'Resources/Public/Images/ContentElementWizard.png
            description = LLL:EXT:parsedown/Resources/Private/Language/Tca.xlf:wizard.description
            tt_content_defValues {
                CType = parsedown_markdown
            }
        }
        show := addToList(parsedown_markdown)
    }');
}

$GLOBALS['TBE_STYLES']['skins']['parsedown'] = array(
    'name' => 'parsedown',
    'stylesheetDirectories' => array(
        'visual' => 'EXT:parsedown/Resources/Public/CSS/'
    )
);
