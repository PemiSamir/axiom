<?php
          //on selectionne les exo pas encore fait
                $requet="SELECT id_exo, ue, intitule, enoncer,niveau, point, date FROM exercice WHERE type='exo' and id_exo NOT IN(SELECT exo FROM rep_exo WHERE eleve='$id_eleve') and ue IN(SELECT code FROM discipline_classe WHERE classe='$classe') order by date desc";
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
                                             
                                            <li><span class="bread-blod">Exercice</span>
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
        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <!--span style="text-align:center"> Cliquer sur une leçon pour accéder au contenu</span-->
                            <br>
                            <div class="asset-inner">
                                <table  id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
	                                    <tr>
	                                       
	                                        <th>N° </th>
	                                        <th>Discipline </th>
	                                        <th>Intitulé </th>
	                                        <th>Niveau </th>
	                                        <th>Compétences testées </th>
	                                        <th>Publié le </th>
	                                        <th>Action </th>
	                                         
                                    	</tr>
                                	</thead>
                                    
                                    <tbody>

                                    <?php
                                        
                                    	$i=0;;
                                        while ($row=mysqli_fetch_assoc($result)) 
                                        {
                                        	$i++;
                                        	$id_exo=$row["id_exo"];
                                        	echo '<tr><td>'.$i.'</td>';

                                        	$ue=$row["ue"];
                                        	//on affiche le nom de la discipline
                                        	$requet="SELECT d.discipline FROM discipline_classe dc, discipline d WHERE d.code_dis=dc.discipline and dc.code='$ue'";
								            $resul=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
								            $disp=mysqli_fetch_assoc($resul);
								            echo '<td>'.$disp["discipline"].'</td>';

								            echo '<td>'.$row["intitule"].'</td>';

								            echo '<td>'.$row["niveau"].'</td>';

                                        	//on selectionne les compéences
                                        	$requet="SELECT cl.competence_lec FROM exo_comp ec, competence_lec cl WHERE cl.id_cl=ec.comp and ec.exo='$id_exo' ";
                                                  $reslt=mysqli_query($con,$requet) or die("impossible d'exécuter la requet"); 

                                             echo '<td>';
                                                    while ($cmptt=mysqli_fetch_assoc($reslt)) 
                                                    {
                                                        echo '- '.$cmptt["competence_lec"].'<br>' ; 
                                                    }
                                             echo '</td>';

                                             echo '<td>'.$row["date"].'</td>';
                                          ?>
                                          <td><button type="button" class="btn btn-custon-rounded-two btn-info"><a href="home_eleve.php?page=apercu_exercice&exo=<?=$id_exo ?>"><span style="color:white">Traiter</span></a></button> </td>
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