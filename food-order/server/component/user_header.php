<?php
if (isset($message)) {
   foreach ($message as $message) {
      echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <section class="flex">

      <a href="home.php" class="logo">SCUFF.EXE 😋</a>

      <nav class="navbar">
         <a href="home.php">home</a>
         <a href="menu.php">menu</a>
         <a href="order.php">orders</a>
      </nav>

      <div class="icons">
         <?php
         $conn = connectdb();
         $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE id_user = ?");
         $count_cart_items->execute([$id_user]);
         $total_cart_items = $count_cart_items->rowCount();
         ?>
         <a href="search.php"><i class="fas fa-search"></i></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_items; ?>)</span></a>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>

      <div class="profile">
         <?php
         $conn = connectdb();
         $select_profile = $conn->prepare("SELECT * FROM `user` WHERE id_user = ?");
         $select_profile->execute([$id_user]);
         if ($select_profile->rowCount() > 0) {
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
            <p class="username"><?= $fetch_profile['username']; ?></p>
            <div class="flex">
               <a href="profile.php" class="btn">profile</a>
               <a href="component/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
            </div>
            <p class="account">
               <a href="userlogin.php">login</a> or
               <a href="userregister.php">register</a>
            </p>
         <?php
         } else {
         ?>
            <p class="name">please login first!</p>
            <a href="userlogin.php" class="btn">login</a>
         <?php
         }
         ?>
      </div>

   </section>

</header>