<?php
$con = mysqli_connect("localhost", "root", "", "koperasi");
require('fpdf/fpdf.php');

class myPDF extends FPDF
{
    function header()
    {
        $this->Image('img/portfolio-1.jpg', 2, 2, 30);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(70);
        $this->Cell(60, 5, 'EMPLOYEE DOCUMENTS', 0, 0, 'C');
        $this->Ln();
        $this->SetFont('Times', '', 12);
        $this->Cell(70);
        $this->Cell(60, 10, 'Street Address of Employee Office', 'B', 0, 'C');
        $this->Ln(20);
    }
    function footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 10, 'Page' . $this->PageNo() . '/{nb}', 0, 0,);
    } 

    function headerTable()
    {
        $this->SetFont('Times', 'B', 10);
        $this->Cell(10, 10, 'No', 1,);
        $this->Cell(30, 10, 'Tanggal Masuk', 1,);
        $this->Cell(40, 10, 'Nama Lengkap', 1,);
        $this->Cell(30, 10, 'Jenis Kelamin', 1,);
        $this->Cell(30, 10, 'Pendidikan', 1,);
        $this->Cell(40, 10, 'Status', 1,);
        $this->Ln();
    }

    function viewTable($con)
    {
        $this->SetFont('Times', '', 12);
        $no = 1;
        $sql = $con->query("SELECT * FROM anggota");
        while ($data = mysqli_fetch_array($sql)) {
            $this->Cell(10, 10, '' . $no++ . '', 1,);
            $this->Cell(30, 10, '' . $data['Tanggal_Entri'] . '', 1, 0, 'L');
            $this->Cell(40, 10, '' . $data['Nama_Anggota'] . '', 1, 0, 'L');
            $this->Cell(30, 10, '' . $data['Jenis_Kelamin'] . '', 1, 0, 'L');
            $this->Cell(30, 10, '' . $data['Pendidikan_Terakhir'] . '', 1, 0, 'L');
            $this->Cell(40, 10, '' . $data['Status_Perkawinan'] . '', 1, 0, 'L');
            $this->Ln();
        }
    }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P', 'A4', 0);
$pdf->headerTable();
$pdf->viewTable($con);
$pdf->Output();
