<?php
session_start(); 
ob_start();
include "../model/connectdb.php";
include "../model/user.php";
if((isset($_POST['login']))&&($_POST['login'])){
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $role=checkuser($user,$pass);
    $_SESSION['role']=$role;
    if($role==1) header('location: index.php');
    else{
       $txt_error="username or password are not correct";
       header('location: login.php');
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin</title>
</head>
<body>
    <div class="main" >
        <h2> Login </h2>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <input type="text" name="user" id="">
            <input type="text" name="pass" id="">
            <input type="submit" name="login" value="LOGIN">
            <?php
            if(isset($txt_error)&&($txt_error!="")){
                echo "<font color='red'>".$txt_error."</font>";
            }
            ?>
        </form>
     </div>
    
</body>
</html>