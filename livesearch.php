<?php
include("config.php");
if(isset($_POST['input'])){

    $input = $_POST['input'];

    $query = "SELECT * FROM orders WHERE designation LIKE '{$input}%'";

    $result = mysqli_query($con,$query);

    if (mysqli_num_rows($result) > 0) {?>


        <table class="table table-bordered table-striped mt-4">
            <thead>
                 <tr>
                    <th>Action</th>
                    <th>quantite</th>
                    <th>designation</th>
                    <th>prix-unitaire</th>
                    <th>prix-total</th>
                 </tr>
            </thead>  
            <tbody>
                
                 <?php
                 #from the database
                 while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $designation = $row['designation'];
                    $prixunitaire = $row['prix-unitaire'];  
                    $prixtotal = $row['prix-total'];                                    
                 ?>
                <form action="insert.php" method="POST">
                    <tr>
                    <td>
                        <div class="form-group mb-3">
                                <button id="ADD" name="ADD" type="button" onclick="Add()" value="ADD" class="btn btn-success">ADD</button>
                            </div>
                            <div class="form-group mb-3">
                                <button id="ajouter" name="ajouter" type="button" value="ajouter" class="btn btn-danger">ajouter</button>
                            </div>
                        </td>
                        <td><input name="quantite" type="number" id="quantite" placeholder="quantite"></td>
                        <td><?php echo $designation;?></td>
                        <td><input name="prixunitaire" type="number" id="prixunitaire" placeholder="prix-unitaire" value="<?php echo $prixunitaire;?>"></td>
                        <td><b name="prixtotal" id="prixtotal"></b></td>
                    </tr>
                </form>
                 <?php
                
                }
                ?>
            </tbody>
        </table>
        <?php

        
        }else{
            
            echo "<h6 class='text-danger text-center mt-3'>NO DATA FOUND</h6>";
        }
    }
?>


