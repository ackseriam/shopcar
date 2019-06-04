<?php
require_once 'kernel/crud.php';
class Shopping extends Crud
{
  private $id;
  private $id_product;
  private $id_user;
  private $balance;
   private $rating_user;
  private $quantity_products;
 

  const TABLE='shoppingcar';
  const TABLE2='products';
  private $pdo;
  public function __construct()
  {
    parent::__construct(self::TABLE);
    $this->pdo=parent::connec();
  }

  public function __set($name,$value){
    $this->$name=$value;
  }
  public function __get($name){
    return $this->$name;
  }

   public function consul_shopping($id_user){
    try{
      
    $stm=$this->pdo->prepare("SELECT shoppingcar.id as id, products.id as id_product, shoppingcar.id_user as id_user,shoppingcar.balance as balance, shoppingcar.rating_user as rating_user,shoppingcar.quantity_products as quantity_products, products.name as name, products.price as price, products.average_rating as average_rating, products.kind_product as kind_product FROM ".self::TABLE." INNER JOIN ".self::TABLE2." ON products.id=shoppingcar.id_product WHERE id_user=? ");
  
    $stm->execute(array($id_user));
    return $stm->fetchAll(PDO::FETCH_OBJ);

  }catch(PDOException $e){
    echo $e->getMessage();
  }
}


public function consul_shoppingcar($id_shopping){
    try{
      
    $stm=$this->pdo->prepare("SELECT shoppingcar.id as id, products.id as id_product, shoppingcar.id_user as id_user,shoppingcar.balance as balance, shoppingcar.rating_user as rating_user,shoppingcar.quantity_products as quantity_products, products.name as name, products.price as price, products.average_rating as average_rating, products.kind_product as kind_product FROM ".self::TABLE." INNER JOIN ".self::TABLE2." ON products.id=shoppingcar.id_product WHERE shoppingcar.id=? ");
  
    $stm->execute(array($id_shopping));
    return $stm->fetch(PDO::FETCH_OBJ);

  }catch(PDOException $e){
    echo $e->getMessage();
  }
}

    public function consul_product($id_product){
    try{
    $stm=$this->pdo->prepare("SELECT * FROM ".self::TABLE2." WHERE id=? ");
  
    $stm->execute(array($id_product));
    return $stm->fetch(PDO::FETCH_OBJ);
 
  }catch(PDOException $e){
    echo $e->getMessage();
  }

  }

   public function consul_rating($id_product){
    try{
    $stm=$this->pdo->prepare("SELECT rating_user, AVG(rating_user) as AVG FROM ".self::TABLE." WHERE id_product=? ");
  
    $stm->execute(array($id_product));
    return $stm->fetch(PDO::FETCH_OBJ);
 
  }catch(PDOException $e){
    echo $e->getMessage();
  }

  }

  

  public function create(){
    try{
    $stm=$this->pdo->prepare("INSERT INTO ".self::TABLE." (id_product, id_user, balance,rating_user,quantity_products) VALUES (?,?,?,?,?)");
  
    $stm->execute(array($this->id_product,$this->id_user,$this->balance,$this->rating_user,$this->quantity_products));
  }catch(PDOException $e){
    echo $e->getMessage();
  }

  }
  public function update(){
    try{
      
    $stm=$this->pdo->prepare("UPDATE ".self::TABLE." SET id_product=?, id_user=?, balance=?, rating_user=?,quantity_products=? WHERE id=?");
    $stm->execute(array($this->id_product,$this->id_user,$this->balance,$this->rating_user,$this->quantity_products,$this->id));
  }catch(PDOException $e){
    echo $e->getMessage();
  }
  }
}

 ?>
