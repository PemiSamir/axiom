
<?php

    require_once(__DIR__ .'\controller\dbConnector.php');
     require_once(__DIR__ .'\assets\fpdf182\fpdf.php');

    $cer=$_GET["cer"];

    $requet="SELECT c.nom_ue, c.classe, c.date, c.id_cer, c.note, e.nom, e.date_nais FROM certification c, eleve e WHERE e.id=c.eleve and c.id_cer='$cer'";
    $result=mysqli_query($con,$requet) or die("impossible d'exécuter la requet");
    $info=mysqli_fetch_assoc($result);

    $ue=$info["nom_ue"];
    $clas=$info["classe"];

   
         class myPDF extends FPDF
        {
         	function header()
         	{

                $this->Image('assets\img\certif\fond.png',0,-1,297,210);
                $this->SetFillColor(20,45,54);

                $this->Image('assets\img\certif\ax.png',120,20);
         		$this->SetFont('Times', 'B', 16);
         		$this->Cell(100,25,'PLATEFORME EDUCATIVE',0,0,'C');
                //$this->Cell(276,20,' ',0,0,'C');
                
                $this->Cell(250,25,'SUIVI DES ENSEIGNEMENTS',0,0,'C');
                $this->Ln();

                $this->SetFont('Times', '', 16);
                $this->Cell(100,0,'**********',0,0,'C');
                $this->SetFont('Times', 'B', 24);
                $this->Cell(72,17,'Axiom',0,0,'C');
                $this->SetFont('Times', '', 16);
                $this->Cell(105,0,'**********',0,0,'C');

                 $this->Ln();
                
                $this->Cell(100,13,'ENSEIGNEMENT SECONDAIRE',0,0,'C');
                
                $this->Cell(72,35,"Education Pour Tous",0,0,'C');
               
                $this->Cell(106,13,'FORMATION CERTIFIANTE',0,0,'C');

         	}
            function footer()
            {
                //$this->SetY(-40);
                //$this->SetFont('Times', '', 9);
                //$this->Cell(276,5,' ',0,0,'C');

               /* $this->SetFont('Courier', 'B', 14);
                $this->SetTextColor(0,0,0);
                $this->Cell(430,25,utf8_decode('Daté du ' ),0,0,'C');*/
            }

            function corp($info)
            {

                

                $this->Ln(30);
                $this->SetFont('Times', 'B', 26);
                $this->SetTextColor(0,32,96);
                $this->Cell(276,10,'CERTIFICATION',0,0,'C');
                $this->Ln();
                $this->SetFont('Times', 'B', 26);
                $this->SetTextColor(0,32,96);
                $this->Cell(276,10,$info["nom_ue"].' '.$info["classe"],0,0,'C');

                $this->Ln();
                $this->SetFont('Times', 'B', 14);
                $this->SetTextColor(0,0,0);
                $this->Cell(480,15,utf8_decode('N° 00'.$info["id_cer"].'/Axiom '),0,0,'C');

                $this->Ln(); 
                $this->Cell(100,1,utf8_decode('La plateforme éducative Axiom,'),0,0,'C');

                $this->Ln(); 
                $this->Cell(95,30,utf8_decode('Certifie que M/Mme/Mlle : '),0,0,'C');

                $this->SetFont('Times', 'B', 26);
                $this->SetTextColor(31,78,121);
                $this->Cell(34,28,utf8_decode($info["nom"]),0,0,'C');

                $this->SetFont('Times', 'B', 14);
                $this->SetTextColor(0,0,0);
                $this->Cell(45,31,utf8_decode(' né le ' ),0,0,'C');

                $this->SetFont('Times', 'B', 20);
                $this->SetTextColor(31,78,121);
                $this->Cell(-1,29,utf8_decode($info["date_nais"]),0,0,'C');

                $this->SetFont('Times', 'B', 14);
                $this->SetTextColor(0,0,0);
                $this->Cell(95,31,utf8_decode(' a subi et réussi avec succès' ),0,0,'C');

                 $this->Ln(); 
                $this->Cell(95,1,utf8_decode("l'évaluation finale de "),0,0,'C');

                $this->SetFont('Times', 'B', 20);
                $this->SetTextColor(31,78,121);
                $this->Cell(36,0,utf8_decode($info["nom_ue"]),0,0,'C');
                $this->SetFont('Times', 'B', 14);
                $this->SetTextColor(0,0,0);
                $this->Cell(77,1,utf8_decode("de la classe de "),0,0,'C');
                $this->SetFont('Times', 'B', 20);
                $this->SetTextColor(31,78,121);
                $this->Cell(-29,0,utf8_decode($info["classe"]),0,0,'C');
                $this->SetFont('Times', 'B', 14);
                $this->SetTextColor(0,0,0);
                $this->Cell(85,1,utf8_decode("avec la note de "),0,0,'C');

                $this->Ln(); 
                $this->SetFont('Times', 'B', 20);
                $this->SetTextColor(31,78,121);
                $this->Cell(276,25,utf8_decode($info["note"].' / 20'),0,0,'C');

                $this->Ln();
                $this->SetFont('Times', 'B', 14);
                $this->SetTextColor(0,0,0);
                $this->Cell(276,1,utf8_decode('En vertu de quoi la présente certification lui est délivrée.' ),0,0,'C');

                $this->Ln();
                $this->Image('assets\img\certif\cer.png',30,170);

                //$this->SetFont('Courier', 'B', 14);
                //$this->SetTextColor(0,0,0);
                //$this->Cell(430,25,utf8_decode('Daté du ' ),0,0,'C');

                $this->SetTextColor(255,0,34);
                $this->Cell(480,30,date('d-m-y',strtotime((string)$info["date"])),0,0,'C');


            }
        }

        $pdf=new myPDF();
        $pdf->AliasNbPages();
        $pdf->AddPage('L','A4',0);
        $pdf->corp($info);
        $pdf->Output();
?>