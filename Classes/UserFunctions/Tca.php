<?php
namespace MaxServ\Parsedown\UserFunctions;

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
 * TCA User functions
 */
class Tca
{

    /**
     * Generate preview for the markdown content field
     *
     * Edit text using markdown and preview it.
     *
     * @param object $PA The field information and the record row
     * @param object $parentObject The form object
     *
     * @return string
     */
    public function markdownPreview($PA, $parentObject)
    {
        $parseDown = new \Parsedown();

        $dataPrefix = 'data[' . $PA['table'] . '][' . $PA['row']['uid'] . ']';

        // data[tt_content][24][tx_parsedown_content]
        $contentField = $dataPrefix . '[tx_parsedown_content]';

        $output = '<div id="tx_parsedown_preview">';
        $output .= $parseDown->text((string)$PA['row']['tx_parsedown_content']);
        $output .= '</div>';
        $output .= "<script type='text/javascript'>
var MaxServ_ParseDown_1453219381 = (function () {
	'use strict';
	return {
		keyCounter: 0,
		idleState: false,
		idleTimer: null,
		idleWait: 2000,
		updatePreview: function (content) {
			var url = TYPO3.settings.ajaxUrls['ParsedownAjaxController::renderPreview'];
			var jqxhr = TYPO3.jQuery.getJSON(
					url,
					{content: content},
					function () {
					}
					)
					.done(function (data) {
						TYPO3.jQuery('#tx_parsedown_preview').html(data);
					})
					.fail(function (d, textStatus, error) {
						console.error('Markdown preview failed, status: ' + textStatus + ', error: ' + error);
					});
		}
	};
}());

TYPO3.jQuery(document).ready(function ($) {
	var maxServ_ParseDown_1453219382 = MaxServ_ParseDown_1453219381;
	$(
			'[data-formengine-input-name=\"" . $contentField . "\"],' +
			'[name=\"" . $contentField . "\"]'
	).change(function (e) {
		maxServ_ParseDown_1453219382.updatePreview($('#' + e.target.id).val());
	}).keyup(function (e) {
		maxServ_ParseDown_1453219382.keyCounter++;
		if (maxServ_ParseDown_1453219382.keyCounter > 10) {
			maxServ_ParseDown_1453219382.keyCounter = 0;
			maxServ_ParseDown_1453219382.updatePreview($('#' + e.target.id).val());
		} else {
			if (maxServ_ParseDown_1453219382.idleTimer !== null) {
				clearTimeout(maxServ_ParseDown_1453219382.idleTimer);
			}
			maxServ_ParseDown_1453219382.idleState = false;
			maxServ_ParseDown_1453219382.idleTimer = setTimeout(function () {
				maxServ_ParseDown_1453219382.idleState = true;
				maxServ_ParseDown_1453219382.updatePreview($('#' + e.target.id).val());
			}, maxServ_ParseDown_1453219382.idleWait);
		}
	});
});
        </script>";
        return $output;
    }
}
