<?php include('depart_server.php');

 
    session_start();


 ?>


<!DOCTYPE html>
<html>

<head>
    <title> formulaire</title>
    <meta charset="utf-8">
    <meta name="author" content="ayoub">
    <meta name="description" content="formulaire d'inscription">
    <meta name="keywords" content="inscription, formulaire, ensa">
    <link rel="icon" href="images/icone.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


    <style>
        .msg {
            display: block;
            margin: auto;
            padding: 10px;
            border-radius: 5px;
            color: white;
            background-color: #db2f2f;
            border: 1px solid white;
            width: 800px;
            text-align: center;
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
                <h1 class="logo"><a href="acceuil.php">Ensa<span>Té</span></a></h1>
                <ul>
                    <li><a href="acceuil.php">Home</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>


    <div> <?php if (isset($_SESSION['msg'])): ?>
        <a class="msg" href="login.php">
            <?php 
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                ?>
        </a>


        <?php endif?></div>

    <form class="formulaire" method="post" name="vform" onsubmit="return Validate()" action="server.php">

        <a href="acceuil.php" class="titre">
            <h1>Se Connecter</h1>
        </a>

        <div class="us" id="username_div">
            <label for="user"><i class="fa fa-user"></i></label>
            <input id="user" type="text" name="username" placeholder="Entrez votre Surnom" class="textInput" required>
            <div id="name_error"></div>

        </div>



        <div class="us" id="password_div">
            <label for="pass" onclick="show()" onmouseleave="hide()"><i class="fa fa-lock"></i></label>
            <input id="pass" type="password" name="password" placeholder="Entrez votre Motdepasse" class="textInput" required>
            <div id="password_error"></div>

        </div>



        <div><button class="btn" type="submit" name="connecteradmin">Se connecter</button></div>


    </form>



    <script src="scripts.js"></script>

</body>

</html>