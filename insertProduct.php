   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Insert Product</title>
       <?php
        session_start();
        include('Database/db.con.php');
        include_once('functions.php');
        include('admin_check.php');
        $fetchdata = new DB_con();
        @$userid = $_SESSION['customerid'];
        $sql = $fetchdata->fetchonerecord($userid);
        @$role1 = $_SESSION['role'];
        @$role = $_GET['role'];
        @$page = $_GET['page'];
        ?>
       <link href="https://fonts.googleapis.com/css2?family=Armata&display=swap" rel="stylesheet">
       <link rel="stylesheet" href="Resources/css/footer.css">
       <link rel="stylesheet" href="Resources/css/gundamFont.css">
       <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
       <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
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
           <br>
           <br>
           <div class="container">
               <a href="Insert.php?page=product" class="btn btn-primary" style="float: left;">Add Product</a>
               <br>
               <br>
               <br>
               <form action="" method="get">
                   <label class="control-label" for="">Search</label>
                   <input id="p_search" name="product_name" class="col-lg-4" type="text" value="<?php if (isset($_GET['product_name'])) {
                                                                                                    echo $_GET['product_name'];
                                                                                                } ?>">
                   <label class="control-label" for="">Grade: </label>
                   <select class="course" name="grade" id="p_grade">
                       <option value=""><?php if (isset($_GET['grade'])) {
                                            if ($_GET['grade'] == 1) {
                                                echo 'SD';
                                            } else if ($_GET['grade'] == 2) {
                                                echo 'HG';
                                            } else if ($_GET['grade'] == 3) {
                                                echo 'MG';
                                            } else if ($_GET['grade'] == 4) {
                                                echo 'RG';
                                            } else if ($_GET['grade'] == 5) {
                                                echo 'PG';
                                            }
                                        } ?></option>
                       <option value="1">SD</option>
                       <option value="2">HG</option>
                       <option value="3">MG</option>
                       <option value="4">RG</option>
                       <option value="5">PG</option>
                   </select>
                   <input class="btn btn-info mx-4 gx-2" type="submit" name="search" value="Search">
                   <input onclick="cleartext()" class="btn btn-info mx-2 gx-2" type="submit" value="Reset">
                   <a href="print/printProduct.php" class="btn btn-primary float-end">Print</a>
                   <script>
                       function cleartext() {
                           document.getElementById("p_search").value = "";
                       }
                   </script>
               </form>
               <hr>
               <div class="container">
                   <table id="mytable" class="table table-bordered table-striped">
                       <thead>
                           <th>Product ID</th>
                           <th>Image</th>
                           <th>Product Name</th>
                           <th>Amount</th>
                           <th>Price</th>
                           <th>Product Type</th>
                           <th>Who update</th>
                           <th>Edit</th>
                           <th>Delete</th>
                       </thead>
                       <tbody>
                           <?php
                            if (isset($_GET['search'])) {
                                $p_search = $_GET['product_name'];
                                $p_grade = $_GET['grade'];
                                $command = "SELECT * FROM tb_product WHERE product_id LIKE '$p_search' OR protype_id LIKE '$p_grade' OR name LIKE '%$p_search%'";
                                $sql_run = mysqli_query($conn, $command);
                                $count = mysqli_num_rows($sql_run);
                                if($count > 0) {
                                while ($row = mysqli_fetch_array($sql_run)) {
                            ?>
                                   <tr>
                                       <td valign=middle class="text-center"><?php echo $row['product_id'] ?></td>
                                       <td valign=middle class="text-center"><img style="display: block; margin-left: auto; margin-right: auto; height: 250px; width: 250px;" src="upload/<?php echo $row['image'] ?>" height="150" alt="<?php echo $row['image'] ?>"></td>
                                       <td valign=middle><?php echo $row['name'] ?></td>
                                       <td valign=middle class="text-center"><?php echo $row['amount'] . ' ກ່ອງ' ?></td>
                                       <td valign=middle class="text-center"><?php echo number_format($row['price']) . ' Kip' ?></td>
                                       <td valign=middle class="text-center"><?php if ($row['protype_id'] == 1) {
                                                echo 'SD';
                                            } else if ($row['protype_id'] == 2) {
                                                echo 'HG';
                                            } else if ($row['protype_id'] == 3) {
                                                echo 'MG';
                                            } else if ($row['protype_id'] == 4) {
                                                echo 'RG';
                                            } else if ($row['protype_id'] == 5) {
                                                echo 'PG';
                                            } ?></td>
                                       <td valign=middle class="text-center"><?php echo $row['whoupdate'] ?></td>
                                       <td valign=middle class="text-center"><a href="Edit.php?page=product&id=<?php echo $row['product_id']; ?>" class="btn btn-primary">Edit</a></td>
                                       <td valign=middle class="text-center"><a href="delete.php?page=product&id=<?php echo $row['product_id']; ?>" class="btn btn-danger">Delete</a></td>
                                   </tr>
                               <?php
                                }
                            } else {
                                echo "<h3 class='text-center'>ບໍ່ພົບຂໍ້ມູນ</h3>";
                            }
                        } else {
                            $sql = "SELECT * FROM tb_product";
                            $sql_run = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($sql_run)) {
                            ?>
                               <tr>
                                   <td valign=middle class="text-center"><?php echo $row['product_id'] ?></td>
                                   <td valign=middle class="text-center"><img style="display: block; margin-left: auto; margin-right: auto; height: 250px; width: 250px;" src="upload/<?php echo $row['image'] ?>" height="150" alt="<?php echo $row['image'] ?>"></td>
                                   <td valign=middle><?php echo $row['name'] ?></td>
                                   <td valign=middle class="text-center"><?php echo $row['amount'] . ' ກ່ອງ' ?></td>
                                   <td valign=middle class="text-center"><?php echo number_format($row['price']) . ' Kip' ?></td>
                                   <td valign=middle class="text-center"><?php if ($row['protype_id'] == 1) {
                                            echo 'SD';
                                        } else if ($row['protype_id'] == 2) {
                                            echo 'HG';
                                        } else if ($row['protype_id'] == 3) {
                                            echo 'MG';
                                        } else if ($row['protype_id'] == 4) {
                                            echo 'RG';
                                        } else if ($row['protype_id'] == 5) {
                                            echo 'PG';
                                        }?></td>
                                   <td valign=middle class="text-center"><?php echo $row['whoupdate'] ?></td>
                                   <td valign=middle class="text-center"><a href="Edit.php?page=product&id=<?php echo $row['product_id']; ?>" class="btn btn-primary">Edit</a></td>
                                   <td valign=middle class="text-center"><a href="delete.php?page=product&id=<?php echo $row['product_id']; ?>" class="btn btn-danger">Delete</a></td>
                               </tr>
                       <?php
                            }
                        }
                            ?>

                       </tbody>
                   </table>
               </div>
           </div>
       </main>

       <footer class="footer">
           <?php include('footer.php') ?>
       </footer>
   </body>

   </html>