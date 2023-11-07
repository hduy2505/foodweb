<?php

include 'component/connectdb.php';

session_start();

if(isset($_SESSION['id_user'])){
   $id_user = $_SESSION['id_user'];
}else{
   $id_user = '';
   header('location:home.php');
};

if(isset($_POST['submit'])){

   $address = $_POST['address_number'].' '.$_POST['street'].', '.$_POST['precinct'].', '.$_POST['district'] .', '. $_POST['city'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);

   $conn = connectdb();
   $update_address = $conn->prepare("UPDATE `user` set address = ? WHERE id_user = ?");
   $update_address->execute([$address, $id_user]);

   $message[] = 'address saved!';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update address</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
   
<?php include 'component/user_header.php' ?>

<section class="form-container">

   <form action="" method="post">
      <h3>your address</h3>
      <input type="text" class="box" placeholder="Address number" required maxlength="50" name="address_number">
      <input type="text" class="box" placeholder="Street" required maxlength="50" name="street">
      <input type="text" class="box" placeholder="Precinct" required maxlength="50" name="precinct">
      <input type="text" class="box" placeholder="District" required maxlength="50" name="district">
      <input type="text" class="box" placeholder="City" required maxlength="50" name="city">
      <input type="submit" value="save address" name="submit" class="btn">
   </form>

</section>
<?php include 'component/footer.php'; ?>
</body>
</html>