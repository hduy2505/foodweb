<?php
function addcate($name_cate){
    $conn=connectdb();
    $sql = "INSERT INTO category (name_cate) VALUES ('".$name_cate."')";
    // use exec() because no results are returned
    $conn->exec($sql);
}
function delcate($id_cate){
    $conn=connectdb();
    $sql = "DELETE FROM category WHERE id_cate=".$id_cate;
    // use exec() because no results are returned
    $conn->exec($sql);
}
function updatecate($id_cate,$name_cate){
    $conn=connectdb();
    $sql = "UPDATE category SET name_cate='".$name_cate."' WHERE id_cate=".$id_cate;
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
}
function getonecate($id_cate){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM category WHERE id_cate=".$id_cate);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function getall_cate(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM category");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}

?>