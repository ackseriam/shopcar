<?php
require_once 'model/shopping.php';
require_once 'model/product.php';
class ShoppingController
{
  private $model;
  public function __construct()
  {
    $this->model = new Shopping();
    $this->model1 = new Product();
  }
  public function indexShopping()
  {
  require_once 'views/shopping_all.php';

  }
  public function showById()
  {
    $shopping=new Shopping();
     

    if(isset($_REQUEST['id'])){
    
      session_start();
      $id_user=$_SESSION['id_user'];
      $shopping=$shopping->consul_product($_REQUEST['id']);

      $shopping_rating=$this->model->consul_rating($_REQUEST['id']);
      $shopping_ranting=$shopping_rating->AVG;

      
      $products=$this->model1->getById($_REQUEST['id']);
      $product=new Product();
      $product->id=$_REQUEST['id'];
      $product->name=$products->name;
      $product->price=$products->price;
      $product->kind_product=$products->kind_product;
      $product->average_rating=$shopping_ranting;
      $product->update();
    }
    

    require_once 'views/shopping_insert.php';
  }
  public function MyById($id){
     $shopping=new Shopping();
        if(isset($_REQUEST['id'])){
    
      session_start();
      $id_user=$_SESSION['id_user'];
      $shopping=$shopping->consul_shoppingcar($_REQUEST['id']);
    }
    
    require_once 'views/shopping_pay.php';
  }

  public function save()
  {
    

    session_start();
      $id_user=$_SESSION['id_user'];

    $shopping=new Shopping();
    $shopping->quantity_products=$_REQUEST['quantity_products'];
    $shopping->kind_product=$_REQUEST['kind_product'];
    $price=$_REQUEST['price'];
    
    $result=$price*$shopping->quantity_products;

    $shopping->id_product=$_REQUEST['id_product'];
    $shopping->id_user=$id_user;
    $shopping->balance=$result;
    if($_REQUEST['rating_user']=='another')
    $shopping->rating_user=0;
    else
      $shopping->rating_user= $_REQUEST['rating_user'];
    
    $shopping->id>0?$shopping->update():$shopping->create();
  
    header('Location: index.php');
  
  }
  public function quit()
  {
    $this->model->delete($_REQUEST['id']);
    header('Location: index.php');
  }
}
 ?>
