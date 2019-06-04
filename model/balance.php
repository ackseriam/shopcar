<?php
require_once 'kernel/crud.php';
class Balance extends Crud
{
  private $id;
  private $id_user;
  private $total_amount;
  const TABLE='balance';
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
    $stm=$this->pdo->prepare("INSERT INTO ".self::TABLE." (id_user, total_amount) VALUES (?,?)");
  
    $stm->execute(array($this->id_user,$this->total_amount));
  }catch(PDOException $e){
    echo $e->getMessage();
  }

  }
  public function update(){
    try{
    $stm=$this->pdo->prepare("UPDATE ".self::TABLE." SET id_user=?, total_amount=? WHERE id=?");
    $stm->execute(array($this->name,$this->id_user,$this->total_amount));
  }catch(PDOException $e){
    echo $e->getMessage();
  }
  }

  public function getByIdb($id_user)
  {
    try{
    $stm=$this->pdo->prepare("SELECT * FROM ".self::TABLE." WHERE id_user=? ORDER by id DESC LIMIT 1");
    $stm->execute(array($id_user));
    return $stm->fetch(PDO::FETCH_OBJ);
  }catch(PDOException $e){
    echo $e->getMessage();
  }
  }
  public function getByInit($id_user)
  {
    try{
    $stm=$this->pdo->prepare("SELECT * FROM ".self::TABLE." WHERE id_user=? ORDER by id ASC LIMIT 1");
    $stm->execute(array($id_user));
    return $stm->fetch(PDO::FETCH_OBJ);
  }catch(PDOException $e){
    echo $e->getMessage();
  }
  }

  public function getByIdAll($id_user)
  {
    try{
    $stm=$this->pdo->prepare("SELECT * FROM ".self::TABLE." WHERE id_user=? AND total_amount!=100");
    $stm->execute(array($id_user));
    return $stm->fetchAll(PDO::FETCH_OBJ);
  }catch(PDOException $e){
    echo $e->getMessage();
  }
  }
}

 ?>
