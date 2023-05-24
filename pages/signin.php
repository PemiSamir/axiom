<?php
     if(estConnecte()==1){
         header("Location:index.php?page=membres");
     }                              
?>

<div id="home" class="intro route bg-image" style="background-image: url(img/header.jpg)">
    <div class="overlay-itro"></div>
        <div class="intro-content display-table">
            <div class="table-cell">
            
                 <div class="container" style="margin-top: 100px;">
                    <p class="intro-subtitle"><span class="text-slider-items">Connexion</span><strong class="text-slider"></strong></p><br-->
                 </div>

                <div class="container" style="margin-top: 0px;">
                    <div class="row">
                        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                            <!--div class="card card-signin my-5"-->
                            <div class="card-body">
                
                            <?php
                                    include 'functions/signin.func.php';
                                    if(isset($_POST['submit'])){
                                        $email =htmlspecialchars(trim($_POST['email']));
                                        $password =sha1(htmlspecialchars(trim($_POST['password'])));
                                        
                                        if(user_exist($email,$password)==1){
                                            $_SESSION['source'] = $email;
                                            header("Location:index.php?page=home");
                                        }else{
                                            $error_user_not_found = "l'adresse email ou le mot de passe est incorrect";
                                        }
                                    }
                                ?>

                                <form method="post" id="logForm">

                                <div class="field">
                                        <label class="field-label" for="email">Email</label>
                                        <input class="field-input" type="email" name="email" id="email"/>
                                    </div>

                                    <div class="field">
                                        <label class="field-label" for="password">Password</label>
                                        <input class="field-input" type="password" name="password" id="password"/>
                                    </div>

                                    <div class="field">
                                        
                                        <select classe="field-select" name="role" id="role">
                                            <option value="eleve">ELEVE</option>
                                            <option value="Enseignant">Enseignant</option>
                                            <option value="eleve">Animateur Pédagogique</option>
                                            <option value="eleve">Parent</option>
                                        </select>
                                    </div>

                                    <p class="error"><?php echo (isset($error_user_not_found)) ? $error_user_not_found : " "; ?></p>


                                    <div class="col-md-12" style="margin-top: 55px;">
                                         <button class="btn btn-primary page-scroll long" type="submit" name="submit">Valider</button>
                                         <button class="btn page-scroll long" type="reset" name="reset" name="reset">Effacer</button>
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