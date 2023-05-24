<?php
 
    require_once(__DIR__ .'\controller\dbConnector.php');
    require_once(__DIR__ .'\assets\jpgraph\src\jpgraph.php');
    require_once(__DIR__ .'\assets\jpgraph\src\jpgraph_pie.php');
    require_once(__DIR__ .'\assets\jpgraph\src\jpgraph_pie3d.php');

    $tableauAnnees = array();
$tableauNombreVentes = array();

    $requet="SELECT classe, count(id) as nb FROM eleve group by classe";
        $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
        
        while ($row=mysqli_fetch_assoc($result))
        {
        	$tableauAnnees[] = $row["classe"];
            $tableauNombreVentes[] = $row["nb"];
        }

        $graph = new PieGraph(400,300);

        $graph->title->Set("Nombre d'élève par classe");

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