  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <?php
    session_start();
    include('admin_check.php');
    include_once('functions.php');
    $insertdata = new DB_con();
    $page = $_GET['page'];
    ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Resources/css/rainbow.css">
    <link rel="stylesheet" href="Resources/css/number_button.css">
    <link rel="stylesheet" href="Resources/css/slider.css">
    <link rel="stylesheet" href="Resources/css/gundamFont.css">
    <link rel="stylesheet" href="Resources/css/bootstrap.min.css">
    <script src="Resources/js/btn-number.js"></script>
    <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="Resources/js/btn-number.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  </head>

  <body>
    <header>
      <?php include('headerForAdmin.php') ?>
    </header>

    <main>
      <?php
      if ($page == 'user') {
        if (isset($_POST['insert'])) {
          $fname = $_POST['firstname'];
          $lname = $_POST['lastname'];
          $phone_number = $_POST['phone_number'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $role = $_POST['role'];

          $sql = $insertdata->insertUser($fname, $lname, $phone_number, $email, $password, $role);

          if ($sql) {
            echo "<script>alert('ບັນທຶກຂໍ້ມູນສຳເລັດ')</script>";
          } else {
            echo "<script>alert('ເກີດຂໍ້ຜິດພາດໃນການບັນທຶກຂໍ້ມູນ!')</script>";
          }
        }
      ?>

        <div class="container">

          <h1 class="mt-5">Insert User</h1>
          <a href="User.php" class="btn btn-primary" style="float: left;">Go back</a>
          <br>
          <br>
          <form action="" method="POST">
            <div class="mb-3">
              <label for="firstname" class="form-label">First name</label>
              <input name="firstname" type="text" class="form-control" id="firstname" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
              <label for="lastname" class="form-label">Last name</label>
              <input name="lastname" type="text" class="form-control" id="lastname" required>
            </div>
            <div class="mb-3">
              <label for="phone_number1" class="form-label">Phone number</label>
              <input name="phone_number" type="number" class="form-control" id="phone_number" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input name="email" type="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input name="password" type="text" class="form-control" id="password">
            </div>
            <div class="mb-3">
              <label for="role" class="form-label">Role: </label>
              <select class="form-label" name="role" id="role">
                <option value="user">user</option>
                <option value="admin">admin</option>
                <option value="supplier">supplier</option>
              </select>
            </div>
            <button name="insert" type="submit" class="btn btn-success">Insert</button>
          </form>
        </div>
      <?php
      } else if ($page == 'product') {
        $insertproduct = new DB_con();
        $whoupdate = $_SESSION['firstname'];
      ?>
        <div class="container">
          <h1 class="mt-3" style="text-align: center;">Insert Product</h1>
          <a href="insertProduct.php" class="btn btn-primary" style="float: left;">Go back</a>
          <br>
          <br>
          <hr>
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <div class="form-group">
                <div class="row">
                  <label for="name" class="form-label">Image</label>
                  <div class="col-sm-9">
                    <input class="form-control" accept="img/png, iamge/jpeg, image/jpg" type="file" name="image" id="fileToUpload" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="product_name" class="form-label">Product Name</label>
              <input name="product_name" type="text" class="form-control" id="product_name" required>
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">Price</label>
              <input name="price" type="number" class="form-control" id="price" required>
            </div>
            <div class="mb-3">
              <label for="amount" class="form-label">Amount</label>
              <input name="amount" type="number" class="form-control" id="amount" required>
            </div>
            <div class="mb-3">
              <label for="protype" class="form-label">Product Type</label>
              <select class="form-label" name="protype" id="protype">
                <option value="1">SD</option>
                <option value="2">HG</option>
                <option value="3">MG</option>
                <option value="4">RG</option>
                <option value="5">PG</option>
              </select>
            </div>
            <input name="submit" type="submit" class="btn btn-success" value="Insert">
          <?php
           if (isset($_POST["submit"])) {
            $product_image = $_FILES['image']['name'];
            $product_image_tmp_name = $_FILES['image']['tmp_name'];
            $product_image_folder = 'upload/' . $product_image;
            $product_name = $_POST['product_name'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];
            $protype = $_POST['protype'];

            $sql = $insertproduct->insertProduct($product_image, $product_name, $price, $amount, $protype, $whoupdate);

            if ($sql) {
              move_uploaded_file($product_image_tmp_name, $product_image_folder);
              echo "Insert success.";
            } else {
              echo "<script>alert('ເກີດຂໍ້ຜິດພາດໃນການບັນທຶກຂໍ້ມູນ!')</script>";
            }
          }
        } else if ($page == 'employee') {
          if (isset($_POST['insertEmployee'])) {
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $gender = $_POST['gender'];
            $birth_date = $_POST['birth_date'];
            $position = $_POST['position'];
            $phone_number = $_POST['phone_number'];
            $salary = $_POST['salary'];
            $email = $_POST['email'];
  
            $sql = "INSERT INTO tb_employee (firstname, lastname, gender, birth_date, position, phone_number, salary, email) VALUES ('$fname', '$lname', '$gender', '$birth_date', '$position', '$phone_number', $salary, '$email')";
            $sql_run = mysqli_query($conn, $sql);
  
            if ($sql_run) {
              echo "<script>alert('ບັນທຶກຂໍ້ມູນສຳເລັດ')</script>";
            } else {
              echo "<script>alert('ເກີດຂໍ້ຜິດພາດໃນການບັນທຶກຂໍ້ມູນ!')</script>";
            }
          }
        ?>
  
          <div class="container">
  
            <h1 class="mt-5">Insert Employee</h1>
            <a href="employee.php" class="btn btn-primary" style="float: left;">Go back</a>
            <br>
            <br>
            <form action="" method="POST">

              <div class="mb-3">
                <label for="firstname" class="form-label">First name</label>
                <input name="firstname" type="text" class="form-control" id="firstname" aria-describedby="emailHelp" required>
              </div>

              <div class="mb-3">
                <label for="lastname" class="form-label">Last name</label>
                <input name="lastname" type="text" class="form-control" id="lastname" required>
              </div>

              <div class="mb-3">
                <label for="role" class="form-label">Gender: </label>
                <select class="form-label" name="gender" id="role">
                  <option value="user">Male</option>
                  <option value="admin">Female</option>
                  <option value="supplier">None</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="phone_number1" class="form-label">Birth_Date</label>
                <input name="birth_date" type="text" class="form-control" id="phone_number" required>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Position</label>
                <input name="position" type="text" class="form-control" id="email" required>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Phone_number</label>
                <input name="phone_number" type="number" class="form-control" id="password">
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Salary</label>
                <input name="salary" type="number" class="form-control" id="password">
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="password">
              </div>

              <button name="insertEmployee" type="submit" class="btn btn-success">Insert</button>
            </form>
          </div>
          <?php } else if ($page == 'supplier') {
          ?>
            <div class="container">
    
              <h1 class="mt-5">Insert Supplier</h1>
              <a href="employee.php" class="btn btn-primary" style="float: left;">Go back</a>
              <br>
              <br>
              <form action="" method="POST">
  
                <div class="mb-3">
                  <label for="firstname" class="form-label">Supplier Name</label>
                  <input name="suppliername" type="text" class="form-control" id="firstname" aria-describedby="emailHelp" required>
                </div>
  
                <div class="mb-3">
                  <label for="lastname" class="form-label">Contact Name</label>
                  <input name="contactname" type="text" class="form-control" id="lastname" required>
                </div>
  
                <div class="mb-3">
                  <label for="password" class="form-label">Phone_number</label>
                  <input name="phone_number" type="number" class="form-control" id="password">
                </div>
  
                <div class="mb-3">
                  <label for="password" class="form-label">Address</label>
                  <input name="address" type="text" class="form-control" id="password">
                </div>
  
                <button name="insertSupplier" type="submit" class="btn btn-success">Insert</button>
              </form>
            </div>
            <?php } ?>
            <?php
            if (isset($_POST["insertSupplier"])) {
              $supplier_name = $_POST['suppliername'];
              $contact_name = $_POST['contactname'];
              $phone_number = $_POST['phone_number'];
              $Address = $_POST['address'];
  
              $sql = "INSERT INTO tb_supplier (companyname, contractname, phone_number, address) VALUES ('$supplier_name', '$contact_name', $phone_number, '$Address')";
              $sql_run = mysqli_query($conn, $sql);
    
              if ($sql_run) {
                echo "<script>alert('ບັນທຶກຂໍ້ມູນສຳເລັດ')
                location.href='supplier.php'</script>";
              } else {
                echo "<script>alert('ເກີດຂໍ້ຜິດພາດໃນການບັນທຶກຂໍ້ມູນ!')</script>";
              }
            }
            
          ?>
    </main>

    <footer>
            <?php include('footer.php') ?>
    </footer>
  </body>

  </html>