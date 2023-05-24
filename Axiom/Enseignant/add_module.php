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
                                            <li><a href="index_enseignant.php?page=module">Module</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Ajouter un module</span>
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
        <div class="text-center m-b-md custom-login"><h1>AJOUTER UN MODULE</h1></div>
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
                                                                    <label class="text-left control-label" for="username" >Numero du module <span style="color:red">*</span></label>
                                                                    <input name="num" type="text" class="touchspin1" required="" placeholder="Number of module">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="text-left control-label" for="username" >Code du module <span style="color:red">*</span></label>
                                                                    <input name="code" type="text" class="form-control" required="" placeholder="exp: RS_5 pour RESEAU de La classe de 5ieme">
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
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label class="text-left control-label" for="username" >Intitule du module <span style="color:red">*</span></label>
                                                                    <input name="module" type="text" class="form-control" required="" placeholder="Name of module">
                                                                </div>
                                                                <div class="form-group res-mg-t-15">
                                                                    <label class="text-left control-label" weidth="10" for="username" >Description</label>
                                                                    <textarea name="description" placeholder="Description"></textarea>
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
                                $codm = addslashes($_POST['code']);
                                $nom = addslashes($_POST['module']);
                                $des = addslashes($_POST['description']);

                                if ( !empty($_POST["voir"])) {
                                    $image = addslashes($_FILES['image']['tmp_name']);
                                    $image_name = addslashes($_FILES['image']['name']);
                                    $image_size = getimagesize($_FILES['image']['tmp_name']);

                                    move_uploaded_file($_FILES["image"]["tmp_name"], "upload/img/" . $_FILES["image"]["name"]);
                                    $location = "upload/img/" . $_FILES["image"]["name"];

                                    $res=mysqli_query($con,"INSERT INTO module (code_mod, dis_cl, num, module, description, image)
                                    values ('$codm','$ue','$num','$nom','$des','$location') ") or die("erreur ".$codm." ".$ue." ".$num." ".$nom." ".$des);
                                }
                                else{

                                $res=mysqli_query($con,"INSERT INTO module (code_mod, dis_cl, num, module, description)
                                    values ('$codm','$ue','$num','$nom','$des' ) ") or die("erreur ".$codm." ".$ue." ".$num." ".$nom." ".$des);
                                }


                                echo('<script>location.href = "index_enseignant.php?page=module"</script>');
                                
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