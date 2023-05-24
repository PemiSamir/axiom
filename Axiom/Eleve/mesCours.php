<?php
    $classe=$_SESSION["classe"];
    $requet="SELECT dc.code, d.discipline, d.photo FROM discipline_classe dc, discipline d WHERE dc.classe='$classe' AND dc.discipline=d.code_dis order by dc.code";
        $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

?>


            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
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
                                            <!--li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li-->
                                            <li><span class="bread-blod">Mes cours</span>
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
        
        
       <div class="text-center m-b-md custom-login"><h1>MES COURS</h1></div>
        <div class="library-book-area mg-t-30">
            <div class="container-fluid">
                <div class="row">
                    <?php
                        $i=1;
                        while ($row=mysqli_fetch_assoc($result)) 
                        {
                            $ue=$row["code"];
                            //leçon déjà faites
                            $requet="SELECT distinct lecon FROM lecon_faite WHERE eleve='$id_eleve' and ue='$ue'";
                            $resdv=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
                            

                            $requeet="SELECT id_lecon FROM lecon WHERE ue='$ue'";
                            $resdvl=mysqli_query($con,$requeet) or die("impossible d'exécuter la requet jjjkj");
                           

                            if (mysqli_num_rows($resdv)==0 or mysqli_num_rows($resdvl)==0) 
                            {
                                $a=0;
                            }
                            else
                            {
                               /* $rowf=mysqli_fetch_assoc($resdv);
                                $do=(int)$rowf["fait"];
                                $rowal=mysqli_fetch_assoc($resdvl);
                                $al=(int)$rowal["al"];*/
                                $a= (int)mysqli_num_rows($resdv)/(int)mysqli_num_rows($resdvl);
                                $a= number_format($a*100,0);
                            }

                            //$a=rand(0,100);
                    ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="single-cards-item">
                                    <div class="single-product-image">
                                        <a href="home_eleve.php?page=programme&ue=<?=$ue ?>"><img src="<?php echo $row['photo']; ?>" alt=""></a>
                                    </div>
                                    <div class="single-product-text">
                                       <h4><a class="cards-hd-dn" href="#"><?php echo $row['discipline']; ?></a></h4><br>
                                        <span class="text-inverse"><?php echo $a; ?>%</span>
                                        <div class="progress m-b-0">
                                            <?php
                                             
                                            echo' 
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:'.$a.'%;"> <span class="sr-only">230% Complete</span> </div>
                                        '; ?>
                                        </div>
                                        <a class="follow-cards" href="home_eleve.php?page=programme&ue=<?=$ue ?>">Faire cours</a>
                                    </div>
                                </div>
                            </div>
    <?php
        $i=$i+1;
        if($i==4)
        {
            echo '
                </div>
            </div><br>
            <div class="container-fluid">
                <div class="row">';
            $i=1;
        }
                        }
                    
    ?>
                    </div>
                </div>
            </div><br><br>
        </div>