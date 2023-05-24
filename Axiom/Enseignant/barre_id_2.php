<?php
   
         //selecion du nom de la discipline
        $requet="SELECT d.discipline FROM discipline d, discipline_classe dc WHERE d.code_dis=dc.discipline and dc.code='$ue'";
        $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

        
        $info=mysqli_fetch_assoc($result);

       
          //selection du nom de l'enseignant
        $requet="SELECT Nom FROM enseignant WHERE id='$id'";
        $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

?>



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
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                               
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
                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                    
                                                <li class="nav-item"><a href="#" class="nav-link"><span class="admin-name">
                                                    <?php echo $respo."  ".$info['discipline']." ".$classe; ?>
                                                </span></a>
                                                </li>
                                                
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<img src="assets/img/product/pro4.jpg" alt="" />
															<span class="admin-name"> Prof : <?php
                                                             $info=mysqli_fetch_assoc($result);
                                                              echo $info['Nom']; ?></span>
															<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="#"><span class="edu-icon edu-home-admin author-log-ic"><i class="fa fa-user"></i></span>Mon profil</a>
                                                        </li>
                                                        <li><a href="controller/deconnecter.php"><span class="edu-icon edu-locked author-log-ic"></span>Se Déconnecter</a>
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