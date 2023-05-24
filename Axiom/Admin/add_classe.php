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
                                            <li><a href="home_admin.php?page=classe"><b><span style="color:blue">Classes</span></b></a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Nouvelle Classe</span>
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
        <div class="text-center m-b-md custom-login"><h1>AJOUTER UNE CLASSE</h1></div>
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
                                                                    <label class="text-left control-label" for="username" >Classe <span style="color:red">*</span></label>
                                                                    <input name="classe" type="text" class="form-control" required="" placeholder="  ">
                                                                </div>

                                                                <div class="form-group res-mg-t-15">
                                                                    <label class="text-left control-label" weidth="10" for="username" >Classe Précédente</label>
                                                                    <input name="pre" type="text" class="form-control" required="" placeholder="">
                                                                </div>

                                                                <div class="form-group res-mg-t-15">
                                                                    <label class="text-left control-label" weidth="10" for="username" >Classe Suivante</label>
                                                                    <input name="sui" type="text" class="form-control" required="" placeholder="">
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
                                                                    
                                                                    $nom = addslashes($_POST['classe']);
                                                                    $pre=addslashes($_POST['pre']);
                                                                    $sui=addslashes($_POST['sui']);
 
                                                                    $reqt="INSERT INTO classe (classe, suivante, precedente) values ('$nom','$sui','$pre')";
                                                                    $res=mysqli_query($con,$reqt)or die("erreur " );
 
                                                                    echo('<script>location.href = "home_admin.php?page=classe"</script>');
                                                                    
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