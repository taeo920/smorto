/**
 * Module: ui
 * Helper functions for manipulating the DOM
 */

require('jquery-colorbox');
var $   = require('jquery');
var url = require('url');

/**
 * Scrolls the window to the desired offset
 * @param  {Mixed} A number of pixels from the top of a page, or a string containing a dom selector
 * @param  {int} An offset to add to the destination scroll distance
 */
function scrollTo(destination, offset) {
	var $viewport = $('html, body');
	var scrollDistance;

	if ( $(destination).length ) { // if dest matches a dom element, scroll to it
		var destOffset = $(destination).offset();
		scrollDistance = destOffset.top;
	} else if (typeof destination === 'number') { // If provided a numerical offset, scroll there
		scrollDistance = destination;
	}

	if ( typeof scrollDistance !== 'undefined' ) {
		if ( typeof offset !== 'undefined' ) {
			scrollDistance -= offset;
		}
		$viewport.animate({ scrollTop: scrollDistance }, 500, 'swing');
		return true;
	}

	return false;
};

/**
 * Set the height of each element in the args to be equal to the tallest element in that collection
 * @param  {Object} cols An object of the items to be equalized
 * @return {Number}      Height of the tallest element
 */
function equalHeights(cols) {
	var largest = 0;
	var $cols = cols;

	// remove heights that may already be set
	$cols.height('auto');

	$cols.each(function() {
		var height = $(this).height();
		if (height > largest) {
			largest = height;
		}
	});

	$cols.height(largest);

	return largest;
};

/**
 * Opens a lightbox for the item that is passed in
 */
function openLightbox() {
	$(this).colorbox({
		iframe: true,
		innerWidth: '80%',
		innerHeight: '80%',
		previous: '<',
		next: '>',
		close: 'x'
	});
}

/**
 * Public API
 * @type {Object}
 */
module.exports = {
	equalHeights: equalHeights,
	scrollTo: scrollTo,
	openLightbox: openLightbox
};