
<?php
require('fpdf.php');
require_once("../config/config.php");

$pid = isset($_GET['pid']) ? $_GET['pid'] : ""; 
$bid = isset($_GET['bid']) ? $_GET['bid'] : ""; 
$eid = isset($_GET['eid']) ? $_GET['eid'] : ""; 
$cDate = isset($_GET['cDate']) ? $_GET['cDate'] : ""; 

class PDF extends FPDF
{
// Load data
function LoadData($pid,$bid,$eid)
{
	// die($pid.'-'.$bid.'-'.$eid);
    // Read file lines
    // $lines = file($file);
	$rsql = "SELECT  product_item.prod_item_id,item_listing.item_code,item_listing.item_name,item_listing.item_photo,item_listing.item_description,
	costing.item_price,costing.item_qty
	FROM product_item 
	INNER JOIN item_listing ON product_item.p_item_id = item_listing.item_id
	INNER JOIN costing ON product_item.p_item_id=costing.item_id
	WHERE p_prod_id=$pid";
	
	$result = mysql_query($rsql);
    $data = array();
    while($row = mysql_fetch_assoc($result))
					
        $data[] = trim($row['item_code']);
    return $data;
}

// Simple table
function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}

// Better table
function ImprovedTable($header,$pid,$bid,$eid,$cDate)
{
	$w = array(40, 35, 40, 45, 30);
	$sql="SELECT buyer_name,buyer_description,buyer_address from buyer where buyer_code=$bid";
	$result = mysql_query($sql);
    while($row = mysql_fetch_assoc($result)){
		$bname = $row['buyer_name'];
		$badd = $row['buyer_address'];
	}
		
		$this->Cell(90);
		$this->Image('mws-logo.png',70,7,30,'C');
		$this->Ln();
		$this->Cell(90);
		$this->Cell(50,7,", Incorporated",'C');
		$this->Ln();
		$this->Cell(40);
		$this->Cell(20,8,"# 3 St., Anthony Village, Highway 77, Talamban, Cebu City, Philippines 6000",'C');
		$this->Ln();
		$this->Cell(35);
		$this->Cell(10,8,"Telefax: 063-32-3444315, Telefax: 063-32-34440706 Email: afilmoda@mozcom.com",'C');
		$this->Ln();
		$this->Cell(70);
		$this->Cell(50,8,"TIN: 272-630-313-000 VAT",'C');
		$this->Ln();
	
	for($i=0;$i<1;$i++){
		$this->Cell($w[$i],8,"Customer Name: ".$bname);
		$this->Ln();
		$this->Cell($w[$i],8,"Address	   : ".$badd);
		$this->Ln();
		$this->Cell($w[$i],8,"Date: ".$cDate);
		$this->Ln();
		$this->Cell($w[$i],8,"PI NO.: ");
		$this->Ln();
	}
    // Column widths
    
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
	
    // Data
	$sql = "SELECT item_listing.item_code,item_listing.item_description,costing.item_price,costing.item_qty 
		FROM product_item 
		INNER JOIN costing ON product_item.p_item_id=costing.	item_id
		INNER JOIN item_listing ON product_item.p_item_id=item_listing.item_id
		where 	p_prod_id=$pid";
	$result = mysql_query($sql);
    while($row = mysql_fetch_assoc($result)){
	
		$total = $row['item_price']*$row['item_qty'];
        $this->Cell($w[0],6,$row['item_code'],'LR');
        $this->Cell($w[1],6,$row['item_description'],'LR');
        $this->Cell($w[2],6,number_format($row['item_qty']),'LR',0,'R');
        $this->Cell($w[3],6,"P ".number_format($row['item_price'],2),'LR',0,'R');
        $this->Cell($w[4],6,"P ".number_format($total,2),'LR',0,'R');
        // $this->Cell($w[4],6,number_format($row[3]),'LR',0,'R');
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}

// Colored table
function FancyTable($header, $data)
{
    // Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(40, 35, 40, 45);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PDF();
// Column headings
$title = 'FILMODA EXPORTS INC.';

$header = array('CODE', 'DESCRIPTION', 'QTY', 'UNIT PRICE', 'AMOUNT');
// Data loading
// $data = $pdf->LoadData($pid,$bid,$eid);
// $pdf->SetTitle($title);
$pdf->SetFont('Arial','',9);
$pdf->AddPage();
$pdf->SetTitle($title);
// $pdf->BasicTable($header,$data);
// $pdf->AddPage();
$pdf->ImprovedTable($header,$pid,$bid,$eid,$cDate);
$pdf->AddPage();
// $pdf->FancyTable($header,$data);
$pdf->Output();
?>
