<?php
        session_start();
        require_once "Database/db.con.php";
        if (isset($_POST['submit']))
        {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $phone_number = $_POST['phone_number'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $re_password = $_POST['re-password'];
            date_default_timezone_set("Asia/Bangkok");
            // $date = date("Y/m/d G:i:s");
            // $expdate = date('Y/m/d G:i:s', strtotime('+1 years'));;
            $passwordenc = md5($password);
            $passwordenc2 = md5($re_password);
            if($password === $re_password)
            {
                $user_check = "SELECT * FROM tb_customer WHERE email = '$email' and password = '$password' LIMIT 1";
                $result = mysqli_query($conn, $user_check);
                $user = mysqli_fetch_assoc($result);
                if (@$user['email'] === @$email)
                {
                    echo "<script>
                    alert('Email ນີ້ມີຄົນໃຊ້ໄປແລ້ວ');
                    window.location.href='register.php';
                    </script>";
                }
                else
                {
                    
                    $query = "INSERT INTO tb_customer (firstname, lastname, phone_number, email, password, role) VALUES('$firstname', '$lastname', '$phone_number', '$email', '$password', 'user')";
                    $result = mysqli_query($conn, $query);

                    if ($result)
                    {
                        echo "<script>
                    alert('ລົງທະບຽນສຳເລັດ');
                    window.location.href='login.php';
                    </script>";
                    }
                    else
                    {
                        $_SESSION['error'] = "ການລົງທະບຽນບໍ່ສຳເລັດ";
                        header("Location: login.php");
                    }
                }
            }
            else
            {
                echo "<script>
                    alert('Password ແລະ Re-password ບໍ່ຕົງກັນ');
                    window.location.href='register.php';
                    </script>";
            }
        }
    ?>