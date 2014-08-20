/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
  config.toolbar = 'MyToolbar';
 
  config.toolbar_MyToolbar = [
    /*['Maximize'],   
    [ 'doksoft_image'],
    ['Cut','Copy','Paste','PasteFromWord'],
    ['Undo','Redo','-','Find','Replace'],
    
    ['Table','HorizontalRule','SpecialChar'],
    ['Bold','Italic','StrikeThrough'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],*/
    /* this starts a new line, because we have filled the first line.  There is probably also an option to specify a new line */
    ['Format', 'FontSize'],['Bold','Italic'], ['NumberedList','BulletedList'], ['Link','Unlink'],
    ['RemoveFormat', 'Source']    
  ];
  
  config.width = 800;
  config.height = 200;

  config.extraPlugins = 'doksoft_image';

  config.doksoft_uploader_url = '/CI06/ckeditor/plugins/doksoft_uploader/uploader.php';
};