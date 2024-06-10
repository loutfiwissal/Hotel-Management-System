<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label{display:inline-block;width:100px;}
    </style>
</head>
<body>
    <form action="" method="get">
        <label>Nom :</label>
        <input type="text" name="nomH"><br><br>
        <label>Adresse :</label>
        <input type="text" name="adresse"><br><br>
        <label>Prix_par_nuit :</label>
        <input type="number" name="prix"><br><br>
        <label>Etoile :</label>
        <input type="number" name="nbr_etoile"><br><br>
        <label>Nb_place :</label>
        <input type="number" name="nbr_place"><br><br>
        <input type="submit" value="Ajouter" name="ajouter">
    </form>
    <?php 
    $conexion = new PDO('mysql:host = Localhost; dbname=hotel_rabat' ,'root','Loutfi@123@'); 
    // $requete =  $con ->query("select * from client");
    // $data = $requete ->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_GET['ajouter'])){
       $nomH =  $_GET["nomH"];
       $adresse =  $_GET["adresse"];
       $prix =  $_GET["prix"];
       $nbr_etoile =  $_GET["nbr_etoile"];
       $nbr_place =  $_GET["nbr_place"];
        if (!empty($nomH) && !empty($adresse) && !empty($prix) && !empty($nbr_etoile) && !empty($nbr_place)){
            $sqlState = $conexion ->prepare("insert into hotel values(null,?,?,?,?,?)");
            $ajouter =$sqlState ->execute([$nomH,$adresse,$prix,$nbr_etoile,$nbr_place]);
            header('location:hotel.php');
        }
    }
    
    ?>
</body>
</html>