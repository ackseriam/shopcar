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
  <body class="text-center">
    <form class="form-signin" action='index.php?controller=product&action=save' method='post'>
   <input type='hidden' name='average_rating' value="<?php echo $product->average_rating;?>"/>
  <label >Name of product</label>
  <input type='text' name='name' value="<?php echo $product->name;?>" class="form-control" required >

  <label >Price</label>
 <input type='text' name='price' value="<?php echo $product->price;?>" class="form-control" required><br>
  <label >Kind of product</label>
   <select class="form-control" name='kind_product' required>
    <option <?php echo $product->kind_product=='unit prices'?'Selected':'';?>value='each unit'>unit prices</option>
    <option <?php echo $product->kind_product=='each kg'?'Selected':'';?> value='each kg'>each kg

  </select><br><br>
  
  <button class="btn btn-lg btn-primary btn-block" type="submit" >Save</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
</form>
</body>
</html>



