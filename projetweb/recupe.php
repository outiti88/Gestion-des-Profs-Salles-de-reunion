
<?php include('server.php'); 


   


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
            <link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">


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
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>



<div>           <?php if (isset($_SESSION['msg'])): ?>
    <a class="msg" href="services.html">
        <?php 
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                ?>
    </a>


    <?php endif?></div>


    <form class="formulaire" name="vform" action="loginProfserver.php" method="post">

        <a href="acceuil.html" class="titre">
            <h1>Recuperer Votre motdepasse</h1>
        </a>

        <div class="us" id="username_div">
            <label for="user"><i class="fa fa-user"></i></label>
            <input id="user" type="text" name="username" placeholder="Entrez votre Surnom" class="textInput" required>

        </div>
        
        
        <div class="us" >
            <label for="phone"><i class="fas fa-phone"></i></label>
            <input id="phone" type="text" name="tel" placeholder="Entrez votre num de Tel" class="textInput" required>
        </div>
        

        <div class="us" id="email_div">
            <label for="mail"><i class="fas fa-envelope"></i></label>
            <input id="mail" type="email" name="email" placeholder="Entrez votre E-mail" class="textInput" required>
        </div>




        <p><button type="submit" name="recuperer" class="btn">Envoyer</button></p>


    </form>


</body>

</html>