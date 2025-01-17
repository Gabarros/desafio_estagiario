<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>CRUD</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Assinantes</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Employee</a>
                    </div>
                    <?php
                            // Include config file
                            require_once "config.php";
                            
                            // Attempt select query execution
                            $sql = "SELECT * FROM assinantes";
                            if($result = mysqli_query($link, $sql)){
                                if(mysqli_num_rows($result) > 0){
                                    echo "<table class='table table-bordered table-striped'>";
                                        echo "<thead>";
                                            echo "<tr>";
                                                echo "<th>#</th>";
                                                echo "<th>Name</th>";
                                                echo "<th>Address</th>";
                                                echo "<th>CPF</th>";
                                                echo "<th>Equipamentos</th>";
                                            echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        while($row = mysqli_fetch_array($result)){
                                            echo "<tr>";
                                                echo "<td>" . $row['id'] . "</td>";
                                                echo "<td>" . $row['name'] . "</td>";
                                                echo "<td>" . $row['address'] . "</td>";
                                                echo "<td>" . $row['cpf'] . "</td>";
                                                echo "<td>" . $row['equipamentos'] . "</td>";
                                                echo "<td>";
                                                    echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                                    echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                                    echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                                echo "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</tbody>";                            
                                    echo "</table>";
                                    // Free result set
                                    mysqli_free_result($result);
                                } else{
                                    echo "<p class='lead'><em>No records were found.</em></p>";
                                }
                            } else{
                                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                            }
         
                            // Close connection
                            mysqli_close($link);
                            ?>
                </div>
            </div>
        </div>
    </div>


    <script src="main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
</body>

</html>