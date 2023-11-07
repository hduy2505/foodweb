<?php
include 'component/connectdb.php';
session_start();
if (isset($_SESSION['id_user'])) {
   $id_user = $_SESSION['id_user'];
} else {
   $id_user = '';
};
include 'component/addcart.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>menu</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


</head>

<body>
   <?php include 'component/user_header.php'; ?>

   <section class="category">

      <h1 class="title">food category</h1>

      <div class="box-container">

         <a href="category.php?category=4" class="box">
            <h3>fast food</h3>
         </a>

         <a href="category.php?category=1" class="box">
            <h3>main dishes</h3>
         </a>

         <a href="category.php?category=3" class="box">
            <h3>drinks</h3>
         </a>

         <a href="category.php?category=2" class="box">
            <h3>desserts</h3>
         </a>

      </div>

   </section>




   <section class="products">

      <h1 class="title">latest dishes</h1>

      <div class="box-container">

         <?php
         $conn = connectdb();
         $select_products = $conn->prepare("SELECT * FROM products  order by id_prod DESC LIMIT 6 ");
         $select_products->execute();
         if ($select_products->rowCount() > 0) {
            while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
         ?>
               <form action="" method="post" class="box">
                  <input type="hidden" name="pid" value="<?= $fetch_products['id_prod']; ?>">
                  <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
                  <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
                  <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
                  <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                  <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
                  <div class="name"><?= $fetch_products['name']; ?></div>
                  <div class="flex">
                     <div class="price"><span>$</span><?= $fetch_products['price']; ?></div>
                     <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                  </div>
               </form>
         <?php
            }
         } else {
            echo '<p class="empty">no products added yet!</p>';
         }
         ?>

      </div>

      <div class="more-btn">
         <a href="menu.php" class="btn">view all</a>
      </div>

   </section>
   <?php include 'component/footer.php'; ?>
</body>