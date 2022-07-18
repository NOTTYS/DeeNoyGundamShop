<?php
session_start();
include('Database/db.con.php');
include('functions.php');
@$order_id = $_GET['id'];
$user_id = $_SESSION['customerid'];
$sql = "SELECT * FROM tb_orderDetail INNER JOIN tb_order ON tb_orderDetail.order_id=tb_order.order_id WHERE tb_orderDetail.order_id = $order_id";
$query = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($query)
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao&display=swap" rel="stylesheet">
<div class="container">
    <img src="Resources/images/logo.png" alt="logo" height="200px" class="mx-auto d-block">
    <p class="text-center" style="font-family: 'Noto Sans Lao', sans-serif;">ຮ້ານຂາຍຫຸ່ນກັນດັ້ມ</p>
    <p class="text-center" style="font-family: 'Noto Sans Lao', sans-serif;">Address: Saphungmor</p>
    <p class="text-center" style="font-family: 'Noto Sans Lao', sans-serif;">Tel: 02078016240</p>
    <p class="text-center" style="font-family: 'Noto Sans Lao', sans-serif;">ໃບບິນ</p>
    <hr>

    <p style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ໃບບິນທີ: <?php echo $order_id ?></p>
    <p style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ວັນທີ: <?php echo $rows['order_date'] ?></p>
    <p style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ຊື່ຜູ້ສັ່ງຊື້: <?php $cus = "SELECT firstname, lastname FROM tb_customer WHERE customer_id = $user_id"; $cus_run = mysqli_query($conn, $cus); $cus_row = mysqli_fetch_array($cus_run); echo $cus_row['firstname'].' '.$cus_row['lastname']; ?></p>
    <p style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ຊື່ຜູ້ຮັບ: <?php echo $rows['firstname'] . " " . $rows['lastname'] ?></p>
    <p style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ເບີໂທ: <?php echo $rows['phone_number'] ?></p>
    <p style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ທີຢູ່: <?php echo $rows['address'] ?></p>
    <p style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ເລກທີບ້ານ: <?php echo $rows['house_id'] ?></p>
    <p style="font-family: 'Noto Sans Lao', sans-serif;" class='fs-5'>ສິນຄ້າທີ່ສັ່ງຊື້:</p>
    <?php
    $total = 0;
    $totalOfUnit = 0;
    foreach ($query as $row) {
        $product_id = $row['product_id'];
        $product_name = $row['product_name'];
        $amount = $row['amount'];
        $price = $row['price'];
        $totalOfUnit = $price * $amount;
        $total = $total + $totalOfUnit;

    ?>
        <p style="font-family: 'Noto Sans Lao', sans-serif;" class=''><?php echo $product_id . ". " . $product_name . " x" . $amount . " ລາຄາ " . number_format($totalOfUnit) . " ກີບ " ?></p>

    <?php }
    if (isset($user_id)) {
        $sql_command = "SELECT * FROM tb_customer WHERE customer_id = $user_id";
        $sql_run = mysqli_query($conn, $sql_command);
        $fetch = mysqli_fetch_array($sql_run);
        if ($fetch['role'] == 'admin') {
            $update = "UPDATE tb_order SET readStatus = 1 WHERE order_id = $order_id";
            $perform = mysqli_query($conn, $update);
        }
    }
    ?>
    <hr>
    <h5 style="font-family: 'Noto Sans Lao', sans-serif;">ລວມລາຄາທັງໝົດ: <?php echo number_format($total) ?> ກີບ</h5>
    <script>
        window.print()
        onafterprint = function() {
            history.back()
        }
    </script>
</div>
<?php
?>
<?php
// include('FPDF/fpdf.php');


// //A4 width : 219mm
// //default margin : 10mm each side
// //writable horizontal : 219-(10*2)=189mm

// $pdf = new FPDF('P','mm','A4');

// $pdf->AddPage();

// //set font to arial, bold, 14pt
// $pdf->SetFont('Arial','B',14);

