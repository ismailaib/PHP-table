<?php
require 'connection.php';

if(isset($_POST["submit"])){
  $quantite = $_POST["quantite"];
  $designation = $_POST["designation"];
  $prixunitaire = $_POST["prixunitaire"];
  $prixtotal = $_POST["prixtotal"];



  $query = "INSERT INTO tb_data VALUES('$quantite', '$designation', '$prixunitaire', '$prixtotal')";
  mysqli_query($conn,$query);
  echo
  "
  <script> alert('Data Inserted Successfully'); </script>
  ";
}
?>
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
                    $designation = $row['designation'];
                    $prixunitaire = $row['prix-unitaire'];                                    
                 ?>
                <form action="" method="POST">
                    <tr>
                    <td>
                        <div class="form-group mb-3">
                        <button type="submit" name="submit">Submit</button>
                        </td>
                        <td><div class="form-group mb-3">
                                <input type="number" id="quantite" onclick="Add()" name="quantite" class="form-control" /><br>
                            </div></td>
                        <td><div class="mb-3">
                                <input type="text" name="designation" value="<?php echo $designation;?>" class="form-control"><br>
                            </div></td>
                        <td><div class="form-group mb-3">
                                <input type="number" id="prixunitaire" onclick="Add()" name="prixunitaire" class="form-control" value="<?php echo $prixunitaire ?>"/><br>
                            </div></td>
                        <td>
                       <input  type="" id="prixtotal" name="prixtotal" class="form-control" value=""/><br>
                    </td>
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


<script>
function Add() {
    var quantite = document.getElementById("quantite").value;
    var quantiteInMinutes = quantite;
    var prixunitaire = document.getElementById("prixunitaire").value;
    var prixtotal = quantiteInMinutes * prixunitaire;
    document.getElementById("prixtotal").value= prixtotal.toFixed(2);
}
</script>  