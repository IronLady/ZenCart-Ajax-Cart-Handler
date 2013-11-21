<?php
/**
 * @package plugins
 * @copyright Copyright 2003-2012 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version GIT: $Id: Author: DrByte  Tue Aug 28 14:21:34 2012 -0400 New in v1.5.1 $
 *
 * Designed for v1.5.1
 */

class ajaxCart extends base {

  var $event = array('NOTIFIER_CART_RESTORE_CONTENTS_END', 'NOTIFIER_CART_RESET_END', 'NOTIFIER_CART_ADD_CART_END', 'NOTIFIER_CART_UPDATE_QUANTITY_END', 'NOTIFIER_CART_REMOVE_END');

  function __construct(){
    $this->attach($this, $this->event);
  }

  function update(&$class, $eventID, $paramsArray = array()){
    if (in_array($eventID, $this->event)){
      $_SESSION['ajax_cart'] = $_SESSION['cart'];
      $_SESSION['ajax_cart_id'] = $_SESSION['ajax_cart']->cartID;
    }
  }
}