<?php
/**
 *
 * @package statistics
 * @copyright Copyright 2003-2012 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version GIT: $Id: Author: DrByte  Tue Aug 28 14:21:34 2012 -0400 New in v1.5.1 $
 */
/**
 * Designed for v1.5.1
 */
if (!defined('IS_ADMIN_FLAG')) {
 die('Illegal Access');
}
$autoLoadConfig[10][] = array('autoType'=>'class',
                              'loadFile'=>'observers/class.ajaxCart.php');
$autoLoadConfig[90][] = array('autoType'=>'classInstantiate',
                              'className'=>'ajaxCart',
                              'objectName'=>'ajaxCart');