<?php
     
        $requet="SELECT id_eval, intitule_eval, total_point, date, duree_eval, statut, type, ue FROM evaluation WHERE id_eval NOT IN(SELECT eval FROM eval_fait WHERE eleve='$id_eleve') and ue IN(SELECT code FROM discipline_classe WHERE classe='$classe') order by date desc";
        $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet kk");

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
                                            <li><a href="#">Evaluation</a>
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
        <div class="text-center m-b-md custom-login"><h1>Les Evaluations</h1></div>
        <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                            <h4>Liste des évaluations</h4>
                            
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                            <tr>
                                                <th >N°</th>
                                                <th >Discipline</th>
                                                <th >Intitulé</th>
                                                
                                                <th >Compétences</th>
                                                <th >nbr d'exo</th>
                                                
                                                <th >Date</th>
                                                
                                                <th >Type</th>
                                                
                                               
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                    <?php
                                        $i=1;
                                       
                                        while ($row=mysqli_fetch_assoc($result)) 
                                        {
                                            $ue=$row["ue"];
                                            //on affiche le nom de la discipline
                                            $requet="SELECT d.discipline FROM discipline_classe dc, discipline d WHERE d.code_dis=dc.discipline and dc.code='$ue'";
                                            $resul=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
                                            $disp=mysqli_fetch_assoc($resul);
                                            echo '<td>'.$i.'</td>
                                                  <td>'.$disp["discipline"].'</td>';
                                                  $i++;
                                                  $id_eval=$row["id_eval"];
                                                  $type=$row["type"];
                                                  //pour avoir le nombr d'exo
                                                  $requet="SELECT * FROM exercice WHERE type='Eval' and source='$id_eval' ";
                                                  $rest=mysqli_query($con,$requet) or die("impossible d'exécuter la requet gg");

                                                  //pour avoir les compétences
                                                  $requet="SELECT c.competence FROM eval_competence ec, competence_ua c WHERE c.id_c=ec.comp and ec.eval='$id_eval' ";
                                                  $reslt=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
                                    ?>
                                                  <td><?php echo $row['intitule_eval'] ; ?></td>
                                                  <td><?php
                                                    while ($cmptt=mysqli_fetch_assoc($reslt)) 
                                                    {
                                                        echo '- '.$cmptt["competence"].'<br>' ; 
                                                    }
                                                   ?></td>
                                                  <td><?php echo mysqli_num_rows($rest); ?></td>
                                                  
                                                  <td><?php echo date("d-m-y", strtotime((string)$row["date"])); ?></td>

                                                  <td><?php echo $row["type"]; ?> </td>

                                                  
                                                  

                                            
                                    

                                        
                                    
                                        <td>
                                            <button data-toggle="tooltip" title="Aperçu" class="pd-setting-ed btn-info"><a href="home_eleve?page=apercu_eval&eval=<?=$id_eval ?>" target="_blank">Traiter</a></button>
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
        