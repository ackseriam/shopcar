<?php
require_once 'kernel/crud.php';
class User extends Crud
{
  private $email;
  private $password;
  const TABLE='user';
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
    $stm=$this->pdo->prepare("INSERT INTO ".self::TABLE." (name, lastname, id_ci, address, phone, sex) VALUES (?,?,?,?,?,?)");
  
    $stm->execute(array($this->name,$this->lastname,$this->id_ci,$this->address,$this->phone,$this->sex));
  }catch(PDOException $e){
    echo $e->getMessage();
  }
  }
    public function login($email,$password){
    try{
    $stm=$this->pdo->prepare("SELECT * FROM ".self::TABLE." WHERE email=? and password=?");
  
    $stm->execute(array($email,$password));
    return $stm->fetch(PDO::FETCH_OBJ);
 
  }catch(PDOException $e){
    echo $e->getMessage();
  }

  }
  public function update(){
    try{
    $stm=$this->pdo->prepare("UPDATE ".self::TABLE." SET email=?,password=? WHERE id=?");
    $stm->execute(array($this->email,$this->password));
  }catch(PDOException $e){
    echo $e->getMessage();
  }
  }
}

 ?>
