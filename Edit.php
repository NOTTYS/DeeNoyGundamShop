<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include_once('functions.php');
include('admin_check.php');
$page = $_GET['page'];
$id = $_GET['id'];
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="Resources/css/footer.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script type="text/javascript" src="js/jquery-1.12.4.js"></script>
  <script type="text/javascript" src="js/jquery-ui.js"></script>
  <script type="text/javascript"></script>
</head>

<body>
  <header>
    <?php include('headerForAdmin.php') ?>
  </header>

  <main>
    <?php
    if ($page == 'user') {
      $editdata = new DB_con();
      $sql = $editdata->fetchonerecord($id);
      while ($row = mysqli_fetch_array($sql)) {
    ?>
        <div class="container">
          <h1 style="text-align: center;">Edit Users</h1>
          <hr>
          <a href="User.php" class="btn btn-primary" style="float: left;">Go back</a>
          <br>
          <br>
          <form action="" method="POST">
            <div class="mb-3">
              <label for="firstname" class="form-label">First name</label>
              <input name="firstname" type="text" class="form-control" id="firstname" aria-describedby="emailHelp" value="<?php echo $row['firstname'] ?>" required>
            </div>
            <div class="mb-3">
              <label for="lastname" class="form-label">Last name</label>
              <input name="lastname" type="text" class="form-control" id="lastname" value="<?php echo $row['lastname'] ?>" required>
            </div>
            <div class="mb-3">
              <label for="phone_number1" class="form-label">Phone number</label>
              <input name="phone_number" type="number" class="form-control" id="phone_number" value="<?php echo $row['phone_number'] ?>" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input name="email" type="email" class="form-control" id="email" value="<?php echo $row['email'] ?>" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input name="password" type="text" class="form-control" id="password" value="<?php echo $row['password'] ?>">
            </div>
            <div class="mb-3">
              <label for="role" class="form-label">Role: </label>
              <select class="form-label" name="role" id="role">
                <option value="<?php echo $row['role'] ?>"><?php echo $row['role'] ?></option>
                <option value="user">user</option>
                <option value="admin">admin</option>
                <option value="supplier">supplier</option>
              </select>
            </div>
          <?php
        }
          ?>
          <button name="edit" type="submit" class="btn btn-success">Edit</button>
          </form>
        </div>
        <?php
        if (isset($_POST['edit'])) {
          $fname = $_POST['firstname'];
          $lname = $_POST['lastname'];
          $phone_number = $_POST['phone_number'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $role = $_POST['role'];

          $sql = $editdata->updateUser($fname, $lname, $phone_number, $email, $password, $role, $id);

          if ($sql) {
            echo "<script>alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ')</script>";
          } else {
            echo "<script>alert('ເກີດຂໍ້ຜິດພາດໃນການແກ້ໄຂຂໍ້ມູນ!')</script>";
            exit;
          }
        }
        ?>
        <?php
      } else if ($page == 'product') {
        $editproduct = new DB_con();
        $sql2 = $editproduct->fetchoneproduct($id);
        while ($row2 = mysqli_fetch_array($sql2)) {
        ?>
          <div class="container">
            <h1 style="text-align: center;">Edit Product</h1>
            <hr>
            <a href="insertProduct.php" class="btn btn-primary" style="float: left;">Go back</a>
            <br>
            <br>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <div class="form-group">
                  <div class="row">
                    <label for="name" class="form-label">Image</label>
                    <div class="col-sm-9">
                      <img style="display: block;" src="upload/<?php echo $row2['image'] ?>" height="150" alt="<?php echo $row['image'] ?>">
                      <br>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input name="product_name" type="text" class="form-control" id="product_name" value="<?php echo $row2['name'] ?>" required>
              </div>
              <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input name="price" type="number" class="form-control" id="price" value="<?php echo $row2['price'] ?>" required>
              </div>
              <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input name="amount" type="number" class="form-control" id="amount" value="<?php echo $row2['amount'] ?>" required>
              </div>
              <div class="mb-3">
                <label for="protype" class="form-label">Product Type</label>
                <select class="form-label" name="protype" id="protype" value="<?php echo $row2['protype_id'] ?>">
                <option value="<?php echo $row2['protype_id'] ?>"><?php if ($row2['protype_id'] == 1) {
                  echo "SD";
                } else if ($row2['protype_id'] == 2) {
                  echo "HG";
                } else if ($row2['protype_id'] == 3) {
                  echo "MG";
                } else if ($row2['protype_id'] == 4) {
                  echo "RG";
                } else if ($row2['protype_id'] == 5) {
                  echo "PG";
                } 
                ?></option>
                  <option value="1">SD</option>
                  <option value="2">HG</option>
                  <option value="3">MG</option>
                  <option value="4">RG</option>
                  <option value="5">PG</option>
                </select>
              </div>
            <?php
          }
            ?>
            <input name="editproduct" type="submit" class="btn btn-success" value="Edit">
            <?php

            if (isset($_POST["editproduct"])) {
              // $product_image = $_FILES['image']['name'];
              // $product_image_tmp_name = $_FILES['image']['tmp_name'];
              // $product_image_folder = 'upload/' . $product_image;
              $product_name = $_POST['product_name'];
              $price = $_POST['price'];
              $amount = $_POST['amount'];
              $protype = $_POST['protype'];
              $whoupdate = $_SESSION['firstname'];

              $sql2 = $editproduct->updateProduct($product_name, $price, $amount, $protype, $whoupdate, $id);

              if ($sql2) {
                // move_uploaded_file($product_image_tmp_name, $product_image_folder);
                echo "<script>alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ')</script>";
                echo "<script>window.location.href='InsertProduct.php'</script>";
              } else {
                echo "<script>alert('ເກີດຂໍ້ຜິດພາດໃນການແກ້ໄຂຂໍ້ມູນ!')</script>";
                echo "<script>window.location.href='InsertProduct.php'</script>";
              }
            }
            ?>
            </form>
          <?php
        } else if ($page == 'employee') {
          $editemployee = new DB_con();
          $sql2 = $editemployee->fetchemployee($id);
          $row2 = mysqli_fetch_array($sql2)
          ?>
            <div class="container">
              <h1 style="text-align: center;">Edit Employee</h1>
              <hr>
              <a href="employee.php" class="btn btn-primary" style="float: left;">Go back</a>
              <br>
              <br>
              <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                
              <div class="mb-3">
                <label for="firstname" class="form-label">First name</label>
                <input name="firstname" type="text" class="form-control" id="firstname" aria-describedby="emailHelp" value="<?php echo $row2['firstname'] ?>" required>
              </div>

              <div class="mb-3">
                <label for="lastname" class="form-label">Last name</label>
                <input name="lastname" type="text" class="form-control" id="lastname" value="<?php echo $row2['lastname'] ?>" required>
              </div>

              <div class="mb-3">
                <label for="role" class="form-label">Gender: </label>
                <select class="form-label" name="gender" id="role">
                  <option value="<?php echo $row2['gender'] ?>"><?php echo $row2['gender'] ?></option>
                  <option value="user">Male</option>
                  <option value="admin">Female</option>
                  <option value="supplier">None</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="phone_number1" class="form-label">Birth_Date</label>
                <input name="birth_date" type="text" class="form-control" id="phone_number" value="<?php echo $row2['birth_date'] ?>" required>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Position</label>
                <input name="position" type="text" class="form-control" id="email" value="<?php echo $row2['position'] ?>" required>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Phone_number</label>
                <input name="phone_number" type="number" class="form-control" value="<?php echo $row2['phone_number'] ?>" id="password">
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Salary</label>
                <input name="salary" type="number" class="form-control" id="password" value="<?php echo $row2['salary'] ?>">
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="password" value="<?php echo $row2['email'] ?>">
              </div>

              <button name="editEmployee" type="submit" class="btn btn-success">Insert</button>
            </form>
          </div>
          <?php }
          ?>
          <?php
          if (isset($_POST["editEmployee"])) {
            $employee_id = $row2['employee_id'];
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $gender = $_POST['gender'];
            $birth_date = $_POST['birth_date'];
            $position = $_POST['position'];
            $phone_number = $_POST['phone_number'];
            $salary = $_POST['salary'];
            $email = $_POST['email'];
  
            $sql3 = "UPDATE tb_employee SET firstname = '$fname', lastname = '$lname', gender = '$gender', birth_date = '$birth_date', position = '$position', phone_number = '$phone_number', salary = $salary, email = '$email' WHERE employee_id = $employee_id";
            $sql_run = mysqli_query($conn, $sql3);
  
            if ($sql_run) {
              echo "<script>alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ')
              window.location.href = 'employee.php'</script>";
            } else {
              echo "<script>alert('ເກີດຂໍ້ຜິດພາດໃນການບັນທຶກຂໍ້ມູນ!')
              window.location.href = 'employee.php'</script>";
            }
          } else if ($page == 'supplier') {
            $editemployee = new DB_con();
            $sql2 = $editemployee->fetchsupplier($id);
            $row2 = mysqli_fetch_array($sql2)
            ?>
              <div class="container">
              <h1 class="mt-5">Edit Supplier</h1>
              <a href="employee.php" class="btn btn-primary" style="float: left;">Go back</a>
              <br>
              <br>
              <form action="" method="POST">
  
                <div class="mb-3">
                  <label for="firstname" class="form-label">Supplier Name</label>
                  <input value="<?php echo $row2['companyname'] ?>" name="suppliername" type="text" class="form-control" id="firstname" aria-describedby="emailHelp" required>
                </div>
  
                <div class="mb-3">
                  <label for="lastname" class="form-label">Contact Name</label>
                  <input value="<?php echo $row2['contractname'] ?>" name="contactname" type="text" class="form-control" id="lastname" required>
                </div>
  
                <div class="mb-3">
                  <label for="password" class="form-label">Phone_number</label>
                  <input value="<?php echo $row2['phone_number'] ?>" name="phone_number" type="number" class="form-control" id="password">
                </div>
  
                <div class="mb-3">
                  <label for="password" class="form-label">Address</label>
                  <input value="<?php echo $row2['address'] ?>" name="address" type="text" class="form-control" id="password">
                </div>
  
                <button name="editSupplier" type="submit" class="btn btn-success">Edit</button>
              </form>
              <?php
            if (isset($_POST["editSupplier"])) {
              $supplier_id = $id;
              $supplier_name = $_POST['suppliername'];
              $contact_name = $_POST['contactname'];
              $phone_number = $_POST['phone_number'];
              $Address = $_POST['address'];
    
              $sql3 = "UPDATE tb_supplier SET companyname = '$supplier_name', contractname = '$contact_name', phone_number = $phone_number, address = '$Address' WHERE supplier_id = $supplier_id";
              $sql_run = mysqli_query($conn, $sql3);
    
              if ($sql_run) {
                echo "<script>alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ')
                window.location.href = 'supplier.php'</script>";
              } else {
                echo "<script>alert('ເກີດຂໍ້ຜິດພາດໃນການບັນທຶກຂໍ້ມູນ!')
                window.location.href = 'supplier.php'</script>";
              }
            }
          ?>
            </div>
            <?php }
            ?>
            
  </main>

  <footer class="footer">
    <?php include('footer.php') ?>
  </footer>
</body>

</html>