<?php

include "cate.php";
$id = $_GET['id']; 
$del = mysqli_query($con,"delete from cate where pname='$id'"); 
if($del)
{
    mysqli_close($con);
    header("location:product_list.php");
    exit;	
}
?>