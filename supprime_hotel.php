<?php
    $con = new PDO('mysql:host = Localhost; dbname=hotel_rabat' ,'root','Loutfi@123@'); 
    $requete =  $con ->query("select * from hotel");
    $data = $requete ->fetchAll(PDO::FETCH_ASSOC);

    $id = $_GET['ID_HOTEL'];
    $sqlState = $con ->prepare("DELETE FROM hotel WHERE ID_HOTEL=?");
    $delete =$sqlState ->execute([$id]);
   header('location:hotel.php');
?>

<?php 

 ?>