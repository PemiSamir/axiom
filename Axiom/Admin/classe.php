<?php
    
         
        $requet="SELECT * FROM classe order by classe";
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
                                             
                                            <li><span class="bread-blod">Les Classes</span>
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
        <div class="text-center m-b-md custom-login"><h1>LES CLASSES</h1></div>
        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Liste de Classes</h4>
                            <div class="add-product">
                                <a href="home_admin.php?page=add_classe">Ajouter une Classe</a>
                            </div><br>
                            <div class="asset-inner">
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <tr>
                                        <th>Num</th> 
                                        <th>Image</th>
                                        <th>Classe</th>
                                        <th>Classe Précédente</th>
                                        <th>Classe Suivante</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                    $i=0;
                                       
                                        while ($row=mysqli_fetch_assoc($result)) 
                                        { 
                                            $i++;
                                            $clas=$row["classe"];

                                            
                                    echo '
                                    <tr>
                                        <td>'.$i.'</td>
                                        <td><img src="assets/img/product/classe.jpg" alt="" /></td>
                                        <td><b>'.$row["classe"].'</b></td>
                                        <td>'.$row["precedente"].'</td>
                                        <td>'.$row["suivante"].'</td>';
 
                                    ?>
                                        <td>
                                            <button data-toggle="tooltip" title="Aperçu" class="pd-setting-ed"><a href="<home_admin.php?page=classe_eleve&classe=<?=$clas ?>" target="_blank"><i class="fa fa-eye" style="color:blue" aria-hidden="true"></i></a></button>
                                            <button data-toggle="tooltip" title="Ajouter les discipline" class="pd-setting-ed " ><a href="home_admin.php?page=classe_discipline&classe=<?=$clas ?>"><i class="fa fa-pencil-square-o" style="color:green" aria-hidden="true"></i></a></button>
                                            <button data-toggle="tooltip" title="Supprimer" class="pd-setting-ed"><a href="home_admin.php?page=supp_classe&classe=<?=$clas ?>"><i class="fa fa-trash-o" style="color:red" aria-hidden="true"></i></a></button>
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