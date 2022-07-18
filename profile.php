<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('Database/db.con.php');
include_once('functions.php');
$updateProfile = new DB_con();
@$userid = $_GET['id'];
?>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
    <link rel="stylesheet" href="Resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="Resources/css/gundamFont.css">
    <link rel="stylesheet" href="Resources/css/rainbow.css">
    <link rel="stylesheet" href="Resources/css/style.css">
    <link rel="stylesheet" href="Resources/css/zoom.css">
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Armata&display=swap" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script rel="javascript" type="text/javascript" href="js/jquery-1.11.3.min.js"></script>
<body>
    <header>
        <?php if ($_SESSION['role'] == 'admin') {
            include('headerForAdmin.php');
        } else if ($_SESSION['role'] == 'supplier') {
            include('headerForSupplier.php');
        } else {
            include('header.php');
        } ?>
    </header>
    <main>
        <?php
        $sql = $updateProfile->fetchonerecord($userid);
        while ($row = mysqli_fetch_array($sql)) {
        ?>
            <div class="container-xl px-100 mt-5">
                <?php
                if ($_SESSION['role'] == 'admin') {

                ?>
                    <a href="admin.php" class="btn btn-primary" style="float: left;">Go back</a>
                <?php
                } else {

                ?>
                    <a href="index.php" class="btn btn-primary" style="float: left;">Go back</a>
                <?php } ?>

                <br>
                <br>
                <!-- Account page navigation-->
                <nav class="nav nav-borders">
                    <a class="nav-link active ms-0" href="profile.php?id=<?php echo $_SESSION['customerid'] ?>" target="">Profile</a>


                </nav>
                <hr class="mt-0 mb-4">

                <div class="row">
                    <div class="col-xl-12">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Profile Details</div>
                            <div class="card-body">
                                <form method="POST">
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (first name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="firstname">First name</label>
                                            <input name="firstname" class="form-control" id="firstname" type="text" placeholder="Enter your first name" value="<?php echo $row['firstname'] ?>">
                                        </div>
                                        <!-- Form Group (last name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="lastname">Last name</label>
                                            <input name="lastname" class="form-control" id="lastname" type="text" placeholder="Enter your last name" value="<?php echo $row['lastname'] ?>">
                                        </div>
                                    </div>
                                    <!-- Form Row        -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (organization name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="id">ID</label>
                                            <input name="id" class="form-control" id="id" type="text" placeholder="Enter your organization name" value="<?php echo $row['customer_id'] ?>" disabled>
                                        </div>
                                        <!-- Form Group (location)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLocation">Location</label>
                                            <textarea name="location" class="form-control" id="inputLocation" type="text-area" placeholder="Enter your location" value=""></textarea>
                                            <br>
                                        </div>
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="email">Email address</label>
                                        <input name="email" class="form-control" id="email" type="email" placeholder="Enter your email address" value="<?php echo $row['email'] ?>">
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (phone number)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputPhone">Phone number</label>
                                            <input name="phone_number" class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="<?php echo $row['phone_number'] ?>">
                                        </div>
                                        <!-- Form Group (birthday)-->

                                    </div>
                                <?php
                            }
                                ?>
                                <!-- Save changes button-->
                                <input name="submit" class="btn btn-success" type="submit" value="Save">

                                <?php
                                if (isset($_POST["submit"])) {
                                    $fname = $_POST['firstname'];
                                    $lname = $_POST['lastname'];
                                    // $location = $_POST['location'];
                                    $email = $_POST['email'];
                                    $phone_number = $_POST['phone_number'];
                                    $location = $_POST['location'];
                                    $sql = $updateProfile->UpdateProfile($fname, $lname, $email, $phone_number, $userid, $location);

                                    if ($sql) {
                                        echo "Saved change";
                                        echo ("<meta http-equiv='refresh' content='0'>");
                                    }
                                }
                                ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </main>
    <footer id="footer" class="text-center text-lg-start bg-light text-muted footer">
        <?php include('footer.php'); ?>
    </footer>

</body>

</html>