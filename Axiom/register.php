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
                <h3>Inscrivez-Vous comme élève sur Axiom</h3>
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
                                                    <form action="post"  enctype="multipart/form-data" action="controller/funct_inscrit.php">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label class="text-left control-label" for="username" >Nom</label>
                                                                    <input name="nom" type="text" class="form-control" placeholder="Name" required="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="username">Date de naissance</label>
                                                                     <div class="input-group date">
                                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                        <input type="text" name="date" class="form-control" value="10/04/2017" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="username">Téléphone</label>
                                                                    <input name="tel" type="number" class="form-control" placeholder="Mobile no." required="">
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
                                                                    <label class="control-label" for="username">E-mail</label>
                                                                    <input type="text" placeholder="exemple@gmail.com" title="Please enter you email" name="email" required="" id="username" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="password">Mot de passe</label>
                                                                    <input type="password" title="Please enter your password" placeholder="******" required="" name="password" id="password" class="form-control">
                                                                    <!--span class="help-block small">Yur strong password</span-->
                                                                </div>

                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                
                                                                
                                                                <div class="form-group">
                                                                    <label class="control-label" for="username">Sexe</label>
                                                                    <select name="sexe" class="form-control" required=""> 
                                                                        <option value=""></option>
                                                                        <option value="0">Masculin</option>
                                                                        <option value="1">Feminin</option>
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label class="control-label" for="username">Classe</label>
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
                                                                    <label class="control-label" for="username">Région de résidence</label>
                                                                    <select name="region" class="form-control" placeholder="Region" required="">
                                                                            <option value="0">ADAMAOUA</option>
                                                                            <option value="1">EST</option>
                                                                            <option value="2">EXTREME-NORD</option>
                                                                            <option value="3">CENTRE</option>
                                                                            <option value="4">LITTORAL</option>
                                                                            <option value="5">NORD</option>
                                                                            <option value="6">NORD-OUEST</option>
                                                                            <option value="7">OUEST</option>
                                                                            <option value="8">SUD</option>
                                                                            <option value="9">SUD-OUEST</option>
                                                                        </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="username">Département de résidence</label>
                                                                    <select name="dept" class="form-control" required="">
                                                                            <option value="0">MFOUNDI</option>
                                                                            <option value="1">MEFOU ET AFAMBA</option>
                                                                            <option value="2">LEKIE</option>
                                                                            <option value="3">SANAGA MARITIME</option>
                                                                            <option value="4">MEFOU ET AKONO</option>
                                                                        </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="username">Ville de résidence</label>
                                                                    <select name="ville" class="form-control" required="">
                                                                            <option value="0">YAOUNDE</option>
                                                                            <option value="1">MFOU</option>
                                                                            <option value="2">DOUALA</option>
                                                                            <option value="3">BAFOUSSAM</option>
                                                                            <option value="4">BERTOUA</option>
                                                                        </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label" for="password">Confirmer le mot de passe</label>
                                                                    <input type="copassword" title="Please enter your password" placeholder="******" required="" name="password" id="password" class="form-control">
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
