<?php 
    session_start();
    ob_start();
    include ('Database/db.con.php');
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordenc = md5($password);
        $query = "SELECT * FROM tb_customer where email = '$email' AND password = '$password'";

        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
        // if($email = "' or ''='" || $password = "' or ''='" || $emai = "' or 1--" || $password = "' or 1--" || $emai = "' or true--" || $password = "' or ''='") {
        //     echo "<script>alert('ການ Hack ເປັນການກະທຳທີ່ຜິດກົດໝາຍ')</script>";
        //     header("location: login.php");
        // }
        if ($count == 0)
        {
            echo "<script>
                    alert('Username ຫຼື Password ບໍ່ຖືກຕ້ອງ');
                    window.location.href='login.php';
                    </script>";
        }
        else
        {
                if(mysqli_num_rows($result) == 1){
        
                    $_SESSION['customerid'] = $row['customer_id'];
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['lastname'] = $row['lastname'];
                    $_SESSION['phone_number'] = $row['phone_number'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['password'] = $row['password'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['location'] = $row['location'];
                    $_SESSION['login'] = true;
                    
        
                    if ($_SESSION['role'] == "user")
                    {
                        header("Location: index.php");
                        // $ip = $_SERVER["REMOTE_ADDR"];
                        // $userid = $_SESSION['userid'];
                        // date_default_timezone_set("Asia/Bangkok");
                        // $query2 = "INSERT INTO logging (login_time, src_ip, user_id) VALUE(now(), '$ip', $userid)";
                        // $result2 = mysqli_query($conn, $query2);
                    }
        
                    if ($_SESSION['role'] == "admin")
                    {
                        header("Location: admin.php");
                        // $ip = $_SERVER["REMOTE_ADDR"];
                        // $userid = $_SESSION['userid'];
                        // date_default_timezone_set("Asia/Bangkok");
                        // $query2 = "INSERT INTO logging (login_time, src_ip, user_id) VALUE(now(), '$ip', $userid)";
                        // $result2 = mysqli_query($conn, $query2);
                    }

                    if ($_SESSION['role'] == "supplier")
                    {
                        header("Location: supplyer.php");
                        // $ip = $_SERVER["REMOTE_ADDR"];
                        // $userid = $_SESSION['userid'];
                        // date_default_timezone_set("Asia/Bangkok");
                        // $query2 = "INSERT INTO logging (login_time, src_ip, user_id) VALUE(now(), '$ip', $userid)";
                        // $result2 = mysqli_query($conn, $query2);
                    }
            
            
        }
        else
            {
                echo "Data is not exists";
            }
    }
ob_end_flush();
