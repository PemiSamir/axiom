<?php
    
          
         $requet="SELECT * FROM departement order by code_dep";
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
                                            <li><a href="home_admin.php?page=discipline"><b><span style="color:blue">Disciplines</span></b></a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Nouvelle Discipline</span>
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
        <div class="text-center m-b-md custom-login"><h1>AJOUTER UNE DISCIPLINE</h1></div>
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad addcoursepro">
                                                    <form method="post" class="dropzone dropzone-custom needsclick addlibrary" enctype="multipart/form-data" id="demo1-upload">
                                                        <div class="row">
                                                            
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label class="control-label" for="username">Departement <span style="color:red">*</span></label>
                                                                    <select name="dep" class="form-control" required="">
                                                                            <option value=""></option>
                                                                             <?php 
                                                                                  
                                                                                   while ($row=mysqli_fetch_assoc($resul))
                                                                                    { 
                                                                             ?>
                                                                                 <option value="<?php echo $row['code_dep'];?>"> <?php echo utf8_decode($row['dpt']);?></option>
                                                                             <?php 
                                                                                    }
                                                                              ?>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="text-left control-label" for="username" >Discipline <span style="color:red">*</span></label>
                                                                    <input name="disc" type="text" class="form-control" required="" placeholder="ex : Anglais">
                                                                </div>

                                                                
                                                         
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label class="text-left control-label" for="username" >Code de la discipline <span style="color:red">*</span></label>
                                                                    <input name="code" type="text" class="form-control" required="" placeholder="ex: Ang pour Anglais">
                                                                </div>

                                                                <div class="form-group-">
                                                                    <label class="text-left control-label" for="username" >Image</label>
                                                                    <div class="file-upload-inner file-upload-inner-right ts-forms">
                                                                        <div class="input append-big-btn">
                                                                            <label class="icon-left" for="append-big-btn">
                                                                                    <i class="fa fa-download"></i>
                                                                                </label>
                                                                            <div class="file-button">
                                                                                Parcourir
                                                                                <input type="file" name="image" onchange="document.getElementById('append-big-btn').value = this.value;">
                                                                            </div>
                                                                            <input type="text" id="append-big-btn" placeholder="   no file selected" name="voir">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
 
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
                                                            $dep = addslashes($_POST['dep']);
                                                            $disc = addslashes($_POST['disc']);
                                                            $code = addslashes($_POST['code']);
                                                           
                                                            if ( !empty($_POST["voir"])) {
                                                                $image = addslashes($_FILES['image']['tmp_name']);
                                                                $image_name = addslashes($_FILES['image']['name']);
                                                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/img/" . $_FILES["image"]["name"]);
                                                                $location = "upload/img/" . $_FILES["image"]["name"];

                                                                $res=mysqli_query($con,"INSERT INTO discipline (code_dis, dept, discipline, photo)
                                                                values ('$code','$dep','$disc', '$location') ") or die("erreur ");
                                                            }
                                                            else{

                                                            $res=mysqli_query($con,"INSERT INTO discipline (code_dis, dept, discipline)
                                                                values ('$code','$dep','$disc') ") or die("erreur ");
                                                            }


                                                            echo('<script>location.href = "home_admin.php?page=discipline"</script>');
                                                            
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
        </div>