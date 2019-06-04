    <form class="form-signin" action='index.php?controller=purchase&action=save' method='post'>
        <input type='hidden' name='id_shoppingcar' value="<?php echo $shopping->id;?>"/>
        <input type='hidden' name='balance' value="<?php echo $shopping->balance;?>"/>
          <input type='hidden' name='quantity_products' value="<?php echo $shopping->quantity_products;?>"/>
     
        <label>Name of product</label>
        <label class="form-control"><?php echo $shopping->name;?></label>
        <label>Price</label>
        <label class="form-control"><?php echo $shopping->price;?></label>
         <label>kind of product</label>
        <label class="form-control"><?php echo $shopping->kind_product;?></label>
        <label>Overall product rating</label>
        <label class="form-control"><?php echo $shopping->average_rating;?></label>
        <label>Quantity of products</label>
        <label class="form-control"><?php echo $shopping->quantity_products;?></label>


          <input type='hidden' name='quantity_products' value="<?php echo $shopping->quantity_products;?>"/>
           <?php if($shopping->rating_user=='0'):?>
 
          <label>Add a rating to the product</label>
        
            <select name='rating_user' class="form-control" required>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
             
            </select>
          
         <?php else:?>
       
            <label>Your product rating </label>
          <label class="form-control"><?php echo $shopping->rating_user;?></label>
        
         <?php endif;?>
       
          <label>Shipping option</label>
            <select name='shipping_option' class="form-control" required>
              <option value="pick up">USD 0, pick up</option>
              <option value="UPS">USD 5, UPS</option>
            </select>
         
</form>
  
  <button class="btn btn-lg btn-primary btn-block" type="submit" >Pay</button>
 

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
  <body class="text-center">
     <?php if(!isset($_SESSION['login'])):?>

  <td><a href="login.php" class="form-control">Login to Add to cart</a></td>
  <?php endif;?>
  <table>
      <tr>
        <td>Total balance</td>
        <td><?php echo $balance->total_amount?></td>
      </tr>
  </table>
   <h3>Purchase history</h3>
    <table>
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
    <table>
      <tr>
        <td>Funds after purchase</td>
       
      </tr>
       <?php foreach($balance_all as $balance_alla): ?>
      <tr>  <td><?php echo $balance_alla->total_amount?>$
       </td></tr>
     <?php endforeach;?>
     
  </table>
     
    <a href="index.php">Home</a>
  </body>
</html>
<?php endif;?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action='index.php?controller=purchase&action=save' method='post'>
      <table>
        <input type='hidden' name='id_shoppingcar' value="<?php echo $shopping->id;?>"/>
        <input type='hidden' name='balance' value="<?php echo $shopping->balance;?>"/>
       

        <tr>
          <td>Name of product</td>
          <td><?php echo $shopping->name;?></td>
        </tr>
        <tr>
          <td>Price</td>
          <td><?php echo $shopping->price;?></td>
        </tr>
        
        <tr>
          <td>kind of product</td>

          <td><?php echo $shopping->kind_product;?></td>
        </tr>
        <tr>
          <td>Overall product rating</td>

          <td><?php echo $shopping->average_rating;?></td>
        </tr>
        <tr>
          <td>Quantity of products</td>
          <td><?php echo $shopping->quantity_products;?></td>
          <input type='hidden' name='quantity_products' value="<?php echo $shopping->quantity_products;?>"/>
        </tr>
        <?php if($shopping->rating_user=='0'):?>
        <tr>
          <td>Add a rating to the product</td>
          <td>
            <select name='rating_user'>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
             
            </select>
          </td>
        </tr>
         <?php else:?>
         <tr>
           <td>Your product rating</td>
          <td><?php echo $shopping->rating_user;?></td>
        </tr>
         <?php endif;?>
        <tr>
          <td>Shipping option</td>
          <td>
            <select name='shipping_option'>
              <option value="pick up">USD 0, pick up</option>
              <option value="UPS">USD 5, UPS</option>
            </select>
          </td>
        </tr>
          <td><input type='submit' name='send' value="Pay"/></td>
        </tr>
      </table>


    </form>
  </body>
</html>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action='index.php?controller=shopping&action=save' method='post'>
      <table>
        <input type='hidden' name='id_product' value="<?php echo $shopping->id;?>"/>
        <input type='hidden' name='kind_product' value="<?php echo $shopping->kind_product;?>"/>
    
        <tr>
          <td>Name of product</td>
          <td><input type='text' name='name' value="<?php echo $shopping->name;?>" readonly /></td>
        </tr>
        <tr>
          <td>Price</td>
          <td><input type='text' name='price' value="<?php echo $shopping->price;?>" readonly/></td>
        </tr>
        
        <tr>
          <td>kind of product</td>

          <td><?php echo $shopping->kind_product;?></td>
        </tr>
        <tr>
          <td>Cantidad de productos</td>
          <td><input type='text' name='cantidad' value="" /></td>
        </tr>
        <tr>
          <td>Rating of product</td>
          <td>
             <select name='rating_user'>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
             
            </select>
          </td>
        </tr>
          <td><input type='submit' name='send' value="Guardar"/></td>
        </tr>
      </table>


    </form>
  </body>
