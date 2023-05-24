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
                                            <li><span class="bread-blod">Ajouter un média</span>
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
        <div class="text-center m-b-md custom-login"><h1>AJOUTER UN MEDIA</h1></div>
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
                                                                 
                                                                <div class="form-group">
                                                                    <label class="text-left control-label" for="username" >intitulé <span style="color:red">*</span></label>
                                                                    <input name="libelle" type="text" class="form-control" required="" placeholder="Nom du média ">
                                                                </div>

                                                                <div class="form-group res-mg-t-15">
                                                                    <label class="text-left control-label" weidth="10" for="username" >Description <span style="color:red">*</span></label>
                                                                    <textarea name="description" placeholder="Description"></textarea>
                                                                </div>

                                                                <div class="form-group-">
                                                                    <label class="text-left control-label" for="username" >Fichier <span style="color:red">*</span></label>
                                                                    <div class="file-upload-inner file-upload-inner-right ts-forms">
                                                                        <div class="input append-big-btn">
                                                                            <label class="icon-left" for="append-big-btn">
                                                                                    <i class="fa fa-download"></i>
                                                                                </label>
                                                                            <div class="file-button">
                                                                                Parcourir
                                                                                <input type="file" name="video" onchange="document.getElementById('append-big-btn').value = this.value;">
                                                                            </div>
                                                                            <input type="text" id="append-big-btn" placeholder="    no file selected" name="voir">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
 
                                                        </div>
                                                        <div class="row"><br>
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>

                        <?php
                                                                if (isset($_POST['submit'])) {
                                                                    
                                                                    $nom = addslashes($_POST['libelle']);
                                                                    $des=addslashes($_POST['description']);
                                                                    

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
                                                                                 $reqt = "INSERT INTO ressource (libelle, type, extension, taille, chemin, prof, classe, ue, description ) values ('$nom_v', '$type_v', '$ext_v', '$video_taille', '$location', '$id', '$classe', '$ue', '$des' )";
                                                                                 $res=mysqli_query($con,$reqt)or die("erreur ".$nom_v." ".$type_v." ".$ext_v." ".$video_taille." ".$location);

                                                                            }
                                                                            else
                                                                            {
                                                                                echo "Taille du fichier trop élévé";
                                                                            }
                                                                       
                                                                        
                                                                    }
 
                                                                    echo('<script>location.href = "index_enseignant.php?page=media"</script>');
                                                                    
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