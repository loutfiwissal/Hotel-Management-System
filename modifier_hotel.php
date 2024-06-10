<?php
    $id_hotel = $_GET['ID_HOTEL'];

    $con = new PDO('mysql:host = Localhost; dbname=hotel_rabat' ,'root','Loutfi@123@');
    $requete =  $con ->query("select * from hotel where ID_HOTEL=$id_hotel");
    $data = $requete ->fetchAll(PDO::FETCH_ASSOC); 

    if (isset($_POST['modifier'])){
        // $id = $_GET['id_client'];
        $nomH =  $_POST["nomH"];
        $adresse =  $_POST["adresse"];
        $prix =  $_POST["prix"];
        $nbr_etoile =  $_POST["nbr_etoile"];
        $nbr_place =  $_POST["nbr_place"];

        $sqlState = $con ->prepare("UPDATE hotel set  nomH=?, adresse=? ,prix=? ,nbr_etoile=?, nbr_place=? WHERE ID_HOTEL=?;");
        $delete =$sqlState ->execute([$nomH,$adresse,$prix,$nbr_etoile,$nbr_place,$id_hotel]);
        header('location:hotel.php');
    }
   
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
    
     <?php foreach($data as $valeur):?>
        
        <label>id :</label>
        <input type="text" name="ID_HOTEL" value="<?php echo $valeur['ID_HOTEL']?>" readonly><br><br>
        <label>Nom :</label>
        <input type="text" name="nomH" value="<?php echo $valeur['nomH']?>"><br><br>
        <label>Adresse :</label>
        <input type="text" name="adresse" value="<?php echo $valeur['adresse']?>"><br><br>
        <label>Prix_par-nuit :</label>
        <input type="number" name="prix" value="<?php echo  $valeur ['prix']?>"><br><br>
        <label>Etoile :</label>
        <input type="number" name="nbr_etoile" value="<?php echo  $valeur['nbr_etoile']?>"><br><br>
        <label>nbr_place :</label>
        <input type="number" name="nbr_place" value= "<?php echo $valeur['nbr_place']?>" ><br><br>
        <input type="submit" value="Modifier" name="modifier">
    
    <?php endforeach ;?>
    </form>
</body>
</html>