<?php
include_once('Database/db.con.php');
include_once('functions.php');
@$page = $_GET['page'];
@$id = $_GET['id'];
@$user_id = $_GET['user_id'];
if ($page == 'user') {
    if (isset($_GET['id'])) {
        $userid = $_GET['id'];
        $deletedata = new DB_con();
        $sql = $deletedata->deleteUser($userid);
        if ($sql) {
            echo "<script>alert('ລົບຂໍ້ມູນສຳເລັດ')</script>";
            echo "<script>window.location.href='User.php'</script>";
        } else {
            echo "<script>alert('ເກີດຂໍ້ຜິດພາດໃນການບັນທຶກຂໍ້ມູນ!')</script>";
            echo "<script>window.location.href='User.php'</script>";
        }
    }
} else if ($page == 'product') {
    if (isset($_GET['id'])) {
        $productid = $_GET['id'];
        $deleteproduct = new DB_con();
        $sql = $deleteproduct->deleteProduct($productid);
        if ($sql) {
            echo "<script>alert('ລົບຂໍ້ມູນສຳເລັດ')</script>";
            echo "<script>window.location.href='InsertProduct.php'</script>";
        } else {
            echo "<script>alert('ເກີດຂໍ້ຜິດພາດໃນການບັນທຶກຂໍ້ມູນ!')</script>";
            echo "<script>window.location.href='InsertProduct.php'</script>";
        }
    }
} else if ($page == 'cart') {
    if (isset($_GET['id'])) {
        $productid = $_GET['id'];
        $deleteproduct = new DB_con();
        $sql = $deleteproduct->deleteProductInCart($productid, $user_id);
        if ($sql) {
            echo ("<meta http-equiv='refresh' content='1'>");
            echo "<script>javascript:history.back()</script>";
        }
    } else {
    }
} else if ($page == 'employee') {
    if (isset($_GET['id'])) {
        $employee_id = $_GET['id'];
        $sql = "DELETE FROM tb_employee WHERE employee_id = $employee_id";
        $sql_run = mysqli_query($conn ,$sql);
        if ($sql_run) {
            echo "<script>alert('ລົບຂໍ້ມູນສຳເລັດ')
            javascript:history.back()</script>";
        }
    } else {
    }
} else if ($page == 'import') {
    if (isset($_GET['id'])) {
        $import = $id;
        $sql = "DELETE FROM tb_orderproduct_detail WHERE orderprodetail_id = $import";
        $sql_run = mysqli_query($conn ,$sql);
        if ($sql_run) {
            echo ("<meta http-equiv='refresh' content='0'>");
            echo "<script>javascript:history.back()</script>";
        }
    } else {
    }
} else if ($page == 'supplier') {
    if (isset($_GET['id'])) {
        $supplier_id = $_GET['id'];
        $sql = "DELETE FROM tb_supplier WHERE supplier_id = $supplier_id";
        $sql_run = mysqli_query($conn ,$sql);
        if ($sql_run) {
            echo "<script>alert('ລົບຂໍ້ມູນສຳເລັດ')
            javascript:history.back()</script>";
        }
    } else {
    }
}