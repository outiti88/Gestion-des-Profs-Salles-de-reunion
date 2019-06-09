<?php 

	session_start();




	$db1= mysqli_connect('localhost','root','','bd');

	if (isset($_POST['modifier'])) {
   $id_prof = trim($_POST['id_prof']);

	$nom = trim($_POST['nom']);
	$prenom = trim($_POST['prenom']);
	$depart = trim($_POST['depart']);
                      //die(var_dump($depart));

	$tel = trim($_POST['tel']);
	$email = trim($_POST['email']);
	$date_modif = date("Y-m-d H:i:s");
	$user = $_POST['user'];
	$s=mysqli_query($db1, "UPDATE prof SET nom='$nom' , prenom='$prenom' , id_dep='$depart', tel='$tel' , date_modif='$date_modif' WHERE id_prof=$id_prof");
  
        //die(var_dump($s));
        //die(mysqli_error ($s));
	
    session_start();
    session_destroy();
    header('location:services.html');}



    if(isset($_POST['recuperer'])){
        
        $user=$_POST['username'];
        $email=$_POST['email'];
        $tel=$_POST['tel'];
        
        
        
    $results=mysqli_query($db1,"SELECT COUNT(*) FROM prof WHERE user='$user' AND tel='$tel'");
        $count = mysqli_fetch_array($results);
        //die(var_dump($count));

    
    if($count[0]=="1"){
        
    $randp=rand(100,999);
	$pass = str_shuffle($randp.$user.$randp);
    $subject = "Recuperation du Mot de Passe";
    $message = "Bonjour,

Bonne nouvelle ! Vous n'avez plus qu'une étape à effectuer pour récupérer l'accès à votre compte .. 
Pour réinitialiser votre mot de passe, il vous suffit d'entrer
votre login :".$user."
et votre mot de passe de recuperation:  .".$pass;
    $headers = "From: outiti.ayoub@gmail.com";
        $e=mail($email, $subject, $message);
        //die(var_dump($e));
        if($e){
             $passw = md5($pass);
	mysqli_query($db1, "UPDATE prof SET motdepasse='$passw' WHERE user='$user'");
	
        
        header('location:modifier.php');
        }
        else {
        header('location:recupe.php');
        }
       
    }
        
        
else {
    	$_SESSION['msg'] = "Vous n'êtes pas dans la base de donnée  ";

    header('location:recupe.php');
    
} 
    }



 if($a=isset($_POST['modifierpass'])){

        $ancien=md5($_POST['ancienpassword']);
        $nouveau=md5($_POST['password']);
                  //die(var_dump($ancien));

       
    $results=mysqli_query($db1,"SELECT COUNT(*) FROM prof WHERE motdepasse='$ancien'");
        $count = mysqli_fetch_array($results);

if($count[0]=="1"){
    $a=mysqli_query($db1, "UPDATE prof SET motdepasse ='$nouveau' WHERE motdepasse='$ancien'");
    //die(var_dump($a));
        header('location:login_prof.php');

    
}
     
     else  header('location:recupe.php');


 }

?>