// //Cell(width , height , text , border , end line , [align] )

// $pdf->Cell(130	,5,'Gemul Cars Co',0,0);
// $pdf->Cell(59	,5,'INVOICE',0,1);//end of line

// //set font to arial, regular, 12pt
// $pdf->SetFont('Arial','',12);

// $pdf->Cell(130	,5,'[Street Address]',0,0);
// $pdf->Cell(59	,5,'',0,1);//end of line

// $pdf->Cell(130	,5,'[City, Country, ZIP]',0,0);
// $pdf->Cell(25	,5,'Date',0,0);
// $pdf->Cell(34	,5,'[dd/mm/yyyy]',0,1);//end of line

// $pdf->Cell(130	,5,'Phone [+12345678]',0,0);
// $pdf->Cell(25	,5,'Invoice #',0,0);
// $pdf->Cell(34	,5,'eiei',0,1);//end of line

// $pdf->Cell(130	,5,'Fax [+12345678]',0,0);
// $pdf->Cell(25	,5,'Customer ID',0,0);
// $pdf->Cell(34	,5,'eiei',0,1);//end of line

// //make a dummy empty cell as a vertical spacer
// $pdf->Cell(189	,10,'',0,1);//end of line

// //billing address
// $pdf->Cell(100	,5,'Bill to',0,1);//end of line

// //add dummy cell at beginning of each line for indentation
// $pdf->Cell(10	,5,'',0,0);
// $pdf->Cell(90	,5,'eiei',0,1);

// $pdf->Cell(10	,5,'',0,0);
// $pdf->Cell(90	,5,'eiei',0,1);

// $pdf->Cell(10	,5,'',0,0);
// $pdf->Cell(90	,5,'eiei',0,1);

// $pdf->Cell(10	,5,'',0,0);
// $pdf->Cell(90	,5,'eiei',0,1);

// //make a dummy empty cell as a vertical spacer
// $pdf->Cell(189	,10,'',0,1);//end of line

// //invoice contents
// $pdf->SetFont('Arial','B',12);

// $pdf->Cell(130	,5,'Description',1,0);
// $pdf->Cell(25	,5,'Taxable',1,0);
// $pdf->Cell(34	,5,'Amount',1,1);//end of line

// $pdf->SetFont('Arial','',12);

// //Numbers are right-aligned so we give 'R' after new line parameter

// //items
// // $query=mysqli_query($con,"select * from item where invoiceID = '".'eiei'."'");
// // $tax=0;
// // $amount=0;
// // while($item=mysqli_fetch_array($query)){
// // 	$pdf->Cell(130	,5,$item['itemName'],1,0);
// // 	$pdf->Cell(25	,5,number_format($item['tax']),1,0);
// // 	$pdf->Cell(34	,5,number_format($item['amount']),1,1,'R');//end of line
// // 	$tax+=$item['tax'];
// // 	$amount+=$item['amount'];
// // }

// //summary
// $pdf->Cell(130	,5,'',0,0);
// $pdf->Cell(25	,5,'Subtotal',0,0);
// $pdf->Cell(4	,5,'$',1,0);
// $pdf->Cell(30	,5,'eiei',1,1,'R');//end of line

// $pdf->Cell(130	,5,'',0,0);
// $pdf->Cell(25	,5,'Taxable',0,0);
// $pdf->Cell(4	,5,'$',1,0);
// $pdf->Cell(30	,5,'eiei',1,1,'R');//end of line

// $pdf->Cell(130	,5,'',0,0);
// $pdf->Cell(25	,5,'Tax Rate',0,0);
// $pdf->Cell(4	,5,'$',1,0);
// $pdf->Cell(30	,5,'10%',1,1,'R');//end of line

// $pdf->Cell(130	,5,'',0,0);
// $pdf->Cell(25	,5,'Total Due',0,0);
// $pdf->Cell(4	,5,'$',1,0);
// $pdf->Cell(30	,5,'eiei',1,1,'R');//end of line





















// $pdf->Output();
?>