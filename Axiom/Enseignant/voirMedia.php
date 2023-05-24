<?php
        
        $res=$_GET["res"];
         
        $requet="SELECT * FROM ressource where id_res='$res'";
        $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
        $ressour=mysqli_fetch_assoc($result)

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
                                            <li><a href="index_enseignant.php?page=media"><b><span style="color:blue">Médiathèque</span></b></a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Lire média</span>
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
        <div class="text-center m-b-md custom-login"><h1><?php echo $ressour["libelle"] ; ?></h1></div>
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad addcoursepro">
                                                    <form method="post" class="dropzone dropzone-custom needsclick addlibrary" enctype="multipart/form-data" id="demo1-upload">
                                                        <div class="row">
                                                            
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                               
                                                                <?php
                             if ($ressour["type"]=="video") {
                            ?>
                                 <a href="<?php echo  $ressour["chemin"]; ?>"> Télécharger : <?php echo  $ressour["libelle"]; ?></a><br> <br>
                            <?php
                            }
                            elseif ($ressour["type"]=="application") 
                            {
                                
                                    ?>
                                    <a href="<?php echo  $ressour["chemin"]; ?>"> Télécharger : <?php echo  $ressour["libelle"]; ?></a>
                                    <?php
                                
                            }
                            elseif ($ressour["type"]=="audio") 
                            {       ?>
                               <a href="<?php echo  $ressour["chemin"]; ?>"> Télécharger : <?php echo  $ressour["libelle"]; ?></a>
                                <?php
                            }
                            elseif ($ressour["type"]=="image") {
                              
                                ?>
                                    <img src="<?php echo  $ressour["chemin"]; ?>">  
                                     <?php
                            }
                                    ?>
                            <br>
                                                                
                                                            </div>
 
                                                        
                        

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>