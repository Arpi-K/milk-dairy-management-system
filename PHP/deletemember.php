<?php
if(isset($_GET["id"])){
    $id=$_GET["id"];
    include('dbconnect.php');
    if($con->connect_error){
        die("Failed to connect:".$con->connect_error);
    }
    $sql="DELETE FROM tblproducer WHERE p_id=$id";
    $con->query($sql);
    echo "<script>alert('Do you really want to delete?')</script>";
}
header("location:/phpdairy/membership.php");
exit;
?>