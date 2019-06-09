<?php include('server.php'); 



?>

<!DOCTYPE html>
<html>

<head>
    <title>Consultation des Reservation</title>
    <meta charset="utf-8">
    <meta name="author" content="ayoub">
    <link rel="icon" href="images/icone.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tab.css" type="text/css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <style>
        .profil tbody tr {
            border-bottom: 1px solid #dddddd;
            font-weight: bold;
            color: #efefef;
            background-color: #2b2b2b73;

        }

        .profil {
            font-size: 1em;
        }

        .ajouter {
            text-align: center;
        }

        .titretab {
            font-size: 2em;
            color: ghostwhite;
            margin: 30px;
            border: solid #4caf50;
            border-radius: 5px;
            padding: 10px;

        }

        header {
            width: 100%;
            height: 100px;
            background-size: auto;
            padding: 0 30px;
            /* position: absolute; */
            /* overflow: hidden; */
        }

        .logo {
            color: #dddddd;
            font-size: 1em;
            display: block;
            margin-left: 30px;
            border-bottom: solid #4caf50;
            border-top: solid #4caf50;
            border-radius: 5px;
            padding: 5px;
        }
        
 .decon {
    /* background: white; */
    color: #4caf50;
    border-left: solid;
    border-right: solid;
    padding: 5px;
}
        
        .check{
            position: relative;
            width: 60px;
            height: 30px;
            -webkit-appearance:none;
            background: #c6c6c6;
            outline: none;
            border-radius: 15px;
            box-shadow: inset 0 0 5px rgba(0,0,0,.2.);
            transition: .5s;
            
        }
        
        .check:checked{
            background: #4caf50;
        }
    
        .check:before{
            content: '';
            position: absolute;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            top: 0;
            left: 0;
            background: white;
            transform: scale(1.1);
            box-shadow: 0 2px 5px rgba(0,0,0.2);
            transition: .5s;
        }
        .check:checked:before{
            left: 30px;
        }
        
        .btn:hover{
            color: #232622;
            cursor: pointer;
        }
        .btn{
            padding: 0;
            margin: 0;
        }
        
    </style>



</head>



<body>


    <header>
        <div class="menu-toggle" id="hamburger">
            <i class="fas fa-bars"></i>
        </div>
        <div class="overlay"></div>
        <div class="container">
            <nav>
                <h1 class="logo"><?php echo $_SESSION['login']; ?></h1>
                <ul>
                  <?php if($_SESSION['login']=="ADMINISTRATION"): ?>
                    <li><a href="espace_admin.php">Services</a></li>
                    <?php else: ?>
                    <li><a href="espace_prof.php">Services</a></li>
                    <li><a href="infoperso.php">Profil</a></li>
                    <li><a style="color:#4caf50" href="mes_reservations.php">Mes reservations</a></li>
                    <li><a href="reservation.php">Reserver</a></li>

                    <?php endif ?>
                    <li><a href="#">Contact</a></li>
                    <li><a class="logo" href="server.php?dec=out; ?>">Deconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>



    <table class="profil" color="red">
        <caption class="titretab">Consultation de tous les Reservations</caption>
        <thead>
            <tr>
              
                <th>La salle</th>
                <th>Date de Reservation</th>
                <th>Date de reunion</th>
                <th>Heure Debut</th>
                <th>Heure fin</th>
                <th>Motif</th>
                <th>Professeur</th>
                <th>Confirmation</th>
                
                <?php if ($_SESSION['login']==='ADMINISTRATION'): ?>
                <th colspan="2" ><h2>Gestion des Reservations</h2></th> 
                <?php endif ?>
            </tr>
        </thead>
        <tbody>
            <?php 
        while($row = mysqli_fetch_array($reservation)) { ?>
            <tr>
                <td><?php echo $row['intitule']; ?></td>
                <td><?php echo $row['date_reservation']; ?></td>
                <td><?php echo $row['date_reunion']; ?></td>
                <td><?php echo $row['heure_debut']; ?></td>
                <td><?php echo $row['heure_fin']; ?></td>
                <td><?php echo $row['motif']; ?></td>
                <td><?php echo $row['nom']." ".$row['prenom']; ?></td>
                
                <?php if ($_SESSION['login']==='ADMINISTRATION'): ?>
                <?php if ($row['confirmation']==1): ?>
                <td> <a style="display:block" href="reservation.php?edit=<?php echo $row['id_reservation']; ?>"><input class="check" type="checkbox" name="confirmer"  checked disabled></a> </td>
                <?php else: ?>
                <td> <a style="width:200px"href="reservation.php?edit=<?php echo $row['id_reservation']; ?>"><input class="check" type="checkbox" name="confirmer" value="1" disabled ></a> </td>
                <?php endif ?>
                
                <td><a class="botona modifier" href="reservation.php?edit=<?php echo $row['id_reservation']; ?>">Modifier</a></td>
                <td><a class="botona supprimer" href="server.php?del_reservation=<?php echo $row['id_reservation']; ?>">Supprimer</a></td>
                <?php endif ?>
                
                
                <?php if ($_SESSION['login']!='ADMINISTRATION'): ?>

                <?php if ($row['confirmation']==1): ?>
                <td> <strong>Accepté</strong> </td>
                <?php else: ?>
                <td> <strong>En attente</strong> </td>
                <?php endif ?>
                
                <?php endif ?>


            </tr>

            <?php } ?>



        </tbody>
    </table>



</body>

</html>