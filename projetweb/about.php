<?php 
    session_start();
   


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/home.css">

    <link rel="stylesheet" href="./style.css" />
    <title>About</title>
    
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        button {
            font-family: 'Poppins', sans-serif;
        }

        header {
            display: flex;
            width: 90%;
            height: 10vh;
            margin: auto;
            align-items: center;
        }

        .logo {
            color: #dddddd;
            font-size: 1em;
            display: block;
            margin-left: 30px;
        }


        .logo-container,
        .nav-links,
        .cart {
            display: flex;
        }

        .logo-container {
            flex: 1;
        }

        .logo {
            font-weight: 400;
            margin: 5px;
        }

        nav {
            flex: 2;
        }

        .nav-links {
            justify-content: space-around;
            list-style: none;
        }

        .nav-link {
            color: #5f5f79;
            font-size: 18px;
            text-decoration: none;
        }

        .cart {
            flex: 1;
            justify-content: flex-end;
        }

        .presentation {
            display: flex;
            width: 90%;
            margin: auto;
            min-height: 80vh;
            align-items: center;
        }

        .introduction {
            flex: 1;
        }

        .intro-text h1 {
            font-size: 44px;
            font-weight: 500;
            color: #4caf50;
            text-transform: uppercase;
        }

        .intro-text p {
            margin-top: 5px;
            font-size: 22px;
            color: #e2e2e2;
        }

        .cta {
            padding: 50px 0px 0px 0px;
        }

        .cta-select {
            border: 2px solid #c36cbb;
            background: transparent;
            color: #c36cbb;
            width: 150px;
            height: 50px;
            cursor: pointer;
            font-size: 16px;
        }

        .cta-add {
            background: #c36cbb;
            width: 150px;
            height: 50px;
            cursor: pointer;
            font-size: 16px;
            border: none;
            color: white;
            margin: 30px 0px 0px 30px;
        }

        .cover {
            flex: 1;
            display: flex;
            justify-content: center;
            height: 60vh;
        }

        .cover img {
            height: 100%;
            filter: drop-shadow(0px 5px 3px black);
            animation: drop 1.5s ease;
        }

        .big-circle {
            position: absolute;
            top: 0px;
            right: 0px;
            z-index: -1;
            opacity: 0.5;
            height: 80%;
        }

        .medium-circle {
            position: absolute;
            top: 30%;
            right: 30%;
            z-index: -1;
            height: 60%;
            opacity: 0.4;
        }

        .small-circle {
            position: absolute;
            bottom: 0%;
            left: 20%;
            z-index: -1;
        }

        .laptop-select {
            width: 15%;
            display: flex;
            justify-content: space-around;
            position: absolute;
            right: 20%;
        }

        @keyframes drop {
            0% {
                opacity: 0;
                transform: translateY(-80px);
            }

            100% {
                opacity: 1;
                transform: translateY(0px);
            }
        }

        @media screen and (max-width: 1024px) {
            .presentation {
                flex-direction: column;
            }

            .introduction {
                margin-top: 5vh;
                text-align: center;
            }

            .intro-text h1 {
                font-size: 30px;
            }

            .intro-text p {
                font-size: 18px;
            }

            .cta {
                padding: 10px 0px 0px 0px;
            }

            .laptop-select {
                bottom: 5%;
                right: 50%;
                width: 50%;
                transform: translate(50%, 5%);
            }

            .cover img {
                height: 80%;
            }

            .small-circle,
            .medium-circle,
            .big-circle {
                opacity: 0.2;
            }
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
                    <?php endif ?>
                    <li><a href="#">Contact</a></li>
                    <li><a href="server.php?dec=out; ?>">Deconnexion</a></li>
                </ul>

            </nav>
        </div>

    </header>

    <main>
        <section class="presentation">
            <div class="introduction">
                <div class="intro-text">
                    <h1>Projet web 1</h1>
                    <p>
                        la gestion
                        automatique des salles de réunions de l’École Nationale des Sciences Appliquées (ENSA) de
                        Tétouan.

                    </p>
                </div>
                <div class="cta">
                    <a class="btn" href="https://www.facebook.com/ayouboutiti">OUTITI AYOUB</a>
                    <a class="btn" href="https://www.facebook.com/chaimae.echcharif">ECHCHRIF CHAIMAE</a>
                </div>
            </div>
            <div class="cover">
                <img src="./img/ensa.png" alt="ensatetouan" />
            </div>
        </section>



        <img class="big-circle" src="./img/big-eclipse.svg" alt="" />
        <img class="medium-circle" src="./img/mid-eclipse.svg" alt="" />
        <img class="small-circle" src="./img/small-eclipse.svg" alt="" />
    </main>
</body>

</html>