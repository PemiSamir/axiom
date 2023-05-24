

$(document).ready(function(){
    //au focus
    loadFrame();
    
    
    var showinSourceCode=false;
    var IsInEditMode=true;
   

    function loadFrame(){
        frm.document.designMode = 'on';
    }

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
        coll.elements['edit'].value = window.frames['#frm'].document.body.innerHTML;
        coll.submit();
    }

    /*function formaText(bttn){
        var cible = frm.document;

        switch(bttn){
            case 'g':
            cible.execCommand['bold',false,null];
            break;
        }

    }
    */
});