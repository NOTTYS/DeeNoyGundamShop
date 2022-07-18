<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php
include('Database/db.con.php');
include('functions.php');
$order_id = $_POST['id'];
@$user_id = $_POST['user_id'];
$sql = "SELECT * FROM tb_import_Detail INNER JOIN tb_import ON tb_import_detail.import_id=tb_import.import_id WHERE tb_import.order_id = $order_id";
$query = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($query)
?>
<p class="text-center">DeeNoy Gundam Shop</p>
<p class="text-center" style="font-family: 'Noto Sans Lao', sans-serif;">ລາຍລະອຽດໃບນຳເຂົ້າ</p>
<hr>

<p style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ໃບນຳເຂົ້າເລກທີ: <?php echo $rows['import_id'] ?></p>
<p style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ໃບສັ່ງຊື້ເລກທີ: <?php echo $order_id ?></p>
<p style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ນຳເຂົ້າວັນທີ: <?php echo $rows['import_date'] ?></p>
<p style="font-family: 'Noto Sans Lao', sans-serif;" class='fs-5'>ສິນຄ້າທີ່ສັ່ງຊື້:</p>
<?php
$total = 0;
foreach ($query as $row) {
    $product_id = $row['product_id'];
    $product = "SELECT name FROM tb_product WHERE product_id = $product_id";
    $product_run = mysqli_query($conn, $product);
    $product_fetch = mysqli_fetch_array($product_run);
    $product_name = $product_fetch['name'];
    $amount = $row['amount'];
    $price = $row['price'];
    $total += $price;

?>
    <p style="font-family: 'Noto Sans Lao', sans-serif;" class=''><?php echo $product_id . ". " . $product_name . " x" . $amount . " ລາຄາ " . number_format($price) . " ກີບ " ?></p>

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
<?php
?>