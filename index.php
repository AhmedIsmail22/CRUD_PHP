<?php 
require_once 'connection.php';
require_once 'backend.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <title>CRUD Operation | Home Page</title>
</head>
<body>
    
<main class="table">
    <section class="table__header">
        <h1>CRUD operations</h1>
    </section>
    <button class="add-user"><a href="insertForm.php">add user</a></button>
    <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Password</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                            $result = select_all_rows($conn);
                            if($result){
                                $counter = 0;
                                while($row = mysqli_fetch_assoc($result)){
                                    $counter +=1;
                                    echo '
                                        <tr>
                                            <td><strong>'.$counter.'</strong></td>
                                            <td><img class="user-img" src="upload/'.$row['image'].'" alt="img"></td>
                                            <td>'.$row['name'].'</td>
                                            <td>'.$row['email'].'</td>
                                            <td>0'.$row['mobile'].'</td>
                                            <td>************</td>
                                            <td style="text-align:center;">
                                                <button class="btn-update"><a href="updatePage.php?id='.$row['id'].'&action=update">Update</a></button>
                                                <button class="btn-delete"><a href="deletePage.php?id='.$row['id'].'">Delete</a></button>
                                            </td>
                                        </tr>
                                    ';
                                }
                            }

                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>