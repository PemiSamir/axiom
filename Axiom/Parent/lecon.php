<?php
    $ue=$_GET["ue"];
        //selecion des discipline du departement de cette classe
        $requet="SELECT code_mod, num, module, image, description FROM module WHERE dis_cl='$ue' order by num";
        $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

        $requet="SELECT d.discipline FROM discipline_classe dc, discipline d WHERE d.code_dis=dc.discipline and dc.code='$ue'";
            $resu=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
            $disp=mysqli_fetch_assoc($resu);

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
                                            <li><a href="home_eleve.php?page=mesCours"><b><span style="color:blue">Mes Cours</span></b></a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Programme</span>
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
        <div class="text-center m-b-md custom-login"><h1>Programme de : <?php echo $disp["discipline"]?></h1></div>
        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <br>
                            <div class="asset-inner">
                                <table >
                                    
                                    <?php
                                       
                                       //on affiche les module
                                        while ($row=mysqli_fetch_assoc($result)) 
                                        {
                                            echo '
                                                <tr style="background-color:">
                                                    <td style="background-color:;text-align:center"><img src="'.$row["image"].'" alt="" /></td>
                                                    
                                                    <td><h4 style="color:;text-align:">Module '.$row["num"].': '.$row["module"].'</h4></td>
                                                    <td></td>
                                                    <td></td>
                                                  
                                                </tr>';
                                            $mod=$row["code_mod"];

                                            
                                            $requet="SELECT code_ua, num_ua, ua, image FROM unite_apprentissage WHERE module='$mod' order by num_ua";
                                            $rcp=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

                                            //pour chaque module on affiche ses ua
                                            while ($rowua=mysqli_fetch_assoc($rcp)) 
                                                {
                                                    echo '
                                                        <tr>
                                                            <td style="background-color:;text-align:right"><img src="'.$rowua["image"].'" alt="" /></td>
                                                            <td style="background-color:;text-align:"><h5><b>UA '.$rowua["num_ua"].': '.$rowua["ua"].'</b></h5></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>';
                                                    $cua=addslashes($rowua["code_ua"]);

                                                    
                                                
                                                    $requet="SELECT id_lecon, num_lec, lecon, duree, type FROM lecon WHERE ua='$cua' and ue='$ue' order by num_lec";
                                                    $uerq=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

                                                    //pour chaque ua on affiche ses leçon
                                                    while ($rowue=mysqli_fetch_assoc($uerq)) 
                                                        {
                                                            echo '
                                                                <tr>';
                                                                    $lec=(int)$rowue["id_lecon"];

                                                                    $couleur=" ";
                                                                    $requet="SELECT * FROM lecon_faite WHERE eleve='$id_eleve' and lecon='$lec' and ue='$ue'";
                                                                    $resdv=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
                                                                    if (mysqli_num_rows($resdv)!=0) 
                                                                    {
                                                                        $couleur="red";
                                                                    }

                                                                    
                                                                    
                                                                    
                                                                     //selecion du cours
                                                                    $requet="SELECT id_cours FROM cours WHERE statut=1 and lecon='$lec' and ue='$ue'";
                                                                    $resdv=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
                                                                    $ro=mysqli_fetch_assoc($resdv);
                                                                    $id_cours=$ro["id_cours"];

                                                                    ?>
                                                                    <td></td>
                                                                    <td style="text-align:center; color:"><a href="home_eleve.php?page=rappelPrerequis&le=<?=$lec ?>&ua=<?=$cua ?>&id_cours=<?=$id_cours ?>"><h5 style="color:<?php echo $couleur; ?>"><b style=" "><u> Leçon <?php echo $rowue["num_lec"].': '.$rowue["lecon"]; ?></u></b></h5></a></td>
                                                                    <?php
                                                                    
                                                                    $requet="SELECT competence_lec FROM competence_lec WHERE lecon='$lec' and ue='$ue'";
                                                                    $cpue=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

                                                                    //pour chaque lecon on affiche ses compétences
                                                                    echo '<td style="text-align:">';
                                                                    if(mysqli_num_rows($cpue)>0)
                                                                    {
                                                                        while ($compue=mysqli_fetch_assoc($cpue)) {
                                                                            echo' - '.$compue["competence_lec"].'<br>';  
                                                                        }
                                                                    }

                                                                    echo '</td>
                                                                           <td></td>
                                                                           ';

                                                            echo '</tr>';
                                                                

                                                        }

                                        
                                    
                                                }
                                        }
                                    ?>
                                    
                                    
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>