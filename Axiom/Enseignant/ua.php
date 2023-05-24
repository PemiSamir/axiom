<?php
    
        //selecion des discipline du departement de cette classe
        $requet="SELECT m.module, m.num, u.code_ua, u.num_ua, u.ua, u.duree, u.image FROM module m, unite_apprentissage u WHERE m.code_mod=u.module and m.dis_cl='$ue' order by u.num_ua";
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
                                            <li><span class="bread-blod">Unités d'apprentissage</span>
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
        <div class="text-center m-b-md custom-login"><h1>LES UNITES D'APPRENTISSAGE</h1></div>
        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Liste d'Unités d'apprentissage</h4>
                            <div class="add-product">
                                <a href="index_enseignant.php?page=add_ua">Ajouter une UA</a>
                            </div><br>
                            <div class="asset-inner">
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <tr>
                                        <th>Module</th>
                                        <th>Image</th>
                                        <th>N°</th>
                                        
                                        <th>Unité d'Apprentissage</th>
                                        
                                        <th>Compétence</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                       
                                        while ($row=mysqli_fetch_assoc($result)) 
                                        {

                                            
                                    echo '
                                    <tr>
                                        <td>Module '.$row["num"].': '.$row["module"].'</td>
                                        <td><img src="'.$row["image"].'" alt="" /></td>
                                        <td><b>UA '.$row["num_ua"].' : </b></td>
                                        
                                        <td><b>'.$row["ua"].'</b></td>';

                                        $cua=addslashes($row["code_ua"]);

                                        $requet="SELECT competence FROM competence_ua WHERE ua='$cua' and ue='$ue'";
                                        $rcp=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

                                    ?>
                                        <td>
                                            <?php
                                                if(mysqli_num_rows($rcp)>0)
                                                {
                                                    while ($comp=mysqli_fetch_assoc($rcp)) {
                                                        echo '- '.$comp["competence"]. '<br>';
                                                    }
                                                }
                                                else{
                                                    echo "--------------------";
                                                }
                                            ?>
                                        </td>

                                        
                                    
                                        <td>
                                            <button data-toggle="tooltip" title="Editer" class="pd-setting-ed"><a href="index_enseignant.php?page=edit_ua&ua=<?=$cua ?>"><i class="fa fa-pencil-square-o" style="color:green" aria-hidden="true"></i></a></button>
                                            <button data-toggle="tooltip" title="Supprimer" class="pd-setting-ed"><a href="index_enseignant.php?page=supp_ua&ua=<?=$cua ?>"><i class="fa fa-trash-o" style="color:red" aria-hidden="true"></i></a></button>
                                        </td>

                                    </tr>
                                    <?php
                                        }
                                    ?>
                                    
                                    
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>