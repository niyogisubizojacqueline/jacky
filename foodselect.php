<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record Of Food</title>
</head>
<style>
    body{

}
.form-cont{
    align-items: center;
    display: flex;
    justify-content: center;
    border: 1px 2px  4px 2px;
    text-align: center;
    box-shadow: 1px 2px 3px 3px rgb(218, 218, 252);
  


}
form{
    justify-content: center;
    align-items: center;
    /* width: 450px; */
    /* height: 350px; */
    box-shadow: 1px 2px 3px 3px grey;
    text-align: center;
    
}
h1{
    text-align: center;
    color:grey;

}
.btn{
    color: white;
}
.link{
    padding-top: 40px;

}
a{
    padding-left: 50px;
}
/* Basic styling for the form container */
.form-cont {
    width: 300px;
    margin: 50px auto;
    padding: 20px;
    background-color: #f4f4f4;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Centering the form content */
h1 {
    text-align: center;
    font-family: Arial, sans-serif;
}

/* Styling for the labels */
label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

/* Styling for input fields */
input[type="text"], input[type="password"] {
    width: 70%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Styling for the submit button */
.btn input[type="submit"] {
    /* width: 50%; */
    /* padding: 10px; */
    background-color: grey;
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
}
/* Apply general styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

/* Style the form container */
.form {
    width: 350px;
    margin: 0 auto;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

/* Style the form heading */
.form h1 {
    text-align: center;
    color: #333;
}

/* Style input fields */
input[type="text"] {
    width: 70%;
    padding: 8px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
}

/* Style submit button */
.btn input[type="submit"] {
    width: 60%;
    background:grey;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    font-size: 16px;
    border-radius: 4px;
}

.btn input[type="submit"]:hover {
    background: grey;
}

/* Style the table */
table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background: white;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background: grey;
    color: white;
}

td a {
    text-decoration: none;
    color: #16063b;
    font-weight: bold;
}

td a:hover {
    color: grey;
}



.btn input[type="submit"]:hover {
    background-color: #b3c2d2;
}
h1{
    fontfamily: sans-serif;
}

</style>

<body>
    <h1>Record Of Foods</h1>
   <?php
   $conn= new mysqli('localhost','root','','dukundumurimo');
   $sql="SELECT * FROM `food`";
   $res=mysqli_query($conn,$sql);
   ?> 

   <table border="1">
<tr>
    <th>food_id</th>
    <th>food_name</th>
    <th>food_ownername</th>
    
</tr>
<tr>
<?php
while($row=mysqli_fetch_assoc($res)){
    ?>
    <td><?php echo $row['food_id'];?></td>
    <td><?php echo $row['food_name'];?></td>
    <td><?php echo $row['food_ownername'];?></td>
    
</tr>
<?php
}
?>
</tr>
   </table>
</body>
</html>