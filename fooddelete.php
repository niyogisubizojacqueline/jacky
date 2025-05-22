<?php
$conn= new mysqli('localhost','root','','dukundumurimo');
if(isset($_GET['food_id'])) {
    $sql="DELETE FROM `food` WHERE food_id='$_GET[food_id]'"; 
    $res=mysqli_query($conn,$sql);
    if($res){
        echo "data deleted successfully";
        header('location:foodform.php');
    }else{
        echo "data not deleted";
    }
}
?>


