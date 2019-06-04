<?php
session_start();
if(isset($_SESSION['login'])){
echo "Welcome ".$_SESSION['login'];

//unset($_SESSION['login']);
}
  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
     <?php if(!isset($_SESSION['login'])):?>

  <td><a href="login.php">Login to Add to cart</a></td>
  <?php endif;?>
   
    <table>
      <tr>
    <td>Name</td>
    <td>Price</td>
    <td>Average rating</td>
    <td>Kind of product</td>
    </tr>

    </table>
  </body>
</html>
