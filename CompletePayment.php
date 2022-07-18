<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
$role = $_GET['role'];
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
    <link rel="stylesheet" href="Resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="Resources/css/gundamFont.css">
    <link rel="stylesheet" href="Resources/css/rainbow.css">
    <link rel="stylesheet" href="Resources/css/style.css">
    <link rel="stylesheet" href="Resources/css/zoom.css">
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Armata&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao&display=swap" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script rel="javascript" type="text/javascript" href="js/jquery-1.11.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <?php if($role == 'user') { ?>
    <style>
        text-center {
            text-align: center;
        }
        * {
            font-family: 'Noto Sans Lao', sans-serif;
        }
    </style>
    <div style="position: fixed; top: 50%;left: 50%; transform: translate(-50%, -60%);">
        <img style="margin-left: auto; margin-right: auto; display: block;" src="Resources/images/success.png" alt="">
        <br>
        <h1 class="text-center fw-bold">ການສັ່ງຊື້ສິນຄ້າຂອງທ່ານສຳເລັດແລ້ວ!</h1>
        <h2 class="text-center">ຂໍຂອບໃຈທີ່ອຸດໜຸນພວກເຮົາ</h2>
        <p class="text-center">ການສັ່ງຊື້ຂອງທ່ານຖືກບັນທຶກໄວ້ໃນປະຫວັດການສັ່ງຊື້ຮຽບຮ້ອຍແລ້ວ</p>
        <br>
        <div class="text-center">
            <a href="index.php" style="text-align: center; border-radius: 20px; color:whitesmoke; font-size: large; font-weight: bold;" class="btn btn-info text-uppercase px-4">ກັບຄືນສູ່ໜ້າຫຼັກ</a>
            <a href="purchaseHistory.php" style="text-align: center; border-radius: 20px; color:whitesmoke; font-size: large; font-weight: bold;" class="btn btn-info text-uppercase px-4">ເບິ່ງປະຫວັດການສັ່ງຊື້</a>
        </div>
    </div>
    <?php } else if($role == 'admin') { ?>
        <style>
        text-center {
            text-align: center;
        }
        * {
            font-family: 'Noto Sans Lao', sans-serif;
        }
    </style>
    <div style="position: fixed; top: 50%;left: 50%; transform: translate(-50%, -60%);">
        <img style="margin-left: auto; margin-right: auto; display: block;" src="Resources/images/success.png" alt="">
        <br>
        <h1 class="text-center fw-bold">ການສັ່ງຊື້ສິນຄ້າຂອງທ່ານສຳເລັດແລ້ວ!</h1>
        <p class="text-center">ການສັ່ງຊື້ຂອງທ່ານຖືກບັນທຶກໄວ້ໃນປະຫວັດການສັ່ງຊື້ຮຽບຮ້ອຍແລ້ວ</p>
        <br>
        <div class="text-center">
            <a href="admin.php" style="text-align: center; border-radius: 20px; color:whitesmoke; font-size: large; font-weight: bold;" class="btn btn-info text-uppercase px-4">ກັບຄືນສູ່ໜ້າຫຼັກ</a>
            <a href="orderProductDetail.php" style="text-align: center; border-radius: 20px; color:whitesmoke; font-size: large; font-weight: bold;" class="btn btn-info text-uppercase px-4">ເບິ່ງປະຫວັດການສັ່ງຊື້</a>
        </div>
    </div>
    <?php } ?>
</body>

</html>