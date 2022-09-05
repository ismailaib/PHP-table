<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myshop";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}if(isset($_POST['ajouter']))
{
    $quantite = $_POST['quantite'];
    $designation = $_POST['designation'];
    $prixunitaire = $_POST['prixunitaire'];
    $prixtotal = $_POST['prixtotal'];

    $sql = "INSERT INTO produit (designation, prixunitaire, prixtotal, prixtotal) VALUES ('designation','prixunitaire','prixtotal','prixtotal')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Date values Inserted";
        header("Location: index.php");
    }
    else
    {
        $_SESSION['status'] = "Date values Inserting Failed";
        header("Location: index.php");
    }
}   
?>

<script>
function Add() {
    var quantite = document.getElementById("quantite").value;
    var quantiteInMinutes = quantite;
    var prixunitaire = document.getElementById("prixunitaire").value;
    var prixtotal = quantiteInMinutes * prixunitaire;
    document.getElementById("prixtotal").innerHTML = prixtotal.toFixed(2);
}
</script>   
