

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Axiom | Connexion </title>
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
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="assets/css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="assets/css/morrisjs/morris.css">
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
    <!-- modals CSS
        ============================================ -->
    <link rel="stylesheet" href="assets/css/modals.css">
    <!-- modernizr JS
		============================================ -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div class="error-pagewrap">
        <div class="error-page-int">
            <div class="text-center m-b-md custom-login">
                <img src='assets/img/certif/axiom.png'>
                <h3>Connectez-Vous à Axiom</h3>
                 
            </div>
            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        <form id="loginForm" method="post" action="controller/funct_connect.php">
                             <div class="form-group">
                                <label class="control-label" for="username">En tant que</label>
                                <select name="role" class="form-control">
                                    <option value="eleve" selected="">ELEVE</option>
                                    <option value="enseignant">ENSEIGNANT</option>
                                    <!--option value="AP">ANIMATEUR PEDAGOGIQUE</option-->
                                    <option value="parent">PARENT</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="username">E-mail</label>
                                <input type="text" placeholder="exemple@gmail.com" title="Please enter you username" required="" name="user" class="form-control">
                                <!--span class="help-block small">Your unique username to app</span-->
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Mot de passe</label>
                                <input type="password" title="Please enter your password" placeholder="******" required=""  name="mdp" class="form-control">
                                <!--span class="help-block small">Yur strong password</span-->
                            </div>
                            <!--div class="checkbox login-checkbox">
                                <label>
                                        <input type="checkbox" class="i-checks"> Se souvenir de moi </label>
                                <p class="help-block small">(si vous êtes sur un ordinateur privé)</p>
                            </div-->
                            <button class="btn btn-success btn-block loginbtn" type="submit" name="submit">Se connecter</button><br>
                            <a class="btn btn-default btn-block" href="#" data-toggle="modal" data-target="#InformationproModalalert">S'inscrire</a>
                            <!--div class="btn-group">
                                            <button class="btn btn-success"><i class="icon-signin icon-large"></i>&nbsp;S'inscrire</button>
                                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="register.php" role="button">&nbsp;Elève</a></li>
                                                <li><a href="#teacher" role="button">&nbsp;Enseignant</a></li>
                                                <li><a href="#student" role="button">&nbsp;Parent</a></li>
                                            </ul>
                            </div-->
                         
                        </form>
                        <?php 
                            if(isset($_GET['erreur']) AND $_GET['erreur']==0 ) 
                            {
                                echo '<div class="alert alert-danger alert-mg-b">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                           rôle, adresse email ou mot de passe est incorrect   
                                    </div> ';
                            }
                             
                         ?>
                    </div>

                </div>

            </div>
            <div id="InformationproModalalert" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-body">
                                        <span class="educate-icon educate-info modal-check-pro information-icon-pro"> </span>
                                        <h2>S'inscrire comme!</h2><br>
                                        <!--p>The Modal plugin is a dialog box/popup window that is displayed on top of the current page</p-->
                                        <button class="btn btn-success loginbtn" ><a href="register_el.php"><span style="color:white">Elève</span></a></button>
                                        <button class="btn btn-success loginbtn" ><a href="register_en.php"><span style="color:white">Enseignant</span></a></button>
                                        <button class="btn btn-success loginbtn" ><a href="register_pa.php"><span style="color:white">Parent</span></a></button>
                                         
                                    </div>
                                    <div class="modal-footer info-md">
                                        <a data-dismiss="modal" href="#">Cancel</a>
                                         
                                    </div>
                                </div>
                            </div>
                        </div>
            <div class="text-center login-footer">
                <p>Copyright © 2021. All rights reserved. By <a href="https://colorlib.com/wp/templates/">Pemi Samir</a></p>
            </div>
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
    <!-- counterup JS
        ============================================ -->
    <script src="assets/js/counterup/jquery.counterup.min.js"></script>
    <script src="assets/js/counterup/waypoints.min.js"></script>
    <script src="assets/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="assets/js/metisMenu/metisMenu.min.js"></script>
    <script src="assets/js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="assets/js/morrisjs/raphael-min.js"></script>
    <script src="assets/js/morrisjs/morris.js"></script>
    <script src="assets/js/morrisjs/morris-active.js"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="assets/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="assets/js/sparkline/sparkline-active.js"></script>
    <!-- calendar JS
        ============================================ -->
    <script src="assets/js/calendar/moment.min.js"></script>
    <script src="assets/js/calendar/fullcalendar.min.js"></script>
    <script src="assets/js/calendar/fullcalendar-active.js"></script>
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