<?php include('depart_server.php'); 



?>

<!DOCTYPE html>
<html>

<head>
    <title>Consultation des Departements</title>
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
        
        .decon{
            color: #4caf50;
    border-left: solid;
    border-right: solid;
    padding: 5px;
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
                    <li><a href="espace_admin.php">Services</a></li>
                    <li><a href="about.php">About</a></li>

                    <li><a href="#">Contact</a></li>
                    <li><a class="decon" href="server.php?dec=out; ?>">Deconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>




    <table class="profil" color="red">
        <caption class="titretab">Gestion des Departements</caption>
        <thead>
            <tr>
              
                <th>Departement</th>
                <th>Sigle</th>
                <th>Date d'ajout</th>
                <th>Date de modification</th>
                <th>Nombre de Professeurs</th>

                <th colspan="2" class="ajouter"><a href="departement.php">Ajouter</a></th>
            </tr>
        </thead>
        <tbody>
            <?php 
        while($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['nom_dep']; ?></td>
                <td><?php echo $row['sigle']; ?></td>
                <td><?php echo $row['date_c']; ?></td>
                <td><?php echo $row['date_m']; ?></td>
                <td><?php echo $row['nbr']; ?></td>
                <td><a class="botona modifier" href="departement.php?edit=<?php echo $row['id_dep']; ?>">Modifier</a></td>
                <td><a class="botona supprimer" href="depart_server.php?del=<?php echo $row['id_dep']; ?>">Supprimer</a></td>


            </tr>

            <?php } ?>



        </tbody>
    </table>




</body>

</html>