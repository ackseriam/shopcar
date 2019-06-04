
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
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="index.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class= "col-lg-6"></div><div class="col-lg-3"></div>
  <div class= "col-lg-4">
    <?php if(isset($_SESSION['login'])):?>
   <?php if($_SESSION['login']=="Admin"):?>
   <a href='index.php?controller=login&action=destroy' class="navbar-brand">Log out</a>
    <?php endif;?>
  <?php endif;?>
  </div>
   

</nav>
 <body class="text-center">
    <form class="form-signin" action='index.php?controller=shopping&action=save'  method='post'>
    <input type='hidden' name='id_product' value="<?php echo $shopping->id;?>"/>
        <input type='hidden' name='kind_product' value="<?php echo $shopping->kind_product;?>"/>
       
  <br><br>
  <label >Overall product rating</label><label class="form-control"> <?php echo $shopping_ranting;?></label>
  <label >Name of product</label>
  <input type='text' name='name' value="<?php echo $shopping->name;?>" class="form-control" required readonly>
  <label >Price</label>
 <input class="form-control"  type='text' name='price' value="<?php echo $shopping->price;?>" required readonly>
  <label >Quantity of products</label>
<input class="form-control"  type='text' name='quantity_products' value="" />
  <label >Rating of produc</label>
   <select name='rating_user' class="form-control">
             <option value="another">in another moment </option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option> 
    </select><br><br>
  
  <button class="btn btn-lg btn-primary btn-block" type="submit" type='submit' name='send' >Save</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
</form>
</body>
</html>