<?php

require_once "config.php";
$id = $_GET['id'];

if($_SERVER["REQUEST_METHOD"] == "GET"){
    
    
    if(!empty($id) ){
        
        $sql = "DELETE FROM `apostadores_numeros` WHERE `id` = ?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            
            mysqli_stmt_bind_param($stmt, "i", $id);
            
            try{
                mysqli_stmt_execute($stmt);
                
                header("location: ../index.php");

                mysqli_stmt_close($stmt);
                exit();
            } catch(PDOException) {
                echo "Oops! Something went wrong. Please try again later.";
              }
        }
         
        

    }
    
    
    mysqli_close($conn);
}


?>
 