/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here. For example:
    config.allowedContent = true;

    config.language = 'ru';
    config.skin = 'kama';
    config.enterMode = CKEDITOR.ENTER_BR;
    config.extraPlugins = 'youtube';
    config.youtube_related = true;
    // config.uiColor = '#AADC6E';
};
