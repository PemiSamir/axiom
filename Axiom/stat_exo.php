<?php
 
    require_once(__DIR__ .'\controller\dbConnector.php');
    require_once(__DIR__ .'\assets\jpgraph\src\jpgraph.php');
    require_once(__DIR__ .'\assets\jpgraph\src\jpgraph_pie.php');
    require_once(__DIR__ .'\assets\jpgraph\src\jpgraph_pie3d.php');

    $exo=$_GET["exo"];
    $titre=$_GET["titre"];

    $tableauAnnees = array();
    $tableauNombreVentes = array();

    $requet="SELECT count(eleve) as nb FROM rep_exo where note < (sur/2) and exo='$exo'";
        $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
        
        $row=mysqli_fetch_assoc($result);
        
        	$tableauAnnees[] ="Echec";
            $tableauNombreVentes[] = $row["nb"];

            $requet="SELECT count(eleve) as nb FROM rep_exo where note >= (sur/2) and exo='$exo'";
        $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
        
        $row=mysqli_fetch_assoc($result);
        
            $tableauAnnees[] = "Reussit";
            $tableauNombreVentes[] = $row["nb"];
        

        $graph = new PieGraph(600,400);

        $graph->title->Set($titre);

        $oPie = new PiePlot($tableauNombreVentes);
		// Ajouter au graphique le graphique secteur
		$graph->Add($oPie);
		// Légendes qui accompagnent chaque secteur, ici chaque année
		$oPie->SetLegends($tableauAnnees);

		$oPie->SetCenter(0.4);
		$oPie->SetValueType(PIE_VALUE_ABS);
		// Format des valeurs de type entier
		$oPie->value->SetFormat('%d');
		// Provoquer l'affichage (renvoie directement l'image au navigateur)
		$graph->Stroke();



    


 ?>   