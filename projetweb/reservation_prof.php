<?php 
    session_start();

   


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reservation</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
    <link rel="icon" href="images/icone.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    
    <style>
        .logo {
    color: #dddddd;
    font-size: 1em;
    display: block;
    margin-left: 30px;
    
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
                <h1 class="logo" ><?php echo $_SESSION['login']; ?></h1>
                <ul>
                    <li><a href="espace_prof.php">Servies</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="server.php?dec=out; ?>">Deconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>


    <div class="services-section">
        <div class="inner-width">
            <h1 class="section-title">Espace Reservation</h1>
            <div class="border"></div>
            <div class="services-container">

                <div class="service-box">
                    <a href="liste_reservation.php">
                        <div class="service-icon">
                            <i class="fa fa-clipboard-list"></i>
                        </div>
                    </a>
                    <div class="service-title">Consulter tous les reservation</div>
                    <div class="service-desc">
                        Espace pour la  consultation de l'historiques des reservations existantes ainsi que vos reservation<br>Vous pouvez <strong>Consulter</strong> tous le detail liées à ses informations <br>
                    </div>
                </div>

                <div class="service-box">
                    <a href="reservation.php">
                        <div class="service-icon">
                            <i class="fa fa-handshake"></i>
                        </div>
                    </a>
                    <div class="service-title">Reserver une salle</div>
                    <div class="service-desc">
                        Espace pour Gerer vos reservations <br>Vous pouvez <strong>effectuer une reservations</strong>, <strong>Supprimer</strong> ou <strong>modifier</strong> vos reservations.
                    </div>
                </div>


            


            </div>
        </div>
    </div>




</body>

</html>