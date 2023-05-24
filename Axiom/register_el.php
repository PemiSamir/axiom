<?php 
     require_once(__DIR__ .'\controller\dbConnector.php');                                                                               
?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Axiom | Inscription</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.theme.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="assets/css/normalize.css">
    <!-- meanmenu icon CSS
        ============================================ -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- forms CSS
        ============================================ -->
    <link rel="stylesheet" href="assets/css/form/all-type-forms.css">
    <!-- educate icon CSS
        ============================================ -->
    <link rel="stylesheet" href="assets/css/educate-custon-icon.css">
    <!-- morrisjs CSS
        ============================================ -->
    <link rel="stylesheet" href="assets/css/morrisjs/morris.css">
    <!-- dropzone CSS
        ============================================ -->
    <link rel="stylesheet" href="assets/css/dropzone/dropzone.css">
    <!-- datapicker CSS
        ============================================ -->
    <link rel="stylesheet" href="assets/css/datapicker/datepicker3.css">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
        ============================================ -->
    <link rel="stylesheet" href="assets/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="assets/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
        ============================================ -->
    <link rel="stylesheet" href="assets/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assets/css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="assets/style.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr JS
        ============================================ -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
   
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <!--div class="error-pagewrap">
        <div class="error-page-int"-->
            <div class="text-center m-b-md custom-login">
                <img src='assets/img/certif/axiom.png'>
                <h3>Inscrivez-Vous comme Elève sur Axiom</h3>
                <p></p>
            </div>
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-1 col-md-1">
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="pro-ad">
                                                    <form method="post"  enctype="multipart/form-data" action="controller/funct_inscrip.php">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <input name="role" type="text" class="hidden"  value="eleve">
                                                                <div class="form-group">
                                                                    <label class="text-left control-label" for="username" >Nom <span style="color:red">*</span></label>
                                                                    <input name="nom" type="text" class="form-control" placeholder="Name" required="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="username">Date de naissance <span style="color:red">*</span></label>
                                                                     <div class="input-group date">
                                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                        <input type="text" name="date" class="form-control" value="10/04/2017" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="username">Téléphone <span style="color:red">*</span></label>
                                                                    <input name="tel" type="text" class="form-control" placeholder="Mobile no." required="">
                                                                </div>
                                                                
                                                               
                                                                <div class="form-group">
                                                                    <label class="control-label" for="username">Photo</label>
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

                                                                <div class="form-group">
                                                                    <label class="control-label" for="username">E-mail <span style="color:red">*</span></label>
                                                                    <input type="text" placeholder="exemple@gmail.com" title="Please enter you email" name="email" required="" id="username" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="password">Mot de passe <span style="color:red">*</span></label>
                                                                    <input type="password" title="Please enter your password" placeholder="******" required="" name="password" id="password" class="form-control">
                                                                    <!--span class="help-block small">Yur strong password</span-->
                                                                </div>

                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                
                                                                
                                                                <div class="form-group">
                                                                    <label class="control-label" for="username">Sexe <span style="color:red">*</span></label>
                                                                    <select name="sexe" class="form-control" required=""> 
                                                                        <option value=""></option>
                                                                        <option value="M">Masculin</option>
                                                                        <option value="F">Feminin</option>
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label class="control-label" for="username">Classe <span style="color:red">*</span></label>
                                                                    <select name="Classe" class="form-control" required="">
                                                                            <option value=""></option>
                                                                            <?php 
                                                                                $reket="SELECT classe from classe order by classe";
                                                                                $result=mysqli_query($con,$reket) or die("impossible d'exécuter la requet");
                                                                                while ($row=mysqli_fetch_assoc($result))
                                                                                { 
                                                                            ?>
                                                                                    <option value="<?php echo $row['classe'];?>"> <?php echo $row['classe'];?></option>
                                                                            <?php 
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="username">Région de résidence <span style="color:red">*</span></label>
                                                                    <select name="region" class="form-control" placeholder="Region" required="">
                                                                            <option value="ADAMAOUA<">ADAMAOUA</option>
                                                                            <option value="CENTRE">CENTRE</option>
                                                                            <option value="EST">EST</option>
                                                                            <option value="EXTREME-NORD">EXTREME-NORD</option> 
                                                                            <option value="LITTORAL">LITTORAL</option>
                                                                            <option value="NORD">NORD</option>
                                                                            <option value="NORD-OUEST">NORD-OUEST</option>
                                                                            <option value="OUEST">OUEST</option>
                                                                            <option value="SUD">SUD</option>
                                                                            <option value="SUD-OUEST">SUD-OUEST</option>
                                                                        </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="username">Département de résidence <span style="color:red">*</span></label>
                                                                    <select name="dept" class="form-control" required="">
                                                                            <option value="MFOUNDI">MFOUNDI</option>
                                                                            <option value="MEFOU ET AFAMBA">MEFOU ET AFAMBA</option>
                                                                            <option value="LEKIE">LEKIE</option>
                                                                            <option value="SANAGA MARITIME">SANAGA MARITIME</option>
                                                                            <option value="MEFOU ET AKONO">MEFOU ET AKONO</option>
                                                                        </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="username">Ville de résidence <span style="color:red">*</span></label>
                                                                    <select name="ville" class="form-control" required="">
                                                                            <option value="YAOUNDE">YAOUNDE</option>
                                                                            <option value="MFOU">MFOU</option>
                                                                            <option value="DOUALA">DOUALA</option>
                                                                            <option value="BAFOUSSAM">BAFOUSSAM</option>
                                                                            <option value="BERTOUA">BERTOUA</option>
                                                                        </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label" for="password">Confirmer le mot de passe <span style="color:red">*</span></label>
                                                                    <input type="password" title="Please enter your password" placeholder="******" required="" name="copassword" id="password" class="form-control">
                                                                    <!--span class="help-block small">Yur strong password</span-->
                                                                </div>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit"class="btn btn-success btn-block loginbtn">S'inscrire</button>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
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
        <div class="text-center login-footer">
                <p>Copyright © 2021. All rights reserved. By <a href="https://colorlib.com/wp/templates/">Pemi Samir</a></p>
            </div>
    </div>

    <!-- jquery
        ============================================ -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- wow JS
        ============================================ -->
    <script src="assets/js/wow.min.js"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="assets/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="assets/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="assets/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="assets/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="assets/js/metisMenu/metisMenu.min.js"></script>
    <script src="assets/js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="assets/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
        ============================================ -->
    <script src="assets/js/calendar/moment.min.js"></script>
    <script src="assets/js/calendar/fullcalendar.min.js"></script>
    <script src="assets/js/calendar/fullcalendar-active.js"></script>
    <!-- maskedinput JS
        ============================================ -->
    <script src="assets/js/jquery.maskedinput.min.js"></script>
    <script src="assets/js/masking-active.js"></script>
    <!-- datepicker JS
        ============================================ -->
    <script src="assets/js/datepicker/jquery-ui.min.js"></script>
    <script src="assets/js/datepicker/datepicker-active.js"></script>
    <script src="assets/js/datapicker/bootstrap-datepicker.js"></script>
    <!-- form validate JS
        ============================================ -->
    <script src="assets/js/form-validation/jquery.form.min.js"></script>
    <script src="assets/js/form-validation/jquery.validate.min.js"></script>
    <script src="assets/js/form-validation/form-active.js"></script>
    <!-- dropzone JS
        ============================================ -->
    <script src="assets/js/dropzone/dropzone.js"></script>
    <!-- tab JS
        ============================================ -->
    <script src="assets/js/tab.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="assets/js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="assets/js/main.js"></script>
    <!-- tawk chat JS
        ============================================ -->
    <script src="assets/js/tawk-chat.js"></script>
</body>

</html>
