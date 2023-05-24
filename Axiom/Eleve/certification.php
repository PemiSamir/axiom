<?php

   


     class myPDF extends FPDF
    {
     	function header()
     	{
     		$this->SetFont('Times', 'B', 16);
     		$this->Cell(20,10,'PLATEFORME EDUCATIVE',0,0,'C');
     	}
        function footer()
        {
            $this->SetY(-15);
            $this->SetFont('Times', '', 9);
            
        }
    }

    $pdf=new myPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4',0);
    $pdf->Output();
?>