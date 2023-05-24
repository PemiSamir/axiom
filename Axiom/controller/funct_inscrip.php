<?php

	include 'dbConnector.php';

	$role=$_POST["role"];

    
	$email=htmlspecialchars(trim(addslashes($_POST["email"])));
	$mdps=htmlspecialchars(trim(addslashes($_POST["password"])));
	$region=htmlspecialchars(trim(addslashes($_POST["region"])));
	$phone=htmlspecialchars(trim(addslashes($_POST["tel"])));
	$nom=htmlspecialchars(trim(addslashes($_POST["nom"]))); 
	$sexe=htmlspecialchars(trim(addslashes($_POST["sexe"])));
	
	

	if ( !empty($_POST["voir"])) {
         $image = addslashes($_FILES['image']['tmp_name']);
         $image_name = addslashes($_FILES['image']['name']);
         $image_size = getimagesize($_FILES['image']['tmp_name']);

        move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/img/" . $_FILES["image"]["name"]);
        $location = "upload/img/" . $_FILES["image"]["name"];

       
    }
    else
    {
        $location = "assets/img/product/pro4.jpg";

    }

//echo "je suis un ".$role." le mdp es ".$mdps;
	if ($role=="eleve") 
	{
		$date=date("d-m-y",strtotime((string)$_POST["date"]));
	    $dep=htmlspecialchars(trim(addslashes($_POST["dept"])));
	    $ville=htmlspecialchars(trim(addslashes($_POST["ville"])));
		$classe=htmlspecialchars(trim(addslashes($_POST["Classe"])));
		

		 $res=mysqli_query($con,"INSERT INTO eleve (Nom, date_nais, sexe, telephone, classe, region, departement, ville, Email, mdp, photo) values ('$nom','$date','$sexe','$phone','$classe', '$region', '$dep', '$ville', '$email', '$mdps', '$location' ) ") or die("erreur eleve");

		 $result=mysqli_query($con, "SELECT id from eleve where Nom='$nom' and Email='$email' and mdp='$mdps' ") or die("impossible d'exécuter la requet");
    }
	elseif ($role=="enseignant") 
	{
		$date=date("d-m-y",strtotime((string)$_POST["date"]));
	    $dep=htmlspecialchars(trim(addslashes($_POST["dept"])));
	    $ville=htmlspecialchars(trim(addslashes($_POST["ville"])));

		$classe=htmlspecialchars(trim(addslashes($_POST["Classe"])));
		$grade=htmlspecialchars(trim(addslashes($_POST["grade"])));
		$mat=htmlspecialchars(trim(addslashes($_POST["matricule"])));
		$des="descrip";

		 $res=mysqli_query($con,"INSERT INTO enseignant (id, Nom, sexe, telephone, dept, grade, region, departement, ville, email, mdp, photo, description) values ('$mat','$nom','$sexe','$phone','$classe', '$grade', '$region', '$dep', '$ville', '$email', '$mdps', '$location', '$des') ") or die("erreur prof '$mat','$nom','$date','$sexe','$phone','$classe', '$grade', '$region', '$dep', '$ville', '$email', '$mdps', '$location', '$des'");

		 $result=mysqli_query($con, "SELECT id from enseignant where Nom='$nom' and email='$email' and mdp='$mdps' ") or die("impossible d'exécuter la requet");
	}
	elseif ($role=="parent") 
	{
		$work=htmlspecialchars(trim(addslashes($_POST["boulo"])));

		$res=mysqli_query($con,"INSERT INTO parent (nom, sexe, tel, region, profession, email, mdp, photo) values ('$nom','$sexe','$phone', '$region', '$work', '$email', '$mdps', '$location' ) ") or die("erreur eleve");

		 $result=mysqli_query($con, "SELECT id from parent where nom='$nom' and email='$email' and mdp='$mdps' ") or die("impossible d'exécuter la requet");

	}

	//$requet="SELECT id from eleve where Email='$email' AND mdp='$mdps'";

		

		if(mysqli_num_rows($result)==0)
		{
			header("Location:../index.php?erreur=0");
	    }
		else
		{
			$ligne=mysqli_fetch_assoc($result);
			$ids=$ligne["id"];
			$_SESSION["id"]=$ids;
			header("location:../home_".$role.".php");
		}



	/*function connexion($role,$email,$mdps,$con)
	{
		echo "sdslslslslsll";
		$requet="SELECT id from '$role' where Email='$email' AND mdp='$mdps'";

		$result=mysqli_query($con,$requet) or die(mysqli_error());

		if(mysqli_num_rows($result)==0)
		{
			return 0;
		}
		else
		{
			$ligne=mysqli_fetch_assoc($result);
			return  (int)$ligne["id"];
		}

	}*/

?>