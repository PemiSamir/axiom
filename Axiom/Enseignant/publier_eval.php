<?php
 
    $id_eval=$_GET["eval"];

    $z=0;
    if ($_GET["type"]=="Finale") 
    {
    	$requet="update evaluation set statut='$z' where ue='$ue' and type='Finale' and statut=1 ";
    	$rcp=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
    }
    

    $requet="update evaluation set statut=1 where ue='$ue' and id_eval='$id_eval'";
    $rcp=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

    echo('<script>location.href = "index_enseignant.php?page=evaluation"</script>');


?>
