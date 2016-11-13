/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
      
        config.filebrowserBrowseUrl = base_url+'asset/ckfinder/ckfinder.html';
        config.filebrowserImageBrowseUrl = base_url+'asset/ckfinder/ckfinder.html?type=Images';
        config.filebrowserFlashBrowseUrl = base_url+'asset/ckfinder/ckfinder.html?type=Flash';
        config.filebrowserUploadUrl = base_url+'asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
        config.filebrowserImageUploadUrl = base_url+'asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
        config.filebrowserFlashUploadUrl = base_url+'asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
