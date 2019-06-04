<?php

	
if (!isset($_REQUEST['controller'])) {
  require_once 'controller/product_controller.php';
  $controller=new ProductController();
 

  $controller->indexProduct();
} else {
	
  $controller=$_REQUEST['controller'];
  $action=$_REQUEST['action'];
 
  
  require_once 'controller/'.$controller.'_controller.php';
  $controller =ucwords($controller).'Controller';
  $controller=new $controller;
  call_user_func(array($controller,$action));

}


 ?>