</html>


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
  <a class="navbar-brand" href="index.html#">Home</a>
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
        <input type='hidden' name='rating_user' value="0"/>
  <br><br>
  <label >Overall product rating</label><label class="form-control"> <?php echo $shopping_ranting;?></label>
  <label >Name of product</label>
  <input type='text' name='name' value="<?php echo $shopping->name;?>" class="form-control" required readonly>
  <label >Price</label>
 <input class="form-control"  type='text' name='price' value="<?php echo $shopping->price;?>" required readonly>
  <label >Quantity of products</label>
<input class="form-control"  type='text' name='quantity_products' value="" />
  <label >Kind of product</label>
   <select class="form-control" name='kind_product' required>
    <option <?php echo $shopping->kind_productt=='unit prices'?'Selected':'';?>value='each unit'>unit prices</option>
    <option <?php echo $shopping->kind_product=='each kg'?'Selected':'';?> value='each kg'>each kg</option>

  </select><br><br>
  
  <button class="btn btn-lg btn-primary btn-block" type="submit" type='submit' name='send' >Save</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
</form>
</body>
</html>





<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <form action='index.php?controller=login&action=consul' method='post'>
    <table>
        <tr>
          <td>email</td>
          <td><input type='text' name='email' /></td>
        </tr>
        <tr>
          <td>password</td>
          <td><input type='password' name='password' /></td>
        </tr>
        <tr>
          <td><input type='submit' name='send' value="Guardar"/></td>
        </tr>
      </table>
  </form>

</body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Shop cart</title>
  </head>
  <body>
     <?php if(!isset($_SESSION['login'])):?>

  <td><a href="login.php">Login to Add to cart</a></td>
  <?php endif;?>
   <h3>Products for sale</h3>
    <table>
      <tr>
    <td>Name</td>
    <td>Price</td>
    <td>Average rating</td>
    <td>Kind of product</td>
    </tr>
    <?php foreach($this->model->getAll() as $product): ?>
    <tr>
      <td><?php echo $product->name?></td>
      <td><?php echo $product->price?>$</td>
      <td><?php echo $product->average_rating?></td>
      <td><?php echo $product->kind_product?></td>
      <?php if(isset($_SESSION['login'])):?>
          <?php if($_SESSION['login']=="Admin"):?>
      <td><a href="index.php?controller=product&action=showById&id=<?php echo $product->id; ?>">Edit</a></td>
      <td><a onclick="javascript:return confirm('Are you sure you want to delete this register?');" href="index.php?controller=product&action=quit&id=<?php echo $product->id; ?>">Delete</a></td>
      
         <td><a href="index.php?controller=shopping&action=showById&id=<?php echo $product->id; ?>">Add to cart</a></td>
    <?php else:?>
     <td><a href="index.php?controller=shopping&action=showById&id=<?php echo $product->id; ?>">Add to cart</a></td>
     <?php endif;?>    
  <?php endif;?>
  </tr>
  <?php endforeach;?>
 <?php if(isset($_SESSION['login'])):?>
   <?php if($_SESSION['login']=="Admin"):?>
  <td> <a href='index.php?controller=product&action=showById'>New product</a></td>
  <td> <a href='index.php?controller=login&action=destroy'>Log out</a></td>
  <?php endif;?>
  <?php endif;?>
    </table>
    <br><br><h3>My shopping cart</h3>
    <?php if(!empty($shopping)):?>   
    <table>
      <tr>
    <td>Name</td>
    <td>Price</td>
   <!-- <td>Average rating</td>-->
    <td>Kind of product</td>
     <td>Quantity of products</td>
     <td>Actions </td>
    </tr>
    <?php foreach($shopping as $shoppinga): ?>

    <tr>
      <td><?php echo $shoppinga->name?></td>
      <td><?php echo $shoppinga->price?>$</td>
     <!-- <td><?php echo $shoppinga->average_rating?></td>--> 
      <td><?php echo $shoppinga->kind_product?></td>
      <td><?php echo $shoppinga->quantity_products?></td>
      <?php if(isset($_SESSION['login'])):?>
          <?php if($_SESSION['login']=="Admin"):?>
     
      <td><a onclick="javascript:return confirm('Are you sure you want to delete this register?');" href="index.php?controller=shopping&action=quit&id=<?php echo $shoppinga->id; ?>">Delete</a></td>
    
         <td><a href="index.php?controller=shopping&action=MyById&id=<?php echo $shoppinga->id; ?>">Pay</a></td>


     <?php endif;?>    
  <?php endif;?>
  </tr>
  <?php endforeach;?>
    </table>
  <?php else:?>
        <p>Your shopping cart is empty</p>
  <?php endif;?>
     <br><br><h3>History of my purchases</h3>
     <br>
     <a href="index.php?controller=purchase&action=showById&id=<?php echo $_SESSION['id_user']?>" >show my purchases</a>
  </body>
</html>
