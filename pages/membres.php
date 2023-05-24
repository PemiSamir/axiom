<?php
     if(estConnecte()==0){
         header("Location:index.php?page=signin");
     }                              
?>



  <!--/ Intro Skew Star /-->
  <div class="intro intro-single route bg-image" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <h2 class="intro-title mb-4"></h2>
          <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
              <a href="#"></a>
            </li>
            <li class="breadcrumb-item">
              <a href="#">Library</a>
            </li>
            <li class="breadcrumb-item active">Data</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->

  <!--/ Section Blog-Single Star /-->
  <section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="post-box">
            
            <div class="post-meta">
              <h1 class="article-title">Organiser le profil</h1>
              <ul>
                <li>
                  <span class="ion-ios-person"></span>
                  <a href="#">Jason London</a>
                </li>
                <li>
                  <span class="ion-pricetag"></span>
                  <a href="#">Web Design</a>
                </li>
                <li>
                  <span class="ion-chatbox"></span>
                  <a href="#">14</a>
                </li>
              </ul>
            </div>
              
            <div class="article-content">

            <div class="row">

            </div>
             
            <div class="form-label-group col-md-7" style="margin-top: 40px;">
            
            <select class="form-control" placeholder="Role">
            <option value=" ">--Votre Domaine--</option>
              <option value="E">Informatique</option>
              <option value="I">Medecine</option>
              <option value="D">Agriculture</option>
              <option value="I">Economie</option>
              <option value="D">Education</option>
            </select>
          </div>

            <div class="form-label-group col-md-7" style="margin-top: 40px;">
            
              <select class="form-control" placeholder="Role">
              <option value=" ">--Votre rôle--</option>
                <option value="E">Expert</option>
                <option value="I">Ingenieur</option>
                <option value="D">Decideur</option>
              </select>
            </div>
              
            </div>
          </div>

          
        </div>
        <div class="col-md-4">
          
          <div class="widget-sidebar">
            <h5 class="sidebar-title">Les membres</h5>
            <div class="sidebar-content">
              
              <div class="col-md-12">
                <?php
                    include 'functions/membres.func.php';
                    foreach(get_membres() as $membre){
                        if($membre->email != $_SESSION['source']){
                            ?>
                                
                                    <a href="index.php?page=tchat&user=<?= $membre->email ?>"><div class="membre">
                                    <strong><?= $membre->name ?></strong><br/>
                                    <span><?= $membre->email ?></span><br/><span class="select"><i class="ion-android-person"></i></span></div></a>
                                
                            <?php
                        }
                   }
                ?>
                </div>
              
            </div>
          </div>
         
          
        </div>
      </div>
    </div>
  </section>
  <!--/ Section Blog-Single End /-->

 