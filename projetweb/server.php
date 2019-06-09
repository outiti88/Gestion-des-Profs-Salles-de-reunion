<?php
	
	session_start();


	$nom = '';
	$prenom = '';
	$depart = '';
	$tel = '';
	$email = '';
	$date_ajout = '';
	$id_prof = 0;
	$edit_state = false;
    $edit_prof = false;
	$user = "";
    $reseration_bool = false;
    $control = 0;


//inialiser reservation

            $date_reservation= ''; 
            $date_reunion=''; 
            $heure_debut = ''; 
            $heure_fin = ''; 
            $motif= ''; 
            $nom='';
            $prenom= '';




$db= mysqli_connect('localhost','root','','bd');
//if($db) echo '<script>alert("succes")</script>'; else echo '<script>alert("ereur")</script>';

if(isset($_POST['ajouter'])){
	$nom = trim($_POST['nom']);
	$prenom = trim($_POST['prenom']);
	$depart = trim($_POST['depart']);
	$tel = trim($_POST['tel']);
	$email = $nom.".".$prenom."@ensate.com";
	$date_ajout = date("Y-m-d H:i:s");
	$date_modif = date("Y-m-d H:i:s");
	$randp=rand(100,999);
	$pass = $nom.$randp;
	
	$passw = md5(str_shuffle($pass));
	$rand=rand(1,99);
	$user = str_shuffle($nom).$rand;
	$query= "INSERT INTO prof (nom, prenom, id_dep, tel, email, date_ajout, date_modif, motdepasse, user) VALUES ('$nom', '$prenom', '$depart', '$tel', '$email', '$date_ajout','$date_modif' , '$passw','$user')";
	mysqli_query($db,$query);
	$_SESSION['msg'] = "Professeur ajouté ! ";
header('location: inscription.php');

}

if (isset($_POST['modifier'])) {
$nom = trim($_POST['nom']);
	$prenom = trim($_POST['prenom']);
	$depart = trim($_POST['depart']);
	$tel = trim($_POST['tel']);
	$id_prof = $_POST['id_prof'];
	$date_modif = date("Y-m-d H:i:s");
	$test=mysqli_query($db, "UPDATE prof SET nom='$nom' , prenom='$prenom' , id_dep='$depart' , tel='$tel' , date_modif='$date_modif' WHERE id_prof=$id_prof");
    //die(var_dump($test));
	
	header('location: profil.php');
}


if (isset($_GET['del'])) {


	$id_prof = $_GET['del'];
	mysqli_query($db, "DELETE FROM prof WHERE id_prof=$id_prof");
	header('location: profil.php');
}



/*if (isset($_POST['connecter'])) {
	$user = trim($_POST['user']);
	$motdepasse = trim($_POST['motdepasse']);

	$record = mysqli_query($db, "SELECT * FROM prof WHERE user='".$user."'");

    $na = mysqli_fetch_array($record);
 	//die(var_dump($na));
        $nom = $na['nom'];
        $prenom = $na['prenom'];
        $depart = $na['depart'];
        $tel = $na['tel'];
        $email = $na['email'];
        $date_ajout = $na['date_ajout'];
        $motdepassebd = $na['motdepasse'];

	include('infoperso.php');
}*/




$con = new pdo('mysql:host=localhost;dbname=bd', 'root', '');


if(isset($_POST['envoyer'])){
      
    
    $user=$_POST['user'];
    $motdepasse=md5($_POST['motdepasse']);


    $quer=$con->query("SELECT COUNT(*) FROM prof WHERE user='$user' AND motdepasse='$motdepasse'");
    $count=$quer->fetchColumn();

    
    if($count=="1"){
        $reslut=$con->query("SELECT * FROM prof WHERE user='$user' AND motdepasse='$motdepasse'");
        $na=$reslut->fetch();  
        $_SESSION['info']=$na;
        //die(var_dump($s));
        $_SESSION['login']="Bienvenue: ".$na['nom']." ".$na['prenom'];
        $_SESSION['id_prof']=$na['id_prof'];
    $control = 2;
        header('location:espace_prof.php');
    }
else { $_SESSION['msg'] = "Login ou Motdepasse incorrect ! ";
     header('location:login_prof.php'); }
    
    
}


