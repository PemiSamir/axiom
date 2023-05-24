<?php
    
        
        $requet="SELECT * FROM ressource order by date desc";
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
                                             
                                            <li><span class="bread-blod">Médiathèque</span>
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
        <div class="text-center m-b-md custom-login"><h1>LES MEDIAS</h1></div>
        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Liste des médias</h4>
                             <br>
                            <div class="asset-inner">
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <tr>
                                        <th>Num</th>
                                        
                                        <th>Image</th>
                                        <th>Nom</th>
                                        <th>Type</th>
                                        
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                       
                                       $i=0;
                                        while ($row=mysqli_fetch_assoc($result)) 
                                        {

                                            $i++;
                                            if ($row["type"]=="video") 
                                            {
                                                $image="assets/img/product/book-3.jpg";
                                                $typ="Vidéo";
                                            }
                                            elseif ($row["type"]=="audio") 
                                            {
                                                $image="assets/img/product/book-2.jpg";
                                                $typ="Audio";
                                            }
                                            elseif ($row["type"]=="image") 
                                            {
                                                $image=$row["chemin"];
                                                $typ="Image";
                                            }
                                            elseif ($row["type"]=="application") {
                                                $image="assets/img/product/book-1.jpg";
                                                $typ="Document";
                                            }
                                            
                                    echo '
                                    <tr>
                                        <td>'.$i.'</td> 
                                        <td><img src="'.$image.'" alt="" /></td>
                                        <td>'.$row["libelle"].'</td>
                                        <td>'.$typ.'</td>
                                        
                                        <td>'.$row["description"].'</td>
                                        <td>'.date("d-m-y",strtotime((string)$row["date"])).'</td>';

                                        $res=$row["id_res"];
                                        
                                    ?>
                                        <td>
                                            <button data-toggle="tooltip" title="Aperçu" class="pd-setting-ed"><a href="<?php echo  $row["chemin"]; ?>" target="_blank"><i class="fa fa-eye" style="color:blue" aria-hidden="true"></i></a></button>
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