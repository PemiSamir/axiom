 <?php
     $le=addslashes($_GET['le']);
     //suppression de toutes les compétences liées à l'UA
       $res=mysqli_query($con,"Delete from competence_lec where lecon='$le' and ue='$ue'") or die("erreur ");

       //suppression de l'UA
		$res=mysqli_query($con,"Delete from lecon where id_lecon='$le'") or die("erreur ");  
		     
        echo('<script>location.href = "index_enseignant.php?page=ue"</script>');
                                
?>