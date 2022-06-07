<?php



require_once "config.php";
    $numero1 = rand(1,5);
    $numero2 = rand(1,80);
    $numero3 = rand(1,80);
    $numero4 = rand(1,80);
    $numero5 = rand(1,80);
    $numero6 = rand(60,80);
    $arr_numeros = array($numero1, $numero2, $numero3, $numero4, $numero5, $numero6);
    $hoje = date("Y-m-d");
    $columns = implode(",",$arr_numeros);
        
    $sql = "INSERT INTO `sorteios` (`numeros_sorteado`, `data`) VALUES (?, ?)";
         
    if($stmt = mysqli_prepare($conn, $sql)){
           
        mysqli_stmt_bind_param($stmt, "ss", $columns, $hoje);
            
        try{
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            
        } catch(PDOException) {
            echo "Oops! Something went wrong. Please try again later.";
            mysqli_close($conn);    
            }
        
    }
         
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sorteio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 0px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Lista de Sorteio</h2>
                    </div>
                    <?php
                    
                    require_once "config.php";
                    
                    
                    $sql = "SELECT * FROM `sorteios` ORDER BY id DESC LIMIT 1" ;

                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            ?>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Numeros do Sorteio</th>
                                        <th>Data do Sorteio</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                while($row = mysqli_fetch_array($result)){
                                    ?>
                                    <tr>
                                        <td><?php  echo $row['id']  ?></td>
                                        <td><?php  echo $row['numeros_sorteado']  ?></td>
                                        <td><?php  echo $row['data']  ?></td>
                                    </tr>

                                    <tr>
                                        <td><?php  echo $row['id']  ?></td>
                                        <td><?php  $arrayOrdenada = explode(",",$row['numeros_sorteado']);
                                             sort($arrayOrdenada);
                                             echo implode(",",$arrayOrdenada);
                                          ?></td>
                                        <td><?php  echo $row['data']  ?></td>
                                    </tr>

                                <?php 
                                } 
                                $sql1 = "SELECT * FROM `apostadores_numeros` ORDER BY id DESC LIMIT 3";
                                if($result = mysqli_query($conn, $sql1)){

                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                            ?>
                                                <tr>
                                                <td><?php  echo $row['id']  ?></td>
                                                <td><?php  echo $row['apostador']  ?></td>
                                                <td><?php  
                                                //$arrayOrdenada
                                                $numerosSorteado = explode(",",$row['numeros1']);
                                                sort($numerosSorteado);

                                                $resultado=array_intersect($numerosSorteado,$arrayOrdenada);
                                                if($resultado != [] ){
                                                    echo implode(",",$resultado);
                                                }else{
                                                    echo "Não houve nenhum acerto";
                                                }
                                                

                                                ?></td>
                                                </tr>


                                            <?php
                                            

                                        }

                                    }
                                }
                                ?>
                            
                                </tbody>                          
                            </table>

                            <?php
                            mysqli_free_result($result);
                        } else{
                            ?>
                            <div class="alert alert-danger"><em>No records were found.</em></div>
                            <?php
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    
                    mysqli_close($conn);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>