/*
 *  Module: scroll
 */

var $           = require('jquery');
var url         = require('url');
var ui          = require('./ui');
var Modernizr   = require('browsernizr');

var $body       = $('body');
var $navbar     = $('.navbar');
var $menu       = $navbar.find('.menu');
var $offset     = $navbar.outerHeight();

/**
 * Adds scrollspy behavior to the target
 */
function initScrollSpy() {
	$body.scrollspy({
		target: '.menu',
		offset: $offset + 20
	});
}

/**
 * Adds scrollTo behavior to main menu
 */
function initScrollTo() {
	$menu.on('click', 'a', function (e) {
		var hash = url.parse( $(this).attr('href') ).hash;

		if ( $(hash).length ) {
			ui.scrollTo( hash, $offset );
            $(this).blur();
            return false;
		}
	});
}

/**
 * Adds active classes to work items currently visible on the screen for touch devices
 */
function initTouchScrollActivation() {
    // TO DO
}

/**
 * Init scroll events and triggers
 */
function init() {
    initScrollSpy();
    initScrollTo();
    initTouchScrollActivation();
}

/**
 * Public API
 * @type {Object}
 */
module.exports = {
	init: init,
    initScrollSpy: initScrollSpy,
    initScrollTo: initScrollTo,
    initTouchScrollActivation: initTouchScrollActivation
};