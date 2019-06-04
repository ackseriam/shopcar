<?php
require_once 'kernel/crud.php';
class Purchase extends Crud
{
  private $id;
  private $id_shoppingcar;
  private $shipping_option;

  const TABLE='purchase';
  const TABLE2='shoppingcar';
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

   public function consul_purchase($id_user){
    try{
      
    $stm=$this->pdo->prepare("SELECT * FROM ".self::TABLE." INNER JOIN ".self::TABLE2." ON shoppingcar.id=purchase.id_shoppingcar  INNER JOIN products ON products.id=shoppingcar.id_product WHERE shoppingcar.id_user=? ");
  
    $stm->execute(array($id_user));
    return $stm->fetchAll(PDO::FETCH_OBJ);

  }catch(PDOException $e){
    echo $e->getMessage();
  }
}
public function consul(){
    try{
    
    $stm=$this->pdo->prepare("SELECT * FROM ".self::TABLE." INNER JOIN ".self::TABLE2." ON shoppingcar.id=purchase.id_shoppingcar  ");
  
    $stm->execute(array($id_user));
    return $stm->fetchAll(PDO::FETCH_OBJ);

  }catch(PDOException $e){
    echo $e->getMessage();
  }
}

  public function create(){
    try{
    $stm=$this->pdo->prepare("INSERT INTO ".self::TABLE." (id_shoppingcar, shipping_option,balance_purchase) VALUES (?,?,?)");
  
    $stm->execute(array($this->id_shoppingcar,$this->shipping_option,$this->balance_purchase));
  }catch(PDOException $e){
    echo $e->getMessage();
  }

  }
  public function update(){
    try{
    $stm=$this->pdo->prepare("UPDATE ".self::TABLE." SET id_shoppingcar=?, shipping_option=? WHERE id=?");
    $stm->execute(array($this->name,$this->price,$this->average_rating,$this->kind_product,$this->id));
  }catch(PDOException $e){
    echo $e->getMessage();
  }
  }
}

 ?>
