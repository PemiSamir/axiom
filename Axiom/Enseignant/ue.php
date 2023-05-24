<?php
    
        //selecion des discipline du departement de cette classe
        $requet="SELECT u.ua, u.num_ua, l.id_lecon, l.num_lec, l.lecon, l.duree, l.type FROM unite_apprentissage u, lecon l WHERE u.code_ua=l.ua and l.ue='$ue' order by u.num_ua";
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
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">les Unités d'Enseignement</span>
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
        <div class="text-center m-b-md custom-login"><h1>LES UNITES D'ENSEIGNEMENT</h1></div>
         <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                            <h4>Liste d'Unités d'enseignement</h4>
                            <div class="add-product">
                                <a href="index_enseignant.php?page=add_ue">Ajouter une UE</a>
                            </div><br>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                 <thead>
                                    <tr>
                                        <th>UA</th>
                                        <th>N°</th>
                                        
                                        <th>Unité d'Enseignement</th>
                                        <th>Durée</th>
                                        <th>Type</th>
                                        <th>Compétence</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                       
                                        while ($row=mysqli_fetch_assoc($result)) 
                                        {

                                            
                                    echo '
                                    <tr>
                                        <td>UA '.$row["num_ua"].': '.$row["ua"].'</td>
                                        <td><b>  <u>UE '.$row["num_lec"].': </b></u></td>
                                        <td><b>'.$row["lecon"].'</b></td>
                                        <td>'.$row["duree"].'H</td>
                                        <td>'.$row["type"].'</td>';

                                        $lec=$row["id_lecon"];

                                        $requet="SELECT competence_lec FROM competence_lec WHERE lecon='$lec' and ue='$ue'";
                                        $rcp=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

                                    ?>
                                        <td>
                                            <?php
                                                if(mysqli_num_rows($rcp)>0)
                                                {
                                                    while ($comp=mysqli_fetch_assoc($rcp)) {
                                                        echo '- '.$comp["competence_lec"]. '<br>';
                                                    }
                                                }
                                                else{
                                                    echo "";
                                                }
                                            ?>
                                        </td>

                                        
                                    
                                        <td>
                                            <button data-toggle="tooltip" title="Editer" class="pd-setting-ed"><a href="index_enseignant.php?page=edit_ue&le=<?=$lec ?>"><i class="fa fa-pencil-square-o" style="color:green" aria-hidden="true"></i></a></button>
                                            <button data-toggle="tooltip" title="Supprimer" class="pd-setting-ed"><a href="index_enseignant.php?page=supp_ue&le=<?=$lec ?>"><i class="fa fa-trash-o" style="color:red" aria-hidden="true"></i></a></button>
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