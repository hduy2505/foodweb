<?php
function addproduct($id_cate,$name,$image,$price){
    $conn=connectdb();
    $sql = "INSERT INTO products (id_cate,name,iamge,price) VALUES ('".$id_cate."','".$name."','".$image."','".$price."')";
    // use exec() because no results are returned
    $conn->exec($sql);
}
function getall_products(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function getoneprod($id_prod){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM products WHERE id_prod=".$id_prod);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function delprod($id_prod){
    $conn=connectdb();
    $sql = "DELETE FROM products WHERE id_prod=".$id_prod;
    // use exec() because no results are returned
    $conn->exec($sql);
}
function updateprod($id_prod,$name,$price,$image,$id_cate){
    $conn=connectdb();
    if($image==""){
        $sql = "UPDATE products SET name='".$name."', price='".$price."', id_cate='".$id_cate."' WHERE id_prod=".$id_prod;
    }else{
        $sql = "UPDATE products SET name='".$name."', price='".$price."', image='".$image."', id_cate='".$id_cate."' WHERE id_prod=".$id_prod;
    }
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
}
?>