<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'MaxServ.Parsedown',
    'Markdown',
    'LLL:EXT:parsedown/Resources/Private/Language/Tca.xlf:plugin.markdown'
);

$additionalColumns = array(
    'tx_parsedown_content' => array(
        'exclude' => 1,
        'label' => 'LLL:EXT:parsedown/Resources/Private/Language/Tca.xlf:tt_content.tx_parsedown_content',
        'config' => array(
            'type' => 'text',
            'cols' => '80',
            'rows' => '15'
        )
    ),
    'tx_parsedown_preview' => array(
        'exclude' => 1,
        'label' => 'LLL:EXT:parsedown/Resources/Private/Language/Tca.xlf:tt_content.tx_parsedown_preview',
        'config' => array(
            'type' => 'user',
            'userFunc' => 'MaxServ\Parsedown\UserFunctions\Tca->markdownPreview'
        )
    )
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'tt_content',
    $additionalColumns,
    1,
    'after:bodytext'
);

$GLOBALS['TCA']['tt_content']['types']['parsedown_markdown']['showitem'] = '
	--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.general;general,
	tx_parsedown_content,
	tx_parsedown_preview,
	--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.header;header,
	--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.appearance,
	--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.frames;frames,
	--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,
	--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.visibility;visibility,
	--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.access;access,
	--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.extended,
	--div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category, categories';
