<!DOCTYPE html>
<html lang="en">
<?php session_start();
include('Database/db.con.php');
include('admin_check.php');
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeeNoy Gundam Shop</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Resources/css/rainbow.css">
    <link rel="stylesheet" href="Resources/css/number_button.css">
    <link rel="stylesheet" href="Resources/css/slider.css">
    <link rel="stylesheet" href="Resources/css/gundamFont.css">
    <link rel="stylesheet" href="Resources/css/bootstrap.min.css">
    <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
    
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<style>

</style>

<body>
    <header id="header">
        <?php include('headerForAdmin.php'); ?>
    </header>

    <main>
        <h1 style="text-align: center;">Customer</h1>
        <div class="container">
            <br>
            <br>
            <table id="mytable" class="table table-bordered table-striped">
                <thead>
                    <th>#</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Phone number</th>
                    <th>email</th>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM tb_customer WHERE role = 'user'";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $row['customer_id'] ?></td>
                            <td><?php echo $row['firstname'] ?></td>
                            <td><?php echo $row['lastname'] ?></td>
                            <td><?php echo $row['phone_number'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </main>
    <div class="mt-5"></div>
    <footer style="position:absolute; bottom:0; width:100%; height:60px;" id="footer" class="text-center text-lg-start bg-light text-muted footer">
        <?php include('footer.php'); ?>
    </footer>
</body>

</html>
</head>

</html>