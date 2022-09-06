
<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "myshop";

$conn = mysqli_connect($server ,$username ,$password ,$dbname) ;

if(isset($_POST['submit'])){
echo "hello" ;
if (!empty($_POST['quantite']) && !empty($_POST['designation']) && !empty($_POST['prixunitaire']) && !empty($_POST['prixtotal'])){

        $quantite = $_POST['quantite'] ;
        $designation = $_POST['designation'] ;
        $prixunitaire = $_POST['prixunitaire'] ; 
        $prixtotal = $_POST['prixtotal'] ;

        $query = " INSERT INTO 'produit'(quantite,designation,prixunitaire,prixtotal) VALUE ('quantite','designation','prixunitaire','prixtotal') " ;

        $run = mysql_query($conn,$query) or die(mysqli_error());

        if ($run) {
            echo " FORM SUBMITTED SUCCESSFULLY" ;
        }
        else {
            echo "FORM NOTSUBMMITED" ;
        }
    }
    else{
        echo "all fields required" ;
    }
}

?>

 
