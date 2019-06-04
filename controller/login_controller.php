<?php 
require_once 'model/user.php';
class LoginController
{
  private $model;
  public function __construct()
  {
    $this->model = new User();
  }
  
  public function showById()
  {
    $user=new User();
    if(isset($_REQUEST['id'])){
      $user=$this->model->getById($_REQUEST['id']);
    }
    require_once 'views/product_insert.php';
  }
  public function destroy()
  {
    session_start();
    unset($_SESSION['login']);
 
       header('Location: login.php');
  }
   public function consul()
  {
   $user=new User();
   $user->email=$_REQUEST['email'];
   $user->password=$_REQUEST['password'];
    $usero=$user->login($user->email,$user->password);

  	if($usero!=false)
    {
      session_start();
      $_SESSION['id_user']=$usero->id;
    $_SESSION['login']="Admin";
    header('Location: index.php');
    }else{
      echo "Incorrect username and password ";
    }

 
  
  }
  public function quit()
  {
    $this->model->delete($_REQUEST['id']);
    header('Location: index.php');
  }
}

?>