<?php
    session_start();
    ob_start();
    include "../model/connectdb.php";
    include "../model/category.php";
    include "view/header.php";
    include "../model/products.php";
    if(isset($_GET['act'])){
        switch ($_GET['act']) {
            case 'category':
                $kq=getall_cate();
                include "view/category.php";
                break;

            case 'delcate':
                if (isset($_GET['id_cate'])) {
                   $id_cate=$_GET['id_cate'];
                   delcate($id_cate); 
                }
                $kq=getall_cate();
                include "view/category.php";
                break;
            case 'updatecateform':
              
                if (isset($_GET['id_cate'])) {
                    $id_cate=$_GET['id_cate'];
                    $kqone=getonecate($id_cate);
                    include "view/updatecateform.php"; 
                 }
                 if(isset($_POST['id_cate'])){
                    $id=$_POST['id_cate'];
                    $name_cate=$_POST['name_cate'];
                    updatecate($id,$name_cate);
                    $kq=getall_cate();
                    
                 }
                case 'addcate':
                    if(isset($_POST['add'])&&$_SERVER["REQUEST_METHOD"] == "POST"){
                        $name_cate=$_POST['name_cate'];
                        addcate($name_cate);
                    }
                    $kq=getall_cate();
                    include "view/category.php";
                    break;
                    break;
                break;
            case 'products':
            //load category
                $catelist=getall_cate();
            //load product
                $kq=getall_products();
                include "view/products.php";
                break;
            case 'addproduct':
                    //nhận yêu cầu và xử lý
                    if(isset($_POST['add'])&&($_POST['add']) && $_FILES){
                        $id_cate=$_POST['id_cate'];
                        $name=$_POST['name'];
                        $price=$_POST['price'];
                        $target_dir = "../uploads/";
                        $target_file = $_FILES ? $target_dir . basename($_FILES["image"]["name"]): null;
                        $image=$target_file;
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                        addproduct($id_cate,$name,$image,$price);
                        
                    }
                    //lấy ds danh mục
                    $catelist=getall_cate();
                    $kq=getall_products();
                    include "view/products.php";
                    break;
            case 'delprod':
                if (isset($_GET['id_prod'])) {
                           $id_prod=$_GET['id_prod'];
                           delprod($id_prod); 
                        }
                $catelist=getall_cate();
                $kq=getall_products();
                include "view/products.php";
                break;
             case 'updateprodform':
                if (isset($_GET['id_prod'])) {
                    $id_prod=$_GET['id_prod'];
                    $prodct=getoneprod($id_prod);
                    $catelist=getall_cate();
                    include "view/updateprodform.php";
                 }
                if(isset($_POST['update'])&&($_POST['update'])){
                    $id_cate=$_POST['id_cate'];
                    $name=$_POST['name'];
                    $price=$_POST['price'];
                    $id_prod=$_POST['id_prod'];
                if ($_FILES["image"]["name"]!="") {
                    $target_dir = "../uploads/";
                    $target_file = $_FILES ? $target_dir . basename($_FILES["image"]["name"]): null;
                    $image=$target_file;
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                }
                else {
                    $image="";
                }
                updateprod($id_prod,$name,$price,$image,$id_cate);
                }
            //load category
                $catelist=getall_cate();
            //load product
                $kq=getall_products();
                include "view/products.php";
                break;
            case 'logout':
                unset($_SESSION['role']);
                header('location: login.php');
                break;
            default:
                include "view/home.php";
                break;
        }

    }
    else{
    include"view/home.php";
    }
    include"view/footer.php";

?>