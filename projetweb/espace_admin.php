<?php 
    session_start();
   


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/icone.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    
    <style>
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
                    <li><a href="about.php">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li ><a class="decon" href="server.php?dec=out; ?>">Deconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>


    <div class="services-section">
        <div class="inner-width">
            <h1 class="section-title">Our Services</h1>
            <div class="border"></div>
            <div class="services-container">

                <div class="service-box">
                    <a href="profil.php">
                        <div class="service-icon">
                            <i class="fas fa-address-card"></i>
                        </div>
                    </a>
                    <div class="service-title">Gestion des Professeurs</div>
                    <div class="service-desc">
                        Espace pour Gerer les Professeurs de l'ENSA<br>Vous pouvez <strong>Ajouter</strong> ou <strong>Supprimer</strong> un Professeur<br><strong>Consulter</strong> et <strong>Modifier</strong> leurs informations personnelles.
                    </div>
                </div>

                <div class="service-box">
                    <a href="liste_reservation.php">
                        <div class="service-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                    </a>
                    <div class="service-title">Gestion des reunions</div>
                    <div class="service-desc">
                        Espace pour Gerer les salles de reunions de l'ENSA<br>Vous pouvez <strong>Ajouter</strong>, <strong>Supprimer</strong> ou <strong>Reserver</strong> une salle de reunion<br><strong>Consulter</strong> et <strong>Modifier</strong> leurs propriétés.
                    </div>
                </div>


                <div class="service-box">
                    <a href="liste_depart.php">
                        <div class="service-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                    </a>
                    <div class="service-title">Gestion des departements</div>
                    <div class="service-desc">
                        Espace pour Gerer les departements de l'ENSA<br>Vous pouvez <strong>Ajouter</strong> ou <strong>Supprimer</strong> un departements<br><strong>Consulter</strong> et <strong>Modifier</strong> leurs propriétés.
                    </div>
                </div>


            </div>
        </div>
    </div>




</body>

</html>