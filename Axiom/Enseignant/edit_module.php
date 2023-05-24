<?php
     $mod=$_GET['module'];

      $requet="SELECT * FROM module WHERE code_mod='$mod'";
        $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
        $row=mysqli_fetch_assoc($result)
                           
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
                                            <li><a href="index_enseignant.php?page=module">Module</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Editer un module</span>
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
        <div class="text-center m-b-md custom-login"><h1>EDITER UN MODULE</h1></div>
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
                                                    <form  method="post" class="dropzone dropzone-custom needsclick addlibrary" id="demo1-upload">
                                                        <div class="row">
                                                            
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label class="text-left control-label" for="username" >Numero du module</label>
                                                                    <input name="num" type="text" class="form-control" placeholder="Number of module" value="<?php echo $row['num'];?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="text-left control-label" for="username" >Code du module</label>
                                                                    <input name="code" type="text" disabled class="form-control" placeholder="exp: RS_5 pour RESEAU de La classe de 5ieme" value="<?php echo $row['code_mod'];?>">
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label class="text-left control-label" for="username" >Intitule du module</label>
                                                                    <input name="module" type="text" class="form-control" placeholder="Name of module" value="<?php echo $row['module'];?>">
                                                                </div>
                                                                <div class="form-group res-mg-t-15">
                                                                    <label class="text-left control-label" weidth="10" for="username" >Description</label>
                                                                    <textarea name="description" placeholder="Description"> <?php echo $row['description'];?></textarea>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Mettre à jour</button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <?php 
                                                     if (isset($_POST['submit'])) {
                                                        $num = (int)$_POST['num'];
                                                    
                                                        $nom = addslashes($_POST['module']);
                                                        $des = addslashes($_POST['description']);

                                                        $res=mysqli_query($con,"update module set num='$num', module='$nom', description='$des' where code_mod='$mod' ") or die("erreur ");

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