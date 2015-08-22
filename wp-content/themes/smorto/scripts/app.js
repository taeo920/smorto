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
var scroll          = require('./scroll.js');
var AnalyticsModule = require('./analytics.js');
var analytics = new AnalyticsModule({ gaid: 'UA-7944904-1' });

/**
 * Initialize the app on DOM ready
 */
$(function() {
	analytics.init();
    scroll.init();
});