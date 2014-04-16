﻿/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
  config.toolbar = 'MyToolbar';
 
  config.toolbar_MyToolbar = [
    ['Maximize'],   
    ['pyroimages', 'pyrofiles'],
    ['Cut','Copy','Paste','PasteFromWord'],
    ['Undo','Redo','-','Find','Replace'],
    ['Link','Unlink'],
    ['Table','HorizontalRule','SpecialChar'],
    ['Bold','Italic','StrikeThrough'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    /* this starts a new line, because we have filled the first line.  There is probably also an option to specify a new line */
    ['Format', 'FontSize', 'Subscript','Superscript', 'NumberedList','BulletedList','Outdent','Indent','Blockquote'],
    ['ShowBlocks', 'RemoveFormat', 'Source']
  ];
  
  config.width = 800;
  config.height = 200;
};