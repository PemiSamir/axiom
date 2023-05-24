<?php
 
    $id_eval=$_GET["eval"];

    $requet="update evaluation set statut=0 where ue='$ue' and id_eval='$id_eval'";
    $rcp=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

    echo('<script>location.href = "index_enseignant.php?page=evaluation"</script>');


?>
