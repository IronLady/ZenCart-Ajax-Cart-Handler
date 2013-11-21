<?php
/**
 * database queries for the ajax sandbox
 *
 * @package AJAX Handler
 * @copyright Copyright 2011 Kuroi Web Design and Development
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GNU Public License v3
 */

function zen_handle_ajax_cart(){
  if($_SESSION['ajax_cart_id'] == $_SESSION['cart']->cartID){
    $data = $_SESSION['cart'];
    return $data;
  }else{
  	$error = 'error';
  	return $error; 
  }
}
