<?php  include('server.php');
   
$s=$_SESSION['info'];
//die(var_dump($s));
$user=$s['user'];
$id_prof=$s['id_prof'];
$nom=$s['nom'];
$prenom=$s['prenom'];
$id_dep=$s['id_dep'];
$email=$s['email'];
$motdepasse=$s['motdepasse'];
$tel=$s['tel'];



        $dep = mysqli_query($db, "SELECT sigle FROM departement WHERE id_dep=$id_dep");
        $d=mysqli_fetch_array($dep);
        
        $depart=$d['sigle'];
//die(var_dump($id_dep));


?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Informations personelles</title>

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

        .logo {
            color: #dddddd;
            font-size: 1em;
            display: block;
            margin-left: 30px;}
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
                    <li><a href="infoperso.php">Profil</a></li>
                    <li><a href="reservation_prof.php">Reservation</a></li>
                    <li><a href="espace_prof.php">Services</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="server.php?dec=out; ?>">Deconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>



    <div class="milieu">

        <form class="formulaire" action='loginProfserver.php' method='post'>
            <a href="profil.php" class="titre">
                <h1> Informations Personelles</h1>
            </a>

            <input type="hidden" name="id_prof" value="<?php echo $id_prof; ?>">

            <div class="us">
                <label for="user"><i class="fa fa-user"></i></label>
                <input id="user" type="text" name="user" placeholder="Entrez votre Surnom" value="<?php echo $user ; ?>">
            </div>


            <div class="us">
                <label for="nom"><i class="fa fa-user"></i></label>
                <input id="nom" type="text" name="nom" placeholder="Entrez le nom" value="<?php echo $nom; ?>">
            </div>

            <div class="us">
                <label for="pre"><i class="fa fa-user"></i></label>
                <input id="pre" type="text" name="prenom" placeholder="Entrez le prenom" value="<?php echo $prenom; ?>">
            </div>


            <!-- <div class="us">
                <label for="pass"><i class="fa fa-lock"></i></label>
                <input id="pass" type="password" name="motdepasse" placeholder="Entrez votre Motdepasse" value="<?php //echo $motdepasse; ?>">
            </div>-->


            <div class="box us">
                <select name="depart">
                
                 <option value="<?php echo $id_dep; ?>"><?php echo $depart; ?></option>
                
                    <?php while( $option = mysqli_fetch_array($departement)) { ?>

                    <option value="<?php echo $option['id_dep']; ?>"><?php echo $option['sigle']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="us">
                <label for="tel"><i class="fa fa-phone"></i></label>
                <input id="tel" type="tel" name="tel" placeholder="Entrez le Numero de Tel" value="<?php echo "0".$tel; ?>">
            </div>




            <div class="us">
                <label for="mail"><i class="fa fa-envelope"></i></label>
                <input id="mail" type="email" name="email" placeholder="Entrez l'adresse E-mail" value="<?php echo $email; ?>">
            </div>




                <div>

                    <button class="btn" type="submit" name="modifier">Modifier</button>


                </div>






        </form>
    </div>






</body>

</html>