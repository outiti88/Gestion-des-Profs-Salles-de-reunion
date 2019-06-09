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






    <form class="formulaire" name="vform" onsubmit="return Validate()" method="post" action="loginProfserver.php">

        <a href="acceuil.html" class="titre">
            <h1>Modification</h1>
        </a>



        <div class="us" id="apassword_div">
            <label for="apass" onclick="show()" onmouseleave="hide()"><i id="icon" class="fa fa-lock"></i></label>
            <input id="apass" type="password" name="ancienpassword" placeholder="Entrez votre ancien Motdepasse" class="textInput">
        </div>
        <div id="apassword_error"></div>


        <div class="us" id="password_div">
            <label for="pass" onclick="show()" onmouseleave="hide()"><i class="fa fa-lock"></i></label>
            <input id="pass" type="password" name="password" placeholder="Entrez votre nouveau Motdepasse" class="textInput">
        </div>

        <div class="us" id="pass_confirm_div">
            <label for="passc" onclick="show()" onmouseleave="hide()"><i class="fa fa-lock"></i></label>
            <input id="passc" type="password" name="password_confirm" placeholder="Confirmez votre Motdepasse" class="textInput">
            <div id="password_error"></div>
        </div>


        <p><button type="submit" name="modifierpass" class="btn">Modifier</button></p>


    </form>


    <script src="verif.js"></script>
</body>

</html>