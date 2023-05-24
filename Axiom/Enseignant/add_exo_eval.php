    <?php  
       $id_eval=$_GET["eval"];

       $requet="SELECT id_cl, competence_lec FROM competence_lec WHERE ue='$ue'";
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
                                            <li><a href="index_enseignant.php?page=evaluation"><b><span style="color:blue">Liste d'evalution</span></b></a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><a href="index_enseignant.php?page=exo_eval&eval=<?=$id_eval ?>"><b><span style="color:blue">Les Exercices</span></b></a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><a href="#">Ajouter Exercice</a> 
                                            </li>
                                             
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<div class="text-center m-b-md custom-login"><h1>Ajouter un exercice à l'évaluation</h1></div>
<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                           
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="hpanel email-compose">
                            
                            <div class="panel-heading hbuilt">
                                <div class="p-xs">
                                    <form method="post" class="form-horizontal">
                                        
                                        <div class="panel-body no-padding">
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="form-group">
                                                        <label class="text-left control-label" for="username" >Intitule de l'exercice <span style="color:red">*</span></label>
                                                        <input name="intitule" type="text" class="form-control" required="" placeholder=" ">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="text-left control-label" for="username" >Compétences évaluées <span style="color:red">*</span></label>
                                                        <select select data-placeholder="Selectionner les compétences" class="chosen-select" multiple="" tabindex="-1" name="competence[]">
                                                          <?php
                                                            if(mysqli_num_rows($result)>0)
                                                            {
                                                                while ($row=mysqli_fetch_assoc($result)) {
                                                                    ?>
                                                                    <option value="<?php echo $row['id_cl'];?>"><?php echo $row['competence_lec'];?></option>
                                                                    <?php       
                                                                }
                                                            }
                                                                           
                                                         ?>
                                                                         
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="text-left control-label" for="username" >Niveau de difficulté <span style="color:red">*</span></label>
                                                        <select name="niveau" required="" class="form-control">
                                                            <option value="Amateur">Amateur</option>
                                                            <option value="Moyen">Moyen</option> 
                                                            <option value="Expert">Expert</option>      
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="p-xs h4">
                                                Enoncé
                                            </div>
                                            <textarea class="summernote6" name="texte">
                                            
                                            </textarea>
                                            <br>Ajouter des questions<br>
                                        </div>

                                        <br>

                                        <div id="cible">
                            
                            
                                        </div>

                                        <input type="text" name="typexo" class="hidden" value="Eval">
                                        <div class="btn-group">
                                            <button class="btn btn-success"><i class="icon-signin icon-large"></i>&nbsp;+ Question</button>
                                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#student" role="button" onclick="addQts('QCM','cible')">&nbsp;QCM</a></li>
                                                <li><a href="#teacher" role="button"  onclick="addQts('VF','cible')">&nbsp;Vrai ou Faux</a></li>
                                                <li><a href="#student" role="button"  onclick="addQts('QRO','cible')">&nbsp;à Réponse Ouverte</a></li>
                                            </ul>
                                        </div>

                                        <br><br>
                                        <div class="panel-footer">
                                
                                
                                <button id="basicSuccessImage" class="btn btn-primary ft-compse" type="submit" name="submit">Enregistrer</button>
                                
                            </div>
                                    </form>
                                </div>
                            </div>
                            
                            
                        </div>

                        <?php
                            if (isset($_POST['submit'])) {
                                $enonce = addslashes($_POST['texte']);
                                $typ=$_POST["typexo"];
                                $intitule=addslashes($_POST["intitule"]);
                                $niveau=$_POST["niveau"];
                                
 

                                $res=mysqli_query($con,"insert into exercice (enoncer,ue,type,niveau,intitule,source,prof) values ('$enonce','$ue','$typ','$niveau','$intitule','$id_eval','$id') ") or die("erreur j b".$enonce." ".$ue);

                                //on insère les compétences de l'exercice
                                $requet="SELECT max(id_exo) FROM exercice";
                                     $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
                                     $r=mysqli_fetch_assoc($result); 

                                     $exo=(int)$r["max(id_exo)"];

                                foreach ($_POST["competence"] as $comp) 
                                {
                                    $comp1=(int)$comp;
                                    $res=mysqli_query($con,"insert into exo_comp (exo, comp) values ('$exo','$comp1') ") or die("erreur ");
                                }

                                //inserer les questions dans la bd
                                if (isset($_POST["nbqst"])) {

                                    
                                     //le nombre de question
                                    $nb=(int)$_POST["nbqst"];

                                    //total point de l'exercice
                                    $tpt=0;

                                    for ($i=1; $i <=$nb ; $i++) { 

                                        //nbr de point de la question 
                                        $pt=(int)$_POST["point_".$i];
                                        $tpt=$tpt + $pt;

                                        if ($_POST["typeQst_".$i]=="QCM") {

                                            $typeQst=addslashes($_POST["typeQst_".$i]);

                                            $question=addslashes($_POST["question_".$i]);
                                            $commentaire=addslashes($_POST["com_".$i]);

                                            $prop1=addslashes($_POST["prop1_".$i]);
                                            $prop2=addslashes($_POST["prop2_".$i]);
                                            $prop3=addslashes($_POST["prop3_".$i]);
                                            $prop4=addslashes($_POST["prop4_".$i]);

                                            $rep=addslashes($_POST["reponse_".$i]);
                                            if ($rep=="A") {
                                                $reponse=$prop1;
                                            }
                                            elseif ($rep=="B") {
                                                $reponse=$prop2;                                            
                                            }
                                            elseif ($rep=="C") {
                                                $reponse=$prop3;
                                            }
                                            elseif ($rep=="D") {
                                                $reponse=$prop4;
                                            }

                                            $res=mysqli_query($con,"insert into question (exo, ue, type, question, commentaire, reponse, prop1, prop2, prop3, prop4, point) VALUES('$exo','$ue','$typeQst','$question','$commentaire','$reponse','$prop1','$prop2','$prop3','$prop4', '$pt') ") or die("erreur ".$question." ".$reponse);

                                        }

                                        if ($_POST["typeQst_".$i]=="VF") {
                                            
                                            $typeQst=addslashes($_POST["typeQst_".$i]);
                                            $question=addslashes($_POST["question_".$i]);
                                            $commentaire=addslashes($_POST["com_".$i]);

                                            $prop1="VRAI";
                                            $prop2="FAUX";
                                            $reponse=$_POST["reponse_".$i];

                                            $res=mysqli_query($con,"insert into question (exo, ue, type, question, commentaire, reponse, prop1, prop2, point) VALUES('$exo','$ue','$typeQst','$question','$commentaire','$reponse','$prop1','$prop2','$pt') ") or die("erreur ".$question." ".$reponse);
                                        }

                                        if ($_POST["typeQst_".$i]=="QRO") {
                                            
                                            $typeQst=addslashes($_POST["typeQst_".$i]);
                                            $question=addslashes($_POST["question_".$i]);
                                            $commentaire=addslashes($_POST["com_".$i]);

                                           $reponse=$_POST["reponse_".$i];

                                           $res=mysqli_query($con,"insert into question (exo, ue, type, question, commentaire, reponse, point) VALUES('$exo','$ue','$typeQst','$question','$commentaire','$reponse','$pt') ") or die("erreur ".$question." ".$reponse);
                                        }
                                    }
                                      //on ajoute le nombre de points à l'exercice
                                     $result=mysqli_query($con, "UPDATE exercice set point='$tpt' WHERE id_exo='$exo'") or die("impossible d'exécuter la requet");

                                        //on ajoute le nombre de point de l'évaluation
                                     $requet="SELECT total_point FROM evaluation WHERE id_eval='$id_eval' and ue='$ue' ";
                                     $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet kk");
                                     $poinp=mysqli_fetch_assoc($result);
                                     $poin_eval = (int)$poinp["total_point"] + $tpt;

                                     $result=mysqli_query($con, "UPDATE evaluation set total_point='$poin_eval' WHERE id_eval='$id_eval'") or die("impossible d'exécuter la requet");

                                }

                                echo('<script>history.go(-1)</script>');
                                
                              }
                            ?>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <script type="text/javaScript">
            var i=1;
            function addQts(type,cible)
            { 
               
                var contenu=document.getElementById(cible).innerHTML;
                if (type=="QCM") {
                    contenu=contenu+'<hr><hr><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="form-group">Question '+i+' <span style="color:red">*</span><textarea name="question_'+i+'" class="form-control" placeholder="saisissez la question ici"></textarea></div> <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class="form-group-inner"><div class="row"><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">A: </div><div class="col-lg-10 col-md-10 col-sm-10 col-xs-12"><input type="text" name="prop1_'+i+'" class="form-control"></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"><input name="reponse_'+i+'" value="A" type="radio"></div></div></div><div class="form-group-inner"><div class="row"><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">B: </div><div class="col-lg-10 col-md-10 col-sm-10 col-xs-12"><input type="text" name="prop2_'+i+'" class="form-control"></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"><input name="reponse_'+i+'" value="B" type="radio"></div></div></div><div class="form-group-inner"><div class="row"><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">C: </div><div class="col-lg-10 col-md-10 col-sm-10 col-xs-12"><input type="text" name="prop3_'+i+'" class="form-control"></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"><input name="reponse_'+i+'" value="C" type="radio"></div></div></div><div class="form-group-inner"><div class="row"><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">D: </div><div class="col-lg-10 col-md-10 col-sm-10 col-xs-12"><input type="text" name="prop4_'+i+'" class="form-control"></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"><input name="reponse_'+i+'" value="D" type="radio"></div></div></div></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div><div class="col-lg-5 col-md-5 col-sm-5 col-xs-12"><div class="form-group">Commentaire<textarea name="com_'+i+'" class="form-control" placeholder="commenter la question après le choix de la réponse"></textarea></div><div class="form-group">Nombre de point <span style="color:red">*</span> <input name="point_'+i+'" type="number" class="form-control required="" placeholder=""></div></div><input type="text" name="typeQst_'+i+'" class="hidden" value="QCM"></div></div><br><br>';
                }
                if (type=="VF") {
                    contenu=contenu+'<hr><hr><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="form-group">Question '+i+' <span style="color:red">*</span><textarea name="question_'+i+'" class="form-control" placeholder="saisissez la question ici"></textarea></div> <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><div class="form-group-inner"><div class="row"><div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">Vrai: </div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"><input name="reponse_'+i+'" value="VRAI" type="radio"></div></div></div><div class="form-group-inner"><div class="row"><div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">Faux: </div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"><input name="reponse_'+i+'" value="FAUX" type="radio"></div></div></div></div><div class="col-lg-7 col-md-7 col-sm-7 col-xs-12"><div class="form-group">Commentaire<textarea  class="form-control" name="com_'+i+'"  placeholder="commenter la question après le choix de la réponse"></textarea></div><div class="form-group">Nombre de point <span style="color:red">*</span> <input name="point_'+i+'" type="number" class="form-control required="" placeholder=""></div></div><input type="text" name="typeQst_'+i+'" class="hidden" value="VF"></div></div><br><br>';
                }
                if (type=="QRO") {
                    contenu=contenu+'<hr><hr><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="form-group">Question '+i+' <span style="color:red">*</span><textarea name="question_'+i+'" class="form-control" placeholder="Question à réponse Ouverte : la réponse devra être saisie"></textarea></div><div class="form-group-inner"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Eléments de réponse <span style="color:red">*</span><input type="text" name="reponse_'+i+'" class="form-control" placeholder="les termes à retrouver dans la réponse exp: système,numerique,analyser"></div></div></div><div class="col-lg-5 col-md-5 col-sm-5 col-xs-12"><div class="form-group">Commentaire<textarea name="com_'+i+'" class="form-control" placeholder="commenter la question après la réponse de la réponse"></textarea></div><div class="form-group">Nombre de point <span style="color:red">*</span> <input name="point_'+i+'" type="number" class="form-control required="" placeholder=""></div></div><input type="text" name="typeQst_'+i+'" class="hidden" value="QRO"></div></div><br><br>';
                }
                
                contenu=contenu+'<input type="text" name="nbqst" class="hidden" value="'+i+'">';
                                     
                document.getElementById(cible).innerHTML=contenu;
                i++;
            }

           
        </script>