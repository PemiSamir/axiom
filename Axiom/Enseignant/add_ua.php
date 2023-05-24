<?php
    
        //selecion des discipline du departement de cette classe
        $requet="SELECT code_mod, num, module FROM module WHERE dis_cl='$ue' order by num";
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
                                            <li><a href="index_enseignant.php?page=ua">UA</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Ajouter une UA</span>
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
        <div class="text-center m-b-md custom-login"><h1>AJOUTER UNE UNITE D'APPRENTISSAGE</h1></div>
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
                                                            
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label class="text-left control-label" for="username" >Module <span style="color:red">*</span></label>
                                                                    <select name="module" required="" class="form-control">
                                                                        <?php
                                                                            if(mysqli_num_rows($result)>0)
                                                                            {
                                                                                while ($row=mysqli_fetch_assoc($result)) {
                                                                        ?>
                                                                                <option value="<?php echo $row['code_mod'];?>">Module <?php echo $row['num'].': '.$row['module'];?></option>
                                                                        <?php       
                                                                                }
                                                                            }
                                                                           
                                                                        ?>
                                                                        <!--option value="" selected=""></option--> 
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="text-left control-label" for="username" >N° de l'UA <span style="color:red">*</span></label>
                                                                    <input name="num" type="text" class="touchspin1" required="" placeholder="Number of UA">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="text-left control-label" for="username" >Code de  l'UA <span style="color:red">*</span></label>
                                                                    <input name="codeua" type="text" class="form-control" required="" placeholder="exp: UA_RS_5 pour RESEAU de La classe de 5ieme">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="text-left control-label" for="username" >Intitule de l'UA <span style="color:red">*</span></label>
                                                                    <input name="nom" type="text" class="form-control" required="" placeholder="Name of UA">
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                                <div class="form-group">
                                                                    <label class="text-left control-label" for="username" >Compétences de l'UA (une compétence au moins est exigée)</label>
                                                                    <input name="comp1" type="text" class="form-control" required="" placeholder="1iere compétence *"><br>
                                                                    <input name="comp2" type="text" class="form-control" placeholder="2ieme compétence "><br>
                                                                    <input name="comp3" type="text" class="form-control" placeholder="3ieme compétence "><br>
                                                                </div>
                                                                <div class="form-group-">
                                                                    <label class="text-left control-label" for="username" >Image</label>
                                                                    <div class="file-upload-inner file-upload-inner-right ts-forms">
                                                                        <div class="input append-big-btn">
                                                                            <label class="icon-left" for="append-big-btn">
                                                                                    <i class="fa fa-download"></i>
                                                                                </label>
                                                                            <div class="file-button">
                                                                                Parcourir
                                                                                <input type="file" name="image" onchange="document.getElementById('append-big-btn').value = this.value;">
                                                                            </div>
                                                                            <input type="text" id="append-big-btn" placeholder="no file selected" name="voir">
                                                                        </div>
                                                                    </div>
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
                                $cod = addslashes($_POST['codeua']);
                                $mod = addslashes($_POST['module']);
                                $nomua = addslashes($_POST['nom']);


                                if ( !empty($_POST["voir"])) {
                                    $image = addslashes($_FILES['image']['tmp_name']);
                                    $image_name = addslashes($_FILES['image']['name']);
                                    $image_size = getimagesize($_FILES['image']['tmp_name']);

                                    move_uploaded_file($_FILES["image"]["tmp_name"], "upload/img/" . $_FILES["image"]["name"]);
                                    $location = "upload/img/" . $_FILES["image"]["name"];

                                    $res=mysqli_query($con,"INSERT INTO unite_apprentissage (code_ua, module, num_ua, ua,image)
                                    values ('$cod','$mod','$num','$nomua','$location') ") or die("erreur ");
                                }
                                else
                                {
                                    $res=mysqli_query($con,"INSERT INTO unite_apprentissage (code_ua, module, num_ua, ua)
                                    values ('$cod','$mod','$num','$nomua') ") or die("erreur ");
                                }
                                

                                //insertion des compétences
                                $compt=addslashes($_POST['comp1']);
                                $res=mysqli_query($con, "INSERT INTO competence_ua (ua, ue, competence) VALUES ('$cod','$ue','$compt') ") or die("erreur ");
                                
                                if (isset($_POST['comp2']) and !(empty($_POST['comp2'])) and $_POST['comp2'] != "" and $_POST['comp2'] != " ") {
                                    $compt=addslashes($_POST['comp2']);
                                    $res=mysqli_query($con, "INSERT INTO competence_ua (ua, ue, competence) VALUES ('$cod','$ue','$compt') ") or die("erreur ");
                                }

                                if (isset($_POST['comp3']) and !(empty($_POST['comp3'])) and $_POST['comp3'] != "" and $_POST['comp3'] != " ") {
                                    $compt=addslashes($_POST['comp3']);
                                    $res=mysqli_query($con, "INSERT INTO competence_ua (ua, ue, competence) VALUES ('$cod','$ue','$compt') ") or die("erreur ");
                                }


                                echo('<script>location.href = "index_enseignant.php?page=ua"</script>');
                                
                              }
                            ?>

                            <SCRIPT TYPE="text/javascript">

                            </SCRIPT>
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