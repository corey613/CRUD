<?php

session_start();

$name= '';
$age = '';
$update = false;
$id = 0;


$mysqli = new mysqli("localhost:3306", "", '',"");

if(isset($_POST["save"])){
    $name = $_POST["name"];
    $age = $_POST["age"];

    $mysqli->query("INSERT INTO data (name, age) VALUES('$name', '$age')"); 
       
    $_SESSION['message'] = 'This record has been saved!';
    $_SESSION['msg_type'] = 'success';

    header('location: index.php');

}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id");

    $_SESSION['message'] = 'This record has been deleted!';
    $_SESSION['msg_type'] = 'delete';

    header('location: index.php');
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id");

    if($result &&  $row = $result->fetch_array()){
        $name = $row['name'];
        $age = $row["age"];
    }
}


if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name']; 
    $age = $_POST['age'];
    
    $mysqli->query("UPDATE data SET name='$name', age='$age' WHERE id=$id ");
    $_SESSION['message'] = 'Record has been updated!';
    $_SESSION['msg_type'] = 'update';

    header('location: index.php');
   
}
