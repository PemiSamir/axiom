<?php
    
         $classe=$_GET["classe"];

        $requet="SELECT * FROM discipline where code_dis NOT IN (SELECT discipline FROM discipline_classe where classe='$classe') order by code_dis";
        $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");

         $requet="SELECT dc.code, dc.coef, d.discipline, e.Nom, e.grade FROM discipline_classe dc, discipline d, enseignant e where dc.responsable = e.id and dc.discipline=d.code_dis and classe='$classe' order by dc.code";
          $resul=mysqli_query($con,$requet) or die("impossible d'executer ,kll ");

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
                                            <li><a href="home_admin.php?page=classe"><b><span style="color:blue">Classes</span></b></a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Discipline de classe </span>
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
        <div class="text-center m-b-md custom-login"><h1>LES DISCIPLINES DE LA <?php echo $classe;?></h1></div>
        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Liste des disciplines</h4>
                            <div class="add-product">
                                 
                            </div><br>
                            


                            <div class="asset-inner">
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <tr>
                                        <th>Num</th> 
                                        <th>code</th>
                                        <th>Discipline</th>
                                        <th>Coeficient</th>
                                        <th>Responsable</th>
                                        <th>Grade</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                    $i=0;
                                       
                                        while ($row=mysqli_fetch_assoc($resul)) 
                                        { 
                                            $i++;
                                            $disc=$row["code"];

                                            
                                    echo '
                                    <tr>
                                        <td>'.$i.'</td>
                                        <td>'.$row["code"].'</td>
                                        <td><b>'.$row["discipline"].'</b></td>
                                        <td>'.$row["coef"].'</td>
                                        <td>'.$row["Nom"].'</td>
                                        <td>'.$row["grade"].'</td>';
 
                                    ?>
                                        <td>
                                            <button data-toggle="tooltip" title="Aperçu" class="pd-setting-ed"><a href="" target="_blank"><i class="fa fa-eye" style="color:blue" aria-hidden="true"></i></a></button>
                                            <button data-toggle="tooltip" title="Ajouter les discipline" class="pd-setting-ed " ><a href=""><i class="fa fa-pencil-square-o" style="color:green" aria-hidden="true"></i></a></button>
                                            <button data-toggle="tooltip" title="Supprimer" class="pd-setting-ed"><a href=""><i class="fa fa-trash-o" style="color:red" aria-hidden="true"></i></a></button>
                                        </td>

                                    </tr>
                                    <?php
                                        }
                                    ?>
                                    
                                    
                                </table>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                             <h4>Ajouter une discipline</h4>
                            <div class="add-product">
                                 
                            </div><br>
                               <form method="post">

                                    <div class="form-group">
                                        <label class="control-label" for="username">Discipline <span style="color:red">*</span></label>
                                        <select name="disc" class="form-control" required="">
                                                <option value=""></option>
                                                 <?php 
                                                      
                                                       while ($row=mysqli_fetch_assoc($result))
                                                        { 
                                                 ?>
                                                     <option value="<?php echo $row['code_dis'];?>"> <?php echo utf8_decode($row['discipline']);?></option>
                                                 <?php 
                                                        }
                                                  ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="text-left control-label" for="username" >Code de la Discipline dans la classe <span style="color:red">*</span></label>
                                        <input name="code" type="text" class="form-control" required="" placeholder="Ex : Info_5 pour Informatique en 5ieme  ">
                                    </div>

                                    <div class="form-group">
                                        <label class="text-left control-label" for="username" >Coeficient <span style="color:red">*</span></label>
                                        <input name="cof" type="number" class="form-control" required="" placeholder=" ">
                                    </div>
                                    <?php 
                                    $requet="SELECT e.id, e.Nom, e.grade, d.dpt FROM enseignant e, departement d where d.code_dep=e.dept order by d.dpt";
                                    $result=mysqli_query($con,$requet) or die("impossible d'executer ");

                                    ?>
                                    <div class="form-group">
                                        <label class="control-label" for="username">Responsable <span style="color:red">*</span></label>
                                        <select name="prof" class="form-control" required="">
                                                <option value=""></option>
                                                 <?php 
                                                      
                                                       while ($row=mysqli_fetch_assoc($result))
                                                        { 
                                                 ?>
                                                     <option value="<?php echo $row['id'];?>"> <?php echo utf8_decode($row['Nom']).' '.$row['grade'].' '.utf8_decode($row['dpt']);?></option>
                                                 <?php 
                                                        }
                                                  ?>
                                        </select>
                                    </div>
                                    <div class="row"><br>
                                        <div class="col-lg-12">
                                            <div class="payment-adress">
                                                <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                                                if (isset($_POST['submit'])) {
                                                                    
                                                                    $code = addslashes($_POST['code']);
                                                                    $disc=addslashes($_POST['disc']);
                                                                    $cof=addslashes($_POST['cof']);
                                                                    $resp=addslashes($_POST['prof']);
 
                                                                    $reqt="INSERT INTO discipline_classe (code, classe, discipline, coef, responsable) values ('$code','$classe','$disc', '$cof', '$resp')";
                                                                    $res=mysqli_query($con,$reqt)or die("erreur " );
 
                                                                    //echo('<script>location.href = "home_admin.php?page=classe"</script>');
                                                                    echo('<script>history.go(-1)</script>');
                                                                    
                                                                  }
                                                            ?>
                            </div>
                        </div>
                </div>
            </div>
        </div>