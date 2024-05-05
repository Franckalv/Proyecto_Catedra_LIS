<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Edit or Delete Lessons</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/editSitios.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="icon" type="image/jpg" href="LoginPTC/images/logo.jpg">
</head>
<body>

    <?php   
    include('Tienda/templates/cabecera7.php');
    include('Backend/db.php');

    ?>
    <div class="container">
        <div class="table-wrapper">
            <form method="post" action="editSitios.php">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><b>Edit Lessons</b></h2>
                    </div>
                    <div class="col-sm-6">
                        
                       <a class="btn btn-success"  href="index.php">Return</a> <input type="submit" name="borrar" value="Delete Records" checked="" class="btn btn-success" data-toggle="modal"/>

                        <button class="btn btn-success" data-toggle="modal" >Reload Page</button>

                    </div>
                </div>
            </div>

           
            <table class="table  table-striped table-hover">
                <thead>
                    <tr>
                        
                        <th style="font-size: 3vh;">ID</th>     
                        <th style="font-size: 3vh;">Name</th>
                        <th style="font-size: 3vh;">Description</th>
                        <th style="font-size: 3vh;">Rating</th>
                        <th style="font-size: 3vh;">KeyWord</th>
                        <th style="font-size: 3vh;">Course</th>
                        <th style="font-size: 3vh;">Information</th>
                        <th style="font-size: 3vh;">Select</th>
                        <th></th>

                    </tr>

                    <?php 

                        $sql="SELECT * from placesen";
                        $result=mysqli_query($connection,$sql);
                        while($mostrar=mysqli_fetch_array($result)){

                     ?>
                    <tr>
                        <td><?php echo $mostrar['id'] ?></td>
                        <td><?php echo utf8_encode($mostrar['name']); ?></td>
                        <td class="line-clamp"><p><?php echo utf8_encode($mostrar['description']); ?></p></td>
                        <td><?php echo utf8_encode($mostrar['rating']); ?></td>
                        <td><?php echo utf8_encode($mostrar['location']); ?></td>
                        <td><?php echo utf8_encode($mostrar['category']); ?></td>
                        <td class="line-clamp"><?php echo urldecode($mostrar['info']); ?></td>
                        <?php echo "<td> <input type='checkbox' name='eliminar[]' value='".$mostrar['id']."'/> </td>"; ?>
                        <td><a href="modificarSitio.php?parametro=<?php echo $mostrar['id']; ?>"><i class="material-icons" data-toggle="tooltip" title="Edit Item" onclick="">&#xE254;</i></a></td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <?php 
                 }
                 ?>
            </table>
            <?php 

                if (isset($_POST['borrar'])) 
                {
                    if (empty($_POST['eliminar'])) 
                    {
                        echo "<script>
                              alert('You must select at least one item to remove.');
                              windows.location = 'editSitios.php'
                              </script>";
                    }
                    else
                    {
                        foreach ($_POST['eliminar'] as $id_borrar) 
                        {
                            $borrarDatos= $connection->query("DELETE FROM placesen WHERE id='$id_borrar'");

                            echo "<script>
                            alert('Files successfully deleted.');
                            windows.location = 'editSitios.php'
                            </script>";
                        }
                    }
                }

                
            ?>
            

            </form>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
</body>
</html>   