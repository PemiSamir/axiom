        <?php

            $lec=$_GET["le"];
            $ua=$_GET["ua"];
            $id_cours=$_GET["id_cours"];

                
                $requet="SELECT d.discipline FROM discipline_classe dc, discipline d WHERE d.code_dis=dc.discipline and dc.code='$ue'";
            $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
            $disp=mysqli_fetch_assoc($result);

             // on selectionne l'UA
                $requet="SELECT  num_ua, ua, image, module FROM unite_apprentissage WHERE code_ua='$ua'";
                $rcp=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
                $rowua=mysqli_fetch_assoc($rcp);
                $mod= $rowua["module"];

                //on sélectionne le module
                $requet="SELECT  num, module FROM module WHERE code_mod='$mod'";
                $rmod=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
                $rowmod=mysqli_fetch_assoc($rmod);

                //on vérifie si la leçon à déjà été faite  
                $requet="SELECT id_f FROM lecon_faite WHERE lecon='$lec' and eleve='$id_eleve' and cour='$id_cours' and ue='$ue' and classe='$classe'";
                $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requetggff");
                if (mysqli_num_rows($result)==0) 
                {
                    $requet="INSERT INTO lecon_faite (eleve, lecon, cour, ue, classe) VALUES ('$id_eleve', '$lec', '$id_cours', '$ue', '$classe')";
                    $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet ,j");   
                }

                
                     // on selection la leçon pour afficher ses information
                $requet="SELECT num_lec, lecon, duree FROM lecon WHERE id_lecon='$lec'";
                $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
                $lecon=mysqli_fetch_assoc($result);

                //on selectionne les information du cours
                 $requet="SELECT * FROM cours WHERE id_cours='$id_cours'";
                  $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
                 $cours=mysqli_fetch_assoc($result); 

                 //on sélectionne la video si elle existe
                 if ((int)$cours["video"]!=0) {
                    $vid=$cours["video"];

                    $requet="SELECT * FROM ressource WHERE id_res='$vid'";
                    $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
                    $video=mysqli_fetch_assoc($result); 

                 }

                //on sélectionne les information du prof
                $prof=$cours["prof"];
                $requet="SELECT nom, grade, photo FROM enseignant WHERE id='$prof'";
                $rpr=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
                $ens=mysqli_fetch_assoc($rpr); 

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
                                            <li><a href="home_eleve.php?page=programme&ue=<?=$ue ?>"><b><span style="color:blue">Programme</span></b></a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Resumé vidéo</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="text-center m-b-md custom-login"><h1><?php echo $disp["discipline"].' -- Leçon '.$lecon["num_lec"].': '.$lecon["lecon"]; ?></h1></div>
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">

                        <div class="product-payment-inner-st">

                            <div class="text-center m-b-md custom-login"><h3 style="color:">Resumé Vidéo</h3></div>
                            <?php
                             if ((int)$cours["video"]!=0) {
                            ?>
                                 <video controls src="<?php echo $video["chemin"]; ?>" style="width:740px; height:450px"> Vous allez faire sans la Video </video>
                                 <br> <br>
                            <?php
                            }
                            ?>
                            <br>
                                    <div class="row">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <button class="btn btn-info btn-sm"><a href="home_eleve.php?page=competencesvisees&le=<?=$lec ?>&ua=<?=$ua ?>&id_cours=<?=$id_cours ?>"><span style="color:black"><i class="fa fa-arrow-left"></i> Compétences</span></a></button>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                               
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <button class="btn btn-info btn-sm"><a href="home_eleve.php?page=apercu_cours&le=<?=$lec ?>&ua=<?=$ua ?>&id_cours=<?=$id_cours ?>"><span style="color:black">Resumé Ecrit <i class="fa fa-arrow-right"></i></span></a></button>
                                            </div>
                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                                   
                                            </div>
                                    </div><br>
                        </div>
                    </div>

                    
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                        
                            <div class="profile-info-inner">
                                <span style="text-align:center; font-family:Times new roman"><h5><b><?php echo 'MODULE '.$rowmod["num"].' : '.$rowmod["module"]; ?></b></h5></span>
                                <span style="text-align:center; font-family:Times new roman"><h5><b><?php echo 'UA '.$rowua["num_ua"].' : '.$rowua["ua"]; ?></b></h5></span>
                                <div class="profile-img">
                                    <img src="upload/img/leçon.png" alt="" />
                                </div>
                                <div class="profile-details-hr">
                                    
                                    
                                    <div class="row">

                                        <span style="text-align:center; font-family:Times new roman"><h4><b><?php echo 'Leçon '.$lecon["num_lec"].': '.$lecon["lecon"]; ?></b></h4></span>
                                        <ul style="font-size:16">
                                             <li><br><span style="text-align:center; font-family:Times new roman"><a href="home_eleve.php?page=rappelPrerequis&le=<?=$lec ?>&ua=<?=$ua ?>&id_cours=<?=$id_cours ?>"><h5>Rappel et Prérequis</h5></a></span></li>
                                            <li><span style="text-align:center; font-family:Times new roman"><a href="home_eleve.php?page=courssituationPB&le=<?=$lec ?>&ua=<?=$ua ?>&id_cours=<?=$id_cours ?>"><h5>Situation Problème</h5></a></span></li>
                                            <li><span style="text-align:center; font-family:Times new roman"><a href="home_eleve.php?page=competencesvisees&le=<?=$lec ?>&ua=<?=$ua ?>&id_cours=<?=$id_cours ?>"><h5>Compétences Visées</h5></a></span></li>
                                            <li><span style="text-align:center; font-family:Times new roman"><a href="#"><h5 style="color:red">Resumé Vidéo</h5></a></span></li>
                                            <li><span style="text-align:center; font-family:Times new roman"><a href="home_eleve.php?page=apercu_cours&le=<?=$lec ?>&ua=<?=$ua ?>&id_cours=<?=$id_cours ?>"><h5>Resumé Ecrit</h5></a></span></li>
                                            <li><span style="text-align:center; font-family:Times new roman"><a href="home_eleve.php?page=courConso&le=<?=$lec ?>&ua=<?=$ua ?>&id_cours=<?=$id_cours ?>"><h5>Exercice d'intégration</h5></a></span></li>
                                        </ul>

                                    </div>
                                </div>
                            
                        </div><br>

                        
                            <div class="profile-info-inner">
                               
                                <div class="profile-details-hr">
                                    
                                    <div class="row">

                                        <div class="row">
                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                                
                                            </div>
                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                                
                                                    <a href="#"><i class="fa fa-bar-chart text-warning"></i></a>
                                                
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                
                                                    Facile
                                                    
                                            </div>
                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                                -
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                
                                                    <?php echo $lecon["duree"]; ?> Heure
                                                    
                                            </div>
                                            
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                              
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                                <span style="text-align:center; font-family:Times new roman"><?php echo 'Mis à jour le '.date("d-m-y", strtotime((string)$cours["Date_modif"])); ?></span>
                                            </div>
                                        </div>
                                       
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                                
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                <div class="profile-hdtc">
                                                    <img class="message-avatar" src="<?php echo $ens["photo"]; ?>" alt="">
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                                <span style="text-align:left; font-family:Times new roman"><h5><?php echo $ens["nom"]; ?></h5><?php echo $ens["grade"]; ?></span>
                                            </div>
                                            
                                        </div>

                                        

                                        <hr>

                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <div class="address-hr">
                                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                                   
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <div class="address-hr">
                                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <div class="address-hr">
                                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                                    
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