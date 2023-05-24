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
                                            <li><a href="home_admin.php?page=departement"><b><span style="color:blue">Departement</span></b></a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Nouveau Departement</span>
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
        <div class="text-center m-b-md custom-login"><h1>AJOUTER UN DEPARTEMENT</h1></div>
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
                                                                    <label class="text-left control-label" for="username" >Departement <span style="color:red">*</span></label>
                                                                    <input name="dep" type="text" class="form-control" required="" placeholder="  ">
                                                                </div>

                                                                <div class="form-group res-mg-t-15">
                                                                    <label class="text-left control-label" weidth="10" for="username" >Code du Departement <span style="color:red">*</span></label>
                                                                    <input name="code" type="text" class="form-control" required="" placeholder="Ex: HGE pour Histoire-Géographie-ECM ">
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
                                                                    
                                                                    $code = addslashes($_POST['code']);
                                                                    $dep=addslashes($_POST['dep']);
                                                                    
                                                                    $reqt="INSERT INTO departement (code_dep, dpt) values ('$code','$dep')";
                                                                    $res=mysqli_query($con,$reqt)or die("erreur " );
 
                                                                    echo('<script>location.href = "home_admin.php?page=departement"</script>');
                                                                    
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