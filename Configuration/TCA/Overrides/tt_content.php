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
