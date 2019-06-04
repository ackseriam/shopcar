<?php
require_once 'kernel/crud.php';
class Product extends Crud
{
  private $id;
  private $name;
  private $price;
  private $average_rating;
  private $kind_product;
  const TABLE='products';
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

  public function create(){
    try{
    $stm=$this->pdo->prepare("INSERT INTO ".self::TABLE." (name, price, average_rating, kind_product) VALUES (?,?,?,?)");
  
    $stm->execute(array($this->name,$this->price,$this->average_rating,$this->kind_product));
  }catch(PDOException $e){
    echo $e->getMessage();
  }

  }
  public function update(){
    try{
    $stm=$this->pdo->prepare("UPDATE ".self::TABLE." SET name=?, price=?,	average_rating=?,	kind_product=? WHERE id=?");
    $stm->execute(array($this->name,$this->price,$this->average_rating,$this->kind_product,$this->id));
  }catch(PDOException $e){
    echo $e->getMessage();
  }
  }
}

 ?>
