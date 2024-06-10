<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        td{
            border-bottom:1px solid  ;
            text-align: center;
            
        }
        th{
            border-bottom:3px solid  ;      
        }
        table{
            width: 700px;
            height: 300px;
        }
        button{
            border-radius: 30px;
            border: 1px solid ;
            color: white;
            width: 100px;
            height: 25px;
        }
        span{
            padding: 10px;
            border-radius: 10px;
        }
    </style>
    </style>
</head>
<body>
    <?php
    $con = new PDO('mysql:host = Localhost; dbname=hotel_rabat' ,'root','Loutfi@123@'); 
    $requete =  $con ->query("select * from hotel");
    $data = $requete ->fetchAll(PDO::FETCH_ASSOC);
    // print_r($data)
    ?>

    <table cellspacing="0" >
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Prix_par_nuit</th>
            <th>Etoile</th>
            <th>Nb_palce</th>
            <th>Operation</th>
        </tr>
        <?php  foreach ($data as $valeur): ?>
            <tr>
                <td ><?php echo $valeur['ID_HOTEL'] ;?></td>
                <td ><?php echo $valeur['nomH'] ;?></td>
                <td><?php echo $valeur['adresse'] ;?></td>
                <td><?php echo $valeur['prix'] ;?></td>
    
                <td>
            <span>
                <?php 
                  if ($valeur['nbr_etoile'] >1 && $valeur['nbr_etoile'] <=2 ){
                // $color = "green";
                echo '<span style="background-color:green">'.$valeur['nbr_etoile'];
                }
                else if ($valeur['nbr_etoile'] >=3 && $valeur['nbr_etoile'] <=4){
                // $color = "yellow";
                echo '<span style="background-color:yellow">'.$valeur['nbr_etoile'];
                }
            else{
                // $color = "red";
                echo '<span style="background-color:red">'.$valeur['nbr_etoile'];
            }
            ?>
            </span>
                </td>
                <td><?php echo $valeur['nbr_place'] ;?></td>
                <td>
                    <button style="background-color:rgba(26, 255, 0, 0.738);" name="modifier">
                    <a href="modifier_hotel.php?ID_HOTEL=<?php echo $valeur['ID_HOTEL']?>">Modifier</a>
                    </button> 
                    <button style="background-color:rgba(255, 0, 0, 0.738);">
                    <a href="supprime_hotel.php?ID_HOTEL=<?php echo $valeur['ID_HOTEL']?>">Supprimer</a>
                    </button>
                </td>
                </tr>
            <?php endforeach; ?>
    </table><br>
    <button style="margin-top: 500px;margin-left:100px"><a href="ajouter_hotel.php">Ajouter</a></button>
</body>
</html>