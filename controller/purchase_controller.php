<?php
require_once 'model/purchase.php';
require_once 'model/shopping.php';
require_once 'model/product.php';
require_once 'model/balance.php';


class PurchaseController
{
  private $model;
  public function __construct()
  {
    $this->model = new Purchase();
    $this->model1=new Shopping();
    $this->model2=new Balance();
    $this->model3=new Product();
  }
  public function indexPurchase()
  {
      
      session_start();
      $id_user=$_SESSION['id_user'];
      $shopping=$this->model->getconsul();
  require_once 'views/purchase_all.php';

  }
  public function showById($id)
  {
    $purchase=new Purchase();
  
    if(isset($_REQUEST['id'])){
      $purchase=$purchase->consul_purchase($_REQUEST['id']);

    }
    session_start();
    $balance= new Balance();
    $balance=$balance->getByIdb($_SESSION['id_user']);
    $balance_all=$this->model2->getByIdAll($_SESSION['id_user']);
    $balance_init=$this->model2->getByInit($_SESSION['id_user']);


    
  require_once 'views/purchase_all.php';
  }

  public function save()
  {
    
    
    if($_REQUEST['shipping_option']=='pick up')
      $shipping_option=0;
    elseif($_REQUEST['shipping_option']=='UPS')
    
    $shipping_option=5;
    session_start();
    $balance=new Balance();
    $balance->id_user=$_SESSION['id_user'];
    $balance_t=$balance->getByIdb($_SESSION['id_user']);

    $balance_ge=$_REQUEST['balance']+$shipping_option;
    if($balance_t > $balance_t->total_amount-$balance_ge)
    {
       echo "<script>
                alert('Insufficient funds');
                window.location= 'index.php'
             </script>";
    }else{
      $purchase=new Purchase();
    $purchase->id_shoppingcar=$_REQUEST['id_shoppingcar'];
    $purchase->shipping_option=$_REQUEST['shipping_option'];
    $purchase->balance_purchase=$balance_ge;

    $purchase->create();
       

    $balance->total_amount=$balance_t->total_amount-$balance_ge;
    $shopping=$this->model1->getById($_REQUEST['id_shoppingcar']);
    
    $shoppingcar= new Shopping();
    $shoppingcar->id=$shopping->id;
    $shoppingcar->id_product=$shopping->id_product;
    $shoppingcar->id_user=$shopping->id_user;
    $shoppingcar->balance=$_REQUEST['balance'];
    $shoppingcar->rating_user=$_REQUEST['rating_user'];
    $shoppingcar->quantity_products=$_REQUEST['quantity_products'];
    

     $shoppingcar->update();
     $balance->create();
  
      $shopping_rating=$this->model1->consul_rating($shopping->id_product);
      $shopping_ranting=$shopping_rating->AVG;

      
      $products=$this->model3->getById($shopping->id_product);
      $product=new Product();
      $product->id=$products->id;
      $product->name=$products->name;
      $product->price=$products->price;
      $product->kind_product=$products->kind_product;
      $product->average_rating=$shopping_ranting;
      $product->update();
  header('Location: index.php');
    }
   
  
  }
  public function quit()
  {
    $this->model->delete($_REQUEST['id']);
    header('Location: index.php');
  }
}
 ?>