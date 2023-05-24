<?php
     
        $requet="SELECT id_cer, note, classe, date, nom_ue FROM certification WHERE eleve='$id_eleve' order by date desc";
        $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet kk");

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
                                            <li><a href="#">Certification</a>
                                            </li>
                                            <li><span class="bread-blod"></span>
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
        <div class="text-center m-b-md custom-login"><h1>Mes Certifications</h1></div>
        <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                            <h4>Liste de mes Certifications</h4>
                            
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                            <tr>
                                                <th >N°</th>
                                                <th >Image</th>
                                                <th >Classe</th>
                                                
                                                <th >Discipline</th>
                                                <th >Note</th>
                                                
                                                <th >Date</th>
                                               
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                    <?php
                                        $i=mysqli_num_rows($result);
                                       
                                        while ($row=mysqli_fetch_assoc($result)) 
                                        {
                                            
                                            echo '<td>'.$i.'</td>';
                                                  $i--;
                                                  $cer=$row["id_cer"];
                                                  
                                    ?>
                                                  <td> <img src="assets/img/certif/cer1.png"></td>
                                                  <td><?php echo $row["classe"]; ?> </td>
                                                  <td><?php echo $row["nom_ue"]; ?> </td>
                                                  <td><b><span style="color:green"><?php echo $row["note"]; ?> </span></b></td>
                                                  
                                                  <td><?php echo date("d-m-y", strtotime((string)$row["date"])); ?></td>

                                                     
                                        <td>
                                            <button data-toggle="tooltip" title="Aperçu" class="pd-setting-ed btn-info"><a href="certification.php?cer=<?=$cer ?>" target="_blank"><i class="fa fa-eye" style="color:blue" aria-hidden="true"></i></a></button>
                                        </td>

                                    </tr>
                                    <?php
                                        }
                                    ?>
                                    
                                   </tbody>  
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            </div>
                    </div>
                </div>
        