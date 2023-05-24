        <?php

            $lec=$_GET["le"];
            $ua=$_GET["ua"];
            $id_cours=$_GET["id_cours"];
            $ide=0;
          
             // on selectionne l'UA
                $requet="SELECT  num_ua, ua, image, module FROM unite_apprentissage WHERE code_ua='$ua'";
                $rcp=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
                $rowua=mysqli_fetch_assoc($rcp);
                $mod= $rowua["module"];

                //on sélectionne le module
                $requet="SELECT  num, module FROM module WHERE code_mod='$mod'";
                $rmod=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
                $rowmod=mysqli_fetch_assoc($rmod);

                //les compétences de l'UA
                $requet="SELECT competence FROM competence_ua WHERE ua='$ua' and ue='$ue'";
                $crq=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

                //les compétence de l'UE
                $requet="SELECT competence_lec FROM competence_lec WHERE lecon='$lec' and ue='$ue'";
                $cpue=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

                 // on selection la leçon pour afficher ses information
            $requet="SELECT num_lec, lecon, duree FROM lecon WHERE id_lecon='$lec'";
            $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
            $lecon=mysqli_fetch_assoc($result);

            //on selectionne les information du cours
             $requet="SELECT * FROM cours WHERE id_cours='$id_cours'";
              $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
             $cours=mysqli_fetch_assoc($result); 


             
             //on sélectionne les info du prof auteur de la leçon
             $prof=$cours["prof"];
             $requet="SELECT nom, grade, photo FROM enseignant WHERE id='$prof'";
              $rpr=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
             $ens=mysqli_fetch_assoc($rpr); 

             //on sélectionne l'exercice
              $requet="SELECT * FROM exercice WHERE source='$id_cours' and type='prerequis'";
              $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
             $exercice=mysqli_fetch_assoc($result);

             //on sélectionne les questions
             $exo=$exercice["id_exo"];
             $requet="SELECT * FROM question WHERE exo='$exo' order by id_qst";
              $resut=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
             
             // on vérifie si l'exercice à déjà été traité
              $requet="SELECT * FROM rep_exo WHERE exo='$exo' and eleve='$ide'";
              $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
              $soumit=0;
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
                                            <li><span class="bread-blod">Compose Mail</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="text-center m-b-md custom-login"><h1><?php echo 'Leçon '.$lecon["num_lec"].': '.$lecon["lecon"]; ?></h1></div>
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="product-payment-inner-st">
                            <div class=" m-b-md custom-login"><h3 style="color:">Rappel et Prérequis</h3></div><br>
                            
                            <?php  

                                  

                            if(mysqli_num_rows($result)==0) 
                            {
                                $soumit=1;
                                echo $exercice['enoncer'];

                                ?>
                                <br>
                                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                    
                                <?php  
                                    $i=0;

                                   
                                        
                                    
                                        while ($question=mysqli_fetch_assoc($resut)) {
                                            //echo $question["question"];  
                                            $i++;
                                            
                                                echo '<h4>'.$i.'. '.$question["question"].' '.' &nbsp;('.$question["point"].'pt)</h4>';
                                                ?>

                                                <input type="text" name="quest_<?php echo $i; ?>" class="hidden" value="<?php echo $question["id_qst"]; ?>">

                                                <input type="text" name="type_<?php echo $question["id_qst"]; ?>" class="hidden" value="<?php echo $question["type"]; ?>">

                                                <input type="text" name="reponse_<?php echo $question["id_qst"]; ?>" class="hidden" value="<?php echo $question["reponse"]; ?>">

                                                <input type="text" name="point_<?php echo $question["id_qst"]; ?>" class="hidden" value="<?php echo $question["point"]; ?>">

                                                <input type="text" name="exo_<?php echo $question["id_qst"]; ?>" class="hidden" value="<?php echo $question["exo"]; ?>">
                                            <?php
                                            if ($question["type"]=="QRO") 
                                            {
                                            ?>
                                                <textarea class="form-control" name="eleve_<?php echo $question["id_qst"]; ?>" placeholder="Saisir la réponse"></textarea>

                                                <br>
                                                <?php 
                                            }

                                             if ($question["type"]=="QCM") 
                                            {
                                                ?>
                                                <h5><input name="eleve_<?php echo $question["id_qst"]; ?>" value="<?php echo $question["prop1"]; ?>" type="radio"> A : <?php echo $question["prop1"]; ?></h5>
                                                <h5><input name="eleve_<?php echo $question["id_qst"]; ?>" value="<?php echo $question["prop2"]; ?>" type="radio"> B : <?php echo $question["prop2"]; ?></h5>
                                                <h5><input name="eleve_<?php echo $question["id_qst"]; ?>" value="<?php echo $question["prop3"]; ?>" type="radio"> C : <?php echo $question["prop3"]; ?></h5>
                                                <h5><input name="eleve_<?php echo $question["id_qst"]; ?>" value="<?php echo $question["prop4"]; ?>" type="radio"> D : <?php echo $question["prop4"]; ?></h5>

                                                <br>
                                                <?php 
                                            }

                                             if ($question["type"]=="VF") 
                                            {
                                                ?>
                                                <h5><input name="eleve_<?php echo $question["id_qst"]; ?>" value="<?php echo $question["prop1"]; ?>" type="radio"> <?php echo $question["prop1"]; ?></h5>
                                                <h5><input name="eleve_<?php echo $question["id_qst"]; ?>" value="<?php echo $question["prop2"]; ?>" type="radio"> <?php echo $question["prop2"]; ?></h5>
               
                                                <br>
                                    <?php 
                                            }
                                        } 
                                    
                                    ?>
                                <input type="text" name="nb_question" class="hidden" value="<?php echo $i; ?>">
                                <br><br>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <button class="btn btn-primary ft-compse" type="submit" name="submit"> Soumettre les réponses</button>
                                    </div>
                                </div>
                                                                
                             </form>
                                <?php
                             }

                             else
                             {
                                $exo_fait=mysqli_fetch_assoc($result);

                                if ($exo_fait["note"] < $exo_fait["sur"]/2) 
                                {
                                    $couleur="red";
                                    $appreciat="  MAUVAIS";
                                }
                                elseif ($exo_fait["note"] == $exo_fait["sur"]) 
                                {
                                    $couleur="green";
                                    $appreciat="  FELICITATION";
                                }
                                else
                                {
                                    $couleur="blue";
                                    $appreciat="  PRESQUE";
                                }
                                ?>

                                <div class="text-center m-b-md custom-login"><h3><span style="color:<?php echo $couleur; ?>"><?php echo $exo_fait["note"].'</span> / '.$exo_fait["sur"]; ?></h3></div>
                                <div class="text-center m-b-md custom-login"><h3><span style="color:<?php echo $couleur; ?>"><?php echo $appreciat; ?></span></h3></div>
                               
                                <?php
                                echo $exercice['enoncer'];

                                echo '<br>';

                                $i=0;

                                    while ($question=mysqli_fetch_assoc($resut)) 
                                    {
                                        $i++;
                                        $qt=$question["id_qst"];

                                        // on selection la réponse de l'élève
                                        $requet="SELECT * FROM rep_question WHERE quest='$qt' and eleve='$ide'";
                                        $res=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
                                        $rep=mysqli_fetch_assoc($res);

                                        if ($rep["trouve"]=="Presque") 
                                            {
                                                $coul_rep="indigo";
                                                $message="Vous y étiez presque";
                                                $icon=" ";
                                            }   
                                            elseif ($rep["trouve"]=="NON") 
                                            {
                                                $coul_rep="red";
                                                $message="Mauvaise réponse";
                                                $icon='<i class="fa fa-times edu-danger-error" aria-hidden="true"></i>';
                                            }
                                            elseif ( $rep["trouve"]=="OUI") 
                                            {
                                                $coul_rep="green";
                                                $message="Bonne réponse";
                                                $icon='<i class="fa fa-check edu-checked-pro" aria-hidden="true"></i>';
                                            }

                                        echo '<h4>'.$i.'. '.$question["question"].' '.' &nbsp;(<span style="color:indigo">'.$rep["point"].'</span> / '.$question["point"].')  <span style="color:'.$coul_rep.'">'.$message.'</span></h4>';

                                         

                                        if ($question["type"]=="QRO") 
                                        {
                                            ?>
                                            <span style="color:<?php echo $coul_rep; ?>"> <?php echo $rep["reponse_el"].'  '.$icon ; ?> </span><br>
                                            Eléments de réponse : <span style="color:blue"><?php echo $question["reponse"]; ?></span><br>
                                            <span style="color:">Commentaire : <?php echo $question["commentaire"]; ?></span><br>

                                            <?php
                                        }
                                        elseif ($question["type"]=="QCM") 
                                        {
                                            $lettre='A';

                                            for ($k=1; $k <=4 ; $k++) 
                                            { 
                                                $c="black";
                                                $icon=" ";

                                                if ($question["prop".$k]==$question["reponse"]) {
                                                    $c="blue";
                                                }
                                                if ($question["prop".$k]==$rep["reponse_el"] and $rep["reponse_el"]==$question["reponse"]) {
                                                    $c="green";
                                                    $icon='<i class="fa fa-check edu-checked-pro" aria-hidden="true"></i>';
                                                }
                                                elseif ($question["prop".$k]==$rep["reponse_el"] and $rep["reponse_el"]!=$question["reponse"]) {
                                                    $c="red";
                                                    $icon='<i class="fa fa-times edu-danger-error" aria-hidden="true"></i>';
                                                }

                                                $prop=$question["prop".$k];
                                                echo ' <h5 style="color:'.$c.'" > '.$lettre.' : '.$prop.' '.$icon.'</h5>';
                                                $lettre++;
                                            }

                                            echo '<span style="color:">Commentaire : '.$question["commentaire"].'</span><br>';

                                            
                                        }
                                        elseif ($question["type"]=="VF") 
                                        {
                                        
                                            for ($k=1; $k <=2 ; $k++) 
                                            { 
                                                $c="black";
                                                $icon=" ";

                                                if ($question["prop".$k]==$question["reponse"]) {
                                                    $c="blue";
                                                }
                                                if ($question["prop".$k]==$rep["reponse_el"] and $rep["reponse_el"]==$question["reponse"]) {
                                                    $c="green";
                                                    $icon='<i class="fa fa-check edu-checked-pro" aria-hidden="true"></i>';
                                                }
                                                elseif ($question["prop".$k]==$rep["reponse_el"] and $rep["reponse_el"]!=$question["reponse"]) {
                                                    $c="red";
                                                    $icon='<i class="fa fa-times edu-danger-error" aria-hidden="true"></i>';
                                                }

                                                $prop=$question["prop".$k];
                                                echo ' <h5 style="color:'.$c.'" >  '.$prop.' '.$icon.'</h5>';
                                                
                                            }

                                            echo '<span style="color:">Commentaire : '.$question["commentaire"].'</span><br>';

                                            
                                        }echo "<br>";
                                    
                                    }
                                    ?>

                            

                                    <br>
                                    <div class="row">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <!--button class="btn btn-info btn-sm"><a href="index_enseignant.php?page=resumevideo&le=<?=$lec ?>&ua=<?=$ua ?>&id_cours=<?=$id_cours ?>"><span style="color:black"><i class="fa fa-arrow-left"></i> Resumé vidéo</span></a></button-->
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                               
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <button class="btn btn-info btn-sm"><a href="index_enseignant.php?page=courssituationPB&le=<?=$lec ?>&ua=<?=$ua ?>&id_cours=<?=$id_cours ?>"><span style="color:black">Situation Problème <i class="fa fa-arrow-right"></i></span></a></button>
                                            </div>
                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                                   
                                            </div>
                                    </div>
                                     <?php

                             }

                             ?>

                             <?php
                                if (isset($_POST['submit']) and $soumit==1) 
                                {
                                    $n=(int)$_POST["nb_question"];      // le nombre de question

                                    $total=0;                           // le nombre total de point de l'exercice
                                    $sur=0;
                                    for ($i=1; $i <=$n ; $i++) 
                                    { 
                                        $id_q=(int)$_POST["quest_".$i];     // identifiant de la question
                                        $typeq=$_POST["type_".$id_q];        // type de la question
                                        $juste=$_POST["reponse_".$id_q];    // réponse juste
                                        $repon=addslashes($_POST["eleve_".$id_q]);    // réponse de l'élève
                                        $ex=$_POST["exo_".$id_q];          // identifiant de l'exercice
                                        $point=$_POST["point_".$id_q];      // nombre de point de la question
                                        $trouver="OUI";
                                        $sur=$sur+$point;

                                        if ($typeq=="QCM" or $typeq=="VF") 
                                        {
                                            if ($repon!=$juste) 
                                            {
                                                 $trouver="NON";
                                                 $point=0;
                                            }
                                        }

                                        elseif ($typeq=="QRO") 
                                        {
                                            
                                            $nmc=0;                     // nombre de mots clé
                                            $faux=0;                    // nombre de mots clé ommis par l'élève

                                            $cle=explode(",", $juste);  // on récupère les mots clés dans un tableau

                                            // on recherche les mot clé dans la réponse de l'élève
                                            foreach ($cle as $mot) 
                                            {
                                                $nmc++;

                                                if (stristr($repon, $mot)==FALSE) 
                                                {
                                                   $faux++;
                                                }
                                            }

                                            if ($faux==0) 
                                            {
                                                $trouver="OUI";

                                            }
                                            elseif ($nmc>2 and $faux==1) 
                                            {
                                                $trouver="Presque";
                                                $point=0;
                                            }
                                            else
                                            {
                                                $trouver="NON";
                                                $point=0;
                                            }
                                        }

                                        $requet="INSERT INTO rep_question (eleve, quest, exo, reponse_el, point, trouve) values ('$ide', '$id_q', '$ex','$repon', '$point', '$trouver')";
                                        $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet hhh");
                                        
                                        $total=$total+$point;
                                    }

                                    $requet="INSERT INTO rep_exo (eleve, exo, note, sur) values ('$ide', '$exo', '$total', '$sur')";
                                    $result=mysqli_query($con,$requet) or die("impossible d'exécuter la reque hhhht");
                                    $soumit=0;

                                    echo('<script>history.go(0)</script>');
                                }

                             ?>

                            <br>
                                    <!--div class="row">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <button class="btn btn-info btn-sm"><a href="index_enseignant.php?page=resumevideo&le=<?=$lec ?>&ua=<?=$ua ?>&id_cours=<?=$id_cours ?>"><span style="color:black"><i class="fa fa-arrow-left"></i> Resumé vidéo</span></a></button>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                               
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <button class="btn btn-info btn-sm"><a href="index_enseignant.php?page=courConso&le=<?=$lec ?>&ua=<?=$ua ?>&id_cours=<?=$id_cours ?>"><span style="color:black">Situation Problème <i class="fa fa-arrow-right"></i></span></a></button>
                                            </div>
                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                                   
                                            </div>
                                    </div-->
                            
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
                                            <li><br><span style="text-align:center; font-family:Times new roman"><a href="#"><h5 style="color:red">Rappel et Prérequis</h5></a></span></li>
                                            <li><span style="text-align:center; font-family:Times new roman"><a href="index_enseignant.php?page=courssituationPB&le=<?=$lec ?>&ua=<?=$ua ?>&id_cours=<?=$id_cours ?>"><h5>Situation Problème</h5></a></span></li>
                                            <li><span style="text-align:center; font-family:Times new roman"><a href="index_enseignant.php?page=competencesvisees&le=<?=$lec ?>&ua=<?=$ua ?>&id_cours=<?=$id_cours ?>"><h5>Compétences Visées</h5></a></span></li>
                                            <li><span style="text-align:center; font-family:Times new roman"><a href="index_enseignant.php?page=resumevideo&le=<?=$lec ?>&ua=<?=$ua ?>&id_cours=<?=$id_cours ?>"><h5>Resumé Vidéo</h5></a></span></li>
                                            <li><span style="text-align:center; font-family:Times new roman"><a href="index_enseignant.php?page=apercu_cours&le=<?=$lec ?>&ua=<?=$ua ?>&id_cours=<?=$id_cours ?>"><h5>Resumé Ecrit</h5></a></span></li>
                                            <li><span style="text-align:center; font-family:Times new roman"><a href="index_enseignant.php?page=courConso&le=<?=$lec ?>&ua=<?=$ua ?>&id_cours=<?=$id_cours ?>"><h5>Exercice d'intégration</h5></a></span></li>
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