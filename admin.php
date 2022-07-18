<!doctype html>
<html lang="en">

<head>
  <?php
  session_start();
  include_once('Database/db.con.php');
  include_once('functions.php');
  $fetchdata = new DB_con();
  @$userid = $_SESSION['customerid'];
  $sql = $fetchdata->fetchonerecord($userid);
  ?>
  <?php
  include('admin_check.php');
  ?>
  <title>DeeNoy Gundam Shop</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="Resources/css/gundamFont.css">
  <link rel="stylesheet" href="Resources/css/rainbow.css">
  <link rel="stylesheet" href="Resources/css/zoom.css">
  <link rel="stylesheet" href="Resources/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Armata&display=swap" rel="stylesheet">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
  <header>
    <?php include('headerForAdmin.php');
    $sql_command = "SELECT SUM(total_price) FROM tb_order";
    $run = mysqli_query($conn, $sql_command);
    $count = mysqli_num_rows($run);
    $fetch = mysqli_fetch_array($run);

    $sql_command2 = "SELECT SUM(price) FROM tb_import_detail";
    $run2 = mysqli_query($conn, $sql_command2);
    $count2 = mysqli_num_rows($run2);
    $fetch2 = mysqli_fetch_array($run2);

    $sql_command3 = "SELECT SUM(salary) FROM tb_employee WHERE NOT position = 'Manager'";
    $run3 = mysqli_query($conn, $sql_command3);
    $count3 = mysqli_num_rows($run3);
    $fetch3 = mysqli_fetch_array($run3);

    $sql_command4 = "SELECT * FROM tb_customer";
    $run4 = mysqli_query($conn, $sql_command4);
    $count4 = mysqli_num_rows($run4);

    $sql_command4 = "SELECT * FROM tb_customer WHERE role = 'user'";
    $run4 = mysqli_query($conn, $sql_command4);
    $count5 = mysqli_num_rows($run4);

    $sql_command4 = "SELECT * FROM tb_customer WHERE role = 'admin'";
    $run4 = mysqli_query($conn, $sql_command4);
    $count6 = mysqli_num_rows($run4);

    $sql_command4 = "SELECT * FROM tb_customer WHERE role = 'supplier'";
    $run4 = mysqli_query($conn, $sql_command4);
    $count7 = mysqli_num_rows($run4);
    ?>
  </header>
  <style>
    .head {
      background-color: blue;
      padding: 20px;
      justify-content: center;
      position: relative;
      top: -30px;
      border-radius: 30px;
    }

    .head h3 {
      color: white;
    }

    body {
      background-color: whitesmoke;
      margin: 0% auto;
    }

    .paper {
      border-end-end-radius: 30px;
      border-end-start-radius: 30px;
    }

    * {
      box-sizing: border-box;
    }

    /* Create two equal columns that floats next to each other */
    .column2 {
      float: left;
      width: 50%;
      padding: 10px;
      height: auto;
      /* Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */
    .row2:after {
      content: "";
      display: table;
      clear: both;
    }
    .row2 {
      margin-top: 1rem;
    }
    h5, h6{
      color: white;
    }
  </style>
  <main>
    <br>
    <br>
    <div class="container">

      <div class="paper" style="background-color: whitesmoke; box-shadow: 5px 10px 8px 10px #888888;">
        <div class="pr-5 text-center head">
          <h3>Dashboard</h3>
        </div>
        <link rel="stylesheet" href="Resources/css/card.css">
        <div class="row d-flex justify-content-center px-5 pt-2">
          <div class="column">
            <div class="card bg-primary">
              <h5 style="font-family: 'Noto Sans Lao', sans-serif;">All Sales</h5>
              <br>
              <img style="height: 4rem; width: 4rem; display: block; margin-left: auto; margin-right: auto" src="Resources/images/income.png" alt="">
              <br>
              <h5 style="font-family: 'Noto Sans Lao', sans-serif;">ລວມການຂາຍໃດ້ທັງໝົດ: <?php echo number_format($fetch[0]) ?> ກີບ</h5>

            </div>
          </div>

          <div class="column">
            <div class="card bg-danger">
              <h5 style="font-family: 'Noto Sans Lao', sans-serif;">Expenditure</h5>
              <br>
              <img style="height: 4rem; width: 4rem; display: block; margin-left: auto; margin-right: auto" src="Resources/images/expenses.png" alt="">
              <br>
              <h5 style="font-family: 'Noto Sans Lao', sans-serif;">ລວມລາຍຈ່າຍ: <?php echo number_format($expenditure = $fetch2[0] + $fetch3[0]) ?> ກີບ</h5>
              <h6 style="font-family: 'Noto Sans Lao', sans-serif;">ລວມລາຄານຳເຂົ້າທັງໝົດ: <?php echo number_format($fetch2[0]) ?> ກີບ</h6>
              <h6 style="font-family: 'Noto Sans Lao', sans-serif;">ລວມເງິນເດືອນພະນັກງານ: <?php echo number_format($fetch3[0]) ?> ກີບ</h6>

            </div>
          </div>

          <div class="column">
            <div class="card bg-success">
              <h5 style="font-family: 'Noto Sans Lao', sans-serif;">Income</h5>
              <br>
              <img style="height: 4rem; width: 4rem; display: block; margin-left: auto; margin-right: auto" src="Resources/images/income2.png" alt="">
              <br>
              <h5 style="font-family: 'Noto Sans Lao', sans-serif;">ກຳໄລ: <?php echo number_format($fetch[0] - $expenditure) ?> ກີບ</h5>

            </div>
          </div>

          <div class="column">
            <div class="card bg-info">
              <h5 style="font-family: 'Noto Sans Lao', sans-serif;">All Users</h5>
              <br>
              <img style="height: 4rem; width: 4rem; display: block; margin-left: auto; margin-right: auto" src="Resources/images/user.png" alt="">
              <br>
              <h5 style="font-family: 'Noto Sans Lao', sans-serif;">ຈຳນວນຜູ້ໃຊ້ທັງໝົດ: <?php echo number_format($count4) ?> ຄົນ</h5>
              <h6 style="font-family: 'Noto Sans Lao', sans-serif;"><i class="fa fa-user" style="color: black; font-size: 20px;"></i> Customer: <?php echo number_format($count5) ?> ຄົນ</h6>
              <h6 style="font-family: 'Noto Sans Lao', sans-serif;"><i class="fas fa-users" style="color: black; font-size: 20px;"></i> Admin: <?php echo number_format($count6) ?> ຄົນ</h6>
              <h6 style="font-family: 'Noto Sans Lao', sans-serif;"><i class="fas fa-industry" style="color: black; font-size: 20px;"></i> Supplier: <?php echo number_format($count7) ?> ຄົນ</h6>

            </div>
          </div>
        </div>

        <style>

        </style>

        <div class="row2 py-2 px-2">
          <div class="column2">
          <h4 style="background-color: green; border-radius: 30px; text-align: center; padding: 5px; color: white;">Order</h4>
            <table id="mytable" class="table table-bordered table-striped ">
              <thead>
              <th>ID</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Price</th>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT * FROM tb_order ORDER BY order_id DESC LIMIT 5";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
                ?>
                  <tr>
                    <td><?php echo $row['order_id'] ?></td>
                    <td><?php echo $row['order_date'] ?></td>
                    <td><?php echo $row['customer_id'] ?></td>
                    <td style="color: darkgreen; font-weight: bold;"><?php echo number_format($row['total_price']) ?></td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
          <div class="column2">
          <h4 style="background-color: lightcoral; border-radius: 30px; text-align: center; padding: 5px; color: white;">Import</h4>
            <table id="mytable" class="table table-bordered table-striped ">
              <thead>
                <th>ID</th>
                <th>Import Date</th>
                <th>Price</th>
              </thead>
              <tbody>
                <?php
                 $sql2 = "SELECT * FROM tb_import INNER JOIN tb_import_detail ON tb_import.import_id=tb_import_detail.import_id ORDER BY import_date DESC LIMIT 5";
                 $query2 = mysqli_query($conn, $sql2);
                while ($row2 = mysqli_fetch_array($query2)) {
                ?>
                  <tr>
                    <td><?php echo $row2['order_id'] ?></td>
                    <td><?php echo $row2['import_date'] ?></td>
                    <td style="color: red; font-weight: bold;"><?php echo number_format($row2['price']) ?></td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>
  <br>
  <br>
  <!-- Bootstrap JavaScript Libraries -->
  <footer class="text-center text-lg-start bg-light text-muted footer">
    <?php include('footer.php'); ?>
  </footer>
</body>

</html>
<script src="Resources/js/slider.js"></script>