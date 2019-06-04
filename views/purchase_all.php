<?php
session_start();
if(isset($_SESSION['login'])):
  ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Shopping car</title>

    <link rel="canonical" href="index.html">

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
    <link href="signin.css" rel="stylesheet">
  </head>

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
 <body class="text-center">
    

<main role="main" class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0"> <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>Total balance: <?php echo $balance->total_amount?>$ (Beginning balance <?php echo $balance_init->total_amount?>$)</h6>
  </div>
    <div class="row ">
      <div class="col-lg-8" >
        <h3>Purchase history</h3>
        <table  class="table">
          <tr>
            <td>Beginning balance</td>
            <td><?php echo $balance_init->total_amount?></td>
          </tr>
          <tr>
        <td>Name</td>
        <td>Price</td>
        <td>Kind of product</td>
        <td>Shipping of option</td>
        <td>Total purchase</td>
        </tr>
         <?php if(!empty($purchase)): ?>
        <?php foreach($purchase as $purchasa): ?>
        <tr>
          <td><?php echo $purchasa->name?></td>
          <td><?php echo $purchasa->price?>$</td>
          <td><?php echo $purchasa->kind_product?></td>
          <td><?php echo $purchasa->shipping_option?></td>
          <td><?php echo $purchasa->balance_purchase?>$</td>
      </tr>
      <?php endforeach;?>
      <?php else:?>
        <h1>The table is empty</h1>
        <?php endif;?>
        </table> 
      </div>
      <div class="col-lg-4" style="top:85px;">
        <table class="table" >
            <tr>
              <td>Funds after purchase</td>
             
            </tr>
             <?php foreach($balance_all as $balance_alla): ?>
            <tr>  <td><?php echo $balance_alla->total_amount?>$
             </td></tr>
           <?php endforeach;?>
           
        </table>
      </div>
        
      
    </div>
   
    
     
    <a href="index.php">Home</a>
  
<!--
  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">Recent updates</h6>
    <div class="media text-muted pt-3">
      <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">@username</strong>
        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
      </p>
    </div>
    <div class="media text-muted pt-3">
      <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#e83e8c"/><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text></svg>
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">@username</strong>
        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
      </p>
    </div>
    <div class="media text-muted pt-3">
      <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#6f42c1"/><text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text></svg>
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">@username</strong>
        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
      </p>
    </div>
    <small class="d-block text-right mt-3">
      <a href="index.html#">All updates</a>
    </small>
  </div>-->

</main>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="../../dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <script src="offcanvas.js"></script></body>
</html>
  
<?php endif;?>

