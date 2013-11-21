<?php
/**
 * ajax.php is used to as a front controller for ajax requests
 *
 * @package AJAX handler
 * @copyright Copyright 2011 Kuroi Web Design and Development
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GNU Public License v3
 */

// load common stuff
$loaderPrefix = 'ajax';
require('includes/application_top.php');

// initialise the ajax response array - this will be loaded with vars to be returned in json format to the calling page
$ajax_response = array();
$ajax_response['error'] = FALSE;

// we'll load the main language file anyway, as that may be helpful
// but if the handler has a language file, we'll load that too (hint: a good reason to use the calling page name as the handler name too)
$language_page_directory = DIR_WS_LANGUAGES . $_SESSION['language'] . '/';
$current_page_base = $_POST['handler'];
require(DIR_WS_MODULES . zen_get_module_directory('require_languages.php'));

// include the process handler, or if it can't be found, return an error
if (file_exists(DIR_FS_CATALOG . DIR_WS_AJAX_HANDLERS . $current_page_base . '.php'))
{
  include(DIR_FS_CATALOG . DIR_WS_AJAX_HANDLERS . $current_page_base . '.php');
} else
{
  $ajax_response['error'] = 'fatal error: ajax handler not found';
}

// return the responses garnered earlier and close off the "page"
echo json_encode($ajax_response);
require(DIR_WS_INCLUDES . 'application_bottom.php');