<?php
require 'dbcone.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="student-view.css">
    <title>Student View</title>
</head>
<body>
    
<style>
    
</style>
    <div class="container mt-5" >
    
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Les Informations
                            <a href="home.php" class="btn btn-danger float-end">Retour</a>
                        </h4>
                    </div>
                    <div class="card-body" >

                        <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM students WHERE id='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <form action="code.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="">N*</label>
                                <input type="number" name="numero" class="form-control" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Date</label>
                                <input type="date" name="dateofbirth" class="form-control" />
                            </div>
                            <div class="info">
                            <input type="hidden" name="student_id" value="<?= $student['id']; ?>">
                                    <div class="mb-3">
                                        <h1><?=$student['name'];?></h1>
                                        <input type="hidden" name="name" value="<?=$student['name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <b><?=$student['email'];?></b>
                                        <input type="hidden" name="email" value="<?=$student['email'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <b><?=$student['phone'];?></b>
                                        <input type="hidden" name="phone" value="<?=$student['phone'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <b><?=$student['course'];?></b>
                                        <input type="hidden" name="course" value="<?=$student['course'];?>" class="form-control">
                                    </div>
                            </div>
                            <div class="form-group mb-3">
                                <button  type="submit" name="save" class="btn btn-success">Continuer</button>
                            </div>
                            
                                </form>
                           

                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

      
        
    </div>
    
    

</body>
</html>