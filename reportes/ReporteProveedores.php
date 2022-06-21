<?php
    require('FPDF/fpdf.php');

    class PDF extends FPDF
    {
    // Cabecera de página
    function Header()
    {
        // Logo
        
        // Arial bold 15
        $this->SetFont('Arial','B',20);
        // Movernos a la derecha
        $this->Cell(1,0);
        //color

        
        $this->SetTextColor(255,165,0);
        // Título
        $this->Cell(190,20,'Reporte de Proveedores',1,0,'C',true);
        $this->Image('logo.jpg',10,10,20);
        // Salto de línea
        $this->Ln(25);


        $this->SetTextColor(0,0,0);
        $this->SetFillColor(255,165,0);
        

        $this->SetFont('Arial','',10);

        $this->Cell(10, 10, 'ID',1,0,'C',true);
        $this->Cell(40, 10, utf8_decode('COMPAÑIA'),1,0,'C',true);
        $this->Cell(60, 10, 'DESCRIPCION',1,0,'C',true);
        $this->Cell(60, 10, 'DIRECCION',1,0,'C',true);
        $this->Cell(20, 10, 'TELEFONO',1,1,'C',true);

    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
    }
    }

    include_once '../negocios/Negocios_Proveedores.php';
    $datosProveedores = N_mostrar_proveedores();
    

    $pdf = new PDF();
    $pdf-> AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',10);
    $i = 1;
    foreach($datosProveedores as $proveedores){
        if($i % 2 == 0){
            $pdf->SetFillColor(255,255,255);
        }else{
            $pdf->SetFillColor(200,200,200);
        }
        $pdf->Cell(10, 10, $proveedores['prov_id'],1,0,'C',true);
        $pdf->Cell(40, 10, $proveedores['prov_compania'],1,0,'C',true);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(60, 10, $proveedores['prov_descripcion'],1,0,'C',true);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(60, 10, $proveedores['prov_direccion'],1,0,'C',true);
        $pdf->Cell(20, 10, $proveedores['prov_telefono'],1,1,'C',true);
        $i++;
    }

    $pdf->Output();




?>