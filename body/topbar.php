
<nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      
      <a class="navbar-brand js-scroll" href="#page-top">Axiom - L'éducation pour tous</a>
      <img src="img/a2.png" class="logo">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <!--div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link js-scroll <?php echo ($page=='home') ? 'active' : '' ?>" href="index.php">Home</a>
          </li>    
          
          <li class="nav-item">
            <a class="nav-link js-scroll <?php echo ($page=='work' || $page=='term' || $page=='extract') ? 'active' : '' ?>" href="index.php?page=work">Work</a>
          </li>


        <?php
          if(estConnecte()==1){
            ?>
              <li class="nav-item">
                <a class="nav-link js-scroll <?php echo ($page=='editeur') ? 'active' : '' ?>" href="index.php?page=editeur">Editeur</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll " target="_blank" href="editors/layouteditor.php">Drag and Drop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll <?php echo ($page=='membres') ? 'active' : '' ?>" href="index.php?page=membres">membres</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll <?php echo ($page=='tchat') ? 'active' : '' ?>" href="index.php?page=tchat">tchat</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll <?php echo ($page=='logout') ? 'active' : '' ?>" href="index.php?page=logout">log out</a>
              </li>
            <?php
          
          }else{
              ?>

                <li class="nav-item">
                  <a class="nav-link js-scroll <?php echo ($page=='signin') ? 'active' : '' ?>" href="index.php?page=signin">Sign in</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link js-scroll <?php echo ($page=='signup') ? 'active' : '' ?>" href="index.php?page=signup">Sign up</a>
                </li>

              <?php
          }
        ?>
        </ul>
      </div-->
    </div>
  </nav>