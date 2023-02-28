<?php

require_once 'connection.php';
require_once 'backend.php';

$image_new_name = "user.png";
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    if($_FILES['my_work']['name'] !== ""){
        $image = $_FILES['my_work'];
        $image_name =  $image['name'];
        $tmp_name = $image['tmp_name'];
        $ext = pathinfo($image_name, PATHINFO_EXTENSION);
        $image_new_name = uniqid().".".$ext;
        move_uploaded_file($tmp_name, 'upload/'.$image_new_name);
    }

    $result = select_all_rows($conn);
    $stat = true;
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            if($row['email'] === $email){
                $stat = false;
                break;
            }else {
                continue;
            }
        }
    }
    
    if($stat){
        $query = "INSERT INTO `crud` (name,email,mobile,image, password) VALUES('$name','$email','$mobile','$image_new_name','$password')";
    $runQuery = mysqli_query($conn,$query);

    if($runQuery){
        header('location:index.php');
    }
    else {
        echo "Not Inserted";
    }
    }else {
        header('location:insertForm.php?error=');
    }
}