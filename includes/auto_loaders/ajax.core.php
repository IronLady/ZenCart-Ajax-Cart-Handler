<?php
/**
 * autoloader array for ajax handler
 * based on standard catalog autoload array, with unnecessary elements dropped
 *
 * @package InitSystem and AJAX handler
 * @copyright Copyright 2011 Kuroi Web Design and Development
 * @copyright Copyright Portions 2003-2006 Zen Cart Development Team
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GNU Public License v3
 */

if (!defined('IS_ADMIN_FLAG')) die('Illegal Access');

$autoLoadConfig[0][] = array('autoType'=>'class',
                              'loadFile'=>'class.base.php');
$autoLoadConfig[0][] = array('autoType'=>'class',
                              'loadFile'=>'class.notifier.php');
$autoLoadConfig[0][] = array('autoType'=>'classInstantiate',
                              'className'=>'notifier',
                              'objectName'=>'zco_notifier');
$autoLoadConfig[0][] = array('autoType'=>'class',
                              'loadFile'=> 'class.phpmailer.php');
$autoLoadConfig[0][] = array('autoType'=>'class',
                              'loadFile'=> 'class.smtp.php');
$autoLoadConfig[0][] = array('autoType'=>'class',
                              'loadFile'=> 'boxes.php');
$autoLoadConfig[0][] = array('autoType'=>'class',
                              'loadFile'=>'category_tree.php');
$autoLoadConfig[0][] = array('autoType'=>'class',
                              'loadFile'=>'template_func.php');
$autoLoadConfig[0][] = array('autoType'=>'class',
                              'loadFile'=>'split_page_results.php');
$autoLoadConfig[0][] = array('autoType'=>'class',
                              'loadFile'=>'language.php');
$autoLoadConfig[0][] = array('autoType'=>'class',
                              'loadFile'=>'cache.php');
$autoLoadConfig[0][] = array('autoType'=>'class',
                              'loadFile'=>'sniffer.php');
$autoLoadConfig[0][] = array('autoType'=>'class',
                              'loadFile'=>'shopping_cart.php');
$autoLoadConfig[0][] = array('autoType'=>'class',
                              'loadFile'=>'currencies.php');
$autoLoadConfig[0][] = array('autoType'=>'class',
                              'loadFile'=>'message_stack.php');
/**
 * Breakpoint 10.
 *
 */
$autoLoadConfig[10][] = array('autoType'=>'init_script',
                              'loadFile'=> 'init_file_db_names.php');
$autoLoadConfig[10][] = array('autoType'=>'init_script',
                              'loadFile'=>'init_database.php');
/**
 * Breakpoint 20.
 *
 */
$autoLoadConfig[20][] = array('autoType'=>'include',
                              'loadFile'=> DIR_WS_INCLUDES . 'version.php');
/**
 * Breakpoint 30.
 *
 */
$autoLoadConfig[30][] = array('autoType'=>'classInstantiate',
                              'className'=>'cache',
                              'objectName'=>'zc_cache');
/**
 * Breakpoint 40.
 *
 */
$autoLoadConfig[40][] = array('autoType'=>'init_script',
                              'loadFile'=> 'init_db_config_read.php');
/**
 * Breakpoint 50.
 *
 */
$autoLoadConfig[50][] = array('autoType'=>'classInstantiate',
                              'className'=>'sniffer',
                              'objectName'=>'sniffer');
$autoLoadConfig[50][] = array('autoType'=>'init_script',
                              'loadFile'=> 'init_gzip.php');
/**
 * Breakpoint 60.
 *
 */
$autoLoadConfig[60][] = array('autoType'=>'init_script',
                              'loadFile'=> 'init_general_funcs.php');
$autoLoadConfig[60][] = array('autoType'=>'init_script',
                              'loadFile'=> 'init_tlds.php');
/**
 * Breakpoint 70.
 *
 */
$autoLoadConfig[70][] = array('autoType'=>'init_script',
                              'loadFile'=> 'init_sessions.php');
/**
 * Breakpoint 80.
 *
 */
$autoLoadConfig[80][] = array('autoType'=>'classInstantiate',
                              'className'=>'shoppingCart',
                              'objectName'=>'cart',
                              'checkInstantiated'=>true,
                              'classSession'=>true);
/**
 * Breakpoint 90.
 *
 */
$autoLoadConfig[90][] = array('autoType'=>'classInstantiate',
                              'className'=>'currencies',
                              'objectName'=>'currencies');
/**
 * Breakpoint 100.
 *
 */
$autoLoadConfig[100][] = array('autoType'=>'classInstantiate',
                               'className'=>'template_func',
                               'objectName'=>'template');
$autoLoadConfig[100][] = array('autoType'=>'init_script',
                               'loadFile'=> 'init_sanitize.php');
/**
 * Breakpoint 110.
 *
 */
$autoLoadConfig[110][] = array('autoType'=>'init_script',
                               'loadFile'=> 'init_languages.php');
$autoLoadConfig[110][] = array('autoType'=>'init_script',
                               'loadFile'=> 'init_templates.php');
/**
 * Breakpoint 120.
 *
 */
$autoLoadConfig[120][] = array('autoType'=>'init_script',
                               'loadFile'=> 'init_currencies.php');
/**
 * Breakpoint 130.
 *
 */
$autoLoadConfig[130][] = array('autoType'=>'classInstantiate',
                               'className'=>'messageStack',
                               'objectName'=>'messageStack');
$autoLoadConfig[130][] = array('autoType'=>'init_script',
                               'loadFile'=> 'init_customer_auth.php');
/**
 * Breakpoint 140.
 *
 */
$autoLoadConfig[140][] = array('autoType'=>'init_script',
                               'loadFile'=> 'init_cart_handler.php');
/**
 * Breakpoint 150.
 *
 */
$autoLoadConfig[150][] = array('autoType'=>'init_script',
                               'loadFile'=> 'init_special_funcs.php');
/**
 * Breakpoint 160.
 *
 */
$autoLoadConfig[160][] = array('autoType'=>'init_script',
                               'loadFile'=> 'init_category_path.php');
/**
 * Breakpoint 180.
 *
 */
$autoLoadConfig[180][] = array('autoType'=>'init_script',
                               'loadFile'=> 'init_header.php');
