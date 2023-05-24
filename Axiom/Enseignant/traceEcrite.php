<?php 
         $id_cours=$_SESSION["cours"];

         $lec=$_SESSION["lecon"];
         $ua=$_SESSION["ua"];

          // on selection la leçon pour afficher ses information
            $requet="SELECT num_lec, lecon FROM lecon WHERE id_lecon='$lec'";
            $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
            $lecon=mysqli_fetch_assoc($result);

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
                                            <li><a href="#"><b><span style="color:blue">Nouvelle Leçon</b></span></a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Résumé</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="text-center m-b-md custom-login"><h1>Résumé</h1></div>
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                            
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="chat-discussion" style="height: auto">
                                                   

                                                           <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                      
                                                                <div class="panel-body no-padding">
                                                                    <textarea class="summernote6" name="texte">
                                                                    
                                                                    </textarea>
                                                                    
                                                                </div>

                                                                <div class="form-group-">
                                                                    <label class="text-left control-label" for="username" >Cours Vidéo</label>
                                                                    <div class="file-upload-inner file-upload-inner-right ts-forms">
                                                                        <div class="input append-big-btn">
                                                                            <label class="icon-left" for="append-big-btn">
                                                                                    <i class="fa fa-download"></i>
                                                                                </label>
                                                                            <div class="file-button">
                                                                                Parcourir
                                                                                <input type="file" name="video" required="" onchange="document.getElementById('append-big-btn').value = this.value;">
                                                                            </div>
                                                                            <input type="text" id="append-big-btn" placeholder="      Fichier vidéo">
                                                                        </div>
                                                                    </div>
                                                                </div><br>
                                                                <br>

                                                                <div class="panel-footer">
                                                                    <div class="row">
                                                                        <div class="col-lg-2 col-md-2">
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-7 col-sm-2 col-xs-2"> 
                                                                            <button id="basicSuccessImage" class="btn btn-primary ft-compse" type="submit" name="submit">Enregistrer</button>
                                                                        </div>
                                                                        <button type="button" class="btn btn-custon-rounded-three btn-danger"><a href="index_enseignant.php?page=add_cours"><span style="color:white"> Annuler</span></a></button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                             <?php
                                                                if (isset($_POST['submit'])) {
                                                                    
                                                                    $ecrit = addslashes($_POST['texte']);
                                                                    $source="cours";
                                                                    $nb=0;
                                                                    $nbf=0;

                                                                    //$extension_autorise = array("mp4", "avi","mov","mkv","");
                                                                   
                                                                    if (!empty($_FILES['video'])) {

                                                                        
                                                                        $nb=1;
                                                                        //on selection le max id

                                                                        $reqt= "SELECT max(id_res) FROM ressource";
                                                                        $rest=mysqli_query($con,$reqt) or die("impossible d'exécuter la requet");
                                                                         if(mysqli_num_rows($rest)>0)
                                                                         {
                                                                           $res=mysqli_fetch_assoc($rest);
                                                                           $nb=$nb + (int)$res["max(id_res)"]; 
                                                                         }
                                                                        

                                                                         //on récupère les informations du fichier
                                                                        $video = addslashes($_FILES['video']['tmp_name']);
                                                                        $video_name = addslashes($_FILES['video']['name']);
                                                                        $video_type = $_FILES['video']['type'];
                                                                        $video_taille= $_FILES['video']['size']/ 1024;

                                                                        //on sépare le nom de l'extension 
                                                                        list($nom_v, $ext_v) = explode(".", $video_name);
                                                                        //on sépare le type de l'extension
                                                                        $ext_v=".".$ext_v;
                                                                        //echo $video_taille." t";
                                                                        list($type_v, $ext_j) = explode("/", $video_type);
                                                                        //$type_v= $video_type;
                                                                        //on renomme le fichier
                                                                        $name_fi =$nom_v.$nb.$ext_v;
                                                                        //on déplace le fichier 
                                                                        if(move_uploaded_file($_FILES["video"]["tmp_name"], "upload/video/" . $name_fi))
                                                                            {
                                                                                 $location = "upload/video/" . $name_fi;
                                                                                 $reqt = "INSERT INTO ressource (libelle, type, extension, taille, chemin, prof, classe, ue, source, id_source) values ('$nom_v', '$type_v', '$ext_v', '$video_taille', '$location', '$id', '$classe', '$ue', '$source', '$id_cours')";
                                                                                 $res=mysqli_query($con,$reqt)or die("erreur ".$nom_v." ".$type_v." ".$ext_v." ".$video_taille." ".$location);

                                                                            }
                                                                            else
                                                                            {
                                                                                echo "Taille du fichier trop élévé";
                                                                            }
                                                                       
                                                                        
                                                                    }


                                                                    

                                                                    //$res=mysqli_query($con,"insert into module (code_mod, dis_cl, num, module, description, image)
                                                                      //  values ('$codm','$ue','$num','$nom','$des','$location') ") or die("erreur ".$codm." ".$ue." ".$num." ".$nom." ".$des);

                                                                    $res=mysqli_query($con,"UPDATE cours set trace='$ecrit', video='$nb', fichier='$nbf' where id_cours='$id_cours'") or die("erreur d'update le cours");
                                                                    //echo('<script>location.href = "index_enseignant.php?page=module"</script>');
                                                                    echo('<script>location.href = "index_enseignant.php?page=add_cours"</script>');
                                                                    
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
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="profile-info-inner">
                            <div class="profile-img">
                                <img src="<?php echo $rowua["image"]; ?>" alt="" />
                            </div>
                            <div class="profile-details-hr">
                                
                                
                                <div class="row">

                                    <span style="text-align:center"><h5><b><?php echo 'UA '.$rowua["num_ua"].': '.$rowua["ua"]; ?></b></h5></span>
                                    <span style=""><u>Compétences de l'UA : </u></span><br>
                                    
                                    <?php
                                     if(mysqli_num_rows($crq)>0)
                                      {
                                        while ($compua=mysqli_fetch_assoc($crq)) {
                                            echo'<b> - </b>'.$compua["competence"].'<br>';  
                                         }
                                     }
                                    ?>

                                    <br><span style="text-align:center"><h5><u><b><?php echo 'UE '.$lecon["num_lec"].': '.$lecon["lecon"]; ?></b></u></h5></span>
                                    <span style=""><u>Compétences visées : </u></span><br>
                                    
                                    <?php
                                     if(mysqli_num_rows($cpue)>0)
                                      {
                                        while ($compue=mysqli_fetch_assoc($cpue)) {
                                            echo'<b> - </b>'.$compue["competence_lec"].'<br>';  
                                         }
                                     }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>