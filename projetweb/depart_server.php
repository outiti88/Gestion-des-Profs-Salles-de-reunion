<?php
	
	session_start();


	$nom = '';
	$sigle = '';
	$date_c = '';
	$id_dep = 0;
	$edit_state = false;




$db= mysqli_connect('localhost','root','','bd');


if(isset($_POST['ajouter'])){
	$nom = trim($_POST['nom']);
	$sigle = trim($_POST['sigle']);

	$date_c = date("Y-m-d H:i:s");
	$date_m = date("Y-m-d H:i:s");
    $results = mysqli_query($db,"SELECT count(*) FROM departement WHERE sigle='$sigle'");
    $count = mysqli_fetch_array($results);
    //die(var_dump($count[0]));
    
 if($count[0]=="0")
 {
	$query= "INSERT INTO departement (nom, sigle, date_c, date_m) VALUES ('$nom', '$sigle', '$date_c', '$date_m')";
	mysqli_query($db,$query);
	$_SESSION['msg'] = "Departement ajouté ! ";
}
    else {	$_SESSION['msg'] = "Departement deja existe ! ";
 } header('location: departement.php');

}


if (isset($_POST['modifier'])) {
    $id_dep = $_POST['id_dep'];
    $nom = trim($_POST['nom']);
	$sigle = trim($_POST['sigle']);
	$date_m = date("Y-m-d H:i:s");
	$test=mysqli_query($db, "UPDATE departement SET nom='$nom' , sigle='$sigle' , date_m='$date_m' WHERE id_dep=$id_dep");
	//die(var_dump($test));
	header('location: liste_depart.php');
}

if (isset($_GET['del'])) {

	$id_dep = $_GET['del'];
    	mysqli_query($db, "UPDATE prof SET id_dep='1' WHERE id_dep=$id_dep");

    
    
	mysqli_query($db, "DELETE FROM departement WHERE id_dep=$id_dep");
    
	header('location: liste_depart.php');
}




$results = mysqli_query($db,"SELECT *, departement.nom as nom_dep , COUNT(prof.id_dep) as nbr FROM departement INNER JOIN prof
ON prof.id_dep=departement.id_dep  WHERE departement.id_dep<>1 GROUP BY prof.id_dep");







?>