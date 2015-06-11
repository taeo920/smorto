/*
 *  Main entry point
 */

require('es5-shim');
require('consolelog');
require('bootstrap');
require('browsernizr/test/touchevents');
require('viewport-units-buggyfill').init();

var $               = require('jquery');
var ui              = require('./ui.js');
var responsive      = require('./responsive.js');
var scroll          = require('./scroll.js');
var AnalyticsModule = require('./analytics.js');
var analytics = new AnalyticsModule({ gaid: '' });

global.$ = $;

/**
 * Initialize the app on DOM ready
 */
$(function() {
	analytics.init();
	responsive.init();
    scroll.init();
});