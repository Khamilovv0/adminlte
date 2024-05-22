import './bootstrap';
require('./summernote');
require('./summernote/dist/summernote.css');
require('./summernote/dist/summernote.js');

import $ from 'jquery';

window.$ = window.jQuery = $;



$(document).ready(function () {
    $('.summernote').summernote();
});
