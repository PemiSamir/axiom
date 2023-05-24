    <?php       
       $requet="SELECT id_c, competence FROM competence_ua WHERE ue='$ue'";
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
                                            <li><a href="#">Ajouter Evaluation</a> <span class="bread-slash">/</span>
                                            </li>
                                             
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<div class="text-center m-b-md custom-login"><h1>Ajouter une évaluation</h1></div>
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
                                                        <label class="text-left control-label" for="username" >Intitule de l'évaluation <span style="color:red">*</span></label>
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
                                                                    <option value="<?php echo $row['id_c'];?>"><?php echo $row['competence'];?></option>
                                                                    <?php       
                                                                }
                                                            }
                                                                           
                                                         ?>
                                                                         
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="text-left control-label" for="username" >Type d'évaluation<span style="color:red">*</span></label>
                                                        <select name="type" required="" class="form-control">
                                                            <option value="Normale">Normale</option>
                                                            <option value="Finale">Finale</option>    
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                                    <label class="text-left control-label" for="username" >Durée de l'évaluation (en minute)<span style="color:red">*</span></label>
                                                                    <input name="duree" type="text" class="touchspin1" required="" placeholder="Exemple: 40">
                                                                </div>
                                                </div>
                                            </div>

                                        </div>

                                        <br>

                                      
                                       

                                        <br>
                                        <div class="panel-footer">
                                
                                
                                <button id="basicSuccessImage" class="btn btn-primary ft-compse" type="submit" name="submit">Enregistrer</button>
                                
                            </div>
                                    </form>
                                </div>
                            </div>
                            
                            
                        </div>

                        <?php
                            if (isset($_POST['submit'])) 
                            {
                                
                                $intitule=addslashes($_POST["intitule"]);
                                $type=$_POST["type"];
                                $duree=(int)$_POST["duree"];


                                $res=mysqli_query($con,"insert into evaluation (prof,ue,type,intitule_eval,duree_eval) values ('$id','$ue','$type','$intitule','$duree') ") or die("erreur j b");

                                //on insère les compétences de l'exercice
                                $requet="SELECT max(id_eval) FROM evaluation";
                                     $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
                                     $r=mysqli_fetch_assoc($result); 

                                     $eval=(int)$r["max(id_eval)"];

                                foreach ($_POST["competence"] as $comp) 
                                {
                                    $comp1=(int)$comp;
                                    $res=mysqli_query($con,"insert into eval_competence (eval, comp) values ('$eval','$comp1') ") or die("erreur ");
                                }

                                  echo('<script>location.href = "index_enseignant.php?page=evaluation"</script>');
                                
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

      