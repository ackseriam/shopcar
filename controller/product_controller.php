<?php
require_once 'model/product.php';
require_once 'model/shopping.php';
class ProductController
{
  private $model;
  public function __construct()
  {
    $this->model = new Product();
    $this->model1=new Shopping();
  }
  public function indexProduct()
  {
      
      session_start();
      $id_user=$_SESSION['id_user'];
      $shopping=$this->model1->consul_shopping($id_user);


  
  require_once 'views/product_all.php';

  }
  public function showById()
  {
    $product=new Product();
  
    if(isset($_REQUEST['id'])){
      $product=$this->model->getById($_REQUEST['id']);

    }
    require_once 'views/product_insert.php';
  }

  public function save()
  {
    $product=new Product();
    $product->id=$_REQUEST['id'];
    $product->name=$_REQUEST['name'];
    $product->price=$_REQUEST['price'];
    $product->average_rating=$_REQUEST['average_rating'];
    $product->kind_product=$_REQUEST['kind_product'];
    //If the id is =0 the action is update else create
  
    $product->id>0?$product->update():$product->create();
  
  
    header('Location: index.php');
  
  }
  public function quit()
  {
    $this->model->delete($_REQUEST['id']);
    header('Location: index.php');
  }
}
 ?>
