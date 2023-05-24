        <?php

            $lec=$_SESSION["lecon"];
            $ua=$_SESSION["ua"];
            $_SESSION["retour"]=1;

            $Today = date('y:m:d');

            if(isset($_GET["new"]) and $_GET["new"]==1)
            {
               //on crée un nouveau cours
                $requet="INSERT INTO cours (lecon, prof, ue, statut, trace) values('$lec', '$id', '$ue', 0, 'rien')";
                $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

                $_GET["new"]=0;
            }

            //on selection l'id du cours: 
            $requet="SELECT max(id_cours) FROM cours";
            $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
            $cours=mysqli_fetch_assoc($result);

            $_SESSION["cours"]=$cours["max(id_cours)"];

            // on selection la leçon pour afficher ses information
            $requet="SELECT num_lec, lecon FROM lecon WHERE id_lecon='$lec'";
            $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
            $lecon=mysqli_fetch_assoc($result);

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
                                            <li><a href="index_enseignant.php?page=lecon"><b><span style="color:blue">Leçons</b></span></a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><a href="index_enseignant.php?page=cours&le=<?=$lec ?>&ua=<?=$ua ?>"><b><span style="color:blue"><?php echo 'UE '.$lecon["num_lec"].': '.$lecon["lecon"]; ?></b></span></a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><a href="#">Nouvelle leçon</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                // on selectionne l'UA
                $requet="SELECT  num_ua, ua, image FROM unite_apprentissage WHERE code_ua='$ua'";
                $rcp=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
                $rowua=mysqli_fetch_assoc($rcp);

                //les compétences de l'UA
                $requet="SELECT competence FROM competence_ua WHERE ua='$ua' and ue='$ue'";
                $crq=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

                //les compétence de l'UE
                $requet="SELECT competence_lec FROM competence_lec WHERE lecon='$lec' and ue='$ue'";
                $cpue=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
            ?>

        <div class="text-center m-b-md custom-login"><h1>Ajouter une leçon</h1></div>
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    
                        
                            

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="product-payment-inner-st">
                                    <br><span style="text-align:center"><h4 style="color:green"><u><b><?php echo 'UE '.$lecon["num_lec"].': '.$lecon["lecon"]; ?></b></u></h4></span>
                                    <span style=""><h4><b>Compétences visées : </b></h4></span>
                                    
                                    <?php
                                     if(mysqli_num_rows($cpue)>0)
                                      {
                                        while ($compue=mysqli_fetch_assoc($cpue)) {
                                            echo'<b> - </b>'.$compue["competence_lec"].'<br>';  
                                         }
                                     }
                                    ?>

                                    <br>
                                     
                                   
                                    <h4 style="text-align:center"> Editez les éléments de la leçon</h4>
                                 
                                   <div class="row">
                                     
                                       <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        </div>

                                       <div class="col-lg-3 col-md-3 col-sm-2 col-xs-2">
                                           <br><a href="index_enseignant.php?page=prerequis"><h4 style="color:blue"> Prerequis </h4></a>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
                                            <br><button data-toggle="tooltip" title="Editer" class="pd-setting-ed"><a href="index_enseignant.php?page=prerequis"><i class="fa fa-pencil-square-o" style="color:green" aria-hidden="true"></i></a></button>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                       <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        </div>
                                        
                                       <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <br><a href="index_enseignant.php?page=situationPB"><h4 style="color:blue">Sitution problème </h4></a>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
                                            <br><button data-toggle="tooltip" title="Editer" class="pd-setting-ed"><a href="index_enseignant.php?page=situationPB"><i class="fa fa-pencil-square-o" style="color:green" aria-hidden="true"></i></a></button>
                                       
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                       <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        </div>

                                       <div class="col-lg-3 col-md-3 col-sm-2 col-xs-2">
                                           <br><a href="index_enseignant.php?page=traceEcrite"><h4 style="color:blue"> Trace Ecrite </h4></a>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
                                            <br><button data-toggle="tooltip" title="Editer" class="pd-setting-ed"><a href="index_enseignant.php?page=traceEcrite"><i class="fa fa-pencil-square-o" style="color:green" aria-hidden="true"></i></a></button>
                                        </div>
                                       
                                    </div>

                                    <div class="row">
                                       <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        </div>

                                       <div class="col-lg-3 col-md-3 col-sm-2 col-xs-2">
                                           <br><a href="index_enseignant.php?page=consolidation"><h4 style="color:blue"> Exercice d'intégration </h4></a>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
                                            <br><button data-toggle="tooltip" title="Editer" class="pd-setting-ed"><a href="index_enseignant.php?page=consolidation"><i class="fa fa-pencil-square-o" style="color:green" aria-hidden="true"></i></a></button>
                                        </div>
                                       
                                    </div>

                                    <div class="row"><br>
                                        
                                        <div class="col-lg-3 col-md-3 col-sm-2 col-xs-2">

                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-2 col-xs-2">
                                            <button type="button" class="btn btn-custon-rounded-two btn-success"><a href="index_enseignant.php?page=cours"><span style="color:white"><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i> Enregistrer</span></a></button>
                                        </div>
                                         <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                            <button type="button" class="btn btn-custon-rounded-three btn-danger"><span style="color:white"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Annuler</span></button>
                                        </div>
                                       
                                </div>
                            </div>

                            
                        
                    </div>
                </div>
            </div>
        </div>
