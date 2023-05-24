<?php
     if(estConnecte()==0){
         header("Location:index.php?page=signin");
     }                              
?>

<div class="intro intro-single route bg-image" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
       
      </div>
    </div>
  </div>

  <?php
    if(isset($_POST['submit']))
        {
          $contenu = $_POST['edit'];
          $js = file_get_contents('data/collaboratif.json');
          $js = json_decode($js, true);
          $js = $contenu;
          $_SESSION['texte'] = $js;
          $js = $_SESSION['texte'];
          $js = json_encode($js);
          file_put_contents('data/collaboratif.json', $js);

          $validation = "Fichier enregistré !";
        }
  ?>


  <section>
    <!--div class="overlay-mf"></div-->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="contact-mf">
            <div id="contact" class="box-shadow-full">
              <div class="row">
                <br>
                  <div class="row col-md-12 col-lg-12 col-md-push-2 col-lg-push-2" style="margin-top: 10px;">
                    <div class="title-box-2">
                      <h5 class="title-left" style="color:#000;">
                        Editez votre document
                      </h5>
                    </div>
                </div>
              </div>
              <form method="post" name="forEdit" id="forEdit">
                <div>
                  <button onClick="execCmd('bold');" class="bttn"><i class="fas fa-bold"></i></button>
                  <button onClick="execCmd('italic');" class="bttn"><i class="fas fa-italic"></i></button>
                  <button onClick="execCmd('underline');" class="bttn"><i class="fas fa-underline"></i></button>
                  <button onClick="execCmd('strikThrough');" class="bttn"><i class="fas fa-strikethrough"></i></button>
                  <button onClick="execCmd('justifyLeft');" class="bttn"><i class="fas fa-align-left"></i></button>
                  <button onClick="execCmd('justifyCenter');" class="bttn"><i class="fas fa-align-center"></i></button>
                  <button onClick="execCmd('justifyRight');" class="bttn"><i class="fas fa-align-right"></i></button>
                  <button onClick="execCmd('justifyFull');" class="bttn"><i class="fas fa-align-justify"></i></button>
                  <button onClick="execCmd('cut');" class="bttn"><i class="fas fa-cut"></i></button>
                  <button onClick="execCmd('copy');" class="bttn"><i class="fas fa-copy"></i></button>
                  <button onClick="execCmd('indent');" class="bttn"><i class="fas fa-indent"></i></button>
                  <button onClick="execCmd('outdent');" class="bttn"><i class="fas fa-dedent"></i></button>
                  <button onClick="execCmd('subscript');" class="bttn"><i class="fas fa-subscript"></i></button>
                  <button onClick="execCmd('superscript');" class="bttn"><i class="fas fa-superscript"></i></button>
                  <button onClick="execCmd('undo');" class="bttn"><i class="fas fa-undo"></i></button>
                  <button onClick="execCmd('redo');" class="bttn"><i class="fas fa-repeat"></i></button>
                  <button onClick="execCmd('inertUnorderedList');" class="bttn"><i class="fas fa-list-ul"></i></button>
                  <button onClick="execCmd('insertOrderedList');" class="bttn"><i class="fas fa-list-ol"></i></button>
                  <button onClick="execCmd('insertParagraph');" class="bttn"><i class="fas fa-paragraph"></i></button>
                  <select onchange="execCommandWithArg('formatBlock', this.value);">
                    <option value="H1">H1</option>
                    <option value="H2">H2</option>
                    <option value="H3">H3</option>
                    <option value="H4">H4</option>
                    <option value="H5">H5</option>
                    <option value="H6">H6</option>
                  </select>
                  <button onClick="execCmd('insertHorizontalRule');" class="bttn">HR</button>
                  <button onClick="execCommandWithArg('createLink', prompt('Enter a URL', 'http//'));" class="bttn"><i class="fas fa-link"></i></button>
                  <button onClick="execCmd('unlink');" class="bttn"><i class="fas fa-unlink"></i></button>
                  <button onClick="toggleSource();" class="bttn"><i class="fas fa-code"></i></button>
                  <button onClick="toggleEdit();" class="bttn">Toggle Edit</button>
                  <select onchange="execCommandWithArg('fontName', this.value);">
                    <option value="Arial">Arial</option>
                    <option value="Comic Sans MS">Comic Sans MS</option>
                    <option value="Courier">Courier</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Tahoma">Tahoma</option>
                    <option value="Time New Roman">Time New Roman</option>
                    <option value="Verdana">Verdana</option>
                  </select>
                  <select onchange="execCommandWithArg('fontSize', this.value);">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                  </select> 
                  Fore Color:<input type="color" onchange="execCommandWithArg('foreColor', this.value);"/>
                  background:<input type="color" onchange="execCommandWithArg('hiliteColor', this.value);"/>
                  <button onClick="execCommandWithArg('insertImage', prompt('Enter the image URL', ''));" class="bttn"><i class="fas fa-file-image-o"></i></button>
                  <button onClick="execCmd('selectAll');" class="bttn">Select All</button>
                </div>
                
                  <div class="form-group">
                    <textarea id="edit" class="form-control input-mf edit" name="edit" cols="45" rows="8" required></textarea>
                  </div>
               
                <iframe name="frm" class="frm" id="frm">
                </iframe>
                <div class="col-md-10" style="margin-top: 5px;">
                  <button class="btn btn-primary page-scroll long" type="submit" onClick="enregistrer();" name="submit">Enregistrer</button>
                </div>                       
                </form>
                
                <Script type="text/javascript">
                  function execCmd(command){
        frm.document.execCommand(command, false, null);
    }

    function execCommandWithArg(command, arg){
        frm.document.execCommand(command, false, arg);
    }
    function toggleSource(){
        if(showinSourceCode){
            frm.document.getElementsByTagName('body')[0].innerHTML = frm.document.getElementsByTagName('body')[0].textContent;
            showinSourceCode = false;
        }else{
            frm.document.getElementsByTagName('body')[0].textContent = frm.document.getElementsByTagName('body')[0].innerHTML;
            showinSourceCode = true;
        }
    }

    function toggleEdit(){
        if(IsInEditMode){
            frm.document.designMode = 'off';
            IsInEditMode = false;
        }else{
            frm.document.designMode = 'on';
            IsInEditMode = true;
        }
    }

    function enregistrer(){
        var coll= document.getElementById('forEdit');
        coll.elements['edit'].value = window.frames['frm'].document.body.innerHTML;
        coll.submit();
    }

                </Script>

            </div>
          </div>
        </div>
      </div>
    </div>  
  </section>
</div>
