<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao&display=swap" rel="stylesheet">

</head>

<body>

    <head>
        <?php
        include('header.php');
        ?>
    </head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
        }

        html {
            box-sizing: border-box;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        .column {
            float: left;
            width: 33.3%;
            margin-bottom: 16px;
            padding: 0 8px;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 8px;
        }

        .about-section {
            padding: 50px;
            text-align: center;
            background-color: #474e5d;
            color: white;
        }

        .container {
            padding: 0 16px;
        }

        .container::after,
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .title {
            color: grey;
        }

        .button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
        }

        .button:hover {
            background-color: #555;
        }

        @media screen and (max-width: 650px) {
            .column {
                width: 100%;
                display: block;
            }
        }
    </style>
    </head>

    <body>

        <div class="about-section">
            <h1 style="font-family: 'Noto Sans Lao', sans-serif;">ກ່ຽວກັບພວກເຮົາ</h1>
            <p style="font-family: 'Noto Sans Lao', sans-serif;">ທີມງານທີ່ເລີ່ມຕົ້ນໂປຣເຈັກເວັບ DeeNoy Gundam Shop.</p>
            <p style="font-family: 'Noto Sans Lao', sans-serif;">ແລະ ຂໍ້ມູນຕິດຕໍ່ຫາສະມາຊິກທີມງານແຕ່ລະຄົນທີ່ຮ່ວມກັນເຮັດໂປຣເຈັກ Web Programming DeeNoy Gundam Shop.</p>
        </div>

        <h2 style="text-align:center">Our Team</h2>
        <div class="row">
            <div class="column">
                <div class="card">
                    <img src="Resources/images/Joe.jpg" alt="Joe" style="width:40%; display: block;
  margin-left: auto;
  margin-right: auto;">
  <br>
                    <div class="container">
                        <h2>Soulideth Ontavong</h2>
                        <p class="title">Designer</p>
                        <p>Soulideth@gmail.com</p>
                        <p><button onClick="javascript:window.open('https://www.facebook.com/profile.php?id=100010512137799', '_blank');" class="button">Contact</button></p>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <img src="Resources/images/Candy.jpg" alt="Big D" style="width:40%; display: block;
  margin-left: auto;
  margin-right: auto;">
  <br>
                    <div class="container">
                        <h2>Phomphithuck Phalamart</h2>
                        <p class="title">Information Seeker</p>
                        <p>Phomphithuck@gmail.com</p>
                        <p><button onClick="javascript:window.open('https://www.facebook.com/profile.php?id=100007319675937', '_blank');" class="button">Contact</button></p>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <img src="Resources/images/Notty.jpg" alt="NOTTY" style="width:40%; display: block;
  margin-left: auto;
  margin-right: auto;">
  <br>
                    <div class="container">
                        <h2>Chanthaphone Manivong</h2>
                        <p class="title">Programmer</p>
                        <p>Chanthaphone.manivong@gmail.com</p>
                        <p><button onClick="javascript:window.open('https://www.facebook.com/profile.php?id=100004116283749', '_blank');" class="button">Contact</button></p>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <?php include('footer.php') ?>
        </footer>
    </body>

</html>