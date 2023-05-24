<?php
    
        //selecion des discipline du departement de cette classe
        $requet="SELECT * FROM module WHERE dis_cl='$ue' order by num";
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
                                            <li><span class="bread-blod">Modules</span>
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
        <div class="text-center m-b-md custom-login"><h1>LES MODULES</h1></div>
        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Liste des modules</h4>
                            <div class="add-product">
                                <a href="index_enseignant.php?page=add_module">Ajouter un Module</a>
                            </div><br>
                            <div class="asset-inner">
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <tr>
                                        <th>Num</th>
                                        <th>Code</th>
                                        <th>Image</th>
                                        <th>Module</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                       
                                        while ($row=mysqli_fetch_assoc($result)) 
                                        {

                                            
                                    echo '
                                    <tr>
                                        <td>Module '.$row["num"].'</td>
                                        <td>'.$row["code_mod"].'</td>
                                        <td><img src="'.$row["image"].'" alt="" /></td>
                                        <td><b>'.$row["module"].'</b></td>
                                        <td>'.$row["description"].'</td>';

                                        $mod=$row["code_mod"];
                                        
                                    ?>
                                        <td>
                                            <button data-toggle="tooltip" title="Editer" class="pd-setting-ed " ><a href="index_enseignant.php?page=edit_module&module=<?=$mod ?>"><i class="fa fa-pencil-square-o" style="color:green" aria-hidden="true"></i></a></button>
                                            <button data-toggle="tooltip" title="Supprimer" class="pd-setting-ed"><a href="index_enseignant.php?page=supp_module&module=<?=$mod ?>"><i class="fa fa-trash-o" style="color:red" aria-hidden="true"></i></a></button>
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