<?php

include 'component/connectdb.php';

session_start();

if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
} else {
    $id_user = '';
};

if (isset($_POST['submit'])) {

    $fullname = $_POST['fullname'];
    $fullname = filter_var($fullname, FILTER_SANITIZE_STRING);
    $username = $_POST['username'];
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $phone = $_POST['phone'];
    $phone = filter_var($phone, FILTER_SANITIZE_STRING);
    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    $cpass = sha1($_POST['cpass']);
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

    $conn = connectdb();
    $select_user = $conn->prepare("SELECT * FROM `user` WHERE email = ? OR phone = ?");
    $select_user->execute([$email, $phone]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if ($select_user->rowCount() > 0) {
        $message[] = 'email or number already exists!';
    } else {
        if ($pass != $cpass) {
            $message[] = 'confirm password not matched!';
        } else {
            $conn = connectdb();
            $insert_user = $conn->prepare("INSERT INTO `user`(username, fullname, email, phone, password) VALUES(?,?,?,?,?)");
            $insert_user->execute([$username, $fullname, $email, $phone, $cpass]);
            $select_user = $conn->prepare("SELECT * FROM `user` WHERE email = ? AND password = ?");
            $select_user->execute([$email, $pass]);
            $row = $select_user->fetch(PDO::FETCH_ASSOC);
            if ($select_user->rowCount() > 0) {
                $_SESSION['id_user'] = $row['id_user'];
                header('location:home.php');
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
    <title>register</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>

    <!-- header section starts  -->
    <?php include 'component/user_header.php'; ?>
    <!-- header section ends -->

    <section class="form-container">

        <form action="" method="post">
            <h3>register now</h3>
            <input type="text" name="fullname" required placeholder="enter your fullname" class="box" maxlength="50">
            <input type="text" name="username" required placeholder="enter your username" class="box" maxlength="50">
            <input type="email" name="email" required placeholder="enter your email" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="phone" name="phone" required placeholder="enter your phone number" class="box" min="0" max="9999999999" maxlength="10">
            <input type="password" name="pass" required placeholder="enter your password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="password" name="cpass" required placeholder="confirm your password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="submit" value="register now" name="submit" class="btn">
            <p>already have an account? <a href="userlogin.php">login now</a></p>
        </form>

    </section>
    <?php include 'component/footer.php'; ?>