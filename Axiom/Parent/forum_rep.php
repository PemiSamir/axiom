<?php
    
    $mes=(int)$_GET["mess"];

    //on les messages
    $requet="SELECT * FROM forum_message WHERE id_mes='$mes'";
    $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet mess");  
    $message=mysqli_fetch_assoc($result);   

    $id_m=$message["id_mes"];
                                                        if ($message["utilisateur"]=="eleve") 
                                                        {
                                                            $elv=$message["eleve"];
                                                            
                                                            $requet="SELECT cl.classe, el.Nom, el.photo FROM classe cl, eleve el WHERE cl.classe=el.classe AND el.id='$elv'";
                                                            $resul=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
                                                            $info=mysqli_fetch_assoc($resul);

                                                            $post=" de la ".$info["classe"];
                                                            $nom=$info["Nom"];
                                                            $photo=$info["photo"];
                                                        }
                                                        elseif ($message["utilisateur"]=="prof") 
                                                        {
                                                            $elv=$message["prof"];
                                                               //selection du nom de l'enseignant
                                                            $requet="SELECT e.Nom, e.photo, d.dpt FROM enseignant e, departement d WHERE e.dept=d.code_dep and id='$elv'";
                                                            $resul=mysqli_query($con,$requet) or die("impossible d'exécuter la requet eerere");
                                                            $info=mysqli_fetch_assoc($resul);

                                                            $post=" prof de ".$info["dpt"];
                                                            $nom=$info["Nom"];
                                                            $photo=$info["photo"];
                                                        }
                                                        elseif ($message["utilisateur"]=="parent") 
                                                        {
                                                            $elv=$message["eleve"];

                                                            $requet="SELECT nom, photo FROM parent WHERE id='$elv'";
                                                            $resul=mysqli_query($con,$requet) or die("impossible d'exécuter la requet eerere");
                                                            $info=mysqli_fetch_assoc($resul);

                                                            $post=" un Parent ";
                                                            $nom=$info["nom"];
                                                            $photo=$info["photo"];
                                                        }              

    // on selectionne les réponses du message
    $requet="SELECT * FROM forum_reponse WHERE mess='$mes' order by id_rep desc";
    $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet mes");  
                       

?>

        <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
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
                                            <li><a href="home_eleve.php?page=forum"><b><span style="color:blue">Forum</b></span></a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><a href="#">Réponse</a>
                                            </li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        <div class="text-center m-b-md custom-login"><h1>Réponses</h1></div>
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    
                        
                            

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="product-payment-inner-st">
                                    
                                    
                                  <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-9 col-md-9 col-sm-0 col-xs-0">
                                                       
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                        <button type="button" class="btn btn-custon-rounded-two btn-primary"><a href="index_enseignant.php?page=add_message"><span style="color:white"><i class="fa fa-pencil"></i> Répondre</span></a></button>
                                                    </div>
                                                </div>

                                                <div class="chat-discussion" style="height: auto">

                                                     <div class="chat-message">
                                                            <div class="profile-hdtc">
                                                                 <img class="message-avatar" src="<?php echo $photo; ?>" alt="">
                                                            </div>
                                                            <div class="message">
                                                                <a class="message-author" href="#"><?php echo $nom.$post; ?></a>
                                                                <span class="message-date">  <?php echo $message["date"]; ?> </span>
                                                                <span class="message-content">
                                                                    <h4 style="text-align:center"> <?php echo $message["sujet"]; ?></h4>
                                                                    <?php echo $message["message"]; ?>
                                                                </span>

                                                            </div>
                                                        </div> 
                                                   
                                                    
                                                        <hr>
                                                        <hr>



                                                <?php
                                                    while ($row=mysqli_fetch_assoc($result)) 
                                                    {
                                                        $id_m=$row["id_rep"];
                                                        if ($row["utilisateur"]=="eleve") 
                                                        {
                                                            $elv=$row["eleve"];
                                                            
                                                            $requet="SELECT cl.classe, el.Nom, el.photo FROM classe cl, eleve el WHERE cl.classe=el.classe AND el.id='$elv'";
                                                            $resul=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
                                                            $info=mysqli_fetch_assoc($resul);

                                                            $post=" de la ".$info["classe"];
                                                            $nom=$info["Nom"];
                                                            $photo=$info["photo"];
                                                        }
                                                        elseif ($row["utilisateur"]=="prof") 
                                                        {
                                                            $elv=$row["prof"];
                                                               //selection du nom de l'enseignant
                                                            $requet="SELECT e.Nom, e.photo, d.dpt FROM enseignant e, departement d WHERE e.dept=d.code_dep and id='$elv'";
                                                            $resul=mysqli_query($con,$requet) or die("impossible d'exécuter la requet eerere");
                                                            $info=mysqli_fetch_assoc($resul);

                                                            $post=" prof de ".$info["dpt"];
                                                            $nom=$info["Nom"];
                                                            $photo=$info["photo"];
                                                        }
                                                        elseif ($row["utilisateur"]=="parent") 
                                                        {
                                                            $elv=$row["eleve"];

                                                            $requet="SELECT nom, photo FROM parent WHERE id='$elv'";
                                                            $resul=mysqli_query($con,$requet) or die("impossible d'exécuter la requet eerere");
                                                            $info=mysqli_fetch_assoc($resul);

                                                            $post=" un Parent ";
                                                            $nom=$info["nom"];
                                                            $photo=$info["photo"];
                                                        }

                                                        $requet="SELECT id_rep FROM forum_reponse WHERE mess='$id_m'";
                                                        $reqp=mysqli_query($con,$requet) or die("impossible d'exécuter la requet eerere");

                                                            ?>
                                                    <div class="row">
                                                        <div class="col-lg-1 col-md-1 col-sm-0 col-xs-0">
                                                           
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-0 col-xs-0">
                                                           <div class="chat-message">
                                                                <div class="profile-hdtc">
                                                                     <img class="message-avatar" src="<?php echo $photo; ?>" alt="">
                                                                </div>
                                                                <div class="message">
                                                                    <a class="message-author" href="#"><?php echo $nom.$post; ?></a>
                                                                    <span class="message-date">  <?php echo $row["date"]; ?> </span>
                                                                    <span class="message-content">
                                                                        <?php echo $row["reponse"]; ?>
                                                                    </span>

                                                                </div>
                                                            </div>
                                                            <hr>
                                                        </div>

                                                        <div class="col-lg-2 col-md-2 col-sm-0 col-xs-0">
                                                           
                                                        </div>   
                                                    </div>
                                                        
                                                            <?php   
                                                    }
                                                ?>

                                                    <form method="post" class="form-horizontal">


                                                        Répondre
                                                        <textarea class="form-control"  placeholder="Entrer votre réponse ici" name="texte" required=""></textarea>
                                                    
                                                        <br>
                                                       
                                                        <button class="btn btn-primary ft-compse" type="submit" name="submit">Enregistrer</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <?php
                                    if (isset($_POST['submit'])) 
                                    {
                                        $enonce = addslashes($_POST['texte']);
                                       
                                        $user="eleve";
                                       
                                        
                                       
                                        $res=mysqli_query($con,"insert into forum_reponse (utilisateur, eleve, reponse, mess) values ('$user','$id_eleve','$enonce','$mes') ") or die("erreur j b '$user','$id','$enonce'");

                                       

                                       echo('<script>history.go(-1)</script>');
                                        
                                    }
                                ?>

                            </div>

                            
                        
                    </div>
                </div>
            </div>
        </div>
