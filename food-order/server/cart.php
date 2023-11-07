<?php

include 'component/connectdb.php';

session_start();

if(isset($_SESSION['id_user'])){
   $id_user = $_SESSION['id_user'];
}else{
   $id_user  = '';
   header('location:home.php');
};

if(isset($_POST['delete'])){
   $id_cart = $_POST['id_cart'];
   $conn = connectdb();
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE id_cart = ?");
   $delete_cart_item->execute([$id_cart]);
   $message[] = 'cart item deleted!';
}

if(isset($_POST['delete_all'])){
   $conn = connectdb();
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE id_user = ?");
   $delete_cart_item->execute([$id_user]);
   // header('location:cart.php');
   $message[] = 'deleted all from cart!';
}

if(isset($_POST['update_qty'])){
   $id_cart = $_POST['id_cart'];
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);
   $conn = connectdb();
   $update_qty = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id_cart  = ?");
   $update_qty->execute([$qty, $id_cart]);
   $message[] = 'item quantity updated';
}

$grand_total = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
   
<!-- header section starts  -->
<?php include 'component/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">
   <h3>shopping cart</h3>
   <p><a href="home.php">home</a> <span> / cart</span></p>
</div>

<!-- shopping cart section starts  -->

<section class="products">

   <h1 class="title">your cart</h1>

   <div class="box-container">

      <?php
         $grand_total = 0;
         $conn = connectdb();
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE id_user = ?");
         $select_cart->execute([$id_user]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="id_cart" value="<?= $fetch_cart['id_cart']; ?>">
         <button type="submit" class="fas fa-times" name="delete" onclick="return confirm('delete this item?');"></button>
         <img src="uploaded_img/<?= $fetch_cart['image']; ?>" alt="">
         <div class="name"><?= $fetch_cart['name']; ?></div>
         <div class="flex">
            <div class="price"><span>$</span><?= $fetch_cart['price']; ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="<?= $fetch_cart['quantity']; ?>" maxlength="2">
            <button type="submit" class="fas fa-edit" name="update_qty"></button>
         </div>
         <div class="sub-total"> sub total : <span>$<?= $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</span> </div>
      </form>
      <?php
               $grand_total += $sub_total;
            }
         }else{
            echo '<p class="empty">your cart is empty</p>';
         }
      ?>

   </div>

   <div class="cart-total">
      <p>cart total : <span>$<?= $grand_total; ?></span></p>
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
   </div>

   <div class="more-btn">
      <form action="" method="post">
         <button type="submit" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>" name="delete_all" onclick="return confirm('delete all from cart?');">delete all</button>
      </form>
      <a href="menu.php" class="btn">continue shopping</a>
   </div>

</section>

<!-- shopping cart section ends -->
<?php include 'component/footer.php'; ?>
</body>
</html>