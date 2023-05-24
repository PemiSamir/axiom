<div class="intro intro-single route bg-image" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
       
      </div>
    </div>
  </div>

  <section class="container" style="margin-top: 120px; color: black;">
      <div class="container">
        <div class="row">
        <br>
        <div class="row col-md-12 col-lg-12 col-md-push-2 col-lg-push-2">
        <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=work">Configuration</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  active" href="#">Terms extracted</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=extract">Class extracted</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Relation extracted</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Atributes extracted</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Axioms extracted</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Rules extracted</a>
        </li>
      </ul>
      </div>
        </div>
        <br>
        <div class="line-mf"></div>
        <br>

  <section>
    <!--div class="overlay-mf"></div-->
    
   <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="contact-mf">
            <div id="contact" class="box-shadow-full">
                
                
          <article class="row">
             <div class="col-md-12">
          <center>
            <table class="table table-bordered table-striped tablecondensed" style="border:5px; border-radius: 10%; border-color: red; text-align: center;">
                    <tbody>
                            <tr>
                      <th colspan="3">
                        <form class="was-validated navbar-form navbar-left col-md-4 center">
                          <div class="form-group">
                    <!--label>Search all fields:</label-->
                    <input type="text" class="form-control" placeholder="Search all fields">
                    <!--a href="#"><i class="fa fa-search"></i></a-->
                  </div>
                        </form>
                      </th>
                          </tr>
                            
                            <tr>
                      <th colspan="3">
                        <nav aria-label="...">
                                  <ul class="pagination">
                                    <li class="page-item disabled">
                                      <a class="page-link" href="#">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active">
                                      <span class="page-link">
                                        2
                                        <span class="sr-only">(current)</span>
                                      </span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                      <a class="page-link" href="#">Next</a>
                                    </li>
                                  </ul>
                                </nav>
                      </th>
                          </tr>
  <?php
  $monfichier = fopen('./data/data_terms_long.txt', 'r+');
  $entete='Validate           name          type of extract\n';
  fputs($monfichier,$entete);
?>                            
                            <tr>
                                <td>
                                    <form>
                             <label>validate</label><br/>
                                        <input type="checkbox"  >
                                    </form>
                                </td>
                                <td>
                                    <form>
                             <label>name</label><br/>
                                        <input type="text" style="border-radius:6px;">
                                    </form>
                                </td>
                                <td>
                                    <form>
                             <label>type of term</label ><br/>
                                        <input type="text" style="border-radius:6px;">
                                    </form>
                                </td>
                            </tr>
<?php
    $string = file_get_contents("data/data_terms_short.json");
    $json = json_decode($string, true);
    foreach ($json as $key => $value) {
        if (!is_array($value)) {
            echo $key . '=>' . $value . '<br />';
        } else {
                echo '
                        <tr>
                        <td>
                            <form>
                                <input type="checkbox">
                            </form>
                        </td>
                        <td>

                            <form style="border: 2px rgb(222,231,243) solid ; border-radius:6px; margin : auto; padding: 3px;">
                                <label  > ' .$value['name'].'  </label >
                            </form>
                        </td>
                        <td>
                            <form style="border: 2px rgb(222,231,243) solid ; border-radius:6px; margin : auto; padding: 3px;">
                                <label  > ' .$value['typeOffExtracted'].'  </label >
                            </form>
                        </td>
                    </tr>
                ';
/*                 $ligne=$value['validate']. '          '.$value['name'].'         '.$value['typeOffExtracted'].'\n';
                fputs($monfichier,$ligne);   */             
                }
    }
    fclose($monfichier);
?>

                      <th colspan="3">
                        <nav aria-label="...">
                                  <ul class="pagination row">
                                    <li class="page-item disabled col-md-2">
                                      <span class="page-link">Previous</span>
                                    </li>
                                    <li class="page-item active col-md-1">
                                      <span class="page-link">
                                        1
                                        <span class="sr-only">(current)</span>
                                      </span>
                                    </li>
                                    <li class="page-item col-md-1"><a class="page-link" href="#">2</a></li>

                                    <li class="page-item col-md-1"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item col-md-2">
                                      <a class="page-link" href="#">Next</a>
                                    </li>
                                    <li class="page-item col-md-offset-2 col-md-2 "  >
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal" > Ajouter un Terme </button>
                                    </li>                                    
                                  </ul>
                                </nav>
                      </th>
                          </tr>
                        <tbody>
                  </table>
        <div class="modal" id="myModal" z-index:10 >
					<div class="modal-dialog" >
						<div class="modal-content" >
							<div class="modal-header" >
								<h5 class="modal-title" > Entrer les informations à ajouter </h5>
								<button class="close" type="button" data-dismiss="modal" ><span> &times; </span> </button>
							</div>
							<div class="modal-body" >
								<form method="post" action="functions/process2.php">
								  <div class="form-group row">
								    <label for="index" class="col-sm-2 col-form-label">Index </label>
								    <div class="col-sm-10">
								      <input type="number" class="form-control" id="index" name="index" placeholder="Index">
								    </div>
								  </div>
								    <div class="form-group row">
								    <label for="name" class="col-sm-2 col-form-label">Name </label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="name" name="name" placeholder=" Votre nom ">
								    </div>
								  </div>
								  <div class="form-group row">
								    <label for="terms" class="col-sm-2 col-form-label">Type of terms </label>
								    <div class="col-sm-10">
								      <input type="terms" class="form-control" id="terms" name="terms" placeholder="Type de termes ">
								    </div>
								  </div>
								  <div class="form-group row">
								    <div class="col-sm-10">
								      <button type="submit" class="btn btn-primary"> Valider</button>
								    </div>
								  </div>
								</form>
							</div>
							<div class="modal-footer" >
								<button class="btn btn-danger" data-dismiss="modal" > Fermer </button>
							</div>
						</div>
					</div>
				</div>
              </center>
            </div>
              </article>
                  <div class="col-md-12">
                    <br/><br/>
                    <button class="button button-a">
                        <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span> Export to PDF
                    </button>
                    <a href="./data/data_terms_long.json"download="data_terms_long.json" >
                      <button class="button button-a">
                          <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span> Export to JSON
                      </button>
                    </a>
                    <a href="./data/data_terms_long.txt"download="data_terms_long.txt" >
                      <button class="button button-a">
                          <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span> Export to text
                      </button>
                    </a>
                 </div>
                
          
          </div>
           </div>
  
        </div>
   </div>
  </div>
  </div>  
    </section>