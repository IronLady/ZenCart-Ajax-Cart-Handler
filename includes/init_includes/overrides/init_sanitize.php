<?php
/**
 * sanitize the GET parameters
 *
 * @package InitSystem and AJAX handler
 * @copyright Copyright 2011 Kuroi Web Design and Development
 * @copyright Portions Copyright 2003-2010 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GNU Public License v3
 * @todo move the array process to security class
 */

  if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
  }
  if (isset($_GET['typefilter'])) $_GET['typefilter'] = preg_replace('/[^0-9a-zA-Z_-]/', '', $_GET['typefilter']);
  if (isset($_GET['products_id'])) $_GET['products_id'] = preg_replace('/[^0-9a-f:]/', '', $_GET['products_id']);
  if (isset($_GET['manufacturers_id'])) $_GET['manufacturers_id'] = preg_replace('/[^0-9]/', '', $_GET['manufacturers_id']);
  if (isset($_GET['categories_id'])) $_GET['categories_id'] = preg_replace('/[^0-9]/', '', $_GET['categories_id']);
  if (isset($_GET['cPath'])) $_GET['cPath'] = preg_replace('/[^0-9_]/', '', $_GET['cPath']);
  if (isset($_GET['main_page'])) $_GET['main_page'] = preg_replace('/[^0-9a-zA-Z_]/', '', $_GET['main_page']);
  if (isset($_GET['sort'])) $_GET['sort'] = preg_replace('/[^0-9a-zA-Z]/', '', $_GET['sort']);

  // sanitize the handler and action parameters for AJAX requests
  if (isset($_POST['handler']))
  {
    $_POST['handler'] = preg_replace('/[^0-9a-zA-Z_]/', '', $_POST['handler']);
    $_POST['action'] = preg_replace('/[^0-9a-zA-Z_]/', '', $_POST['action']);
  }

/**
 * process all $_GET terms
 */
  $strictReplace = '[<>\']';
  $unStrictReplace = '[<>]';
  if (isset($_GET) && count($_GET) > 0) {
    foreach($_GET as $key=>$value){
      if(is_array($value)){
        foreach($value as $key2 => $val2){
          if ($key2 == 'keyword') {
            $_GET[$key][$key2] = preg_replace('/'.$unStrictReplace.'/', '', $val2);
          } else {
            $_GET[$key][$key2] = preg_replace('/'.$strictReplace.'/', '', $val2);
          }
          unset($GLOBALS[$key]);
        }
      } else {
        if ($key == 'keyword') {
          $_GET[$key] = preg_replace('/'.$unStrictReplace.'/', '', $value);
        } else {
          $_GET[$key] = preg_replace('/'.$strictReplace.'/', '', $value);
        }
        unset($GLOBALS[$key]);
      }
    }
  }
/**
 * process all $_POST terms
 * @todo move the array process to security class
 */
  if (isset($_POST) && count($_POST) > 0) {
    foreach($_POST as $key=>$value){
      if(is_array($value)){
        foreach($value as $key2 => $val2){
          unset($GLOBALS[$key]);
        }
      } else {
        unset($GLOBALS[$key]);
      }
    }
  }
/**
 * process all $_COOKIE terms
 */
  if (isset($_COOKIE) && count($_COOKIE) > 0) {
    foreach($_COOKIE as $key=>$value){
      if(is_array($value)){
        foreach($value as $key2 => $val2){
          unset($GLOBALS[$key]);
        }
      } else {
        unset($GLOBALS[$key]);
      }
    }
  }
/**
 * process all $_SESSION terms
 */
  if (isset($_SESSION) && count($_SESSION) > 0) {
    foreach($_SESSION as $key=>$value){
      if(is_array($value)){
        foreach($value as $key2 => $val2){
          unset($GLOBALS[$key]);
        }
      } else {
        unset($GLOBALS[$key]);
      }
    }
  }
/**
 * sanitize $_SERVER vars
 */
  $_SERVER['REMOTE_ADDR'] = preg_replace('/[^0-9.%]/', '', $_SERVER['REMOTE_ADDR']);


/**
 * validate products_id for search engines and bookmarks, etc.
 */
  if (isset($_GET['products_id']) && isset($_SESSION['check_valid']) && $_SESSION['check_valid'] != 'false') {
    $check_valid = zen_products_id_valid($_GET['products_id']);
    if (!$check_valid) {
      $_GET['main_page'] = zen_get_info_page($_GET['products_id']);
      /**
       * do not recheck redirect
       */
      $_SESSION['check_valid'] = 'false';
      zen_redirect(zen_href_link($_GET['main_page'], 'products_id=' . $_GET['products_id']));
    }
  } else {
    $_SESSION['check_valid'] = 'true';
  }
/**
 * We do some checks here to ensure $_GET['main_page'] has a sane value
 * Though we need not worry about this if if the handler param is set indicating an AJAX request
 */
//  if (isset($_POST['handler']))
//  {
    if (!isset($_GET['main_page']) || !zen_not_null($_GET['main_page'])) $_GET['main_page'] = 'index';

    if (!is_dir(DIR_WS_MODULES .  'pages/' . $_GET['main_page'])) {
      if (MISSING_PAGE_CHECK == 'On' || MISSING_PAGE_CHECK == 'true') {
        $_GET['main_page'] = 'index';
      } elseif (MISSING_PAGE_CHECK == 'Page Not Found') {
        header('HTTP/1.1 404 Not Found');
        $_GET['main_page'] = 'page_not_found';
      }
    }
    $current_page = $_GET['main_page'];
    $current_page_base = $current_page;
    $code_page_directory = DIR_WS_MODULES . 'pages/' . $current_page_base;
    $page_directory = $code_page_directory;
//  }

