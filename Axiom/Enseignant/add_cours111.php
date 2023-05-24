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
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Compose Mail</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Prerequis</a></li>
                                <li><a href="#reviews">Situation Problème</a></li>
                                <li><a href="#INFORMATION">Trace Ecrite</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="hpanel email-compose">
                            <div class="panel-heading hbuilt">
                                <div class="p-xs h4">
                                    Enoncé
                                </div>
                            </div>
                            <div class="panel-heading hbuilt">
                                <div class="p-xs">
                                    <form method="post" class="form-horizontal">
                                        <!--div class="form-group">
                                            <label class="col-lg-1 control-label text-left">To:</label>
                                            <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                                <input name="email" type="text" class="form-control input-sm" placeholder="example@email.com">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-1 control-label text-left">Cc:</label>
                                            <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                                <input id="" type="text" class="form-control input-sm">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-1 control-label text-left">Subject:</label>
                                            <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" class="form-control input-sm" placeholder="Subject">
                                            </div>
                                        </div-->
                                        
                                        <div class="panel-body no-padding">
                                            <textarea class="summernote6" name="texte">
                                            
                                            </textarea>
                                        </div>

                                        <br>

                                        <div id="cible">
                            
                            
                                        </div>

                                        <input type="text" name="typexo" class="hidden" value="prerequis">
                                        <div class="btn-group">
                                            <button class="btn btn-success"><i class="icon-signin icon-large"></i>&nbsp;+ Question</button>
                                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#student" role="button" onclick="addQts('QCM','cible')">&nbsp;QCM</a></li>
                                                <li><a href="#teacher" role="button"  onclick="addQts('VF','cible')">&nbsp;Vrai ou Faux</a></li>
                                                <li><a href="#student" role="button"  onclick="addQts('QRO','cible')">&nbsp;à Réponse Ouverte</a></li>
                                            </ul>
                                        </div>

                                        <br><br>
                                        <div class="panel-footer">
                                
                                <!--div class="pull-right">
                                    <div class="btn-group active-hook">
                                        <button class="btn btn-default"><i class="fa fa-edit"></i> Save</button>
                                        <button class="btn btn-default"><i class="fa fa-trash"></i> Discard</button>
                                    </div>
                                </div-->
                                <button class="btn btn-primary ft-compse" type="submit" name="submit">Enregistrer</button>
                                <!--div class="btn-group active-hook mail-btn-sd">
                                    <button class="btn btn-default"><i class="fa fa-paperclip"></i> </button>
                                    <button class="btn btn-default"><i class="fa fa-image"></i> </button>
                                </div-->
                            </div>
                                    </form>
                                </div>
                            </div>
                            
                            
                        </div>

                        <?php
                            if (isset($_POST['submit'])) {
                                $enonce = addslashes($_POST['texte']);
                                $typ=$_POST["typexo"];
                                
                                if (isset($_FILES['image'])) {
                                    $image = addslashes($_FILES['image']['tmp_name']);
                                    $image_name = addslashes($_FILES['image']['name']);
                                    $image_size = getimagesize($_FILES['image']['tmp_name']);

                                    move_uploaded_file($_FILES["image"]["tmp_name"], "upload/img/" . $_FILES["image"]["name"]);
                                    $location = "upload/img/" . $_FILES["image"]["name"];
                                }

                                $res=mysqli_query($con,"insert into exercice (enoncer,ue,type)
                                    values ('$enonce','$ue','$typ') ") or die("erreur ".$enonce." ".$ue);

                                //inserer les questions dans la bd
                                if (isset($_POST["nbqst"])) {

                                    $requet="SELECT max(id_exo) FROM exercice";
                                     $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
                                     $r=mysqli_fetch_assoc($result); 

                                     $exo=(int)$r["max(id_exo)"];
                                     //le nombre de question
                                    $nb=(int)$_POST["nbqst"];

                                    for ($i=1; $i <=$nb ; $i++) { 

                                        if ($_POST["typeQst_".$i]=="QCM") {

                                            $typeQst=addslashes($_POST["typeQst_".$i]);

                                            $question=addslashes($_POST["question_".$i]);
                                            $commentaire=addslashes($_POST["com_".$i]);

                                            $prop1=addslashes($_POST["prop1_".$i]);
                                            $prop2=addslashes($_POST["prop2_".$i]);
                                            $prop3=addslashes($_POST["prop3_".$i]);
                                            $prop4=addslashes($_POST["prop4_".$i]);

                                            $rep=addslashes($_POST["reponse_".$i]);
                                            if ($rep=="A") {
                                                $reponse=$prop1;
                                            }
                                            elseif ($rep=="B") {
                                                $reponse=$prop2;                                            
                                            }
                                            elseif ($rep=="C") {
                                                $reponse=$prop3;
                                            }
                                            elseif ($rep=="D") {
                                                $reponse=$prop4;
                                            }

                                            $res=mysqli_query($con,"insert into question (exo, ue, type, question, commentaire, reponse, prop1, prop2, prop3, prop4) VALUES('$exo','$ue','$typeQst','$question','$commentaire','$reponse','$prop1','$prop2','$prop3','$prop4') ") or die("erreur ".$question." ".$reponse);

                                        }

                                        if ($_POST["typeQst_".$i]=="VF") {
                                            
                                            $typeQst=addslashes($_POST["typeQst_".$i]);
                                            $question=addslashes($_POST["question_".$i]);
                                            $commentaire=addslashes($_POST["com_".$i]);

                                            $prop1="VRAI";
                                            $prop2="FAUX";
                                            $reponse=$_POST["reponse_".$i];

                                            $res=mysqli_query($con,"insert into question (exo, ue, type, question, commentaire, reponse, prop1, prop2) VALUES('$exo','$ue','$typeQst','$question','$commentaire','$reponse','$prop1','$prop2') ") or die("erreur ".$question." ".$reponse);
                                        }

                                        if ($_POST["typeQst_".$i]=="QRO") {
                                            
                                            $typeQst=addslashes($_POST["typeQst_".$i]);
                                            $question=addslashes($_POST["question_".$i]);
                                            $commentaire=addslashes($_POST["com_".$i]);

                                           $reponse=$_POST["reponse_".$i];

                                           $res=mysqli_query($con,"insert into question (exo, ue, type, question, commentaire, reponse) VALUES('$exo','$ue','$typeQst','$question','$commentaire','$reponse') ") or die("erreur ".$question." ".$reponse);
                                        }
                                    }
                                }

                                //echo('<script>location.href = "index_enseignant.php?page=module"</script>');
                                
                              }
                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="reviews">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="hpanel email-compose">
                            <div class="panel-heading hbuilt">
                                <div class="p-xs h4">
                                    Enoncé
                                </div>
                            </div>
                            <div class="panel-heading hbuilt">
                                <div class="p-xs">
                                    <form method="post" class="form-horizontal">
                                        <!--div class="form-group">
                                            <label class="col-lg-1 control-label text-left">To:</label>
                                            <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                                <input name="email" type="text" class="form-control input-sm" placeholder="example@email.com">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-1 control-label text-left">Cc:</label>
                                            <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                                <input id="" type="text" class="form-control input-sm">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-1 control-label text-left">Subject:</label>
                                            <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" class="form-control input-sm" placeholder="Subject">
                                            </div>
                                        </div-->
                                        
                                        <div class="panel-body no-padding">
                                            <textarea class="summernote6" name="texte">
                                            
                                            </textarea>
                                        </div>

                                        <br>

                                        <div id="cible1">
                            
                            
                                        </div>

                                        <input type="text" name="typexo" class="hidden" value="SP">
                                        <div class="btn-group">
                                            <button class="btn btn-success"><i class="icon-signin icon-large"></i>&nbsp;+ Question</button>
                                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#student" role="button" onclick="addQts('QCM','cible1')">&nbsp;QCM</a></li>
                                                <li><a href="#teacher" role="button"  onclick="addQts('VF','cible1')">&nbsp;Vrai ou Faux</a></li>
                                                <li><a href="#student" role="button"  onclick="addQts('QRO','cible1')">&nbsp;à Réponse Ouverte</a></li>
                                            </ul>
                                        </div>

                                        <br><br>
                                        <div class="panel-footer">
                                
                                <!--div class="pull-right">
                                    <div class="btn-group active-hook">
                                        <button class="btn btn-default"><i class="fa fa-edit"></i> Save</button>
                                        <button class="btn btn-default"><i class="fa fa-trash"></i> Discard</button>
                                    </div>
                                </div-->
                                <button class="btn btn-primary ft-compse" type="submit" name="submit">Enregistrer</button>
                                <!--div class="btn-group active-hook mail-btn-sd">
                                    <button class="btn btn-default"><i class="fa fa-paperclip"></i> </button>
                                    <button class="btn btn-default"><i class="fa fa-image"></i> </button>
                                </div-->
                            </div>
                                    </form>
                                </div>
                            </div>
                            
                            
                        </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="devit-card-custom">
                                                            <div class="form-group">
                                                                <input type="url" class="form-control" placeholder="Facebook URL">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="url" class="form-control" placeholder="Twitter URL">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="url" class="form-control" placeholder="Google Plus">
                                                            </div>
                                                            <div class="form-group">
                                                                url de la maison
                                                                <input type="url" class="form-control" placeholder="Linkedin URL">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
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
            </div>
        </div>

        <script type="text/javaScript">
            var i=1;
            function addQts(type,cible)
            { 
               
                var contenu=document.getElementById(cible).innerHTML;
                if (type=="QCM") {
                    contenu=contenu+'<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="form-group">Question '+i+' <span style="color:red">*</span><textarea name="question_'+i+'" class="form-control" placeholder="saisissez la question ici"></textarea></div> <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class="form-group-inner"><div class="row"><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">A: </div><div class="col-lg-10 col-md-10 col-sm-10 col-xs-12"><input type="text" name="prop1_'+i+'" class="form-control"></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"><input name="reponse_'+i+'" value="A" type="radio"></div></div></div><div class="form-group-inner"><div class="row"><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">B: </div><div class="col-lg-10 col-md-10 col-sm-10 col-xs-12"><input type="text" name="prop2_'+i+'" class="form-control"></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"><input name="reponse_'+i+'" value="B" type="radio"></div></div></div><div class="form-group-inner"><div class="row"><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">C: </div><div class="col-lg-10 col-md-10 col-sm-10 col-xs-12"><input type="text" name="prop3_'+i+'" class="form-control"></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"><input name="reponse_'+i+'" value="C" type="radio"></div></div></div><div class="form-group-inner"><div class="row"><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">D: </div><div class="col-lg-10 col-md-10 col-sm-10 col-xs-12"><input type="text" name="prop4_'+i+'" class="form-control"></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"><input name="reponse_'+i+'" value="D" type="radio"></div></div></div></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div><div class="col-lg-5 col-md-5 col-sm-5 col-xs-12"><div class="form-group">Commentaire<textarea name="com_'+i+'" class="form-control" placeholder="commenter la question après le choix de la réponse"></textarea></div></div><input type="text" name="typeQst_'+i+'" class="hidden" value="QCM"></div></div><br><br>';
                }
                if (type=="VF") {
                    contenu=contenu+'<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="form-group">Question '+i+' <span style="color:red">*</span><textarea name="question_'+i+'" class="form-control" placeholder="saisissez la question ici"></textarea></div> <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><div class="form-group-inner"><div class="row"><div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">Vrai: </div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"><input name="reponse_'+i+'" value="VRAI" type="radio"></div></div></div><div class="form-group-inner"><div class="row"><div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">Faux: </div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"><input name="reponse_'+i+'" value="FAUX" type="radio"></div></div></div></div><div class="col-lg-7 col-md-7 col-sm-7 col-xs-12"><div class="form-group">Commentaire<textarea  class="form-control" name="com_'+i+'"  placeholder="commenter la question après le choix de la réponse"></textarea></div></div><input type="text" name="typeQst_'+i+'" class="hidden" value="VF"></div></div><br><br>';
                }
                if (type=="QRO") {
                    contenu=contenu+'<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="form-group">Question '+i+' <span style="color:red">*</span><textarea name="question_'+i+'" class="form-control" placeholder="Question à réponse Ouverte : la réponse devra être saisie"></textarea></div><div class="form-group-inner"><div class="row"><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">mots clé: <span style="color:red">*</span></div><div class="col-lg-10 col-md-10 col-sm-10 col-xs-12"><input type="text" name="reponse_'+i+'" class="form-control" placeholder="les termes à retrouver dans la réponse exp: système,numerique,analyser"></div></div></div><div class="col-lg-5 col-md-5 col-sm-5 col-xs-12"><div class="form-group">Commentaire<textarea name="com_'+i+'" class="form-control" placeholder="commenter la question après la réponse de la réponse"></textarea></div></div><input type="text" name="typeQst_'+i+'" class="hidden" value="QRO"></div></div><br><br>';
                }
                
                contenu=contenu+'<input type="text" name="nbqst" class="hidden" value="'+i+'">';
                                     
                document.getElementById(cible).innerHTML=contenu;
                i++;
            }

           
        </script>