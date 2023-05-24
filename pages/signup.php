<div id="home" class="intro route bg-image" style="background-image: url(img/header.jpg)">
    <div class="overlay-itro"></div>
        <div class="intro-content display-table">
            <div class="table-cell">
            
                 <div class="container" style="margin-top: 100px;">
                    <p class="intro-subtitle"><span class="text-slider-items">Inscription</span><strong class="text-slider"></strong></p><br-->
                 </div>

                <div class="container" style="margin-top: 0px;">
                    <div class="row">
                        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                            <!--div class="card card-signin my-5"-->
                            <div class="card-body">

                                <?php
                                    include 'functions/signup.func.php';
                                    if(isset($_POST['submit'])){
                                        //si on clic sur submit, on recupère les valeur des champs
                                        $name =htmlspecialchars(trim($_POST['name']));
                                        $email =htmlspecialchars(trim($_POST['email']));
                                        $password =sha1(htmlspecialchars(trim($_POST['password'])));
                                        $copassword =sha1(htmlspecialchars(trim($_POST['copassword'])));
                                        
                                        if(email_taken($email) == 1){
                                            $error_email = "l'adresse email est déjà utilisée...";
                                        }else{
                                            signup($name, $email, $password);
                                            $_SESSION['source']=$email;
                                            header("location:index.php?page=home");
                                        }
                                    }
                                ?>

                                <form method="post" id ="regForm">

                                    <div class="field">
                                        <label class="field-label" for="name">User name</label>
                                        <input class="field-input" type="text" name="name" id="name"/>
                                    </div>
                                    
                                    <div class="field">
                                        <label class="field-label" for="email">Email</label>
                                        <input class="field-input" type="email" name="email" id="email"/>
                                    </div>

                                    <div class="field">
                                        <label class="field-label" for="password">Password</label>
                                        <input class="field-input" type="password" name="password" id="password"/>
                                    </div>

                                    <div class="field">
                                        <label class="field-label" for="copassword">Confirm Password</label>
                                        <input class="field-input" type="password" name="copassword" id="copassword"/>
                                    </div>
                                    

                                    <!--div class="form-label-group" style="margin-top: 40px;">
                                        
                                        <select class="form-control" placeholder="Role">
                                            <option value="0">--Role--</option>
                                            <option value="E">Expert</option>
                                            <option value="I">Ingenieur</option>
                                            <option value="D">Decideur</option>
                                        </select>
                                    </div-->

                                    <p class="error"><?php echo (isset($error_email)) ? $error_email : " "; ?></p>

                                    <div class="col-md-12" style="margin-top: 30px;">
                                         <button class="btn btn-primary page-scroll" type="submit" name="submit">S'inscrire</button>
                                         <button class="btn page-scroll" type="reset" name="reset" name="reset">Effacer</button>
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