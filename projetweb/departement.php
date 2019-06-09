<?php include('depart_server.php');

 
    session_start();

   



    if (isset($_GET['edit'])) {
        $id_dep = $_GET['edit'];
        $edit_state = true;
        $rec = mysqli_query($db, "SELECT * FROM departement WHERE id_dep=$id_dep");
        $n = mysqli_fetch_array($rec);
 
        $nom = $n['nom'];
        $sigle = $n['sigle'];
        $date_c = $n['date_c'];
        
        
    }


 ?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Inscription des professeurs</title>

    <link rel="stylesheet" href="css/home.css">
    <link rel="icon" href="images/icone.png">
    <style type="text/css">
        .msg {
            display: block;
            margin: 30px auto;
            padding: 10px;
            border-radius: 5px;
            color: white;
            background-color: #4caf50;
            border: 1px solid green;
            width: 800px;
            text-align: center;
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
                    <li><a href="depart_server.php">Deconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <?php if (isset($_SESSION['msg'])): ?>
    <a class="msg" href="liste_depart.php">
        <?php 
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                ?>
    </a>


    <?php endif?>

    <div class="milieu">

        <form class="formulaire" action='depart_server.php' method='post'>
            <a href="liste_depart.php" class="titre">
                <?php if ($edit_state == false): ?>
                <h1> Ajouter un departement</h1>
                <?php else: ?>
                <h1> Modifier un departement</h1>
                <?php endif ?>

            </a>

            <input type="hidden" name="id_dep" value="<?php echo $id_dep; ?>">
            <div class="us">
                <label for="nom"><i class="fa fa-user"></i></label>
                <input id="nom" type="text" name="nom" placeholder="Entrez le nom" value="<?php echo $nom; ?>" required>
            </div>

            <div class="us">
                <label for="sigle"><i class="fa fa-user"></i></label>
                <input id="sigle" type="text" name="sigle" placeholder="Entrez le Sigle" value="<?php echo $sigle; ?>" required>
            </div>

 

            <div>
                <?php if ($edit_state == false): ?>
                <button class="btn" type="submit" name="ajouter">Ajouter</button>
                <?php else: ?>
                <button class="btn" type="submit" name="modifier">Modifier</button>
                <?php endif ?>


            </div>






        </form>
    </div>

    




</body>

</html>