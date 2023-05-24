<div class="intro intro-single route bg-image" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
       
      </div>
    </div>
  </div> >
  
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
    <a class="nav-link" href="index.php?page=term">Terms extracted</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="index.php?page=extract">Class extracted</a>
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
                      <th colspan="5">
                        <form>
                          <div class="form-group">
                            <label for="inputAddress2" style="float: left;" >Enter a class Using SparQL</label> <br/>
                            <input type="text" class="form-control col-7" id="inputAddress2" placeholder=" ">
                          </div>
                        </form>
                      </th>
                          </tr>
                            
                            <tr>
                      <th colspan="5">
                        <form class="was-validated navbar-form navbar-left col-md-7 center">
                          <div class="form-group">
                    <label>Search all fields:</label>
                    <input type="text" class="form-control" placeholder="Enter KeyWord">
                    <!--a href="#"><i class="fa fa-search"></i></a-->
                  </div>
                        </form>
                      </th>
                          </tr>
 <?php
  $monfichier = fopen('./data/data_classes.txt', 'r+');
  $entete='   Name          Description           Synonyms          Subclasses          Validate\n';
  fputs($monfichier,$entete);
?>                           
                            <tr>
                                <td>
                                    <form>
                             <label>Name</label>
                                        <input type="text" style="border-radius:6px;">
                                    </form>
                                </td>
                                <td>
                                    <form>
                             <label>Description </label ><br/>
                                    </form>
                                </td>
                                <td>
                                    <form>
                             <label>Synonyms </label ><br/>
                                    </form>
                                </td>
                                <td>
                                    <form>
                             <label>Subclasses </label ><br/>
                                    </form>
                                </td>
                                <td>
                                    <form>
                             <label>Validate </label ><br/>
                                    </form>
                                </td>                                                                
                            </tr>
<?php
    $string = file_get_contents("data/data_classes.json");
    $json = json_decode($string, true);
    foreach ($json as $key => $value) {
        if (!is_array($value)) {
            echo $key . '=>' . $value . '<br />';
        } else {
                echo '
                        <tr>
                        <td>
                            <form style="border: 2px rgb(222,231,243) solid ; border-radius:6px; margin : auto; padding: 3px;">
                                <label  > ' .$value['name'].'  </label >
                            </form>
                        </td>
                        <td>
                            <form style="border: 2px rgb(222,231,243) solid ; border-radius:6px; margin : auto; padding: 3px;">
                                <label> ' .$value['description'].'  </label >
                            </form>
                        </td>
                        <td>
                            <form style="border: 2px rgb(222,231,243) solid ; border-radius:6px; margin : auto; padding: 3px;">
                                <label> ' .$value['Synonyms'].'  </label >
                            </form>
                        </td>
                        <td>
                            <form style="border: 2px rgb(222,231,243) solid ; border-radius:6px; margin : auto; padding: 3px;">
                                <label> ' .$value['Subclasses'].'  </label >
                            </form>
                        </td>
                        <td>
                            <form style="border: 2px rgb(222,231,243) solid ; border-radius:6px; margin : auto; padding: 3px;">
                                <label> ' .$value['validate'].'  </label >
                            </form>
                        </td>
                    </tr>
                ';
                $ligne=$value['name']. '          '.$value['description'].'         '.$value['Synonyms'].'          '.$value['Subclasses'].'          '.$value['validate'].'\n';
                fputs($monfichier,$ligne);              
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
                                    <a href="index.php?page=inserer"><button class="btn btn-primary"> Ajouter une nouvelle classe </button></a>
                                    </li>                                    
                                  </ul>
                                </nav>
                      </th>
                          </tr>
                        <tbody>
                  </table>

              </center>
            </div>
              </article>
                  <div class="col-md-12">
                    <br/><br/>
                    <button class="button button-a">
                        <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span> Export to PDF
                    </button>
                    <a href="./data/data_classes.json"download="data_classes.json" >
                      <button class="button button-a">
                          <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span> Export to JSON
                      </button>
                    </a>
                    <a href="./data/data_classes.txt"download="data_classes.txt" >
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