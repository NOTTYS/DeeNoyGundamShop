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
        <?php include('headerForAdmin.php');
        $sql_command = "SELECT * FROM tb_customer WHERE role = 'user'";
        $run = mysqli_query($conn, $sql_command);
        $count = mysqli_num_rows($run);
        $fetch = mysqli_fetch_array($run);

        $sql_command2 = "SELECT * FROM tb_customer WHERE role = 'admin'";
        $run2 = mysqli_query($conn, $sql_command2);
        $count2 = mysqli_num_rows($run2);
        $fetch2 = mysqli_fetch_array($run2);

        $sql_command3 = "SELECT * FROM tb_customer WHERE role = 'supplier'";
        $run3 = mysqli_query($conn, $sql_command3);
        $count3 = mysqli_num_rows($run3);

        $sql_command4 = "SELECT * FROM tb_customer";
        $run4 = mysqli_query($conn, $sql_command4);
        $count4 = mysqli_num_rows($run4);

        ?>

    </header>

    <main id="main">

        <h1 style="text-align: center;">Manage Users</h1>

        <div class="container">
            <br>
            <a href="Insert.php?page=user" class="btn btn-primary" style="float: left;">Add User</a>
            <br>
            <hr>
            <form action="" method="GET">
                <label for="">Search ID</label>
                <input id="id" name="id" type="text" value="<?php if (isset($_GET['id'])) {
                                                                echo $_GET['id'];
                                                            } ?>">
                <label for="">Role: </label>
                <select name="role" id="role">
                    <option value="<?php if (isset($_GET['role'])) {
                                        echo $_GET['role'];
                                    } ?>"><?php if (isset($_GET['role'])) {
                                                                                                    echo $_GET['role'];
                                                                                                } ?></option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                    <option value="supplier">Supplier</option>
                </select>
                <input class="btn btn-info mx-2 gx-2" type="submit" name="search" value="Search">
                <button onclick="cleartext()" class="btn btn-info mx-2 gx-2" name="refresh" value="Refresh">Refresh</button>
            </form>
            <script>
                function cleartext() {
                    document.getElementById("id").value = "";
                    document.getElementById("role").value = "";
                }
            </script>
            <hr>
            <table id="mytable" class="table table-bordered table-striped">
                <thead>
                    <th class="text-center" valign=middle>ID</th>
                    <th valign=middle>First name</th>
                    <th valign=middle>Last name</th>
                    <th valign=middle>Phone number</th>
                    <th valign=middle>email</th>
                    <th valign=middle>password</th>
                    <th class="text-center" valign=middle>role</th>
                    <th class="text-center" valign=middle>Edit</th>
                    <th class="text-center" valign=middle>Delete</th>
                </thead>
                <tbody>
                    <?php
                    include_once('functions.php');
                    if (isset($_GET['search'])) {
                        if (!@$_GET['id'] && !@$_GET['role']) {
                            echo "<script>alert('ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ')
                            window.location.href = 'User.php'
                            </script>";
                        }
                        @$id = $_GET['id'];
                        @$role = $_GET['role'];
                        $fetchdata = new DB_con();
                        $sql = "SELECT * FROM tb_customer WHERE (role LIKE '$role' OR customer_id LIKE '$id') OR (role LIKE '$role' AND customer_id LIKE '$id');";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count > 0) {
                            while ($row = mysqli_fetch_array($result)) {

                    ?>
                                <tr>
                                    <td valign=middle class="text-center"><?php echo $row['customer_id'] ?></td>
                                    <td><?php echo $row['firstname'] ?></td>
                                    <td><?php echo $row['lastname'] ?></td>
                                    <td valign=middle><?php echo $row['phone_number'] ?></td>
                                    <td valign=middle><?php echo $row['email'] ?></td>
                                    <td valign=middle><?php echo $row['password'] ?></td>
                                    <td valign=middle class="text-center"><?php echo $row['role'] ?></td>
                                    <td valign=middle class="text-center"><a href="Edit.php?page=user&id=<?php echo $row['customer_id']; ?>" class="btn btn-primary">Edit</a></td>
                                    <td valign=middle class="text-center"><a href="delete.php?page=user&id=<?php echo $row['customer_id']; ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else {
                        $fetchdata = new DB_con();
                        $sql = $fetchdata->fetchdata();
                        $count = mysqli_num_rows($sql);
                        if ($count > 0) {
                            while ($row = mysqli_fetch_array($sql)) {

                            ?>
                                <tr>
                                    <td valign=middle class="text-center"><?php echo $row['customer_id'] ?></td>
                                    <td><?php echo $row['firstname'] ?></td>
                                    <td><?php echo $row['lastname'] ?></td>
                                    <td valign=middle><?php echo $row['phone_number'] ?></td>
                                    <td valign=middle><?php echo $row['email'] ?></td>
                                    <td valign=middle><?php echo $row['password'] ?></td>
                                    <td valign=middle class="text-center"><?php echo $row['role'] ?></td>
                                    <td valign=middle class="text-center"><a href="Edit.php?page=user&id=<?php echo $row['customer_id']; ?>" class="btn btn-primary">Edit</a></td>
                                    <td valign=middle class="text-center"><a href="delete.php?page=user&id=<?php echo $row['customer_id']; ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                    <?php
                            }
                        }
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