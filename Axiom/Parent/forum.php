<?php

    //on les messages
    $requet="SELECT * FROM forum_message order by id_mes desc";
    $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet mess");                       

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
                                            <li><a href="#"><b><span style="color:blue">Forum</b></span></a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        <div class="text-center m-b-md custom-login"><h1>Forum et débat</h1></div>
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
                                                        Avant de poser votre problème, vérifiez les anciens messages
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                        <button type="button" class="btn btn-custon-rounded-two btn-primary"><a href="home_eleve.php?page=add_message"><span style="color:white"><i class="fa fa-pencil"></i> Poser Votre Problème</span></a></button>
                                                    </div>
                                                </div>

                                                <div class="chat-discussion" style="height: auto">

                                                <?php
                                                    while ($row=mysqli_fetch_assoc($result)) 
                                                    {
                                                        $id_m=$row["id_mes"];
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
                                                        <div class="chat-message">
                                                            <div class="profile-hdtc">
                                                                 <img class="message-avatar" src="<?php echo $photo; ?>" alt="">
                                                            </div>
                                                            <div class="message">
                                                                <a class="message-author" href="#"><?php echo $nom.$post; ?></a>
                                                                <span class="message-date">  <?php echo $row["date"]; ?> </span>
                                                                <span class="message-content">
                                                                    <h4 style="text-align:center"> <?php echo $row["sujet"]; ?></h4>
                                                                    <?php echo $row["message"]; ?>
                                                                </span>

                                                                <div class="m-t-md mg-t-10">
                                                                     <?php echo ($row["resolu"]==1) ? '<a class="btn btn-xs btn-success"> Résolu </a>' : '<a class="btn btn-xs btn-danger"> Non résolu </a>'; ?> 
                                                                    <a class="btn btn-xs btn-warning" href="home_eleve.php?page=forum_rep&mess=<?=$id_m ?>"><i class="fa fa-eye"></i> <?php echo mysqli_num_rows($reqp); ?> réponses</a>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                        <hr>
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
            </div>
        </div>
