/**
 * Module: util
 * General helper functions
 */

require('browsernizr/test/forms/placeholder');
var Modernizr = require('browsernizr');
var $         = require('jquery');

var user = {
	mobile: /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(global.navigator.userAgent),
	lte8: $('html').hasClass('lte8')
};

/**
 * Media query hack for the surely unhappy Windows Phone 8 users
 */
(function () {
	if (global.navigator.userAgent.match(/IEMobile\/10\.0/)) {
		var msViewportStyle = global.document.createElement('style');
		msViewportStyle.appendChild( global.document.createTextNode( '@-ms-viewport{width:auto!important}' ) );
		global.document.querySelector('head').appendChild(msViewportStyle);
	}
}());

/**
 * Select menu hack for Android 4.1 stock browsers
 */
(function () {
	var nua = global.navigator.userAgent;
	var isAndroid = (nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1 && nua.indexOf('Chrome') === -1);
	if (isAndroid) {
		$('select.form-control').removeClass('form-control').css('width', '100%');
	}
}());

/**
 * Convert dash separated values into camel case format
 * @param  {string} input The dash separated string to convert
 * @return {string}       The camel case formatted string
 */
function dashToCamel(input) {
	return input.toLowerCase().replace(/-(.)/g, function(match, group1) {
		return group1.toUpperCase();
	});
}

/**
 * Public API
 */
module.exports = {
	user: user,
	dashToCamel: dashToCamel
};