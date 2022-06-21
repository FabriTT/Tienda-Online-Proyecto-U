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
        $this->Cell(190,20,'Reporte de los Empleados',1,0,'C',true);
        $this->Image('logo.jpg',10,10,20);
        // Salto de línea
        $this->Ln(25);


        $this->SetTextColor(0,0,0);
        $this->SetFillColor(255,165,0);
        

        $this->SetFont('Arial','',12);

        $this->Cell(10, 10, 'ID',1,0,'C',true);
        $this->Cell(20, 10, 'NOMBRE',1,0,'C',true);
        $this->Cell(25, 10, 'PATERNO',1,0,'C',true);
        $this->Cell(25, 10, 'MATERNO',1,0,'C',true);
        $this->Cell(30, 10, 'CARGO',1,0,'C',true);
        $this->Cell(25, 10, 'CARNET',1,0,'C',true);
        $this->Cell(30, 10, 'FECHA N.',1,0,'C',true);
        $this->Cell(25, 10, 'TELEFONO',1,1,'C',true);
        
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

    include_once '../negocios/Negocios_Empleados.php';
    $datosEmpleados = N_mostrar_empleados();
    

    $pdf = new PDF();
    $pdf-> AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',12);
    $i = 1;
    foreach($datosEmpleados as $empleados){
        if($i % 2 == 0){
            $pdf->SetFillColor(255,255,255);
        }else{
            $pdf->SetFillColor(200,200,200);
        }
        $pdf->Cell(10, 10, $empleados['emp_id'],1,0,'C',true);
        $pdf->Cell(20, 10, $empleados['emp_nombre'],1,0,'C',true);
        $pdf->Cell(25, 10, $empleados['emp_paterno'],1,0,'C',true);
        $pdf->Cell(25, 10, $empleados['emp_materno'],1,0,'C',true);
        $pdf->Cell(30, 10, $empleados['car_id'],1,0,'C',true);
        $pdf->Cell(25, 10, $empleados['emp_ci'],1,0,'C',true);
        $pdf->Cell(30, 10, $empleados['emp_fecha_n'],1,0,'C',true);
        $pdf->Cell(25, 10, $empleados['emp_telefono'],1,1,'C',true);
        
        $i++;
    }

    $pdf->Output();




?>