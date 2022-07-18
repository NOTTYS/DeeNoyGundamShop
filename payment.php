<?php
session_start();
ob_start();
include_once('Database/db.con.php');
include_once('functions.php');
@$user_id = $_SESSION['customerid'];
if (!isset($user_id)) {
  header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DeeNoy Gundam Shop</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="Resources/css/rainbow.css">
  <link rel="stylesheet" href="Resources/css/slider.css">
  <link rel="stylesheet" href="Resources/css/gundamFont.css">
  <link rel="stylesheet" href="Resources/css/footer.css">
  <link rel="stylesheet" href="Resources/css/style.css">
  <link rel="stylesheet" href="Resources/css/zoom.css">
  <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<style>

</style>

<body>
  <header id="header">
    <?php include('header.php'); ?>
  </header>

  <main id="main">

    <h1 class="text-center fw-bold">Order 66</h1>
    <br>

    <div class="container">
      <style>
        .row {
          display: -ms-flexbox;
          /* IE10 */
          display: flex;
          -ms-flex-wrap: wrap;
          /* IE10 */
          flex-wrap: wrap;
          margin: 0 -16px;
        }

        .col-25 {
          -ms-flex: 25%;
          /* IE10 */
          flex: 25%;
        }

        .col-50 {
          -ms-flex: 50%;
          /* IE10 */
          flex: 50%;
        }

        .col-75 {
          -ms-flex: 75%;
          /* IE10 */
          flex: 75%;
        }

        .col-25,
        .col-50,
        .col-75 {
          padding: 0 16px;
        }

        .container2 {
          background-color: #f2f2f2;
          padding: 5px 20px 15px 20px;
          border: 1px solid lightgrey;
          border-radius: 3px;
        }

        input[type=text] {
          width: 100%;
          margin-bottom: 20px;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 3px;
        }

        label {
          margin-bottom: 10px;
          display: block;
        }

        .icon-container2 {
          margin-bottom: 20px;
          padding: 7px 0;
          font-size: 24px;
        }

        hr {
          border: 1px solid lightgrey;
        }

        span.price {
          float: right;
          color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
          .row {
            flex-direction: column-reverse;
          }

          .col-25 {
            margin-bottom: 20px;
          }
        }
      </style>
      </head>

      <body>
        <h4 class="text-danger" style="font-family: 'Noto Sans Lao', sans-serif;">ຂໍ້ຄວນຮູ້ກ່ອນສັ່ງຊື້</h4>
        <h5 class="text-danger" style="font-family: 'Noto Sans Lao', sans-serif;">ຖ້າວ່າທ່ານສັ່ງຊື້ສິນຄ້າໄປແລ້ວ ແມ່ນບໍ່ສາມາດຍົກເລິກການສັ່ງຊື້ນັ້ນໃດ້ ຕ້ອງໄດ້ເຂົ້າມາແຈ້ງນຳທາງຮ້ານເຮົາ.</h5>
        <div class="row">
          <div class="col-75">
            <div class="container2">
              <form method="POST">

                <div class="row">
                  <div class="col-50">
                    <h3 style="font-family: 'Noto Sans Lao', sans-serif;" class="text-center">ຂໍ້ມູນ ແລະ ທີ່ຢູ່ຂອງຜູ້ຮັບເຄື່ອງ</h3>
                    <label style="font-family: 'Noto Sans Lao', sans-serif;" for="fname"><i class="fa fa-user"></i> ຊື່ຜູ້ຮັບ</label>
                    <input type="text" id="fname" name="firstname" placeholder="" required>
                    <label style="font-family: 'Noto Sans Lao', sans-serif;" for="fname"> ນາມສະກຸນ</label>
                    <input type="text" id="fname" name="lastname" placeholder="">
                    <label style="font-family: 'Noto Sans Lao', sans-serif;" for="email"><i class="fa fa-phone"></i> ເບີໂທຕິດຕໍ່</label>
                    <input type="text" id="email" name="phone_number" placeholder="ເບີໂທ ຫຼື ເບີວອດແອັບ" required>
                    <label style="font-family: 'Noto Sans Lao', sans-serif;" for="adr"><i class="fa fa-address-card-o"></i> ທີ່ຢູ່</label>
                    <input type="text" id="adr" name="address" placeholder="ໃສ່ຊື່ເມືອງ ແລະ ຊື່ບ້ານ ຫຼື ລິ້ງ Google Map" required>
                    <label style="font-family: 'Noto Sans Lao', sans-serif;" for="city"><i class="fa fa-institution"></i> ເລກທີບ້ານ</label>
                    <input type="text" id="city" name="house_id" placeholder="" required>
                  </div>

                  <!-- <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div> -->

                </div>
                <label>
                </label>
                <input type=submit href="" name="submit" style="width: 100%;" class="btn btn-success text-uppercase mr-2 px-4" value="Purchase"></i>
              </form>

            </div>
          </div>
          <div class="col-25">
            <div class="container2">
              <?php
              $sql = "SELECT * FROM tb_cart WHERE user_id = $user_id";
              $sql2 = "SELECT SUM(price) FROM tb_cart WHERE user_id = $user_id";

              $query = mysqli_query($conn, $sql);
              $count = mysqli_num_rows($query);

              $query2 = mysqli_query($conn, $sql2);
              $rows = mysqli_fetch_array($query2)
              ?>
              <h4>Cart <span class="price" style="color:black"><a style="text-decoration: none; color: black;" href="cart.php"><i class="fa fa-shopping-cart"></i> <b><?php echo $count; ?></b></span></a></h4>
              <hr>
              <?php
              $total = 0;
              foreach ($query as $row) {

                $price = $row['price'];
                $amount = $row['amount'];
                $sum = $price * $amount;
                $total += $sum;
              ?>
                <div style="padding: 5px;">
                  <p><a style="text-decoration: none; color: black; font-size: medium;" href="cart.php"><?php echo $row['product_name'] ?></a>
                  <p style="font-family: 'Noto Sans Lao', sans-serif;">ຈຳນວນ <?php echo $row['amount'] ?></p><span style="color: green;" class="price"><?php echo number_format($sum) ?></span></p>
                </div>
                <hr>
              <?php } ?>
              <?php
              ?>
              <p>Total <span class="price" style="color:black"><b class="fs-5"><?php echo number_format($total) ?></b></span></p>

            </div>
          </div>
        </div>
    </div>

  </main>
  <?php


  // $product_name = $eiei['product_name'];
  // $price = $eiei['price'];
  // $i = 1;
  // while ($row10 = mysqli_fetch_array($summon)) {
  //   echo $i . ". " . $row10['product_name'] . " ລາຄາ " . $row10['price'] . " ຈຳນວນ " . $row10['amount'] . " ກ່ອງ";
  //   echo "<br>";
  //   $i++;
  // }

  $insert2 = "SELECT sum(amount) FROM tb_cart WHERE user_id = $user_id";
  $query3 = mysqli_query($conn, $insert2);
  $summon2 = mysqli_fetch_array($query3);
  $amount = $summon2[0];
  // print_r($product_name);
  // echo "<br>";
  // print_r($summon2['price']);
  $insert = "SELECT * FROM tb_cart WHERE user_id = $user_id ORDER BY add_date DESC";
  $summon = mysqli_query($conn, $insert);
  

  if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $house_id = $_POST['house_id'];
    date_default_timezone_set("Asia/Bangkok");
    $order_date = date("Y-m-d H:i:s");
    // $timestamp = strtotime($date);
    // $order_date = date("d-m-Y H:i:s", $timestamp);
    $amount;
    $sql = "INSERT INTO tb_order (order_date, total_price, customer_id, readStatus) VALUES ('$order_date', $total, $user_id, 0)";
    $query = mysqli_query($conn, $sql);

    $SelectDetail = "SELECT order_id FROM tb_order WHERE customer_id = $user_id ORDER BY order_id DESC";
    $queryDetail = mysqli_query($conn, $SelectDetail);
    $D = mysqli_fetch_array($queryDetail);
    $order_id = $D['order_id'];

    foreach ($summon as $rrow) {
      $product_id = $rrow['product_id'];
      $product_name = $rrow['product_name'];
      $Amount = $rrow['amount'];
      $prices = $rrow['price'];
      // $array = array("$product_id", "$product_name");
      // print_r($array) ;
      $Detail = "INSERT INTO tb_orderDetail (product_id, order_id, product_name, price, amount, firstname, lastname, phone_number, address, house_id) VALUES ($product_id ,$order_id, '$product_name', $prices, $Amount, '$firstname', '$lastname', '$phone_number', '$address', $house_id)";
      $insertDetail = mysqli_query($conn, $Detail);
    }


    // $detail = "INSERT INTO tb_productDetail (order_id, product_name, price, amount, firstname, lastname, phone_number, address, house_id) VALUES ($order_id, '$product_name', $price, $amount, '$firstname', '$lastname', '$phone_number', '$address', $house_id)";
    // $addDetail = mysqli_query($conn, $detail);
    if ($query && $insertDetail) {
      $sql3 = "SELECT * FROM tb_cart WHERE user_id = $user_id";
      $check = mysqli_query($conn, $sql3);
      // echo [$_SESSION['tb_cart']];
      foreach ($check as $update) {
        $p_quantity = $update['amount'];
        $p_id = $update['product_id'];
        $sql4 = "UPDATE tb_product SET amount = amount - $p_quantity WHERE product_id = $p_id";
        $q1 = mysqli_query($conn, $sql4);
      }
      
      $delete = "DELETE FROM tb_cart WHERE user_id = $user_id";
      $perform = mysqli_query($conn, $delete);
      header("location: CompletePayment.php?role=user");
      // $stock = "UPDATE tb_product SET amount - $quantity WHERE product_id = $product_id";
    }
  }

  ?>
  <div class="mt-5"></div>
  <footer id="footer" class="text-center text-lg-start bg-light text-muted footer">
    <?php include('footer.php'); ?>
  </footer>
</body>
</head>

</html>
<?php
ob_end_flush();
?>