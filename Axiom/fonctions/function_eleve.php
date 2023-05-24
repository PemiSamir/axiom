<?php

	function info_eleve($id_eleve)
	{
		$requet="SELECT * from eleve where id='$id_eleve'";
		$result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
		$ligne=mysqli_fetch_assoc($result);

		return $ligne;
	}

	function nom_classe($id_eleve)
	{
		$requet="SELECT 'cl.classe', 'el.Nom' FROM classe cl, eleve el WHERE 'cl.id_classe=el.classe' AND 'el.id'='$id_eleve'";
		$result=mysqli_query($requet) or die("impossible d'exécuter la requet");
		$ligne=mysqli_fetch_assoc($result);

		return $ligne;

	}

?>