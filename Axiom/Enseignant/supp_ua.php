 <?php
     $ua=addslashes($_GET['ua']);
     //suppression de toutes les compétences liées à l'UA
       $res=mysqli_query($con,"Delete from competence_ua where ua='$ua' and ue='$ue'") or die("erreur ");

       //suppression de l'UA
		$res=mysqli_query($con,"Delete from unite_apprentissage where code_ua='$ua'") or die("erreur ");  
		     
        echo('<script>location.href = "index_enseignant.php?page=ua"</script>');
                                
?>