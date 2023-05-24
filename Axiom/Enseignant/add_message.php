    <?php       
                                                       
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
                                            <li><a href="index_enseignant.php?page=forum"><b><span style="color:blue">Forum</b></span></a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><a href="#">Nouveau sujet</a>
                                            </li>
                                             
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<div class="text-center m-b-md custom-login"><h1>Poser votre problème</h1></div>
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
                                                        <label class="text-left control-label" for="username" >Sujet du problème <span style="color:red">*</span></label>
                                                        <input name="intitule" type="text" class="form-control" required="" placeholder=" ">
                                                    </div>

                                                    
                                                </div>
                                            </div>

                                            <div class="p-xs h4">
                                            Problème <span style="color:red">*</span>
                                            </div>
                                            <textarea class="summernote6" name="texte">
                                            
                                            </textarea>
                                            
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
                            if (isset($_POST['submit'])) 
                            {
                                $enonce = addslashes($_POST['texte']);
                                
                                $intitule=addslashes($_POST["intitule"]);
                                $user="prof";
                               
                                
                               
                                $res=mysqli_query($con,"insert into forum_message (utilisateur, prof, sujet, message) values ('$user','$id','$intitule','$enonce') ") or die("erreur j b");

                               

                                echo('<script>location.href = "index_enseignant.php?page=forum"</script>');
                                
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