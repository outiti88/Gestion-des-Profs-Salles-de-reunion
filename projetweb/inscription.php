<?php include('server.php');

 

   




    if (isset($_GET['edit'])) {
        $id_prof = $_GET['edit'];
        $edit_state = true;
        $rec = mysqli_query($db, "SELECT * FROM prof WHERE id_prof=$id_prof");
        $n = mysqli_fetch_array($rec);
 
        $nom = $n['nom'];
        $prenom = $n['prenom'];
        $id_dep = $n['id_dep'];
        $tel = $n['tel'];
        $email = $n['email'];
        $date_ajout = $n['date_ajout'];
        $id_prof=$n['id_prof'];
        $user=$n['user'];
        
        $dep = mysqli_query($db, "SELECT sigle FROM departement WHERE id_dep=$id_dep");
        $d=mysqli_fetch_array($dep);
        
        $depart=$d['sigle'];
        
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

        .box select {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            font-size: 18px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);

            outline: none;
        }



        .box select option {
            color: white;
            padding: 30px;
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
                    <li><a href="server.php?dec=out; ?>">Deconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <?php if (isset($_SESSION['msg'])): ?>
    <a class="msg" href="profil.php">
        <?php 
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                ?>
    </a>


    <?php endif?>

    <div class="milieu">

        <form class="formulaire" action='server.php' method='post'>
            <a href="profil.php" class="titre">
                <?php if ($edit_state == false): ?>
                <h1> Ajouter un professeur</h1>
                <?php else: ?>
                <h1> Modifier un professeur</h1>
                <?php endif ?>

            </a>

            <input type="hidden" name="id_prof" value="<?php echo $id_prof; ?>">
            <div class="us">
                <label for="nom"><i class="fa fa-user"></i></label>
                <input id="nom" type="text" name="nom" placeholder="Entrez le nom" value="<?php echo $nom; ?>" required>
            </div>

            <div class="us">
                <label for="pre"><i class="fa fa-briefcase"></i></label>
                <input id="pre" type="text" name="prenom" placeholder="Entrez le prenom" value="<?php echo $prenom; ?>" required>
            </div>

            <div class="box us">
                <select name="depart">
                
                                <?php if ($edit_state == false): ?>
                 <option selected disabled>Departement</option>
                <?php else: ?>
                 <option value="<?php echo $id_dep; ?>"><?php echo $depart; ?></option>
                <?php endif ?>
                
                
                  
                    <?php while( $option = mysqli_fetch_array($departement)) { ?>

                    <option value="<?php echo $option['id_dep']; ?>"><?php echo $option['sigle']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="us">
                <label for="tel"><i class="fa fa-phone"></i></label>
                <input id="tel" type="tel" name="tel" placeholder="Entrez le Numero de Tel" value="<?php echo "0".$tel; ?>" required>
            </div>

            <?php if ($edit_state): ?>

            <div class="us">
                <label for="user"><i class="fa fa-user"></i></label>
                <input id="user" type="text" name="user" placeholder="Entrez le user" value="<?php echo $user; ?>" required>
            </div>




            <?php endif ?>

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