<?php
    require_once(__DIR__ .'\config\database.php');
    require_once(__DIR__ .'\controller\dbConnector.php');

    //les parametres recuperer par la page sont le prof et la classe 

    $id=$_SESSION["id"];

    if(isset($_GET["class"]))
    {
        $_SESSION["classe"]=$_GET["class"];
    }

     if(!isset($_SESSION["classe"]))
    {
        header("Location:index.php");
    }
    //$_SESSION["classe"]=$_GET["class"];

    $classe=$_SESSION["classe"];

    //selection du nom de l'enseignant
   $requet="SELECT Nom, dept FROM enseignant WHERE id='$id'";
        $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
        
        $info=mysqli_fetch_assoc($result);
        $dep=$info['dept'];

        //selecion des discipline du departement de cette classe
        $requet="SELECT dc.code, d.discipline, d.photo FROM discipline_classe dc, discipline d WHERE dc.classe='$classe' AND dc.discipline=d.code_dis AND d.dept='$dep'";
        $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Axiom | Mes cours</title>
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
    <!-- notifications CSS
        ============================================ -->
    <link rel="stylesheet" href="assets/css/notifications/Lobibox.min.css">
    <link rel="stylesheet" href="assets/css/notifications/notifications.css">
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
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><h1><b>Axiom</b></h1><h4>Cameroun</h4></a>
                <strong><a href="index.html"><img src="img/logo/logosn.png" alt="" /></a></strong>
            </div><br>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                     
                        <li>
                            <a title="toutes les classes" href="home_enseignant.php"><span class="educate-icon educate-apps icon-wrap"></span> <span class="mini-click-non">Classes</span></a>
                            
                        </li>
                        
                        <li>
                            <a title="les disciplines" href="#"><span cclass="mini-sub-pro"></span> <span class="mini-click-non"><b>Disciplines</b></span></a>
                            
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="assets/img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                    <i class="educate-icon educate-nav"></i>
                                                </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                <li class="nav-item"><a href="#" class="nav-link"></a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link"></a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link"></a>
                                                </li>
                                                <li class="nav-item dropdown res-dis-nn">
                                                    
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link"></a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link"><span class="admin-name">
                                                    <?php
                                                        $Today = date('y:m:d');
                                                        $new = date('l, F d, Y', strtotime($Today));
                                                        echo $new;
                                                    ?>
                                             </span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item"><a href="#" class="nav-link"><span class="admin-name">
                                                     classe : <b><?php echo $classe; ?>
                                                </b></span></a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link"><span class="admin-name"><b>
                                                    
                                                </b></span></a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link"><span class="admin-name"><b>
                                                    
                                                </b></span></a>
                                                </li>
                                                
                                                
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                            <img src="assets/img/product/pro4.jpg" alt="" />
                                                            <span class="admin-name">Prof : <?php echo $info['Nom']; ?></span>
                                                            <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                        </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="#"><span class="edu-icon edu-home-admin author-log-ic"><i class="fa fa-user"></i></span>Mon profil</a>
                                                        </li>
                                                        <li><a href="#"><span class="edu-icon edu-locked author-log-ic"></span>Se Déconnecter</a>
                                                        </li>
                                                    </ul>
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

             <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
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
                                            <li><a href="home_enseignant.php">Classe</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Discipline</span>
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

         <div class="text-center m-b-md custom-login"><h1>LES DISCIPLINES ENSEIGNEES</h1></div>
        <div class="library-book-area mg-t-30">
            <div class="container-fluid">
                <div class="row">
                   <?php
                        $i=1;
                        while ($row=mysqli_fetch_assoc($result)) 
                        {
                            $code=$row['code'];
                    ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="single-cards-item">
                                    <div class="single-product-image">
                                        <a href="index_enseignant.php?ue=<?=$code ?>"><img src="<?php echo $row['photo']; ?>" alt=""></a>
                                    </div>
                                    <div class="single-product-text">
                                       <h4><a class="cards-hd-dn" href="index_enseignant.php?ue=<?=$code ?>"><?php echo $row['discipline']; ?></a></h4><br>
                                        
                                        <a class="follow-cards" href="index_enseignant.php?ue=<?=$code ?>">Faire cours</a>
                                    </div>
                                </div>
                            </div>
    <?php
        $i=$i+1;
        if($i==4)
        {
            echo '
                </div>
            </div><br>
            <div class="container-fluid">
                <div class="row">';
            $i=1;
        }
                        }
                    
    ?>
                   
                </div>
            </div>
        </div><br><br>
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
     <!-- notification JS
        ============================================ -->
    <script src="assets/js/notifications/Lobibox.js"></script>
    <script src="assets/js/notifications/notification-active.js"></script>
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