<?php
defined('TYPO3_MODE') or die();

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
