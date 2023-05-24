<?php

    $requet="SELECT cl.classe, el.Nom, el.photo FROM classe cl, eleve el WHERE cl.classe=el.classe AND el.id='$id_eleve'";
        $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
        
        $info=mysqli_fetch_assoc($result);

        $_SESSION["classe"]=$info["classe"];

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
                                    <div class="col-lg-6 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item"><a href="#" class="nav-link"><span class="admin-name">
                                                    Ma classe : <b><?php echo $info['classe']; ?>
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
															<img src="<?php echo $info['photo']; ?>" alt="" />
															<span class="admin-name"><?php echo $info['Nom']; ?></span>
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