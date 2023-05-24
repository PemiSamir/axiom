<?php
 
    require_once(__DIR__ .'\controller\dbConnector.php');
    require_once(__DIR__ .'\assets\jpgraph\src\jpgraph.php');
    require_once(__DIR__ .'\assets\jpgraph\src\jpgraph_radar.php');
    require_once(__DIR__ .'\assets\jpgraph\src\jpgraph_log.php');

    $ide=(int)$_GET["id"];
    $cla=$_SESSION["classe"];

    $tableauAnnees = array();
    $tableauNombreVentes = array();

        $requet="SELECT dc.code, d.discipline FROM discipline_classe dc, discipline d where d.code_dis=dc.discipline and classe='$cla'";
        $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet  hj ");
        
        while ($row=mysqli_fetch_assoc($result)) 
        {
            $ue=$row["code"];

             $requet="SELECT count(r.eleve) as nb FROM rep_exo r, exercice ex where note >= (sur/2) and r.exo=ex.id_exo and ex.ue='$ue' and r.eleve='$ide'";
             $resul =mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
        
              $ro =mysqli_fetch_assoc($resul );

              $tableauAnnees[] =$row["discipline"];
            $tableauNombreVentes[] = $ro["nb"];
        } 
        
        	

         // Création du conteneur type radar
        $graph = new RadarGraph (580,580,"auto");
        // Représentation logarithmique
        // Permet le lissage en changeant l'échelle
        $graph->SetScale("log");
        // Paramétrage de l'apparence du grahique
        $graph->title->Set("Profil");
        $graph->title->SetFont(FF_VERDANA,FS_NORMAL,12);
        $graph->SetTitles($tableauAnnees);
        // Position du graphique par rapport au centre
        $graph->SetCenter(0.50,0.55);
        // Cacher les marques
        $graph->HideTickMarks();
        // Couleur de fond
        $graph->SetColor('#cccccc@0.3');
        $graph->axis->SetColor('blue@0.5');
        $graph->grid->SetColor('blue@0.5');
        $graph->grid->Show();
        $graph->axis->title->SetFont(FF_ARIAL,FS_NORMAL,10);
        $graph->axis->title->SetMargin(5);
        // Créer les points
        $plot1 = new RadarPlot($tableauNombreVentes);
        // Ajouter les points au graphique
        $graph->Add($plot1);
        // Couleur de la ligne
        $plot1->SetColor('red');

        // Epaisseur de la ligne qui relie les points
        $plot1->SetLineWeight(1);
        // Couleur de remplissage
        $plot1->SetFillColor('red@0.8');
        // Apparence des points
        $plot1->mark->SetType(MARK_SQUARE);
        $graph->Stroke();


 ?>   