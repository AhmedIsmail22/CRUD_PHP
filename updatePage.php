<?php

require_once 'connection.php';
require_once 'backend.php';
$image_new_name = "user.png";
if(isset($_GET['action'])){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <title>CRUD Operations | Update User Page</title>
</head>
<body>
    <main class="form">
        <section class="form__header">
            <h1>Update User</h1>
        </section>
        <section class="form__body">
            <form action="updatePage.php?action=update_successfully" method="POST" enctype="multipart/form-data">
                <?php
                    if($_GET['action'] === 'update'){
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $row = select_row_by_id($conn, $id);
                            if($row){
                                echo '
                            <input required type="hidden" name="id" value="'.$row['id'].'" />
                            <input required type="text" name="name" value="'.$row['name'].'" />
                            <input required type="email" name="email" value="'.$row['email'].'" />
                            <input required type="number" name="mobile" value="'.$row['mobile'].'" />
                            <input type="file" name="image" value="'.$row['image'].'" />
                            <input required type="password" name="password" value="********" />
                            ';      
                        ?>
                    <input required type="submit" value="Update User" class="btn-add">
                    </form>
                    <div class="img">
                <img class="img-update" src="upload/<?php echo $row['image']; ?>" alt="add user">
            </div>
                    <?php  }
                    else {
                        echo "This Is User Not Exist!";
                    }
                        } ?>
            <?php }else if($_GET['action'] === 'update_successfully'){
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $id = $_POST['id'];
                            $name =  $_POST['name'];
                            $email = $_POST['email'];
                            $mobile = $_POST['mobile'];
                            $password = $_POST['password'];
                            
                            if($_FILES['image']['name'] !== ""){
                                $image = $_FILES['image'];
                                $image_name = $_FILES['image']['name'];
                                $tmp_name = $image['tmp_name'];
                                $ext = pathinfo($image_name, PATHINFO_EXTENSION);
                                $image_new_name = uniqid().".".$ext;

                                move_uploaded_file($tmp_name, 'upload/'.$image_new_name);
                            }else {
                                $row = select_row_by_id($conn, $id);
                                $image_new_name = $row['image'];
                            }
                            $query = "update `crud` set id='$id',name='$name', email='$email',mobile='$mobile',image='$image_new_name',password='$password' where id=$id";
                            $result = mysqli_query($conn, $query);
                            if($result){
                                echo '
                                <input readonly type="hidden" name="id" value="'.$id.'" />
                                <input required type="text" name="name" value="'.$name.'" />
                                <input required type="email" name="email" value="'.$email.'" />
                                <input required type="number" name="mobile" value="'.$mobile.'" />
                                <input required type="file" name="image" value="'.$image_new_name.'" />
                                <input required type="password" name="password" value="'.$password.'" />
                                ';  
                            }    
                        }
                        ?>
                        <div class="actions">
                        <button class="btn-success-update"><a href="updatePage.php?id=<?php echo $id;?>&action=update">Update</a></button>
                        <button  class="btn-home"><a href="index.php">Home</a></button>
                </div>
            </form>
            <div class="img">
                <img class="img-update" src="upload/<?php echo $image_new_name; ?>" alt="add user">
            </div>
        </section>
    </main>
    <?php
                    } ?>
</body>
</html>
<?php } else {
    echo "NO";
} ?>