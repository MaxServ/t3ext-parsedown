<?php
defined('TYPO3_MODE') or die();

if (TYPO3_MODE == 'BE') {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerAjaxHandler(
        'ParsedownAjaxController::renderPreview',
        'MaxServ\\Parsedown\\Controller\\AjaxController->renderPreview'
    );

    $GLOBALS['TBE_MODULES_EXT']['xMOD_db_new_content_el']['addElClasses']['MaxServ\\Parsedown\\Utility\\WizardIcon'] =
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('parsedown') . 'Classes/Utility/WizardIcon.php';
}

$GLOBALS['TBE_STYLES']['skins']['parsedown'] = array(
    'name' => 'parsedown',
    'stylesheetDirectories' => array(
        'visual' => 'EXT:parsedown/Resources/Public/CSS/'
    )
);
