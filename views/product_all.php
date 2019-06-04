<?php
session_start();
if(isset($_SESSION['login'])){
echo "Welcome ".$_SESSION['login'];


}
  ?>
  <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Shop car</title>

    <link rel="canonical" href="index.html">

    <!-- Bootstrap core CSS -->
    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="index.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class= "col-lg-6"></div><div class="col-lg-3"></div>
  <div class= "col-lg-4">
     <?php if(isset($_SESSION['login'])):?>
   
   <a href='index.php?controller=login&action=destroy' class="navbar-brand">Log out</a>
     <?php elseif(!isset($_SESSION['login'])):?>

  <a href="login.php" class="form-control" class="form-control">Login to Add to cart</a>
  <?php endif;?>
  </div>
   

</nav>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Shopping car!</h1>
      <p>Project for the job.</p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">Welcome</a></p>
       <div class="row">
              <div class="col-lg-10"></div>
               
              <div class="col-lg-2"> <h2 class="text-center">History of my purchases</h2><a class="btn btn-primary " href="index.php?controller=purchase&action=showById&id=<?php echo $_SESSION['id_user']?>" >show my purchases</a></div>
            </div>
     </div>
    </div>
  <div class="container">
            <hr>
    <!-- Example row of columns -->
      <?php if(isset($_SESSION['login'])):?>
   <?php if($_SESSION['login']=="Admin"):?>
  <a href='index.php?controller=product&action=showById' class="btn btn-primary">New product</a>

  <?php endif;?>
  <?php endif;?>

    <h2 class="text-center">Products for sale</h2><br>
    <div class="row">

       <?php foreach($this->model->getAll() as $product): ?>
      <div class="col-md-4">
        <h2><?php echo $product->name?></h2>
        <p>Price: <?php echo $product->price?>,<br> Average of rating <?php echo $product->average_rating?>,<br> Kind of product: <?php echo $product->kind_product?> </p>
        <p><a class="btn btn-secondary" href="index.php?controller=shopping&action=showById&id=<?php echo $product->id; ?>">Add to cart</a></p>
        <p>
        <a  class="btn btn-danger" onclick="javascript:return confirm('Are you sure you want to delete this register?');" href="index.php?controller=product&action=quit&id=<?php echo $product->id; ?>">Delete</a></p>
      </div>
        <?php endforeach;?>
    </div>

    <hr>

  </div> <!-- /container -->

    <div class="container">
          <!-- Example row of columns -->
            <?php if(isset($_SESSION['login'])):?>
         <?php if($_SESSION['login']=="Admin"):?>


        <?php endif;?>
        <?php endif;?>
          <h2 class="text-center">My shopping cart</h2><br>
            <?php if(!empty($shopping)):?>   
          <div class="row">

             <?php foreach($shopping as $shoppinga): ?>
            <div class="col-md-4">
             <h2><?php echo $shoppinga->name?></h2>
              <p>Price: <?php echo $shoppinga->price?>,<br> Average of rating <?php echo $shoppinga->average_rating?>,<br> Kind of product: <?php echo $shoppinga->kind_product?><br>
                Quantity of products<?php echo $shoppinga->quantity_products?>
              </p>
                <?php if(isset($_SESSION['login'])):?>
                 <?php if($_SESSION['login']=="Admin"):?>
           
                      <p><a class="btn btn-danger" onclick="javascript:return confirm('Are you sure you want to delete this register?');" href="index.php?controller=shopping&action=quit&id=<?php echo $shoppinga->id; ?>">Delete</a></td>
                    
                         <td><a class="btn btn-secondary" href="index.php?controller=shopping&action=MyById&id=<?php echo $shoppinga->id; ?>">Pay</a></p>
                 <?php endif;?>    
              <?php endif;?>
            </div>
              <?php endforeach;?>
               <?php else:?>
              <p>Your shopping cart is empty</p>
             <?php endif;?>
          </div>

          <hr>

     </div> <!-- /container -->
       <div class="container">
            <!-- Example row of columns -->
              <?php if(isset($_SESSION['login'])):?>
           <?php if($_SESSION['login']=="Admin"):?>
       

          <?php endif;?>
          <?php endif;?>
           

  </div> <!-- /container -->



</main>

<footer class="container">
  <p>&copy; Company 2019</p>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="../dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>


