<?php
     

         //on supprime les exercice fait par le prof
           $requet="DELETE FROM rep_exo where eleve=0";
                $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

                $requet="DELETE FROM rep_question where eleve=0";
                $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

        $requet="SELECT en.Nom, ex.id_exo, ex.intitule, ex.enoncer, ex.niveau, ex.comp1, ex.comp2, ex.comp3, ex.point, ex.date, ex.duree FROM enseignant en, exercice ex WHERE en.id=ex.prof and ex.ue='$ue' and ex.type='exo' order by ex.date DESC";
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
                                            <li><a href="#">Exercice</a>
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
        <div class="text-center m-b-md custom-login"><h1>Les exercices</h1></div>
        <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                            <h4>Liste d'exercices</h4>
                            <div class="add-product">
                                <a href="index_enseignant.php?page=add_exo">Ajouter un Exercice</a>
                            </div><br>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                            <tr>
                                                <th >N°</th>
                                                <th >Enseignant</th>
                                                <th >Intitulé</th>
                                                
                                                <th >Compétences</th>
                                                <th >nbr Quest</th>
                                                
                                                <th >Date</th>
                                                <th >Niveau</th>
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
                                                  $id_exo=$row["id_exo"];
                                                  //pour avoir le nombr de question
                                                  $requet="SELECT * FROM question WHERE exo='$id_exo' ";
                                                  $rest=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

                                                  //pour avoir les compétences
                                                  $requet="SELECT cl.competence_lec FROM exo_comp ec, competence_lec cl WHERE cl.id_cl=ec.comp and ec.exo='$id_exo' ";
                                                  $reslt=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
                                    ?>
                                                  <td><?php echo $row['intitule'] ; ?></td>
                                                  <td><?php
                                                    while ($cmptt=mysqli_fetch_assoc($reslt)) 
                                                    {
                                                        echo '- '.$cmptt["competence_lec"].'<br>' ; 
                                                    }
                                                   ?></td>
                                                  <td><?php echo mysqli_num_rows($rest); ?></td>
                                                  
                                                  <td><?php echo date("d-m-y", strtotime((string)$row["date"])); ?></td>
                                                  <td><?php echo $row["niveau"] ?> </td>
                                                  
                                                   
                                        <td>
                                            <button data-toggle="tooltip" title="Aperçu" class="pd-setting-ed"><a href="index_enseignant.php?page=apercu_exercice&exo=<?=$id_exo ?>" target="_blank"><i class="fa fa-eye" style="color:blue" aria-hidden="true"></i></a></button>
                                            <button data-toggle="tooltip" title="Editer" class="pd-setting-ed"><a href="#"><i class="fa fa-pencil-square-o" style="color:green" aria-hidden="true"></i></a></button>
                                            <button data-toggle="tooltip" title="Supprimer" class="pd-setting-ed"><a href="#"><i class="fa fa-trash-o" style="color:red" aria-hidden="true"></i></a></button>
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
        