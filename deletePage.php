<?php 

require_once 'connection.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    ?>
    
        <script>

            alert("Delete");
            console.log("Deleted")
        </script>
    <?php
    $query = "delete from `crud` where id=$id";
    $runQuery = mysqli_query($conn, $query);

    if($runQuery){
        header('location:index.php');
    }
    else {
        echo "Wrong!";
    }
}