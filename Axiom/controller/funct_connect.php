<?php

	include 'dbConnector.php';

	$role=$_POST["role"];
	$email=htmlspecialchars(trim(addslashes($_POST["user"])));
	$mdps=htmlspecialchars(trim(addslashes($_POST["mdp"])));

//echo "je suis un ".$role." le mdp es ".$mdps;
	if ($role=="eleve") {
		$requet="SELECT id from eleve where Email='$email' AND mdp='$mdps'";
	}
	elseif ($role=="enseignant") {
		$requet="SELECT id from enseignant where Email='$email' AND mdp='$mdps'";
	}
	elseif ($role=="parent") {
		$requet="SELECT id from parent where email='$email' AND mdp='$mdps'";

	}
	elseif ($role=="admin") {
		$requet="SELECT id from admin where email='$email' AND mdp='$mdps'";
	}

	//$requet="SELECT id from eleve where Email='$email' AND mdp='$mdps'";

		$result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

		if(mysqli_num_rows($result)==0)
		{
			if ($role=="admin") {
				 header("Location:../admin.php?erreur=0");
			}
			else
				{
					header("Location:../index.php?erreur=0");
				}
			
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