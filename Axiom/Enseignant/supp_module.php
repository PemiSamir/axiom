 <?php
     $mod=$_GET['module'];
       $res=mysqli_query($con,"Delete from module where code_mod='$mod'") or die("erreur ");
        echo('<script>location.href = "index_enseignant.php?page=module"</script>');
                                
?>