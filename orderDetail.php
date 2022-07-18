<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php
include('Database/db.con.php');
include('functions.php');
$order_id = $_POST['id'];
@$user_id = $_POST['user_id'];
$sql = "SELECT * FROM tb_orderDetail INNER JOIN tb_order ON tb_orderDetail.order_id=tb_order.order_id WHERE tb_orderDetail.order_id = $order_id";
$query = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($query);
$customer_id = $rows['customer_id'];
?>
<p class="text-center">DeeNoy Gundam Shop</p>
<p class="text-center" style="font-family: 'Noto Sans Lao', sans-serif;">ໃບບິນ</p>
<hr>

<p style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ໃບບິນທີ: <?php echo $order_id ?></p>
<p style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ວັນທີ: <?php echo $rows['order_date'] ?></p>
<p style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ຊື່ຜູ້ສັ່ງຊື້: <?php $cus = "SELECT firstname, lastname FROM tb_customer WHERE customer_id = $customer_id"; $cus_run = mysqli_query($conn, $cus); $cus_row = mysqli_fetch_array($cus_run); echo $cus_row['firstname'].' '.$cus_row['lastname']; ?></p>
<p style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ຊື່ຜູ້ຮັບ: <?php echo $rows['firstname']. " " .$rows['lastname'] ?></p>
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
    <p style="font-family: 'Noto Sans Lao', sans-serif;" class=''><?php echo $product_id. ". ".$product_name." x".$amount." ລາຄາ " .number_format($totalOfUnit). " ກີບ "?></p>
    
<?php } 
if(isset($user_id)) {
$sql_command = "SELECT * FROM tb_customer WHERE customer_id = $user_id";
$sql_run = mysqli_query($conn, $sql_command);
$fetch = mysqli_fetch_array($sql_run);
if($fetch['role'] == 'admin') {
$update = "UPDATE tb_order SET readStatus = 1 WHERE order_id = $order_id";
$perform = mysqli_query($conn, $update);
}
}
?>
<hr>
    <h5 style="font-family: 'Noto Sans Lao', sans-serif;">ລວມລາຄາທັງໝົດ: <?php echo number_format($total) ?> ກີບ</h5>
<?php
?>