if (isset($_POST['connecteradmin'])) {
    
    $user=$_POST['username'];
    $motdepasse=$_POST['password'];
    $quer=$con->query("SELECT COUNT(*) FROM admin WHERE user='$user' AND motdepasse='$motdepasse'");
    $count=$quer->fetchColumn();
        if($count=="1"){
    $control = 1;
        $_SESSION['login']="ADMINISTRATION";
header('location: espace_admin.php');
        }
else {
    $_SESSION['msg'] = "Login ou Motdepasse incorrect ! ";
    header('location:login.php');  
}  
}




if(isset($_GET['dec'])){
    session_start();
    session_destroy();
    header('location:services.html');
    
}


if(isset($_POST['reserver'])){
    
    $date_reunion= $_POST['date_reunion'];
    $heure_debut = $_POST['heure_debut'];
    $heure_fin = $_POST['heure_fin'];
    $motif = $_POST['motif'];
    $id_prof = $_SESSION['id_prof'];
    $id_salle = $_POST['id_salle'];
    $date_reservation = date("Y-m-d H:i:s");
    $date_modif = date("Y-m-d H:i:s");
    $id_reunion = rand(100,999);
            //die(var_dump($id_prof));

    
    $query= "INSERT INTO reunion (id_reunion, date_reunion, heure_debut, heure_fin) VALUES ('$id_reunion','$date_reunion', '$heure_debut', '$heure_fin')";
	mysqli_query($db,$query);
    

    
    mysqli_query($db,"INSERT INTO reservation (date_reservation, motif, date_modif, id_salle, id_reunion, id_prof, confirmation) VALUES ('$date_reservation', '$motif', '$date_modif', '$id_salle', '$id_reunion', '$id_prof', 0)");
    
    
header('location: mes_reservations.php');

}

if(isset($_POST['modifier_reservation'])){
    
    $id_salle = $_POST['id_salle'];
        //die(var_dump($id_salle));

    $id_reservation = $_POST['id_reservation'];
    $date_reunion= $_POST['date_reunion'];
    $heure_debut = $_POST['heure_debut'];
    $heure_fin = $_POST['heure_fin'];
    $date_modif = date("Y-m-d H:i:s");
    $id_reunion = $_POST['id_reunion'];
    $confirmation = $_POST['confirmation'];
       //die(var_dump($confirmation));

    
	$test=mysqli_query($db,"UPDATE reservation SET id_salle='$id_salle', confirmation='$confirmation', date_modif='$date_modif' WHERE id_reservation='$id_reservation'");

    //die(var_dump($test));
    mysqli_query($db,"UPDATE reunion SET date_reunion='$date_reunion' , heure_debut='$heure_debut',heure_fin='$heure_fin' where id_reunion='$id_reunion'");
    
    
header('location: liste_reservation.php');

}





if (isset($_GET['del_reservation'])) {


	$id_reservation = $_GET['del_reservation'];
	mysqli_query($db, "DELETE FROM reservation WHERE id_reservation=$id_reservation");
	header('location: liste_reservation.php');
}









$reservation = mysqli_query($db,"SELECT reservation.id_reservation, salle.intitule , reservation.date_reservation, reservation.motif ,reunion.date_reunion, reunion.heure_debut, reunion.heure_fin, prof.nom, prof.prenom, reservation.confirmation FROM reservation , salle, reunion, prof
WHERE salle.id_salle=reservation.id_salle AND reservation.id_reunion=reunion.id_reunion and prof.id_prof=reservation.id_prof");


$var_id_prof = $_SESSION['id_prof'] ;
$mesreservation = mysqli_query($db,"SELECT reservation.id_reservation, salle.intitule , reservation.date_reservation, reservation.motif ,reunion.date_reunion, reunion.heure_debut, reunion.heure_fin, prof.nom, prof.prenom, reservation.confirmation FROM reservation , salle, reunion, prof WHERE salle.id_salle=reservation.id_salle AND reservation.id_reunion=reunion.id_reunion and prof.id_prof=reservation.id_prof AND prof.id_prof='$var_id_prof'");

$results = mysqli_query($db,"SELECT * FROM prof");
$departement = mysqli_query($db, "SELECT id_dep, sigle FROM departement");
$salle = mysqli_query($db, "SELECT * FROM salle");



?>