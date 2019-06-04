
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
       <div class="container">
  <div class="py-5 text-center" style="top:400px;"><br><br><br><br><br><br><br>
    
    <h2>Shopping cart</h2>

  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill"><?php echo $shopping->quantity_products;?></span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Product name</h6>
            <p class="text-muted"><?php echo $shopping->name;?></p>
          </div>
          <span class="text-muted"><?php echo $shopping->price;?>$</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Kind of product</h6>
            <p class="text-muted"><?php echo $shopping->kind_product;?></p>
          </div>
          <span class="text-muted"></span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Quantity of products</h6>
            <p class="text-muted"></p>
          </div>
          <span class="text-muted"><?php echo $shopping->quantity_products;?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="text-success">Overall product rating</h6>
            <small class="text-muted"></small>
          </div>
          <span class="text-success"><?php echo $shopping->average_rating;?>/5</span>
        </li><?php $sum= $shopping->quantity_products*$shopping->price;?>
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Total balance</h6>
            <small></small>
          </div>
          <span class="text-success"><?php echo $sum;?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)(No shipping option)</span>
          <strong>$<?php echo $sum;?></strong>
        </li>
      </ul>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form class="needs-validation" " action='index.php?controller=purchase&action=save' method='post' novalidate>
          <input type='hidden' name='id_shoppingcar' value="<?php echo $shopping->id;?>"/>
        <input type='hidden' name='balance' value="<?php echo $shopping->balance;?>"/>
          <input type='hidden' name='quantity_products' value="<?php echo $shopping->quantity_products;?>"/>
        <div class="row">
       <?php if($shopping->rating_user=='0'):?>
          <div class="col-md-12 mb-3">
             <label>Add a rating to the product</label>
            <select name='rating_user' class="form-control" required>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
             
            </select>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <?php else:?>
           <label>Your product rating </label>
            <input type='hidden' name='rating_user' value="<?php echo $shopping->rating_user;?>"/>
          <label class="form-control"><?php echo $shopping->rating_user;?></label>
        <?php endif;?>
        </div>

        <div class="mb-3">
          <label>Shipping option</label>
            <select name='shipping_option' class="form-control" required>
              <option value="pick up">USD 0, pick up</option>
              <option value="UPS">USD 5, UPS</option>
            </select>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
      </form>
    </div>
  </div>


  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2019 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="index.html#">Privacy</a></li>
      <li class="list-inline-item"><a href="index.html#">Terms</a></li>
      <li class="list-inline-item"><a href="index.html#">Support</a></li>
    </ul>
  </footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="../../dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <script src="form-validation.js"></script></body>

</body>
</html>