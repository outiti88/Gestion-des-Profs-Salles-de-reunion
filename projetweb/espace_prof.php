<?php 
    session_start();

   


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Espace professeur</title>
    <link rel="stylesheet" href="css/style.css">
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
                    <li><a href="about.php">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="server.php?dec=out; ?>">Deconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>


    <div class="services-section">
        <div class="inner-width">
            <h1 class="section-title">Espace professeur</h1>
            <div class="border"></div>
            <div class="services-container">

                <div class="service-box">
                    <a href="infoperso.php">
                        <div class="service-icon">
                            <i class="fas fa-address-book"></i>
                        </div>
                    </a>
                    <div class="service-title">Informations personelles</div>
                    <div class="service-desc">
                        Espace pour la  consultation de votre informations personelles<br>Vous pouvez <strong>Consulter</strong> ou <strong>Modifier</strong> les informations liées a votre profil <br>
                    </div>
                </div>

                <div class="service-box">
                    <a href="reservation_prof.php">
                        <div class="service-icon">
                            <i class="fas fa-user-clock"></i>
                        </div>
                    </a>
                    <div class="service-title">Espace Reservation</div>
                    <div class="service-desc">
                        Espace pour Gerer vos reservations <br>Vous pouvez <strong>effectuer une reservations</strong>, <strong>Supprimer</strong> ou <strong>modifier</strong> vos reservations  <br><strong>Consulter</strong>  l'histporiques des reservations existantes .
                    </div>
                </div>


            


            </div>
        </div>
    </div>




</body>

</html>