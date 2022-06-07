
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loteria</title>
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
                        <h2 class="pull-left">Lista de Apostadores</h2>
                        <a href="Api/create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Inserir Apostador</a>
                        <a href="Api/sorteio.php" class="btn btn-success pull-right"><i class="fa fa-star-o" aria-hidden="true"></i> Sortear</a>
                    </div>
                    <?php
                    
                    require_once "Api/config.php";
                    
                    
                    $sql = "SELECT * FROM `apostadores_numeros` ORDER BY id ";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            ?>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Apostadores</th>
                                        <th>Data do Sorteio</th>
                                        <th>Números da Sorte!</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                while($row = mysqli_fetch_array($result)){
                                    ?>
                                    <tr>
                                        <td><?php  echo $row['id']  ?></td>
                                        <td><?php  echo $row['apostador']  ?></td>
                                        <td><?php  echo $row['data']  ?></td>
                                        <td><?php  echo $row['numeros1'] ?></td>
                                        <td>
                                            <a href="Api/delete.php?id=<?php echo $row['id']?>" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                                        </td>
                                    </tr>
                                <?php 
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