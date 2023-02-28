<?php 

require_once 'connection.php';


function select_all_rows($con){
    $query = "select * from `crud`";
    $result = mysqli_query($con,$query);
    return $result;
}


function select_row_by_id($con, $id){
    $query = "select * from `crud` where id=$id";
    $result = mysqli_query($con, $query);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            return $row;
        }
    }else {
        return "NO";
    }
}


// function update_row($con){
    
// }


