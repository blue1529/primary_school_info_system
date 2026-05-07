<?php
require_once __DIR__ . "/../include/db_connect.php";
require_once('../fpdf186/fpdf.php');

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../login/index.php");
    exit();
}

$standard = isset($_GET['standard']) ? $_GET['standard'] : '';
$action   = isset($_GET['action'])   ? $_GET['action']   : 'view';

if (empty($standard)) {
    die("No standard specified");
}

$result = $conn->query("
    SELECT s.first_name, s.last_name,
           g.mathematics, g.english, g.chichewa,
           g.social, g.lifeskills, g.expressive_arts,
           g.agriculture, g.bible_knowledge,
           g.total, g.average, g.grade, g.status
    FROM grades g
    JOIN student s ON g.student_id = s.student_id
    WHERE s.class = '$standard'
    ORDER BY s.last_name, s.first_name
");

if (!$result || $result->num_rows == 0) {
    die("No grades found for Standard $standard");
}

$W = [48, 19, 19, 19, 21, 21, 23, 19, 19, 19, 19, 16, 19];

$HEADERS = ['Student','Math','Eng','Chic','Social','Life','Exp Arts','Agric','Bible','Total','Avg','Grade','Status'];

//Row height 
define('ROW_H', 10);
define('HDR_H', 11);

class PDF extends FPDF
{
    public $standard = '';

    function Header()
    {
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 9, 'STANDARD ' . $this->standard . ' GRADE REPORT', 0, 1, 'C');
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 6, 'Generated on: ' . date('d-m-Y H:i:s'), 0, 1, 'R');
        $this->Ln(4);
    }

    function Footer()
    {
        $this->SetY(-13);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 5, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    
    //  gets table header row.
    function TableHeader($widths, $headers)
    {
        $this->SetFont('Arial', 'B', 9);
        $this->SetFillColor(41, 98, 178);   // deep blue
        $this->SetTextColor(255, 255, 255); // white text
        $this->SetDrawColor(255, 255, 255);
        $this->SetLineWidth(0.3);

        for ($i = 0; $i < count($headers); $i++) {
            $this->Cell($widths[$i], HDR_H, $headers[$i], 1, 0, 'C', true);
        }
        $this->Ln();

        // Reset colours for data rows
        $this->SetTextColor(0, 0, 0);
        $this->SetDrawColor(180, 180, 180);
        $this->SetLineWidth(0.2);
    }

    /**
     * Draw one data row.  Returns new Y position.
     */
    function DataRow($widths, $row, $fill)
    {
        $this->SetFont('Arial', '', 9);
        $this->SetFillColor($fill ? 240 : 255, $fill ? 246 : 255, $fill ? 255 : 255);

        // ── Student name ──────────────────────────────────────────────────────
        $x    = $this->GetX();
        $y    = $this->GetY();
        $name = $row['first_name'] . ' ' . $row['last_name'];

        // Measure how many lines the name needs
        $fontSize   = 9;
        $charWidth  = $fontSize * 0.45; 
        $maxChars   = floor($widths[0] / ($charWidth * 0.352778)); 
        $lines      = ceil(strlen($name) / max(1, $maxChars));
        $cellHeight = max(ROW_H, $lines * ROW_H);

        // Student MultiCell
        $this->MultiCell($widths[0], ROW_H, $name, 1, 'L', $fill);
        $nameEndY = $this->GetY();

        // Move back to same row, column after Student
        $this->SetXY($x + $widths[0], $y);

        // Numeric / text columns
        $cols = [
            'mathematics', 'english', 'chichewa', 'social', 'lifeskills',
            'expressive_arts', 'agriculture', 'bible_knowledge',
            'total', 'average', 'grade'
        ];
        for ($i = 0; $i < count($cols); $i++) {
            $val = $row[$cols[$i]] ?? '-';
            $this->Cell($widths[$i + 1], $cellHeight, $val, 1, 0, 'C', $fill);
        }

        // Status – colour coded
        $status = $row['status'] ?? '-';
        $this->SetFont('Arial', 'B', 9);
        $upper = strtoupper($status);
        if ($upper === 'PASS') {
            $this->SetTextColor(0, 140, 0);
        } elseif ($upper === 'FAIL') {
            $this->SetTextColor(200, 0, 0);
        }
        $this->Cell($widths[12], $cellHeight, $status, 1, 0, 'C', $fill);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial', '', 9);

        // Advance to the correct next Y (whichever is lower)
        $this->SetXY($x, max($nameEndY, $y + $cellHeight));
    }

  
    function GradesTable($widths, $headers, $data)
    {
        $this->TableHeader($widths, $headers);

        $fill = false;
        foreach ($data as $row) {
            // If near bottom, add page and reprint header
            if ($this->GetY() > $this->PageBreakTrigger - 10) {
                $this->AddPage();
                $this->TableHeader($widths, $headers);
                $fill = false;
            }
            $this->DataRow($widths, $row, $fill);
            $fill = !$fill;
        }

        $this->Ln(6);
    }
}

// ─── Building the pdf
$pdf = new PDF('L', 'mm', 'A4');
$pdf->standard = $standard;
$pdf->AliasNbPages();

//  setting margins
$pdf->SetMargins(10, 14, 10);
$pdf->SetAutoPageBreak(true, 18);

$pdf->AddPage();

// ─── Collect data ─────────────────────────────────────────────────────────────
$data   = [];
$passed = 0;
$failed = 0;

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
    if (strtolower($row['status'] ?? '') === 'pass') {
        $passed++;
    } else {
        $failed++;
    }
}

// ─── Table ────────────────────────────────────────────────────────────────────
$pdf->GradesTable($W, $HEADERS, $data);


$totalStudents = count($data);
$passRate      = $totalStudents > 0 ? round(($passed / $totalStudents) * 100, 1) : 0;

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 7, 'Summary Statistics:', 0, 1, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->SetFillColor(240, 246, 255);

$summaryW = [60, 60, 60, 65]; // 4 columns for summary
$pdf->Cell($summaryW[0], 8, 'Total Students: ' . $totalStudents, 1, 0, 'L', true);
$pdf->Cell($summaryW[1], 8, 'Passed: '         . $passed,         1, 0, 'L', true);
$pdf->Cell($summaryW[2], 8, 'Failed: '         . $failed,         1, 0, 'L', true);
$pdf->Cell($summaryW[3], 8, 'Pass Rate: '      . $passRate . '%', 1, 1, 'L', true);

$pdf->Ln(10);

// ─── Signature lines ──────────────────────────────────────────────────────────
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(130, 8, 'Headteacher Signature: _____________________________', 0, 0, 'L');
$pdf->Cell(0,   8, 'Date: ____________________', 0, 1, 'L');
$pdf->Ln(4);
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 5, 'This is a computer-generated document', 0, 0, 'C');

// ─── Output ───────────────────────────────────────────────────────────────────
if ($action === 'download') {
    $pdf->Output('D', 'Standard_' . $standard . '_Grades.pdf');
} else {
    $pdf->Output('I', 'Standard_' . $standard . '_Grades.pdf');
}
?>