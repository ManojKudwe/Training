<?php

include "cate.php"; 
$id = $_GET['id']; 
$del = mysqli_query($con,"delete from categ where category='$id'"); 
if($del)
{
    mysqli_close($con); 
    header("location:index.php"); 
    exit;	
}

?>