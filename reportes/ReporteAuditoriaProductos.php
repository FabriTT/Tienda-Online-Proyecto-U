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
        $this->Cell(190,20,'Reporte de productos',1,0,'C',true);
        $this->Image('logo.jpg',10,10,20);
        // Salto de línea
        $this->Ln(25);


        $this->SetTextColor(0,0,0);
        $this->SetFillColor(255,165,0);
        

        $this->SetFont('Arial','',10);

        $this->Cell(10, 10, 'ID',1,0,'C',true);
        $this->Cell(50, 10, 'PRODUCTO',1,0,'C',true);
        $this->Cell(15, 10, 'STOCK',1,0,'C',true);
        $this->Cell(28, 10, 'COMPRA $$',1,0,'C',true);
        $this->Cell(28, 10, 'VENTA $$',1,0,'C',true);
        $this->Cell(28, 10, 'FECHA',1,0,'C',true);
        $this->Cell(28, 10, 'ACCION',1,1,'C',true);


        
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

    include_once '../negocios/Negocios_Productos.php';
    $datosProductos = N_mostrar_pro_auditoria();
    

    $pdf = new PDF();
    $pdf-> AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',10);
    $i = 1;
    foreach($datosProductos as $producto){
        if($i % 2 == 0){
            $pdf->SetFillColor(255,255,255);
        }else{
            $pdf->SetFillColor(200,200,200);
        }
        $pdf->Cell(10, 10, $producto['pro_audi_id'],1,0,'C',true);
        $pdf->Cell(50, 10, $producto['pro_audi_descripcion'],1,0,'C',true);
        $pdf->Cell(15, 10, $producto['pro_audi_stock'],1,0,'C',true);
        $pdf->Cell(28, 10, $producto['pro_audi_precio_com'],1,0,'C',true);
        $pdf->Cell(28, 10, $producto['pro_audi_precio_ven'],1,0,'C',true);
        $pdf->Cell(28, 10, $producto['pro_audi_fecha'],1,0,'C',true);
        $pdf->Cell(28, 10, $producto['pro_audi_accion'],1,1,'C',true);
        $i++;
    }

    

    $pdf->Output();




?>