<!DOCTYPE html>
<html lang="en">
<?php session_start();
include('admin_check.php');
?>

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
  <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<style>

</style>

<body>
  <header id="header">
    <?php include('headerForadmin.php');
    ?>
  </header>

  <main id="main">

    <h1 style="text-align: center;">Suppliers</h1>

    <div class="container">
      <a href="Insert.php?page=supplier" class="btn btn-primary" style="float: left;">Add</a>
      <br>
      <br>
      <table id="mytable" class="table table-bordered table-striped">
        <thead>
          <th>#</th>
          <th>Supplier Name</th>
          <th>Contact Name</th>
          <th>Phone number</th>
          <th>Address</th>
          <th>Edit</th>
          <th>Delete</th>
        </thead>
        <tbody>
          <?php
          include_once('functions.php');
          $fetchdata = new DB_con();
          $sql = $fetchdata->fetchsupplier();
          while ($row = mysqli_fetch_array($sql)) {
          ?>
            <tr>
              <td><?php echo $row['supplier_id'] ?></td>
              <td><?php echo $row['companyname'] ?></td>
              <td><?php echo $row['contractname'] ?></td>
              <td><?php echo $row['phone_number'] ?></td>
              <td><?php echo $row['address'] ?></td>
              <td><a href="Edit.php?page=supplier&id=<?php echo $row['supplier_id']; ?>" class="btn btn-primary">Edit</a></td>
              <td><a href="delete.php?page=supplier&id=<?php echo $row['supplier_id']; ?>" class="btn btn-danger">Delete</a></td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>

  </main>
  <div class="mt-5"></div>
  <footer id="footer" class="text-center text-lg-start bg-light text-muted footer">
    <?php include('footer.php'); ?>
  </footer>
</body>

</html>
</head>

</html>