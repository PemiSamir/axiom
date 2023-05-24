<?php

    $exo=$_GET["exo"];
    $ress=$_GET["res"];

    $requet="SELECT * FROM ressource WHERE id_res='$ress'";
    $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
    $ressour=mysqli_fetch_assoc($result); 
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
                                            <li><a href="home_eleve.php?page=mesCours"><b><span style="color:blue">Mes Cours</span></b></a> <span class="bread-slash">/</span>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="text-center m-b-md custom-login"><h1>Rémédiation</h1></div>
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="product-payment-inner-st">

                            
                            <?php
                             if ($ressour["type"]=="video") {
                            ?>
                                 <video controls src="<?php echo  $ressour["chemin"]; ?>" style="width:840px; height:450px"> Vous allez faire sans la Video </video>
                                 <br> <br>
                            <?php
                            }
                            elseif ($ressour["type"]=="application") 
                            {
                                if ($ressour["extension"]==".pdf") 
                                {
                                    ?>
                                    <div class="pdf-viewer-area mg-b-15">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <div class="pdf-single-pro">
                                                        <a class="media" href="<?php echo  $ressour["chemin"]; ?>"></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                
                                    <?php
                                }
                                else 
                                {
                                    ?>
                                    <a href="<?php echo  $ressour["chemin"]; ?>"> Télécharger : <?php echo  $ressour["libelle"]; ?></a>
                                    <?php
                                }
                            }
                            elseif ($ressour["type"]=="audio") 
                            {       ?>
                               <audio src="<?php echo  $ressour["chemin"]; ?>" controls>
                                <?php
                            }
                            else
                            {
                                ?>
                                    <a href="<?php echo  $ressour["chemin"]; ?>"> Télécharger : <?php echo  $ressour["libelle"]; ?></a>
                                    <?php
                            }
                                    ?>
                            <br>
                              <!--button class="btn btn-info btn-sm"><a href="home_eleve.php?page=refaire_exo&exo=<?=$exo ?>"><span style="color:black">Refaire l'Exercice</span></a></button-->      
                        </div>
                    </div>

                </div>
            </div>
        </div>