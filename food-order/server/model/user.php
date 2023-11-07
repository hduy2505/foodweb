<?php
function checkuser($user,$pass){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM login WHERE username='".$user."' AND pass='".$pass."'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    if(count($kq)>0) return $kq[0]['role'];
    else return 0;
}
function getuserinfo($username,$pass){
    $conn=connectdb();
    $sql="SELECT * FROM login WHERE username='".$username."' AND pass='".$pass."'";
    echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
?>