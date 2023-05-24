<?php
    
       
        if (isset($_SESSION["retour"]) and $_SESSION["retour"]==1) 
        {
            $_SESSION["retour"]=0;
            $lec=$_SESSION["lecon"];
            $ua=$_SESSION["ua"];
        }
        else
        {
            $lec=$_GET["le"];
            $ua=$_GET["ua"];
            $_SESSION["lecon"]= $lec;
            $_SESSION["ua"]= $ua;
        }

         //on supprime les cours vide
                $requet="DELETE FROM cours where trace='rien' and video=0 and fichier=0";
                $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

                 $requet="DELETE FROM rep_exo where eleve=0";
                $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

                $requet="DELETE FROM rep_question where eleve=0";
                $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

         $requet="SELECT num_lec, lecon FROM lecon WHERE id_lecon='$lec'";
         $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
         $lecon=mysqli_fetch_assoc($result);

        $requet="SELECT en.Nom, c.id_cours, c.statut, c.trace, c.video, c.fichier, c.date, c.date_modif FROM enseignant en, cours c WHERE en.id=c.prof and c.lecon='$lec' and c.ue='$ue' order by c.date_modif DESC";
        $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

?>


<div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="index_enseignant.php?page=lecon"><b><span style="color:blue">Leçon</b></span></a> <span class="bread-slash">/<?php echo 'UE '.$lecon["num_lec"].': '.$lecon["lecon"]; ?></span>
                                            </li>
                                            <li><span class="bread-blod"></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center m-b-md custom-login"><h1><?php echo 'UE '.$lecon["num_lec"].': '.$lecon["lecon"]; ?></h1></div>
        <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                            <h4>Liste des leçons proposées</h4>
                            <div class="add-product">
                                <a href="index_enseignant.php?page=add_cours&le=<?=$lec ?>&ua=<?=$ua ?>&new=<?=1 ?>">Ajouter une Leçon</a>
                            </div><br>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                            <tr>
                                                <th >N°</th>
                                                <th >Enseignant</th>
                                                <th >Trace écrite</th>
                                                
                                                <th >Fichier</th>
                                                <th >Date</th>
                                                <th >Statut</th>
                                                <th >Date Modif</th>
                                                
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                    <?php
                                        $i=1;
                                       
                                        while ($row=mysqli_fetch_assoc($result)) 
                                        {
                                            echo '<td>'.$i.'</td>
                                                  <td>'.$row["Nom"].'</td>';
                                                  $i++;
                                                  $id_cours=$row["id_cours"];
                                    ?>
                                                  <td><?php echo ($row['trace']  != NULL) ? "OUI" : "NON"; ?></td>
                                                  <td><?php echo ((int)$row["video"]  > 0) ? 'OUI' : 'NON'; ?></td>
                                                  
                                                  <td><?php echo $row['date'] ; ?></td>
                                                  <td><?php if ((int)$row["statut"]  > 0) 
                                                            { ?>
                                                                <button type="button" class="btn btn-custon-rounded-two btn-success">Publié</button>
                                                                <?php
                                                            }
                                                            else
                                                            { ?>
                                                                <button type="button" class="btn btn-custon-rounded-two btn-danger"><a href="#"><span style="color:white">Non publié</span></a></button> 
                                                            <?php } ?>
                                                    </td>
                                                  <td><?php echo $row['date_modif'] ; ?></td>
                                                  

                                            
                                    

                                        
                                    
                                        <td>
                                            <button data-toggle="tooltip" title="Aperçu" class="pd-setting-ed"><a href="index_enseignant.php?page=rappelPrerequis&le=<?=$lec ?>&ua=<?=$ua ?>&id_cours=<?=$id_cours ?>" target="_blank"><i class="fa fa-eye" style="color:blue" aria-hidden="true"></i></a></button>
                                            <button data-toggle="tooltip" title="Editer" class="pd-setting-ed"><a href="index_enseignant.php?page=edit_ue&le=<?=$lec ?>"><i class="fa fa-pencil-square-o" style="color:green" aria-hidden="true"></i></a></button>
                                            <button data-toggle="tooltip" title="Supprimer" class="pd-setting-ed"><a href="#>"><i class="fa fa-trash-o" style="color:red" aria-hidden="true"></i></a></button>
                                        </td>

                                    </tr>
                                    <?php
                                        }
                                    ?>
                                    
                                   </tbody>  
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            </div>
                    </div>
                </div>
        