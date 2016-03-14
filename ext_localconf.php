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

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'MaxServ.Parsedown',
	'Markdown',
	array(
		'Markdown' => 'index'
	),
	array(),
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] =
	'MaxServ\\Parsedown\\Hooks\\TceMain';
