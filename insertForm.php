<?php 
    require_once 'insert_data_backend.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <title>CRUD Operations | Add User Page</title>
</head>
<body>
    <?php 
        if(isset($_GET['error'])){
            ?>
                <div class="error">
                </div>
                <p class="diplay-error">This email already exists. <button><a href="insertForm.php">OK</a></button></p>
            <?php
        }
    ?>
    
    <main class="form">
        <section class="form__header">
            <h1>Add User</h1>
        </section>
        <section class="form__body">
            <form action="insert_data_backend.php" method="POST" enctype="multipart/form-data">
                <input required type="text" name="name" placeholder="Name..." />
                <input required type="email" name="email" placeholder="Email..." />
                <input required type="number" name="mobile" placeholder="Mobile..." />
                <input type="file" name="my_work" value="" placeholder="image..." />
                <input required type="password" name="password" placeholder="Password..." />
                <input required type="submit" value="Add User" class="btn-add">
            </form>
            <div class="img">
                <img src="upload/user2.png" alt="add user">
            </div>
        </section>
    </main>
</body>
</html>