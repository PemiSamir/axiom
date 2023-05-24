<?php
    
        //selecion des discipline du departement de cette classe
        $requet="SELECT u.code_ua, u.num_ua, u.ua FROM unite_apprentissage u, module m WHERE m.code_mod=u.module and m.dis_cl='$ue' order by u.num_ua";
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
                                            <li><a href="index_enseignant.php?page=ue">UE</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Ajouter une UE</span>
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
        <div class="text-center m-b-md custom-login"><h1>AJOUTER UNE UNITE D'ENSEIGNEMENT</h1></div>
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
                                                    <form method="post" class="dropzone dropzone-custom needsclick addlibrary" id="demo1-upload">
                                                        <div class="row">
                                                            
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label class="text-left control-label" for="username" >Unité d'apprentissage <span style="color:red">*</span></label>
                                                                    <select name="ua" required="" class="form-control">
                                                                        <?php
                                                                            if(mysqli_num_rows($result)>0)
                                                                            {
                                                                                while ($row=mysqli_fetch_assoc($result)) {
                                                                        ?>
                                                                                <option value="<?php echo $row['code_ua'];?>">UA <?php echo $row['num_ua'].': '.$row['ua'];?></option>
                                                                        <?php       
                                                                                }
                                                                            }
                                                                           
                                                                        ?>
                                                                        <!--option value="" selected=""></option--> 
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="text-left control-label" for="username" >N° de l'UE <span style="color:red">*</span></label>
                                                                    <input name="num" type="text" class="touchspin1" required="" placeholder="Number of UE">
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label class="text-left control-label" for="username" >Intitule de l'UE <span style="color:red">*</span></label>
                                                                    <input name="nom" type="text" class="form-control" required="" placeholder="Name of UE">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="text-left control-label" for="username" >Durée de l'UE (en heure) <span style="color:red">*</span></label>
                                                                    <input name="dure" type="text" class="touchspin1" required="" placeholder="exemple: 1">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="text-left control-label" for="username" >Type <span style="color:red">*</span></label>
                                                                    <select name="type" required="" class="form-control">
                                                                       
                                                                        <option value="theorique">Théorique</option>
                                                                        <option value="pratique">Pratique</option>
                                                                        <!--option value="" selected=""></option--> 
                                                                    </select>
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label class="text-left control-label" for="username" >Compétences de l'UE (une compétence au moins est exigée)</label>
                                                                    <input name="comp1" type="text" class="form-control" required="" placeholder="1iere compétence *"><br>
                                                                    <input name="comp2" type="text" class="form-control" placeholder="2ieme compétence "><br>
                                                                    <input name="comp3" type="text" class="form-control" placeholder="3ieme compétence "><br>
                                                                    <input name="comp4" type="text" class="form-control" placeholder="4ieme compétence "><br>
                                                                    <input name="comp5" type="text" class="form-control" placeholder="5ieme compétence ">
                                                                </div>
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>

                        <?php
                            if (isset($_POST['submit'])) {
                               
                               $num = (int)$_POST['num'];
                                $ua = addslashes($_POST['ua']);
                                $nomue = addslashes($_POST['nom']);
                                $dur=(int)$_POST['dure'];
                                $typ=addslashes($_POST['type']);

                                $res=mysqli_query($con,"INSERT INTO lecon (ua, ue, num_lec, lecon, duree, type) values ('$ua','$ue','$num','$nomue','$dur','$typ') ") or die("erreur lors de  l'insertion de la leçon ".$ua." ".$ue." ".$num." ".$nomue." ".$dur);

                                //on recupere l'id de la lecon qu'on vient d'inserer
                                $res=mysqli_query($con,"SELECT max(id_lecon) FROM lecon") or die("erreur lors de la selection de l'id de la leçon");
                                $le=mysqli_fetch_assoc($res);
                                $id_l=(int)$le["max(id_lecon)"];

                                //insertion des compétences
                                $compt=addslashes($_POST['comp1']);
                                $res=mysqli_query($con, "INSERT INTO competence_lec (lecon, ue, competence_lec) VALUES ('$id_l','$ue','$compt') ") or die("erreur insertion competence ".$id_l." ".$ue." ".$compt);

                                if (isset($_POST['comp2']) and !(empty($_POST['comp2'])) and $_POST['comp2'] != "" and $_POST['comp2'] != " ") {
                                    $compt=addslashes($_POST['comp2']);
                                    $res=mysqli_query($con, "INSERT INTO competence_lec (lecon, ue, competence_lec) VALUES ('$id_l','$ue','$compt') ") or die("erreur insertion competence ".$id_l." ".$ue." ".$compt);
                                }

                                if (isset($_POST['comp3']) and !(empty($_POST['comp3'])) and $_POST['comp3'] != "" and $_POST['comp3'] != " ") {
                                    $compt=addslashes($_POST['comp3']);
                                    $res=mysqli_query($con, "INSERT INTO competence_lec (lecon, ue, competence_lec) VALUES ('$id_l','$ue','$compt') ") or die("erreur insertion competence ".$id_l." ".$ue." ".$compt);
                                }

                                if (isset($_POST['comp4']) and !(empty($_POST['comp4'])) and $_POST['comp4'] != "" and $_POST['comp4'] != " ") {
                                    $compt=addslashes($_POST['comp4']);
                                    $res=mysqli_query($con, "INSERT INTO competence_lec (lecon, ue, competence_lec) VALUES ('$id_l','$ue','$compt') ") or die("erreur insertion competence ".$id_l." ".$ue." ".$compt);
                                }

                                if (isset($_POST['comp5']) and !(empty($_POST['comp5'])) and $_POST['comp5'] != "" and $_POST['comp5'] != " ") {
                                    $compt=addslashes($_POST['comp5']);
                                    $res=mysqli_query($con, "INSERT INTO competence_lec (lecon, ue, competence_lec) VALUES ('$id_l','$ue','$compt') ") or die("erreur insertion competence ".$id_l." ".$ue." ".$compt);
                                }
                                echo('<script>location.href = "index_enseignant.php?page=ue"</script>');
                                
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
            </div>
        </div>