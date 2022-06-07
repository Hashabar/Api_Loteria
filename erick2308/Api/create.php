<?php

require_once "config.php";
 
$apostador = "";
$usuario_err = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){

    $numero1 = rand(1,5);
    $numero2 = rand(1,80);
    $numero3 = rand(1,80);
    $numero4 = rand(1,80);
    $numero5 = rand(1,80);
    $numero6 = rand(60,80);
    $arr_numeros = array($numero1, $numero2, $numero3, $numero4, $numero5, $numero6);
    sort($arr_numeros);
    
    $hoje = date("Y-m-d");
    

    $input_usuario = trim($_POST["apostador"]);
    if(empty($input_usuario) & $input_usuario < 7){
        $usuario_err = "Favor inserir um Apostador com 7 caracteres.";
    }else{
        $usuario = $input_usuario;
    }

    
    if(empty($usuario_err) ){

        $columns = implode(",",$arr_numeros);
        
        $sql = "INSERT INTO `apostadores_numeros` (`apostador`, `data`, `numeros1`) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
           
            mysqli_stmt_bind_param($stmt, "sss", $usuario, $hoje, $columns);
            
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
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Novo Apostador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Inserir Apostador</h2>
                    <p>Favor inserir os dados para Apostador.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Apostador</label>
                            <input type="text" name="apostador" id="apostador" class="form-control <?php echo (!empty($usuario_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $apostador; ?>">
                            <span class="invalid-feedback"><?php echo $usuario_err;?></span>
                        </div>
                        
                        <input type="submit" class="btn btn-primary" value="Inserir">
                        <a href="../index.php" class="btn btn-secondary ml-2">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>