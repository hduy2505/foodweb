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

   $fullname = $_POST['fullname'];
   $fullname = filter_var($fullname, FILTER_SANITIZE_STRING);

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['phone'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);

   if(!empty($fullname)){
      $conn = connectdb();
      $update_name = $conn->prepare("UPDATE `user` SET fullname = ? WHERE id_user = ?");
      $update_name->execute([$fullname, $id_user]);
   }

   if(!empty($email)){
      $conn = connectdb();
      $select_email = $conn->prepare("SELECT * FROM `user` WHERE email = ?");
      $select_email->execute([$email]);
      if($select_email->rowCount() > 0){
         $message[] = 'email already taken!';
      }else{
         $conn = connectdb();
         $update_email = $conn->prepare("UPDATE `user` SET email = ? WHERE id_user = ?");
         $update_email->execute([$email, $id_user]);
      }
   }

   if(!empty($number)){
      $conn = connectdb();
      $select_number = $conn->prepare("SELECT * FROM `user` WHERE phone = ?");
      $select_number->execute([$number]);
      if($select_number->rowCount() > 0){
         $message[] = 'number already taken!';
      }else{
         $conn = connectdb();
         $update_number = $conn->prepare("UPDATE `user` SET phone = ? WHERE id_user= ?");
         $update_number->execute([$number, $id_user]);
      }
   }
   
   $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
   $conn = connectdb();
   $select_prev_pass = $conn->prepare("SELECT password FROM `user` WHERE id_user = ?");
   $select_prev_pass->execute([$id_user]);
   $fetch_prev_pass = $select_prev_pass->fetch(PDO::FETCH_ASSOC);
   $prev_pass = $fetch_prev_pass['password'];
   $old_pass = sha1($_POST['old_pass']);
   $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
   $new_pass = sha1($_POST['new_pass']);
   $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
   $confirm_pass = sha1($_POST['confirm_pass']);
   $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);

   if($old_pass != $empty_pass){
      if($old_pass != $prev_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         if($new_pass != $empty_pass){
            $conn = connectdb();
            $update_pass = $conn->prepare("UPDATE `user` SET password = ? WHERE id_user= ?");
            $update_pass->execute([$confirm_pass, $id_user]);
            $message[] = 'password updated successfully!';
         }else{
            $message[] = 'please enter a new password!';
         }
      }
   }  

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'component/user_header.php'; ?>
<!-- header section ends -->

<section class="form-container update-form">

   <form action="" method="post">
      <h3>update profile</h3>
      <input type="text" name="fullname" placeholder="<?= $fetch_profile['fullname']; ?>" class="box" maxlength="50">
      <input type="email" name="email" placeholder="<?= $fetch_profile['email']; ?>" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="text" name="phone" placeholder="<?= $fetch_profile['phone']; ?>" class="box" min="0" max="9999999999" maxlength="10">
      <input type="password" name="old_pass" placeholder="enter your old password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="new_pass" placeholder="enter your new password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="confirm_pass" placeholder="confirm your new password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="update now" name="submit" class="btn">
   </form>

</section>
<?php include 'component/footer.php'; ?>
</body>
</html>