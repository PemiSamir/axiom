<?php

    $lec=$_GET["le"];
    $ua=$_GET["ua"];
    $id_cours=$_GET["id_cours"];

    $z=0;
    $requet="update cours set statut='$z' where lecon='$lec' and statut=1 ";
    $rcp=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

    $requet="update cours set statut=1 where lecon='$lec' and id_cours='$id_cours'";
    $rcp=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

    echo('<script>history.go(-1)</script>');


?>
