<div id="home" class="intro route bg-image" style="background-image: url(img/sample.jpg)">
    <div class="overlay-itro"></div>
        <div class="intro-content display-table">
            <div class="table-cell">
            
                 

                <div class="container" style="margin-top: 0px;">
                    <div class="row">
                        <div class="col-sm-9 col-md-12 col-lg-5 mx-auto">
                            

<?php
    include 'functions/tchat.func.php';

    if(!isset($_GET['user']) || estConnecte()==0 || user_exist() != 1){
        header("Location:index.php?page=home");
    }

    $_SESSION['user'] = $_GET['user'];

    foreach(get_user() as $user){
        ?>
            <h2 class="header" style="color:#bfbfbf;"><?= $user->name; ?></h2>

            <div class="messages-box">
                

            </div>

            <div class="f-bottom">
                
           
              <div class="row">
                  <div class="form-group col-md-5 col-ms-10">
                    <textarea id="message" class="form-control input-mf" placeholder="Votre message" name="message"
                     rows="1" required></textarea>
                  </div>
                  

                <button class="btn btn-secondary btn-search" id="send" name="send" type="submit">
                    <span class="ion-android-send"></span>
                </button>

                </div>
                
            </div>
        <?php
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