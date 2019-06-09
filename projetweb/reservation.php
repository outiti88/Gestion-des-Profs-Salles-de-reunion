<?php include('server.php');

 
    if (isset($_GET['edit'])) {
        $id_reservation = $_GET['edit'];
        $edit_state = true;
        $rec = mysqli_query($db, "SELECT reservation.id_reunion, reservation.id_reservation, salle.intitule , reservation.id_salle, reservation.date_reservation, reservation.motif ,reunion.date_reunion, reunion.heure_debut, reunion.heure_fin, prof.nom, prof.prenom, reservation.confirmation FROM reservation , salle, reunion, prof
WHERE salle.id_salle=reservation.id_salle AND reservation.id_reunion=reunion.id_reunion and prof.id_prof=reservation.id_prof and reservation.id_reservation=$id_reservation");
        $row = mysqli_fetch_array($rec);
            
            //die(var_dump($row));
            
            $intitule=$row['intitule'];
            $date_reservation= $row['date_reservation']; 
            $date_reunion=$row['date_reunion']; 
            $heure_debut = $row['heure_debut']; 
            $heure_fin = $row['heure_fin']; 
            $motif= $row['motif']; 
            $nom= $row['nom'];
            $prenom= $row['prenom'];
            $id_reunion = $row['id_reunion'];
            $id_salle = $row['id_salle'];
            $id_reservation = $row['id_reservation'];
            $confirmation = $row['confirmation'];
        
                    //die(var_dump($confirmation));

    }

 ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title -->
    <title>Reserver</title>

    <meta charset="UTF-8">
    <meta name="author" content="Outiti ayoub" />
    <link rel="stylesheet" href="css/home.css">
    <link rel="icon" href="images/icone.png">




    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #000000;
            border-left: 4px solid #dd3d36;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            color: white;
        }


        nav {
            padding-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-transform: uppercase;
            font-size: 1.2em;
        }

        .logo {
            color: #dddddd;
            font-size: 1em;
            display: block;
            margin-left: 30px;
        }

        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #000000;
            border-left: 4px solid #4caf50;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            color: white;
        }



        .row {
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 15px;
        }

        .row .col.s12 {
            width: 100%;
            margin-left: auto;
            left: auto;
            right: auto;
        }

        select {
            background-color: rgba(0, 0, 0, 0);
            width: 100%;
            padding: 5px;
            border: 1px solid #9e9e9e;
            border-radius: 2px;
            height: 3rem;
            color: #9e9e9e;
        }

        .input-field label {
            color: #9e9e9e;
            position: absolute;
            top: 0.8rem;
            font-size: 1rem;
            cursor: text;
            transition: .2s ease-out;
        }

        element.style {}

        input:not([type]),
        input[type=date],
        input[type=datetime-local],
        input[type=datetime],
        input[type=email],
        input[type=number],
        input[type=password],
        input[type=search],
        input[type=tel],
        input[type=text],
        input[type=time],
        input[type=url],
        textarea.materialize-textarea {
            border-bottom: 1px solid #BCBCBC;
        }

        input:not([type]),
        input[type=text],
        input[type=password],
        input[type=email],
        input[type=url],
        input[type=time],
        input[type=date],
        input[type=datetime],
        input[type=datetime-local],
        input[type=tel],
        input[type=number],
        input[type=search],
        textarea.materialize-textarea {
            background-color: transparent;
            border: none;
            border-bottom: 1px solid #9e9e9e;
            border-radius: 0;
            outline: none;
            height: 3rem;
            width: 100%;
            font-size: 1rem;
            margin: 0 0 20px 0;
            padding: 0;
            box-shadow: none;
            box-sizing: content-box;
            transition: all 0.3s;
            color: white;
            display: block;
            margin-top: 20px;
        }

        .input-field {
            position: relative;
            margin-top: 0;
        }



        .row .col {
            float: left;
            box-sizing: border-box;
            padding: 0 0.75rem;
            min-height: 1px;
        }

        .wizard-content {
            padding: 50px 0;

        }

        .card {
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .05), 0 3px 1px -2px rgba(0, 0, 0, .08), 0 1px 5px 0 rgba(0, 0, 0, .08);
            position: relative;
            height: 500px;
        }

        h3 {
            font-size: 2.92rem;
            line-height: 110%;
            margin: 1.46rem 0 1.168rem 0;
            font-weight: 400;
            color: #4caf50;
            text-transform: uppercase;
        }

        form {
            display: block;
            margin-top: 0em;
        }

        .card {
            position: relative;
            margin: 0.5rem 0 1rem 0;
            background-color: #00000075;
            transition: box-shadow .25s;
            border-radius: 2px;
        }

        .mn-inner {
            padding: 25px 25px 9.5px;
            min-height: calc(100% - 181px);
        }


        html {
            font-size: 14px;
            line-height: 1.5;
            font-family: sans-serif;
            font-weight: normal;
            color: rgba(0, 0, 0, 0.87);
        }
        .check{
            position: relative;
            width: 60px;
            height: 30px;
            -webkit-appearance:none;
            background: #c6c6c6;
            outline: none;
            border-radius: 15px;
            box-shadow: inset 0 0 5px rgba(0,0,0,.2.);
            transition: .5s;
            
        }
        
        .check:checked{
            background: #4caf50;
        }
    
        .check:before{
            content: '';
            position: absolute;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            top: 0;
            left: 0;
            background: white;
            transform: scale(1.1);
            box-shadow: 0 2px 5px rgba(0,0,0.2);
            transition: .5s;
        }
        .check:checked:before{
            left: 30px;
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

    <main class="mn-inner">
        <div class="row">
            <div class="col s12 m12 l8">
                <div class="card">
                    <div class="card-content">
                        <form id="example-form" method="post" action="server.php" name="addemp">
                            <div>
                                <?php if ($edit_state == false): ?>
                                <h3>Reserver une Salle de Reunion</h3>

                                    <?php else: ?>
                                <h3>Consulter et Modifier les reservations</h3>
                                    <?php endif ?>
                                                                             
                                <section>
                                    <div class="wizard-content">
                                        <div class="row">
                                            <div class="col m12">
                                                <div class="row">
                                                    <?php if ($_SESSION['login']=="ADMINISTRATION"): ?>
                                                     <div class="input-field col m6 s12" >
                                                        <?php if ($row['confirmation']==1): ?>
                                                         <input class="check" type="checkbox" name="confirmation" id="confimer" value="1" checked > 
                                                           <input type='hidden' value="0" name="confirmation">
                                                        <?php else: ?>
                                                         <input class="check" type="checkbox" name="confirmation" id="confimer" value="1"  > 

                                                        <?php endif ?>
                                                    </div>  
                                                            <?php endif ?>
                                                        <div class="input-field col  s12">
                                                        <select name="id_salle" autocomplete="off" required>
                                                            <?php if ($edit_state == false): ?>
                                                            <option  disabled>Choisissez la Salle</option>
                                                            <?php else: ?>
                                                            <option value="<?php echo $id_salle; ?>" disabled><?php echo $intitule; ?></option>
                                                            <?php endif ?>
                                                                                                                       


                                                            <?php while( $option = mysqli_fetch_array($salle)) { ?>

                                                            <option value="<?php echo $option['id_salle']; ?>">
                                                                <?php echo $option['intitule']; ?></option>
                                                            <?php } ?>


                                                        </select>
                                                    </div>
                                                    <input type="hidden" value="<?php echo $id_reservation; ?>" name="id_reservation">

                                                    <input type="hidden" value="<?php echo $id_reunion; ?>" name="id_reunion">
                                                    
                                                    
                                                    <?php if ($_SESSION['login']=="ADMINISTRATION"): ?>
                                                     <div class="input-field col m6 s12">
                                                        <label for="fromdate">Professeur</label>
                                                        <input type="text" value="<?php echo $nom." ".$prenom; ?>"  disabled>
                                                    </div>       
                                                            
                                                                                        
                                                    <div class="input-field col m6 s12">
                                                        <label for="fromdate">La date de la reservation</label>
                                                        <input value="<?php echo $date_reservation; ?>" id="fromdate" class="masked" type="date"       disabled >
                                                    </div>
                                                    <?php endif ?>
                                                    <div class="input-field col m6 s12">
                                                        <label for="fromdate">La date de la reunion</label>
                                                        <input value="<?php echo $date_reunion; ?>" id="fromdate" name="date_reunion" class="masked" type="date" required>
                                                    </div>
                                                    <div class="input-field col m6 s12">
                                                        <label for="heure">L'heure debut</label>
                                                        <input value="<?php echo $heure_debut; ?>" id="heure" name="heure_debut" class="masked" type="time" required>
                                                    </div>
                                                    <div class="input-field col m6 s12">
                                                        <label for="duree">L'heure Fin</label>
                                                        <input value="<?php echo $heure_fin; ?>" id="duree" name="heure_fin" class="masked" type="time" required>
                                                    </div>
                                                    <div class="input-field col m12 s12">
                                                        <label for="textarea1">Motif</label>

                                                        <textarea id="textarea1" name="motif" class="materialize-textarea" length="500" <?php if ($_SESSION['login']=="ADMINISTRATION") echo "disabled" ; ?>>
                                                            <?php echo $motif; ?>
                                                        </textarea>
                                                    </div>
                                                </div>
                                                <p>
                                                    <?php if ($edit_state == true): ?>
                                                            <button class="btn" type="submit" name="modifier_reservation">Modifier</button>
                                                            <?php else: ?>
                                                            <button class="btn" type="submit" name="reserver">Ajouter</button>
                                                            <?php endif ?>


                                            </div>
                                        </div>
                                    </div>

                                </section>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>


</body>

</html>